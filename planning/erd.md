# Entity Relationship Diagram (ERD)
## Professional Accounting Consultancy Platform

### Database Design Overview
This ERD defines the data structure for our comprehensive accounting consultancy platform, supporting multi-tenant operations across Rwanda, Canada, US, and Cameroon markets.

### Core Entities

#### **1. Users & Authentication**

**users**
- id (Primary Key)
- email (Unique)
- password_hash
- first_name
- last_name
- phone
- timezone
- language_preference (en, fr)
- email_verified_at
- two_factor_enabled
- last_login_at
- created_at
- updated_at
- deleted_at

**user_roles**
- id (Primary Key)
- user_id (Foreign Key → users.id)
- role_type (admin, consultant, client, staff)
- permissions (JSON)
- assigned_by (Foreign Key → users.id)
- assigned_at
- expires_at

#### **2. Client Management**

**clients**
- id (Primary Key)
- company_name
- registration_number
- tax_identification_number
- industry_sector
- company_size (startup, sme, enterprise)
- country_code
- address_line_1
- address_line_2
- city
- state_province
- postal_code
- primary_contact_id (Foreign Key → contacts.id)
- account_manager_id (Foreign Key → users.id)
- client_status (prospect, active, inactive, churned)
- acquisition_source
- annual_revenue
- employee_count
- fiscal_year_end
- preferred_currency
- payment_terms
- credit_limit
- notes (Text)
- created_at
- updated_at

**contacts**
- id (Primary Key)
- client_id (Foreign Key → clients.id)
- first_name
- last_name
- title
- email
- phone
- mobile
- is_primary_contact
- department
- decision_maker
- communication_preferences (JSON)
- created_at
- updated_at

#### **3. Service Management**

**services**
- id (Primary Key)
- service_code (Unique)
- service_name
- service_category (accounting, audit, tax, advisory, consulting)
- service_type (recurring, project, hourly)
- description (Text)
- base_price
- currency
- billing_frequency (monthly, quarterly, annually, one-time)
- estimated_hours
- complexity_level (basic, intermediate, advanced)
- required_certifications (JSON)
- available_countries (JSON)
- is_active
- created_at
- updated_at

**service_packages**
- id (Primary Key)
- package_name
- package_description (Text)
- target_market (startup, sme, enterprise)
- total_price
- discount_percentage
- validity_period_months
- is_active
- created_at
- updated_at

**package_services**
- id (Primary Key)
- package_id (Foreign Key → service_packages.id)
- service_id (Foreign Key → services.id)
- quantity
- custom_price
- is_optional

#### **4. Project & Engagement Management**

**projects**
- id (Primary Key)
- project_number (Unique)
- client_id (Foreign Key → clients.id)
- project_name
- project_type (audit, tax_return, business_setup, advisory)
- project_status (planning, in_progress, review, completed, cancelled)
- priority_level (low, medium, high, urgent)
- start_date
- estimated_completion_date
- actual_completion_date
- project_manager_id (Foreign Key → users.id)
- total_budget
- currency
- billing_method (fixed, hourly, milestone)
- description (Text)
- client_requirements (Text)
- deliverables (JSON)
- created_at
- updated_at

**project_team_members**
- id (Primary Key)
- project_id (Foreign Key → projects.id)
- user_id (Foreign Key → users.id)
- role (lead, senior, junior, reviewer)
- hourly_rate
- allocated_hours
- actual_hours
- start_date
- end_date

**project_milestones**
- id (Primary Key)
- project_id (Foreign Key → projects.id)
- milestone_name
- description (Text)
- due_date
- completion_date
- milestone_value
- status (pending, in_progress, completed, overdue)
- deliverables (JSON)
- approval_required
- approved_by (Foreign Key → users.id)
- approved_at

#### **5. Time Tracking & Billing**

**time_entries**
- id (Primary Key)
- user_id (Foreign Key → users.id)
- project_id (Foreign Key → projects.id)
- service_id (Foreign Key → services.id)
- entry_date
- start_time
- end_time
- duration_minutes
- description (Text)
- billable
- hourly_rate
- total_amount
- status (draft, submitted, approved, billed)
- approved_by (Foreign Key → users.id)
- approved_at
- created_at
- updated_at

**invoices**
- id (Primary Key)
- invoice_number (Unique)
- client_id (Foreign Key → clients.id)
- project_id (Foreign Key → projects.id)
- invoice_date
- due_date
- subtotal
- tax_rate
- tax_amount
- discount_amount
- total_amount
- currency
- payment_status (draft, sent, paid, overdue, cancelled)
- payment_method
- payment_date
- payment_reference
- notes (Text)
- created_by (Foreign Key → users.id)
- created_at
- updated_at

