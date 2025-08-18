# API Specification
## Professional Accounting Consultancy Website

### **API Overview**
**Base URL**: `https://consultancy.rw/api/v1`  
**Authentication**: Laravel Sanctum (SPA Authentication)  
**Content Type**: `application/json`  
**API Version**: v1  
**Rate Limiting**: 60 requests per minute per IP

---

## **1. Authentication Endpoints**

### **POST /auth/login**
**Purpose**: Authenticate admin users  
**Access**: Public  

**Request Body:**
```json
{
  "email": "admin@consultancy.rw",
  "password": "secure_password"
}
```

**Response (200):**
```json
{
  "success": true,
  "data": {
    "user": {
      "id": 1,
      "name": "Admin User",
      "email": "admin@consultancy.rw",
      "role": "admin"
    },
    "token": "1|abc123def456..."
  },
  "message": "Login successful"
}
```

### **POST /auth/logout**
**Purpose**: Logout authenticated user  
**Access**: Authenticated  
**Headers**: `Authorization: Bearer {token}`

---

## **2. Contact & Lead Management**

### **POST /contact/submit**
**Purpose**: Submit contact form from website  
**Access**: Public (with rate limiting)  

**Request Body:**
```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "phone": "+250123456789",
  "company": "ABC Corp",
  "service": "business_consultancy",
  "message": "I need help with business planning",
  "locale": "en"
}
```

**Response (201):**
```json
{
  "success": true,
  "data": {
    "id": 123,
    "reference": "INQ-2025-001",
    "status": "new"
  },
  "message": "Your inquiry has been submitted successfully"
}
```

### **GET /admin/inquiries**
**Purpose**: Get all contact inquiries  
**Access**: Admin only  

**Query Parameters:**
- `page` (int): Page number (default: 1)
- `per_page` (int): Items per page (default: 15)
- `status` (string): Filter by status (new, contacted, qualified, closed)
- `service` (string): Filter by service type
- `search` (string): Search in name, email, company

**Response (200):**
```json
{
  "success": true,
  "data": {
    "inquiries": [
      {
        "id": 123,
        "reference": "INQ-2025-001",
        "name": "John Doe",
        "email": "john@example.com",
        "company": "ABC Corp",
        "service": "business_consultancy",
        "status": "new",
        "created_at": "2025-08-17T10:30:00Z"
      }
    ],
    "pagination": {
      "current_page": 1,
      "total_pages": 5,
      "total_items": 67,
      "per_page": 15
    }
  }
}
```

---

## **3. Content Management**

### **GET /content/services**
**Purpose**: Get all services with localized content  
**Access**: Public  

**Query Parameters:**
- `locale` (string): Language code (en, fr)

**Response (200):**
```json
{
  "success": true,
  "data": {
    "services": [
      {
        "id": 1,
        "slug": "business-consultancy",
        "title": "Business Consultancy",
        "description": "Strategic planning and business development",
        "icon": "chart-bar",
        "features": [
          "Strategic Planning",
          "Market Analysis",
          "Growth Strategy"
        ],
        "pricing": {
          "starting_price": 500,
          "currency": "USD",
          "packages": [
            {
              "name": "Starter",
              "price": 500,
              "features": ["Initial consultation", "Basic analysis"]
            }
          ]
        }
      }
    ]
  }
}
```

### **PUT /admin/services/{id}**
**Purpose**: Update service information  
**Access**: Admin only  

**Request Body:**
```json
{
  "title": {
    "en": "Business Consultancy",
    "fr": "Conseil en Affaires"
  },
  "description": {
    "en": "Strategic planning and development",
    "fr": "Planification stratégique et développement"
  },
  "features": [
    "Strategic Planning",
    "Market Analysis"
  ],
  "pricing": {
    "starting_price": 600,
    "currency": "USD"
  }
}
```

---

## **4. Analytics & Reporting**

### **GET /admin/analytics/dashboard**
**Purpose**: Get dashboard analytics data  
**Access**: Admin only  

**Query Parameters:**
- `period` (string): Time period (7d, 30d, 90d, 1y)

**Response (200):**
```json
{
  "success": true,
  "data": {
    "metrics": {
      "total_inquiries": 156,
      "new_inquiries": 23,
      "conversion_rate": 12.5,
      "avg_response_time": 4.2
    },
    "charts": {
      "inquiries_by_day": [
        {"date": "2025-08-10", "count": 5},
        {"date": "2025-08-11", "count": 8}
      ],
      "services_popularity": [
        {"service": "business_consultancy", "count": 45},
        {"service": "accounting", "count": 32}
      ]
    }
  }
}
```

---

## **5. File Management**

### **POST /admin/files/upload**
**Purpose**: Upload files (documents, images)  
**Access**: Admin only  
**Content Type**: `multipart/form-data`

**Request Body:**
```
file: [binary file data]
type: "document" | "image" | "template"
category: "service_documents" | "marketing" | "templates"
```

**Response (201):**
```json
{
  "success": true,
  "data": {
    "id": 456,
    "filename": "business_plan_template.pdf",
    "url": "/storage/documents/business_plan_template.pdf",
    "size": 2048576,
    "type": "document"
  }
}
```

---

## **6. SEO & Meta Management**

### **GET /seo/meta/{page}**
**Purpose**: Get SEO meta data for specific page  
**Access**: Public  

**Response (200):**
```json
{
  "success": true,
  "data": {
    "title": "Business Consultancy Services | Professional Consultancy Rwanda",
    "description": "Expert business consultancy services in Rwanda...",
    "keywords": "business consultancy, Rwanda, strategic planning",
    "canonical": "https://consultancy.rw/en/services/business-consultancy",
    "og_image": "/images/og/business-consultancy.jpg",
    "structured_data": {
      "@type": "Service",
      "name": "Business Consultancy",
      "provider": "Professional Consultancy Rwanda"
    }
  }
}
```

---

## **7. Error Handling**

### **Standard Error Response Format**
```json
{
  "success": false,
  "error": {
    "code": "VALIDATION_ERROR",
    "message": "The given data was invalid",
    "details": {
      "email": ["The email field is required"],
      "name": ["The name field must be at least 2 characters"]
    }
  }
}
```

### **HTTP Status Codes**
- `200` - Success
- `201` - Created
- `400` - Bad Request
- `401` - Unauthorized
- `403` - Forbidden
- `404` - Not Found
- `422` - Validation Error
- `429` - Rate Limit Exceeded
- `500` - Internal Server Error

---

## **8. Rate Limiting**

### **Public Endpoints**
- Contact form: 5 submissions per hour per IP
- Content endpoints: 100 requests per minute per IP
- File downloads: 50 requests per minute per IP

### **Admin Endpoints**
- General admin: 200 requests per minute per user
- File uploads: 20 uploads per minute per user
- Bulk operations: 10 requests per minute per user

---

## **9. Webhooks (Future)**

### **POST /webhooks/payment**
**Purpose**: Handle payment notifications  
**Access**: Payment provider only  

### **POST /webhooks/email**
**Purpose**: Handle email delivery notifications  
**Access**: Email service only  

---

## **10. API Versioning**

### **Version Strategy**
- URL versioning: `/api/v1/`, `/api/v2/`
- Backward compatibility maintained for 1 year
- Deprecation notices 6 months before removal

### **Version Headers**
```
Accept: application/vnd.consultancy.v1+json
API-Version: 1.0
```

---

*API Specification Version: 1.0*  
*Last Updated: 2025-08-17*  
*Next Review: 2025-09-17*
