# Deployment Guide & Production Setup
## Professional Accounting Consultancy Website

### **Deployment Philosophy**
Implement a robust, scalable, and secure deployment pipeline that ensures zero-downtime deployments, automatic rollbacks, and comprehensive monitoring for a professional consultancy website that clients can trust.

### **Infrastructure Requirements**
- **High Availability**: 99.9% uptime SLA
- **Performance**: < 2.5s page load times globally
- **Security**: Enterprise-grade security measures
- **Scalability**: Handle traffic spikes during marketing campaigns
- **Backup**: Automated daily backups with point-in-time recovery

---

## **1. Production Environment Architecture**

### **Recommended Infrastructure Stack**
```
Load Balancer (Cloudflare/AWS ALB)
    ↓
Web Servers (2x Laravel App Servers)
    ↓
Database (MySQL 8.0 - Primary/Replica)
    ↓
Cache Layer (Redis Cluster)
    ↓
File Storage (AWS S3/DigitalOcean Spaces)
    ↓
CDN (Cloudflare/AWS CloudFront)
```

### **Server Specifications**

#### **Production Web Servers (2x)**
```
CPU: 4 vCPUs (Intel/AMD)
RAM: 8GB DDR4
Storage: 100GB SSD
OS: Ubuntu 22.04 LTS
PHP: 8.2+
Web Server: Nginx 1.20+
```

#### **Database Server**
```
CPU: 4 vCPUs
RAM: 16GB DDR4
Storage: 200GB SSD (with automated backups)
OS: Ubuntu 22.04 LTS
Database: MySQL 8.0 or PostgreSQL 15
```

#### **Cache Server**
```
CPU: 2 vCPUs
RAM: 4GB DDR4
Storage: 50GB SSD
OS: Ubuntu 22.04 LTS
Cache: Redis 7.0+
```

---

## **2. Domain & DNS Configuration**

### **Domain Setup**
```
Primary Domain: consultancy.rw
Staging Domain: staging.consultancy.rw
Development Domain: dev.consultancy.rw

SSL Certificate: Wildcard SSL (*.consultancy.rw)
DNS Provider: Cloudflare (recommended)
```

### **DNS Records Configuration**
```
A Record:
consultancy.rw → [Load Balancer IP]
www.consultancy.rw → [Load Balancer IP]

CNAME Records:
staging.consultancy.rw → [Staging Server]
dev.consultancy.rw → [Development Server]

MX Records:
consultancy.rw → [Email Provider MX Records]

TXT Records:
consultancy.rw → "v=spf1 include:_spf.google.com ~all"
_dmarc.consultancy.rw → "v=DMARC1; p=quarantine; rua=mailto:dmarc@consultancy.rw"
```

---

## **3. Server Configuration**

### **Nginx Configuration**
```nginx
# /etc/nginx/sites-available/consultancy.rw
server {
    listen 80;
    server_name consultancy.rw www.consultancy.rw;
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    server_name consultancy.rw www.consultancy.rw;
    root /var/www/consultancy/public;
    index index.php;

    # SSL Configuration
    ssl_certificate /etc/ssl/certs/consultancy.rw.crt;
    ssl_certificate_key /etc/ssl/private/consultancy.rw.key;
    ssl_protocols TLSv1.2 TLSv1.3;
    ssl_ciphers ECDHE-RSA-AES256-GCM-SHA512:DHE-RSA-AES256-GCM-SHA512;
    ssl_prefer_server_ciphers off;

    # Security Headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-XSS-Protection "1; mode=block" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header Referrer-Policy "no-referrer-when-downgrade" always;
    add_header Content-Security-Policy "default-src 'self' http: https: data: blob: 'unsafe-inline'" always;

    # Gzip Compression
    gzip on;
    gzip_vary on;
    gzip_min_length 1024;
    gzip_types text/plain text/css text/xml text/javascript application/javascript application/xml+rss application/json;

    # Cache Static Assets
    location ~* \.(jpg|jpeg|png|gif|ico|css|js|pdf|svg|woff|woff2)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }

    # PHP Processing
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    # Laravel Routes
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
}
```

