# Professional Consultancy Rwanda

A comprehensive Laravel-based website for a professional consultancy firm offering business, accounting, tax advisory, and other professional services across Rwanda, Canada, USA, and Cameroon.

## 🚀 Features

### Core Services
- **Business Consultancy** - Strategic planning and business development
- **Accounting Services** - Comprehensive accounting and bookkeeping
- **Tax Advisory** - Expert tax planning and compliance
- **Financial Planning** - Strategic financial planning and analysis
- **Business Registration** - Company formation and registration
- **Audit & Compliance** - Professional audit and regulatory compliance
- **Training & Capacity Building** - Corporate training and skill development
- **Career Development** - Career coaching and professional development
- **Feasibility Studies** - Business feasibility analysis and market research
- **Data Analytics** - Business intelligence and data-driven insights
- **Market Research** - Market analysis and competitive intelligence

### Technical Features
- **Multi-language Support** (English/French)
- **Responsive Design** - Mobile-first approach with Tailwind CSS
- **Contact Forms** - Professional inquiry forms for all services
- **Email Notifications** - Automated email system for form submissions
- **SEO Optimized** - Structured data, meta tags, and semantic markup
- **Performance Optimized** - Vite build system and optimized assets
- **Database Driven** - MySQL database with proper migrations
- **Admin Dashboard Ready** - Structured for easy admin panel integration

## 📋 Requirements

- PHP 8.1 or higher
- Composer
- Node.js 16+ and npm
- MySQL 8.0+
- Laravel 10.x

## 🛠️ Installation

### 1. Clone the Repository
```bash
git clone <repository-url>
cd consultancy
```

### 2. Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Environment Configuration
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Setup
```bash
# Configure database in .env file
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=consultancy_db
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Run migrations
php artisan migrate
```

### 5. Build Assets
```bash
# Development
npm run dev

# Production
npm run build
```

### 6. Start Development Server
```bash
php artisan serve
```

## 📧 Email Configuration

### For Development (Log Driver)
```env
MAIL_MAILER=log
```
Emails will be logged to `storage/logs/laravel.log`

### For Testing with Mailpit
1. Download Mailpit for Windows:
```powershell
# Run the setup script
.\setup-mailpit.ps1
```

2. Configure environment:
```env
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_ENCRYPTION=null
```

3. Access Mailpit web interface at `http://localhost:8025`

### For Production
Configure your preferred email service (SMTP, SendGrid, etc.):
```env
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-username
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
```

## 🏗️ Project Structure

```
consultancy/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── ContactController.php
│   │   │   └── ServiceInquiryController.php
│   │   └── Requests/
│   │       ├── ContactInquiryRequest.php
│   │       └── ServiceInquiryRequest.php
│   ├── Models/
│   │   ├── ContactInquiry.php
│   │   └── ServiceInquiry.php
│   └── Services/
│       └── EmailService.php
├── database/
│   └── migrations/
│       ├── create_contact_inquiries_table.php
│       └── create_service_inquiries_table.php
├── resources/
│   ├── js/
│   │   ├── app.js
│   │   ├── contact-form.js
│   │   └── service-forms.js
│   ├── views/
│   │   ├── emails/
│   │   │   ├── contact-inquiry-admin.blade.php
│   │   │   ├── contact-inquiry-confirmation.blade.php
│   │   │   ├── service-inquiry-admin.blade.php
│   │   │   └── service-inquiry-confirmation.blade.php
│   │   ├── layouts/
│   │   │   └── app.blade.php
│   │   └── pages/
│   │       ├── contact.blade.php
│   │       └── services/
│   └── css/
│       └── app.css
├── routes/
│   └── web.php
└── lang/
    ├── en/
    └── fr/
```

## 📝 Form System

### Contact Form
- **Route**: `/contact/submit`
- **Method**: POST
- **Fields**: name, email, phone, company, service, message
- **Validation**: Server-side validation with custom request class
- **Storage**: `contact_inquiries` table
- **Emails**: Admin notification + customer confirmation

