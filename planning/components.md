# Reusable Component Library
## Professional Accounting Consultancy Website

### **Component Architecture Philosophy**
**DRY Principle**: Don't Repeat Yourself - every component serves a single, reusable purpose
**Consistency**: Uniform design language and behavior across the application
**Accessibility**: WCAG 2.1 AA compliant by default
**Performance**: Optimized for fast loading and minimal resource usage
**Maintainability**: Clear documentation and standardized implementation

---

## **1. Layout Components**

### **AppLayout**
**Purpose**: Main application layout wrapper with header, footer, and content area
**Location**: `resources/views/layouts/app.blade.php`

**Props:**
- `title` (string): Page title for SEO
- `description` (string): Meta description
- `keywords` (string): SEO keywords
- `canonical` (string): Canonical URL

**Features:**
- Multi-language navigation
- Responsive header with mobile menu
- SEO-optimized meta tags
- Structured data markup
- Footer with contact information

**Usage:**
```blade
@extends('layouts.app')

@section('title', 'Business Consultancy Services')
@section('description', 'Expert business consultancy services in Rwanda')

@section('content')
    <!-- Page content -->
@endsection
```

### **Header Component**
**Purpose**: Site navigation and branding
**Location**: `resources/views/components/header.blade.php`

**Features:**
- Logo and company branding
- Multi-language navigation menu
- Language switcher dropdown
- Mobile-responsive hamburger menu
- Call-to-action button
- Active page highlighting

**Responsive Behavior:**
- Desktop: Horizontal navigation with dropdowns
- Tablet: Condensed navigation
- Mobile: Hamburger menu with slide-out panel

### **Footer Component**
**Purpose**: Site footer with links and contact information
**Location**: `resources/views/components/footer.blade.php`

**Features:**
- Company information and description
- Quick navigation links
- Contact information for Rwanda office
- Social media links
- Copyright and legal links
- Multi-language support

---

## **2. Content Components**

### **ServiceCard**
**Purpose**: Display service offerings with consistent formatting
**Location**: `resources/views/components/service-card.blade.php`

**Props:**
- `title` (string): Service title (translation key)
- `description` (string): Service description (translation key)
- `icon` (string): Icon name or SVG path
- `route` (string): Route name for CTA button
- `features` (array): Optional feature list
- `class` (string): Additional CSS classes

**Features:**
- Hover effects and animations
- Responsive design
- Accessibility attributes
- Consistent icon sizing
- Call-to-action button

**Usage:**
```blade
<x-service-card
    title="common.services.business_consultancy.title"
    description="common.services.business_consultancy.description"
    icon="chart-bar"
    route="services.business-consultancy"
    :features="['Strategic Planning', 'Market Analysis', 'Growth Strategy']"
    class="mb-6"
/>
```

### **TestimonialCard**
**Purpose**: Display client testimonials with consistent formatting
**Location**: `resources/views/components/testimonial-card.blade.php`

**Props:**
- `quote` (string): Testimonial text
- `name` (string): Client name
- `location` (string): Client location
- `avatar` (string): Avatar image URL (optional)
- `rating` (int): Star rating (optional)

**Features:**
- Quote formatting with proper typography
- Avatar placeholder if no image provided
- Star rating display
- Responsive design
- Semantic markup for accessibility

### **ContactForm**
**Purpose**: Reusable contact form with validation
**Location**: `resources/views/components/contact-form.blade.php`

**Props:**
- `action` (string): Form submission URL
- `method` (string): HTTP method (default: POST)
- `title` (string): Form title
- `services` (array): Service options for dropdown

**Features:**
- Client-side validation
- CSRF protection
- Accessible form labels
- Error message display
- Success confirmation
- Multi-language support

**Usage:**
```blade
<x-contact-form
    action="{{ route('contact.submit') }}"
    title="Get In Touch"
    :services="$availableServices"
/>
```

---

## **3. UI Components**

### **Button**
**Purpose**: Consistent button styling and behavior
**Location**: `resources/views/components/button.blade.php`

**Props:**
- `type` (string): Button type (primary, secondary, accent)
- `size` (string): Button size (sm, md, lg)
- `href` (string): Link URL (creates anchor tag)
- `target` (string): Link target
- `disabled` (boolean): Disabled state
- `loading` (boolean): Loading state with spinner

**Variants:**
```blade
<!-- Primary button -->
<x-button type="primary" size="lg">
    Get Started
</x-button>

<!-- Secondary button as link -->
<x-button type="secondary" href="/services">
    Learn More
</x-button>

<!-- Loading state -->
<x-button type="primary" :loading="true">
    Submitting...
</x-button>
```