### **PHP-FPM Configuration**
```ini
; /etc/php/8.2/fpm/pool.d/consultancy.conf
[consultancy]
user = www-data
group = www-data
listen = /var/run/php/php8.2-fpm.sock
listen.owner = www-data
listen.group = www-data
pm = dynamic
pm.max_children = 50
pm.start_servers = 5
pm.min_spare_servers = 5
pm.max_spare_servers = 35
pm.process_idle_timeout = 10s
pm.max_requests = 500

; PHP Configuration
php_admin_value[memory_limit] = 256M
php_admin_value[max_execution_time] = 60
php_admin_value[upload_max_filesize] = 10M
php_admin_value[post_max_size] = 10M
```

---

## **4. Database Configuration**

### **MySQL Production Configuration**
```sql
-- Create production database and user
CREATE DATABASE consultancy_production CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'consultancy_user'@'%' IDENTIFIED BY 'secure_random_password';
GRANT ALL PRIVILEGES ON consultancy_production.* TO 'consultancy_user'@'%';
FLUSH PRIVILEGES;

-- Performance tuning (my.cnf)
[mysqld]
innodb_buffer_pool_size = 8G
innodb_log_file_size = 512M
innodb_flush_log_at_trx_commit = 2
query_cache_type = 1
query_cache_size = 256M
max_connections = 200
```

### **Database Backup Strategy**
```bash
#!/bin/bash
# /usr/local/bin/backup-database.sh

DATE=$(date +%Y%m%d_%H%M%S)
BACKUP_DIR="/var/backups/mysql"
DB_NAME="consultancy_production"

# Create backup
mysqldump --single-transaction --routines --triggers \
    --user=backup_user --password=backup_password \
    $DB_NAME | gzip > $BACKUP_DIR/consultancy_$DATE.sql.gz

# Upload to S3
aws s3 cp $BACKUP_DIR/consultancy_$DATE.sql.gz \
    s3://consultancy-backups/database/

# Clean up local backups older than 7 days
find $BACKUP_DIR -name "consultancy_*.sql.gz" -mtime +7 -delete

# Cron job: 0 2 * * * /usr/local/bin/backup-database.sh
```

---

## **5. CI/CD Pipeline**

### **GitHub Actions Deployment Workflow**
```yaml
# .github/workflows/deploy.yml
name: Deploy to Production

on:
  push:
    branches: [main]
  workflow_dispatch:

jobs:
  tests:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      
      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: 8.2
          
      - name: Install dependencies
        run: composer install --no-dev --optimize-autoloader
        
      - name: Run tests
        run: php artisan test
        
      - name: Build assets
        run: |
          npm install
          npm run build

  deploy:
    needs: tests
    runs-on: ubuntu-latest
    if: github.ref == 'refs/heads/main'
    
    steps:
      - uses: actions/checkout@v3
      
      - name: Deploy to production
        uses: appleboy/ssh-action@v0.1.5
        with:
          host: ${{ secrets.PRODUCTION_HOST }}
          username: ${{ secrets.PRODUCTION_USER }}
          key: ${{ secrets.PRODUCTION_SSH_KEY }}
          script: |
            cd /var/www/consultancy
            git pull origin main
            composer install --no-dev --optimize-autoloader
            npm install && npm run build
            php artisan migrate --force
            php artisan config:cache
            php artisan route:cache
            php artisan view:cache
            php artisan queue:restart
            sudo systemctl reload nginx
```

