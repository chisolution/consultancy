# Development Standards & Guidelines
## Professional Accounting Consultancy Website

### **Project Overview**
**Business Model**: Personal portfolio consultancy based in Rwanda, serving clients globally through specialist partnerships with experience with US, Canada, Rwanda, Cameroon, based businesses.
**Core Services**: Business consultancy, registration & branding, business/project plan writing, accounting services, financial advisory, taxes, capacity/corporate training, audit & compliance, career-ready skills and career development coaching
**Target Markets**: Global reach with focus on Rwanda, Canada, US, Cameroon (expandable)
**Languages**: English and French (expandable to Spanish)

---

## **1. Coding Standards**

### **PHP/Laravel Standards**
```php
// File naming: PascalCase for classes, camelCase for methods
class ClientService
{
    public function createNewClient(array $data): Client
    {
        // Method implementation
    }
}

// Use type hints and return types
public function calculateTax(float $amount, string $country): float
{
    return $amount * $this->getTaxRate($country);
}
```

**Key Principles:**
- **PSR-12** coding standard compliance
- **Type declarations** for all method parameters and returns
- **Descriptive naming** for variables, methods, and classes
- **Single Responsibility Principle** for all classes
- **Dependency Injection** over static calls
- **Eloquent relationships** properly defined
- **Database migrations** for all schema changes

### **Frontend Standards**
```html
<!-- Semantic HTML5 structure -->
<section class="services-grid" aria-label="Our Services">
    <h2 class="services-grid__title">{{ __('common.services.title') }}</h2>
    <div class="services-grid__container">
        <!-- Service cards -->
    </div>
</section>
```

**CSS/Tailwind Standards:**
- **Mobile-first** responsive design
- **BEM methodology** for custom CSS classes
- **Tailwind utilities** preferred over custom CSS
- **Consistent spacing** using Tailwind scale (4px base)
- **Accessibility** considerations in all components
- **Performance** optimization for images and assets

### **JavaScript Standards**
```javascript
// ES6+ syntax, descriptive function names
const toggleMobileMenu = () => {
    const menu = document.getElementById('mobile-menu');
    if (menu) {
        menu.classList.toggle('hidden');
        menu.setAttribute('aria-expanded',
            menu.classList.contains('hidden') ? 'false' : 'true'
        );
    }
};

// Event delegation for dynamic content
document.addEventListener('click', (event) => {
    if (event.target.matches('[data-toggle="dropdown"]')) {
        toggleDropdown(event.target);
    }
});
```

---

## **2. File Structure Standards**

### **Laravel Application Structure**
```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/           # Admin dashboard controllers
│   │   ├── Api/             # API controllers
│   │   └── Web/             # Public website controllers
│   ├── Middleware/
│   ├── Requests/            # Form request validation
│   └── Resources/           # API resources
├── Models/                  # Eloquent models
├── Services/                # Business logic services
├── Helpers/                 # Utility helpers
└── Providers/               # Service providers
```

### **Frontend Structure**
```
resources/
├── css/
│   ├── app.css             # Main Tailwind file
│   └── components/         # Component-specific styles
├── js/
│   ├── app.js              # Main JavaScript entry
│   └── components/         # Reusable JS components
└── views/
    ├── layouts/            # Blade layouts
    ├── pages/              # Page templates
    ├── components/         # Reusable components
    └── partials/           # Partial templates
```

### **Planning Documentation Structure**
```
planning/
├── README.md               # Project overview and setup
├── erd.md                  # Database design
├── wireframes.md           # UI/UX design specifications
├── business-rules.md       # Business logic and rules
├── user-stories.md         # Requirements and user stories
├── standards.md            # This file - development standards
├── content.md              # Content strategy and guidelines
├── components.md           # Reusable component library
├── agile-plan.md           # Sprint planning and timeline
├── research.md             # Market and competitor research
├── competitor-analysis.md  # Detailed competitive analysis
├── market-sizing.md        # Market opportunity analysis
└── seo-standards.md        # SEO guidelines and best practices
```

---

## **3. Component Standards**

### **Reusable Component Principles**
- **Single Responsibility**: Each component has one clear purpose
- **Configurable**: Accept parameters for customization
- **Accessible**: WCAG 2.1 AA compliant by default
- **Responsive**: Work across all device sizes
- **Translatable**: Support multi-language content

### **Component Naming Convention**
```php
// Blade components: kebab-case
<x-service-card
    :service="$service"
    :locale="app()->getLocale()"
    class="mb-6"
/>

// Component files: PascalCase
app/View/Components/ServiceCard.php
resources/views/components/service-card.blade.php
```

### **Required Component Documentation**
```php
<?php
/**
 * Service Card Component
 *
 * Displays a service offering with icon, title, description, and CTA
 *
 * @param string $title - Service title (translatable key)
 * @param string $description - Service description (translatable key)
 * @param string $icon - Icon name or SVG path
 * @param string $route - Route name for CTA button
 * @param string $locale - Current locale for routing
 * @param array $features - Optional feature list
 */
class ServiceCard extends Component
{
    // Component implementation
}
```

---

## **4. Database Standards**

### **Migration Standards**
```php
// Descriptive migration names with timestamps
2024_01_15_create_clients_table.php
2024_01_16_add_locale_to_users_table.php
2024_01_17_create_service_inquiries_table.php

// Always include rollback methods
public function down()
{
    Schema::dropIfExists('clients');
}
```