**invoice_line_items**
- id (Primary Key)
- invoice_id (Foreign Key → invoices.id)
- service_id (Foreign Key → services.id)
- description
- quantity
- unit_price
- line_total
- tax_rate
- tax_amount

#### **6. Document Management**

**documents**
- id (Primary Key)
- client_id (Foreign Key → clients.id)
- project_id (Foreign Key → projects.id)
- document_name
- document_type (contract, financial_statement, tax_return, report)
- file_path
- file_size
- mime_type
- document_category
- confidentiality_level (public, internal, confidential, restricted)
- version_number
- is_current_version
- uploaded_by (Foreign Key → users.id)
- access_permissions (JSON)
- retention_period_years
- created_at
- updated_at

**document_versions**
- id (Primary Key)
- document_id (Foreign Key → documents.id)
- version_number
- file_path
- change_description (Text)
- uploaded_by (Foreign Key → users.id)
- uploaded_at

#### **7. Communication & CRM**

**communications**
- id (Primary Key)
- client_id (Foreign Key → clients.id)
- project_id (Foreign Key → projects.id)
- communication_type (email, phone, meeting, note)
- subject
- content (Text)
- direction (inbound, outbound)
- communication_date
- follow_up_required
- follow_up_date
- priority_level
- created_by (Foreign Key → users.id)
- created_at

**meetings**
- id (Primary Key)
- client_id (Foreign Key → clients.id)
- project_id (Foreign Key → projects.id)
- meeting_title
- meeting_type (consultation, review, presentation)
- scheduled_date
- duration_minutes
- location
- meeting_link
- agenda (Text)
- minutes (Text)
- action_items (JSON)
- organizer_id (Foreign Key → users.id)
- status (scheduled, completed, cancelled)
- created_at
- updated_at

**meeting_attendees**
- id (Primary Key)
- meeting_id (Foreign Key → meetings.id)
- attendee_type (user, contact)
- attendee_id (user_id or contact_id)
- attendance_status (invited, accepted, declined, attended)
- role (organizer, presenter, participant)

#### **8. Knowledge Management**

**knowledge_base**
- id (Primary Key)
- title
- content (Text)
- category (tax_law, accounting_standards, procedures, templates)
- country_specific
- language
- tags (JSON)
- access_level (public, internal, restricted)
- author_id (Foreign Key → users.id)
- reviewer_id (Foreign Key → users.id)
- review_date
- expiry_date
- view_count
- is_published
- created_at
- updated_at

**templates**
- id (Primary Key)
- template_name
- template_type (contract, report, checklist, form)
- template_category
- file_path
- description (Text)
- applicable_services (JSON)
- country_specific
- language
- version
- is_active
- created_by (Foreign Key → users.id)
- created_at
- updated_at

### Relationships Summary

#### **One-to-Many Relationships**
- clients → contacts (1:N)
- clients → projects (1:N)
- projects → time_entries (1:N)
- projects → milestones (1:N)
- invoices → invoice_line_items (1:N)
- documents → document_versions (1:N)

#### **Many-to-Many Relationships**
- projects ↔ users (through project_team_members)
- service_packages ↔ services (through package_services)
- meetings ↔ users/contacts (through meeting_attendees)

#### **Foreign Key Constraints**
- All foreign keys include ON DELETE CASCADE or SET NULL as appropriate
- Soft deletes implemented for critical entities (users, clients, projects)
- Audit trails maintained for financial transactions

### Indexes & Performance

#### **Primary Indexes**
- All primary keys (clustered indexes)
- Foreign key columns
- Frequently queried columns (email, project_status, invoice_status)

#### **Composite Indexes**
- (client_id, project_status) for project queries
- (user_id, entry_date) for time tracking
- (invoice_date, payment_status) for financial reporting

### Data Security & Compliance

#### **Encryption**
- Sensitive fields encrypted at rest
- PII data encrypted with separate keys
- Financial data with additional encryption layer

#### **Audit Logging**
- All data modifications logged
- User access patterns tracked
- Compliance reporting capabilities

#### **Data Retention**
- Configurable retention policies by entity type
- Automated archival processes
- GDPR/privacy law compliance features

---
*ERD Version: 1.0*
*Database Platform: PostgreSQL 15+*
*ORM: Laravel Eloquent*
*Last Updated: August 2025*