### Service Forms
- **Route**: `/services/inquiry`
- **Method**: POST
- **Fields**: service_type, name, email, phone, company, message, form_data
- **Dynamic Fields**: Each service has specific additional fields
- **Storage**: `service_inquiries` table
- **Emails**: Admin notification + customer confirmation

### Available Service Forms
1. ✅ Business Consultancy (`business-consultancy-form`)
2. ✅ Accounting (`accounting-form`)
3. ✅ Tax Advisory (`tax-advisory-form`)
4. ✅ Financial Planning (`financial-planning-form`)
5. ✅ Business Registration (`business-registration-form`)
6. ✅ Audit & Compliance (`audit-compliance-form`)
7. ✅ Training (`training-form`)
8. ✅ Career Development (`career-development-form`) 
9. ✅ Feasibility Studies (`feasibility-studies-form`)
10. ✅ Data Analytics (`data-analytics-form`)
11. ✅ Market Research (`market-research-form`)

## 🎨 Frontend Technologies

- **Laravel Blade** - Server-side templating
- **Tailwind CSS** - Utility-first CSS framework
- **Vite** - Modern build tool
- **Vanilla JavaScript** - Form handling and interactions
- **Alpine.js Ready** - Structure supports Alpine.js integration

## 🔧 Configuration

### Admin Email Addresses
Configure admin emails in `.env`:
```env
ADMIN_EMAIL_1="admin@consultancy.rw"
ADMIN_EMAIL_2="info@consultancy.rw"
```

### Localization
- Default locale: English (`en`)
- Supported locales: English (`en`), French (`fr`)
- Language files: `lang/en/` and `lang/fr/`

### Rate Limiting
- Contact form: 10 submissions per minute
- Service forms: 10 submissions per minute

## 🚀 Deployment

### Production Checklist
1. Set `APP_ENV=production` in `.env`
2. Set `APP_DEBUG=false`
3. Configure production database
4. Set up email service (SMTP/SendGrid)
5. Configure admin email addresses
6. Run `composer install --optimize-autoloader --no-dev`
7. Run `npm run build`
8. Run `php artisan config:cache`
9. Run `php artisan route:cache`
10. Run `php artisan view:cache`

### Server Requirements
- PHP 8.1+ with required extensions
- MySQL 8.0+
- Nginx/Apache with proper URL rewriting
- SSL certificate for HTTPS
- Sufficient storage for logs and uploads

## 🧪 Testing

### Manual Testing
1. Start development server: `php artisan serve`
2. Test contact form at `/en/contact`
3. Test service forms on individual service pages
4. Verify email notifications (check logs or Mailpit)
5. Test form validation with invalid data
6. Test multi-language functionality

### Automated Testing
```bash
# Run PHPUnit tests (when implemented)
php artisan test
```

## 📊 Database Schema

### Contact Inquiries
- `id` (UUID, Primary Key)
- `reference` (Unique reference number)
- `name`, `email`, `phone`, `company`
- `service` (Selected service type)
- `message` (Inquiry message)
- `locale` (Language preference)
- `status` (new, in_progress, responded, closed)
- `priority` (low, medium, high, urgent)
- `metadata` (Additional data as JSON)
- `ip_address`, `user_agent`
- `timestamps`

### Service Inquiries
- `id` (UUID, Primary Key)
- `reference` (Unique reference number)
- `service_type` (Type of service)
- `name`, `email`, `phone`, `company`
- `message` (Optional message)
- `form_data` (Service-specific fields as JSON)
- `locale` (Language preference)
- `status` (new, in_progress, quoted, accepted, completed, cancelled)
- `priority` (low, medium, high, urgent)
- `estimated_value` (Project value estimate)
- `metadata` (Additional data as JSON)
- `ip_address`, `user_agent`
- `timestamps`

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## 📄 License

This is the Work of Chisolution.

## 📞 Support

For technical support or questions:
- Email: info@chisolution.io
- Documentation: This README file
- Issues: Create GitHub issues for bugs or feature requests