### **Zero-Downtime Deployment Script**
```bash
#!/bin/bash
# /usr/local/bin/deploy.sh

set -e

APP_DIR="/var/www/consultancy"
RELEASES_DIR="$APP_DIR/releases"
CURRENT_RELEASE=$(date +%Y%m%d_%H%M%S)
RELEASE_DIR="$RELEASES_DIR/$CURRENT_RELEASE"

echo "Starting deployment: $CURRENT_RELEASE"

# Create release directory
mkdir -p $RELEASE_DIR

# Clone repository
git clone --depth 1 https://github.com/username/consultancy.git $RELEASE_DIR

# Install dependencies
cd $RELEASE_DIR
composer install --no-dev --optimize-autoloader
npm install && npm run build

# Copy environment file
cp $APP_DIR/.env $RELEASE_DIR/.env

# Run migrations
php artisan migrate --force

# Cache optimization
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Update symlink (atomic operation)
ln -nfs $RELEASE_DIR $APP_DIR/current

# Reload services
sudo systemctl reload nginx
php artisan queue:restart

# Clean up old releases (keep last 5)
cd $RELEASES_DIR
ls -t | tail -n +6 | xargs rm -rf

echo "Deployment completed successfully: $CURRENT_RELEASE"
```

---

## **6. Environment Configuration**

### **Production .env File**
```env
APP_NAME="Professional Consultancy"
APP_ENV=production
APP_KEY=base64:generated_key_here
APP_DEBUG=false
APP_URL=https://consultancy.rw

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=consultancy_production
DB_USERNAME=consultancy_user
DB_PASSWORD=secure_database_password

BROADCAST_DRIVER=log
CACHE_DRIVER=redis
FILESYSTEM_DISK=s3
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=secure_redis_password
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=hello@consultancy.rw
MAIL_PASSWORD=secure_email_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=hello@consultancy.rw
MAIL_FROM_NAME="Professional Consultancy"

AWS_ACCESS_KEY_ID=your_aws_access_key
AWS_SECRET_ACCESS_KEY=your_aws_secret_key
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=consultancy-assets

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

# Analytics
GOOGLE_ANALYTICS_ID=G-XXXXXXXXXX
GOOGLE_TAG_MANAGER_ID=GTM-XXXXXXX

# Security
SANCTUM_STATEFUL_DOMAINS=consultancy.rw,www.consultancy.rw
SESSION_DOMAIN=.consultancy.rw
```

---

## **7. Monitoring & Logging**

### **Application Monitoring**
```php
// config/logging.php - Production logging configuration
'channels' => [
    'stack' => [
        'driver' => 'stack',
        'channels' => ['single', 'slack'],
        'ignore_exceptions' => false,
    ],
    
    'slack' => [
        'driver' => 'slack',
        'url' => env('LOG_SLACK_WEBHOOK_URL'),
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'error',
    ],
],
```

### **Server Monitoring Setup**
```bash
# Install monitoring tools
sudo apt install htop iotop nethogs

# Setup log rotation
sudo nano /etc/logrotate.d/consultancy
```

### **Health Check Endpoint**
```php
// routes/web.php
Route::get('/health', function () {
    return response()->json([
        'status' => 'healthy',
        'timestamp' => now(),
        'database' => DB::connection()->getPdo() ? 'connected' : 'disconnected',
        'cache' => Cache::store('redis')->get('health_check') ? 'connected' : 'disconnected',
    ]);
});
```

---

## **8. Security Hardening**

### **Server Security**
```bash
# Firewall configuration
sudo ufw default deny incoming
sudo ufw default allow outgoing
sudo ufw allow ssh
sudo ufw allow 'Nginx Full'
sudo ufw enable

# Fail2ban configuration
sudo apt install fail2ban
sudo systemctl enable fail2ban
```

### **Application Security**
- **HTTPS enforcement**: All traffic redirected to HTTPS
- **Security headers**: CSP, HSTS, X-Frame-Options
- **Rate limiting**: API and form submission limits
- **Input validation**: All user inputs validated and sanitized
- **CSRF protection**: Laravel CSRF tokens on all forms
- **SQL injection prevention**: Eloquent ORM usage

---

*Deployment Guide Version: 1.0*  
*Last Updated: 2025-08-17*  
*Next Review: 2025-09-17*
