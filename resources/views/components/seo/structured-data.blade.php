{{-- SEO Structured Data Component --}}
@props(['type' => 'organization', 'data' => []])

@if($type === 'organization')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "ProfessionalService",
  "name": "Professional Business Consultancy",
  "alternateName": "PBC Rwanda",
  "description": "Expert business consultancy, accounting, and financial advisory services from Kigali, serving clients globally through specialist partnerships.",
  "url": "{{ url('/') }}",
  "logo": "{{ asset('images/logo.png') }}",
  "image": "{{ asset('images/og-image.jpg') }}",
  "telephone": "+250-XXX-XXXXXX",
  "email": "info@professionalbusinessconsultancy.com",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Kigali Business District",
    "addressLocality": "Kigali",
    "addressRegion": "Kigali Province",
    "postalCode": "00000",
    "addressCountry": "RW"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": -1.9441,
    "longitude": 30.0619
  },
  "areaServed": [
    {
      "@type": "Country",
      "name": "Rwanda"
    },
    {
      "@type": "Country", 
      "name": "Canada"
    },
    {
      "@type": "Country",
      "name": "United States"
    },
    {
      "@type": "Country",
      "name": "Cameroon"
    }
  ],
  "serviceType": [
    "Business Consultancy",
    "Accounting Services", 
    "Tax Advisory",
    "Financial Planning",
    "Business Registration",
    "Audit & Compliance",
    "Corporate Training",
    "Career Development"
  ],
  "priceRange": "$$",
  "openingHours": "Mo-Fr 08:00-17:00",
  "sameAs": [
    "https://linkedin.com/company/professional-business-consultancy",
    "https://twitter.com/pbc_rwanda"
  ],
  "founder": {
    "@type": "Person",
    "name": "Professional Business Consultancy Team"
  },
  "foundingDate": "2020",
  "numberOfEmployees": "5-10",
  "slogan": "Transform your business with strategic insights and expert guidance"
}
</script>
@endif

@if($type === 'breadcrumb')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    @foreach($data as $index => $item)
    {
      "@type": "ListItem",
      "position": {{ $index + 1 }},
      "name": "{{ $item['name'] }}",
      "item": "{{ $item['url'] }}"
    }@if(!$loop->last),@endif
    @endforeach
  ]
}
</script>
@endif

@if($type === 'service')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "Service",
  "name": "{{ $data['name'] ?? '' }}",
  "description": "{{ $data['description'] ?? '' }}",
  "provider": {
    "@type": "ProfessionalService",
    "name": "Professional Business Consultancy",
    "url": "{{ url('/') }}"
  },
  "areaServed": [
    {
      "@type": "Country",
      "name": "Rwanda"
    },
    {
      "@type": "Country", 
      "name": "Canada"
    },
    {
      "@type": "Country",
      "name": "United States"
    },
    {
      "@type": "Country",
      "name": "Cameroon"
    }
  ],
  "serviceType": "{{ $data['serviceType'] ?? 'Business Consultancy' }}",
  "category": "{{ $data['category'] ?? 'Professional Services' }}",
  @if(isset($data['offers']))
  "offers": {
    "@type": "Offer",
    "description": "{{ $data['offers']['description'] ?? '' }}",
    "priceRange": "{{ $data['offers']['priceRange'] ?? '$$' }}"
  },
  @endif
  "url": "{{ $data['url'] ?? url()->current() }}"
}
</script>
@endif

@if($type === 'webpage')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "WebPage",
  "name": "{{ $data['title'] ?? '' }}",
  "description": "{{ $data['description'] ?? '' }}",
  "url": "{{ url()->current() }}",
  "inLanguage": "{{ app()->getLocale() }}",
  "isPartOf": {
    "@type": "WebSite",
    "name": "Professional Business Consultancy",
    "url": "{{ url('/') }}"
  },
  "about": {
    "@type": "ProfessionalService",
    "name": "Professional Business Consultancy"
  },
  "mainEntity": {
    "@type": "ProfessionalService",
    "name": "Professional Business Consultancy"
  }
}
</script>
@endif
