# 🧠 Algorithm Log — Technical Issues & Solutions

---

## 📘 About This Document

This document logs technical problems faced during the development of the consultancy web app — what they were, where they occurred, how they were fixed (if fixed), and how similar issues can be prevented.

It helps ensure:
- Easier debugging for future devs
- Documentation of decisions and bugs
- Smoother onboarding for new team members
- Knowledge transfer and learning from mistakes

---

## 🛠️ How to Use This Document

- For each issue, copy the **entry table** template below.
- Fill it clearly and concisely.
- Add code snippets using triple backticks (` ``` `).
- Place new entries at the top of the logs.
- Use tags like `#vite`, `#tailwind`, `#laravel`, `#frontend`, `#auth`, etc.

---

## ✅ Entry Table Template

| Field | Description |
|-------|-------------|
| **Date** | YYYY-MM-DD |
| **Reported By** | GitHub username or dev name |
| **Tags** | Relevant topics (e.g., `#tailwind`, `#vite`, `#css`, `#build`) |
| **Problem Summary** | Short title for the issue |
| **Location** | File(s), directory, or component name where the issue occurred |
| **Impact** | What the issue was affecting (e.g., build failure, broken UI, app crash) |
| **Root Cause** | Explanation of what caused the problem |
| **Sample Code (Before)** | Code that caused the issue |
| **Sample Code (Fix)** | Corrected code that solved it |
| **Fix Explanation** | What was changed and why it worked |
| **Status** | ✅ Fixed / ❌ Unresolved / ⚠️ Workaround |
| **Prevention** | How to avoid the issue in the future |

---

## 📄 Technical Issues Log

### 🔧 Issue #001: Vite Manifest Not Found

| Field | Details |
|-------|---------|
| **Date** | 2025-08-17 |
| **Reported By** | @developer |
| **Tags** | #vite #laravel #build #assets |
| **Problem Summary** | Vite manifest not found error preventing application from loading |
| **Location** | `public/build/manifest.json`, Laravel Vite integration |
| **Impact** | Complete application failure - white screen, unable to load any pages |
| **Root Cause** | Vite build process not completed, missing manifest.json file required by Laravel's Vite integration |
| **Sample Code (Before)** |  
```php
// In app.blade.php
@vite(['resources/css/app.css', 'resources/js/app.js'])
// Error: Vite manifest not found at: public/build/manifest.json
``` |
| **Sample Code (Fix)** |
```bash
# Run Vite build process
npm install
npm run build

# Or for development
npm run dev
``` |
| **Fix Explanation** | Laravel's Vite integration requires a manifest.json file that maps source files to built assets. Running `npm run build` generates this file along with the compiled assets. |
| **Status** | ✅ Fixed |
| **Prevention** | Always run `npm run build` before deploying. Add build step to CI/CD pipeline. Include manifest.json check in deployment scripts. |

---

### 🔧 Issue #002: Multi-language Route Conflicts

| Field | Details |
|-------|---------|
| **Date** | 2025-08-17 |
| **Reported By** | @developer |
| **Tags** | #laravel #routing #localization #middleware |
| **Problem Summary** | Language middleware causing route conflicts and infinite redirects |
| **Location** | `app/Http/Middleware/SetLocale.php`, `routes/web.php` |
| **Impact** | Users unable to access pages, infinite redirect loops, poor user experience |
| **Root Cause** | Middleware logic not properly handling locale detection and URL structure conflicts |
| **Sample Code (Before)** |  
```php
// Problematic middleware logic
if (!in_array($locale, $supportedLocales)) {
    return redirect('/en'); // Causes infinite redirects
}
``` |
| **Sample Code (Fix)** |
```php
// Fixed middleware logic
$locale = $request->segment(1);
if (!in_array($locale, $supportedLocales)) {
    $locale = Session::get('locale', 'en');
} else {
    Session::put('locale', $locale);
}
App::setLocale($locale);
``` |
| **Fix Explanation** | Separated locale detection from URL redirection. Used session storage for locale persistence and proper URL segment parsing. |
| **Status** | ✅ Fixed |
| **Prevention** | Test all locale routes thoroughly. Implement proper fallback logic. Use session storage for locale persistence. |

---

### 🔧 Issue #003: Tailwind CSS Custom Classes Not Working

| Field | Details |
|-------|---------|
| **Date** | 2025-08-17 |
| **Reported By** | @developer |
| **Tags** | #tailwind #css #build #components |
| **Problem Summary** | Custom Tailwind classes not applying, build process not recognizing custom utilities |
| **Location** | `resources/css/app.css`, Tailwind configuration |
| **Impact** | Inconsistent styling, custom design system not working, poor visual consistency |
| **Root Cause** | Tailwind v4 configuration differences and improper @apply usage with undefined classes |
| **Sample Code (Before)** |  
```css
.focus-ring {
  @apply focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2;
}

.btn-primary {
  @apply bg-primary-600 text-white focus-ring; /* focus-ring not defined */
}
``` |
| **Sample Code (Fix)** |
```css
.btn-primary {
  @apply bg-primary-600 hover:bg-primary-700 text-white font-medium py-3 px-6 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2;
}
``` |
| **Fix Explanation** | Removed undefined custom classes and inlined all styles directly. Tailwind v4 requires all classes in @apply to be valid Tailwind utilities. |
| **Status** | ✅ Fixed |
| **Prevention** | Only use valid Tailwind utilities in @apply. Define custom classes using @layer components if needed. Test build process after CSS changes. |

---

### 🔧 Issue #004: Business Model Inconsistencies in Documentation

| Field | Details |
|-------|---------|
| **Date** | 2025-08-17 |
| **Reported By** | @project-manager |
| **Tags** | #documentation #business-rules #content #consistency |
| **Problem Summary** | Documentation contains conflicting information about business model and office locations |
| **Location** | Multiple planning documents, language files, content strategy |
| **Impact** | Developer confusion, inconsistent implementation, incorrect content on website |
| **Root Cause** | Documentation created with multiple office assumption, not updated to reflect single Rwanda office model |
| **Sample Code (Before)** |  
```php
// In language files
'locations' => [
    'rwanda' => 'Kigali, Rwanda',
    'canada' => 'Toronto, Canada',
    'usa' => 'New York, USA',
    'cameroon' => 'Douala, Cameroon',
],
``` |
| **Sample Code (Fix)** |
```php
// Corrected to single office model
'location' => [
    'address' => 'KG 123 St, Gasabo District',
    'city' => 'Kigali, Rwanda',
    'phone' => '+250 XXX XXX XXX',
    'email' => 'hello@consultancy.rw',
],
``` |
| **Fix Explanation** | Updated all documentation to reflect single Rwanda office with global service delivery through partnerships. Removed references to multiple physical offices. |
| **Status** | ✅ Fixed |
| **Prevention** | Maintain single source of truth for business model. Regular documentation reviews. Cross-reference all planning documents for consistency. |

---

### 🔧 Issue #005: Incomplete Agile Planning Documentation

| Field | Details |
|-------|---------|
| **Date** | 2025-08-17 |
| **Reported By** | @project-manager |
| **Tags** | #agile #planning #project-management #sprints |
| **Problem Summary** | Agile plan only covers 4 sprints instead of planned 18-week timeline |
| **Location** | `planning/agile-plan.md` |
| **Impact** | Incomplete project planning, unclear deliverables for later phases, team confusion about timeline |
| **Root Cause** | Initial planning focused only on foundation phase, missing detailed breakdown for remaining 14 weeks |
| **Sample Code (Before)** |  
```markdown
# Only 4 sprints documented
Sprint 1-4: Foundation and basic features
Missing: Sprints 5-18 for complete platform
``` |
| **Sample Code (Fix)** |
```markdown
# Complete 18-week breakdown
Phase 1: Foundation (Sprints 1-4)
Phase 2: Core Features (Sprints 5-8) 
Phase 3: Advanced Features (Sprints 9-12)
Phase 4: Optimization & Launch (Sprints 13-18)
``` |
| **Fix Explanation** | Extended agile plan to cover full 18-week timeline with detailed sprint breakdowns, deliverables, and story points for each phase. |
| **Status** | 🔄 In Progress |
| **Prevention** | Complete project planning before development starts. Regular sprint planning sessions. Maintain detailed backlog for entire project timeline. |

---

### 🔧 Issue #006: Schema.org Context Line Causing Parse Error

| Field | Details |
|-------|---------|
| **Date** | 2025-08-17 |
| **Reported By** | @user |
| **Tags** | #blade #schema #json-ld #parsing #syntax |
| **Problem Summary** | Schema.org @context line causing "unexpected end of file, expecting endif" parse error |
| **Location** | `resources/views/pages/services/*.blade.php` - structured data sections |
| **Impact** | Complete page failure - Internal Server Error preventing service pages from loading |
| **Root Cause** | The `"@context": "https://schema.org",` line in JSON-LD structured data is causing Blade template parsing conflicts |
| **Sample Code (Before)** |
```php
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "{{ __('services.accounting.title') }}"
}
</script>
``` |
| **Sample Code (Fix)** |
```php
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "Service",
  "name": "{{ __('services.accounting.title') }}"
}
</script>
``` |
| **Fix Explanation** | The issue was Blade interpreting `@context` as a Blade directive. Fixed by escaping with `@@context` which renders as single `@context` in output. Alternative solutions: use `@json()` helper or `json_encode()` for complex data. The schema.org context line should NOT be removed as it's essential for proper JSON-LD. |
| **Status** | ✅ Fixed |
| **Prevention** | Always escape @ symbols in JSON-LD with @@ in Blade templates. Use @json() helper for complex structured data. Never remove @context from schema.org markup. Test structured data with Google Rich Results Test. |

---

## **💡 Prevention Best Practices**

Below are key best practices compiled from resolved issues to help reduce repeat technical problems across the project.

### **1. Blade & JSON-LD Syntax**
- **Always escape @ symbols** in JSON-LD with `@@` in Blade templates
- **Use `@json()` helper** for complex structured data from controllers
- **Use `json_encode()`** for manual JSON output in Blade
- **Never remove `@context`** from schema.org markup - it's essential for SEO
- **Test structured data** with Google Rich Results Test after changes

### **2. Tailwind Utility Usage**
- **Only use official Tailwind utility classes** inside `@apply`
- **Avoid shorthand or invented class names** unless defined in `@layer`
- **Reference Tailwind docs** before creating custom classes
- **Run `npm run build`** after Tailwind configuration changes

### **3. Build Pipeline Reliability**
- **Ensure correct package versions** (vite, tailwind, etc.) are installed
- **Run `npm run build`** after environment or dependency changes
- **Clear `node_modules`** and run `npm install` for unexplained issues
- **Check Laravel Mix/Vite configuration** for asset compilation problems

### **4. Content Source Validation**
- **Validate source files** (JSON, config, blade) through linters before build
- **Avoid external format syntax** conflicts in Laravel Blade templates
- **Test all dynamic content** with various language settings
- **Use proper escaping** for user-generated content

### **5. Documentation and Logs**
- **Use Algorithm.md** to document both fixed and unresolved issues
- **Include date, author, and exact fix** with copy-pasteable code samples
- **Review past issues** before starting new modules or refactors
- **Update documentation** alongside code changes

### **6. Team Communication**
- **Mention issues** in daily standups or commit messages
- **Push Algorithm.md updates** alongside related code changes
- **Share solutions** with team members facing similar issues
- **Create reusable patterns** from common problem solutions

---

_Add more entries below this point using the table template above._

---

## 📊 Issue Statistics

| Status | Count | Percentage |
|--------|-------|------------|
| ✅ Fixed | 4 | 80% |
| 🔄 In Progress | 1 | 20% |
| ❌ Unresolved | 0 | 0% |
| ⚠️ Workaround | 0 | 0% |

---

## 🎯 Common Issue Categories

1. **Build & Configuration** (40%) - Vite, Tailwind, Laravel setup issues
2. **Documentation Consistency** (40%) - Business model, planning alignment
3. **Routing & Localization** (20%) - Multi-language implementation

---

## 💡 Prevention Best Practices

1. **Always test build process** after configuration changes
2. **Maintain documentation consistency** across all planning files
3. **Use proper Tailwind utilities** and avoid undefined classes
4. **Test multi-language routes** thoroughly
5. **Complete project planning** before development starts

---

*Last Updated: 2025-08-17*  
*Next Review: 2025-08-24*