### **Modal**
**Purpose**: Overlay dialogs for forms and content
**Location**: `resources/views/components/modal.blade.php`

**Props:**
- `id` (string): Unique modal identifier
- `title` (string): Modal title
- `size` (string): Modal size (sm, md, lg, xl)
- `closable` (boolean): Show close button

**Features:**
- Backdrop click to close
- Escape key to close
- Focus management
- Scroll lock when open
- Smooth animations

### **Alert**
**Purpose**: Status messages and notifications
**Location**: `resources/views/components/alert.blade.php`

**Props:**
- `type` (string): Alert type (success, error, warning, info)
- `dismissible` (boolean): Show dismiss button
- `title` (string): Alert title (optional)

**Usage:**
```blade
<x-alert type="success" dismissible title="Success!">
    Your message has been sent successfully.
</x-alert>
```

---

## **4. Media Components**

### **ResponsiveImage**
**Purpose**: Optimized image display with responsive behavior
**Location**: `resources/views/components/responsive-image.blade.php`

**Props:**
- `src` (string): Image source URL
- `alt` (string): Alt text for accessibility
- `width` (int): Image width
- `height` (int): Image height
- `lazy` (boolean): Enable lazy loading
- `sizes` (string): Responsive sizes attribute

**Features:**
- WebP format with JPEG fallback
- Lazy loading for performance
- Responsive image sizing
- Proper aspect ratio maintenance
- SEO-optimized alt text

**Usage:**
```blade
<x-responsive-image
    src="/images/business-meeting.jpg"
    alt="Business consultancy meeting in Kigali"
    width="800"
    height="600"
    :lazy="true"
    sizes="(max-width: 768px) 100vw, 50vw"
/>
```

### **IconComponent**
**Purpose**: Consistent icon display throughout the site
**Location**: `resources/views/components/icon.blade.php`

**Props:**
- `name` (string): Icon name from icon library
- `size` (string): Icon size (sm, md, lg, xl)
- `color` (string): Icon color class
- `class` (string): Additional CSS classes

**Icon Library:**
- Business: chart-bar, briefcase, building
- Finance: calculator, currency-dollar, trending-up
- Communication: phone, mail, chat
- Navigation: menu, chevron-down, arrow-right

---

## **5. Form Components**

### **FormField**
**Purpose**: Consistent form field styling and validation
**Location**: `resources/views/components/form-field.blade.php`

**Props:**
- `type` (string): Input type (text, email, tel, textarea, select)
- `name` (string): Field name
- `label` (string): Field label
- `required` (boolean): Required field
- `placeholder` (string): Placeholder text
- `options` (array): Options for select fields

**Features:**
- Automatic validation styling
- Error message display
- Accessibility attributes
- Consistent spacing and typography

### **FileUpload**
**Purpose**: File upload with drag-and-drop functionality
**Location**: `resources/views/components/file-upload.blade.php`

**Props:**
- `name` (string): Field name
- `accept` (string): Accepted file types
- `multiple` (boolean): Allow multiple files
- `maxSize` (string): Maximum file size

**Features:**
- Drag and drop interface
- File type validation
- Size limit enforcement
- Progress indication
- Preview for images

---

## **6. Navigation Components**

### **Breadcrumb**
**Purpose**: Navigation breadcrumb trail
**Location**: `resources/views/components/breadcrumb.blade.php`

**Props:**
- `items` (array): Breadcrumb items with name and URL

**Features:**
- Structured data markup
- Multi-language support
- Responsive design
- Accessibility attributes

**Usage:**
```blade
<x-breadcrumb :items="[
    ['name' => 'Home', 'url' => route('home')],
    ['name' => 'Services', 'url' => route('services')],
    ['name' => 'Business Consultancy', 'url' => null]
]" />
```

### **LanguageSwitcher**
**Purpose**: Language selection dropdown
**Location**: `resources/views/components/language-switcher.blade.php`

**Features:**
- Current language display
- Available language options
- Flag icons for visual identification
- Smooth transitions
- Keyboard navigation support

---

## **7. Utility Components**

### **LoadingSpinner**
**Purpose**: Loading indicator for async operations
**Location**: `resources/views/components/loading-spinner.blade.php`

**Props:**
- `size` (string): Spinner size (sm, md, lg)
- `color` (string): Spinner color
- `text` (string): Loading text (optional)

### **ProgressBar**
**Purpose**: Progress indication for multi-step processes
**Location**: `resources/views/components/progress-bar.blade.php`

**Props:**
- `steps` (array): Process steps
- `currentStep` (int): Current step index
- `completed` (array): Completed step indices

---

## **8. Service-Specific Components**

### **ServiceProcess**
**Purpose**: Display service delivery process steps
**Location**: `resources/views/components/service-process.blade.php`

**Props:**
- `steps` (array): Process steps with title and description
- `layout` (string): Layout style (horizontal, vertical)

**Usage:**
```blade
<x-service-process :steps="[
    ['title' => 'Consultation', 'description' => 'Initial assessment of your needs'],
    ['title' => 'Analysis', 'description' => 'Detailed analysis and planning'],
    ['title' => 'Implementation', 'description' => 'Execute the strategy'],
    ['title' => 'Follow-up', 'description' => 'Monitor and adjust as needed']
]" layout="horizontal" />
```

### **PricingCard**
**Purpose**: Service pricing display
**Location**: `resources/views/components/pricing-card.blade.php`

**Props:**
- `title` (string): Package title
- `price` (string): Price display
- `features` (array): Included features
- `popular` (boolean): Highlight as popular
- `ctaText` (string): Call-to-action text
- `ctaUrl` (string): Call-to-action URL

---

## **9. Component Development Guidelines**

### **Component Structure**
```php
<?php
// app/View/Components/ServiceCard.php

namespace App\View\Components;

use Illuminate\View\Component;

class ServiceCard extends Component
{
    public string $title;
    public string $description;
    public string $icon;
    public string $route;
    public array $features;

    public function __construct(
        string $title,
        string $description,
        string $icon,
        string $route,
        array $features = []
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->icon = $icon;
        $this->route = $route;
        $this->features = $features;
    }

    public function render()
    {
        return view('components.service-card');
    }
}
```

### **Component Template**
```blade
{{-- resources/views/components/service-card.blade.php --}}

<div {{ $attributes->merge(['class' => 'service-card bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100']) }}>
    <!-- Icon -->
    <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
        <x-icon :name="$icon" size="md" color="text-primary-600" />
    </div>

    <!-- Content -->
    <h3 class="text-xl font-semibold text-gray-900 mb-2">
        {{ __($title) }}
    </h3>

    <p class="text-gray-600 mb-4">
        {{ __($description) }}
    </p>

    <!-- Features -->
    @if(count($features) > 0)
        <ul class="text-gray-600 mb-6 space-y-2">
            @foreach($features as $feature)
                <li class="flex items-center">
                    <x-icon name="check" size="sm" color="text-secondary-600" class="mr-2" />
                    {{ $feature }}
                </li>
            @endforeach
        </ul>
    @endif

    <!-- CTA -->
    <x-button
        type="primary"
        :href="route($route)"
        class="w-full text-center"
    >
        {{ __('common.services.learn_more') }}
    </x-button>
</div>
```

### **Component Documentation Template**
```php
/**
 * Service Card Component
 *
 * Displays a service offering with icon, title, description, and CTA button.
 * Used throughout the site for consistent service presentation.
 *
 * @param string $title - Service title (translation key)
 * @param string $description - Service description (translation key)
 * @param string $icon - Icon name from the icon library
 * @param string $route - Route name for the CTA button
 * @param array $features - Optional list of service features
 *
 * @example
 * <x-service-card
 *     title="common.services.accounting.title"
 *     description="common.services.accounting.description"
 *     icon="calculator"
 *     route="services.accounting"
 *     :features="['Bookkeeping', 'Financial Reports', 'Tax Preparation']"
 * />
 *
 * @accessibility WCAG 2.1 AA compliant
 * @responsive Mobile-first design
 * @performance Optimized for fast rendering
 */
```

---

## **10. Component Testing Standards**

### **Component Test Example**
```php
<?php
// tests/Feature/Components/ServiceCardTest.php

namespace Tests\Feature\Components;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceCardTest extends TestCase
{
    /** @test */
    public function service_card_renders_correctly()
    {
        $view = $this->blade(
            '<x-service-card
                title="Test Service"
                description="Test Description"
                icon="chart-bar"
                route="test.route"
                :features="[\'Feature 1\', \'Feature 2\']"
            />'
        );

        $view->assertSee('Test Service');
        $view->assertSee('Test Description');
        $view->assertSee('Feature 1');
        $view->assertSee('Feature 2');
    }

    /** @test */
    public function service_card_has_proper_accessibility_attributes()
    {
        $view = $this->blade(
            '<x-service-card
                title="Test Service"
                description="Test Description"
                icon="chart-bar"
                route="test.route"
            />'
        );

        $view->assertSee('role=');
        $view->assertSee('aria-label=');
    }
}
```

---

*Component Library Version: 1.0*
*Last Updated: 2024-01-16*
*Framework: Laravel 12.20.0 + Tailwind CSS v4*
*Accessibility: WCAG 2.1 AA Compliant*