<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceInquiryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $baseRules = [
            'service_type' => 'required|string|in:business_consultancy,accounting,tax_advisory,financial_planning,business_registration,audit_compliance,training,career_development,feasibility_studies,data_analytics,market_research',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:5000',
            'locale' => 'nullable|string|in:en,fr',
        ];

        // Add service-specific validation rules
        $serviceRules = $this->getServiceSpecificRules();

        return array_merge($baseRules, $serviceRules);
    }

    /**
     * Get service-specific validation rules
     */
    protected function getServiceSpecificRules(): array
    {
        $serviceType = $this->input('service_type');

        return match($serviceType) {
            'business_consultancy' => [
                'business_stage' => 'nullable|string|in:idea,startup,growth,established',
                'industry' => 'nullable|string|in:agriculture,mining,manufacturing,utilities,construction,wholesale,transportation,information,finance,real_estate,professional_services,administration,education,healthcare,other',
            ],
            'accounting' => [
                'accounting_service' => 'nullable|string|in:bookkeeping,financial_statements,tax_compliance,payroll,full_service,other',
                'company_size' => 'nullable|string|in:small,medium,large',
            ],
            'tax_advisory' => [
                'tax_issue' => 'nullable|string|in:tax_planning,compliance_issue,other',
                'entity_type' => 'nullable|string|in:individual,small_business,corporation,partnership,ngo',
            ],
            'audit_compliance' => [
                'audit_type' => 'nullable|string|in:financial_audit,compliance_audit,internal_audit,risk_assessment,due_diligence,other',
                'company_size' => 'nullable|string|in:small,medium,large',
            ],
            'training' => [
                'team_size' => 'nullable|string|in:1-10,11-25,26-50,51-100,100+',
                'training_area' => 'nullable|string|in:leadership,communication,technical,teamwork,customer_service,other',
            ],
            'career_development' => [
                'career_stage' => 'nullable|string|in:entry,mid,senior,executive',
                'focus_area' => 'nullable|string|in:career_coaching,resume_optimization,interview_prep,skill_development,other',
            ],
            'financial_planning' => [
                'age' => 'nullable|string|in:18-25,26-35,36-45,46-55,56-65,65+',
                'financial_goals' => 'nullable|string|in:retirement,wealth_building,education,home_purchase,business_investment,other',
            ],
            'feasibility_studies' => [
                'business_concept' => 'nullable|string|max:1000',
                'target_location' => 'nullable|string|in:gisenyi,kigali,rwanda_other,bamenda,douala,yaounde,cameroon_other',
                'investment_range' => 'nullable|string|in:under_50k,50k_200k,200k_500k,500k_1m,over_1m',
            ],
            'data_analytics' => [
                'data_source' => 'nullable|array',
                'data_source.*' => 'string|in:excel_files,databases,web_data,surveys,multiple_sources,other',
                'analytics_goal' => 'nullable|array',
                'analytics_goal.*' => 'string|in:performance_tracking,predictive_analytics,customer_insights,operational_efficiency,strategic_planning,other',
                'preferred_tool' => 'nullable|array',
                'preferred_tool.*' => 'string|in:excel,powerbi,tableau,python,sql,other,no_preference',
            ],
            'market_research' => [
                'research_type' => 'nullable|array',
                'research_type.*' => 'string|in:market_entry,competitor_analysis,customer_research,industry_analysis,opportunity_assessment,other',
                'target_market' => 'nullable|array',
                'target_market.*' => 'string|in:rwanda,cameroon,east_africa,central_africa,multiple_markets,other',
            ],
            default => [],
        };
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'service_type.required' => 'Service type is required.',
            'service_type.in' => 'Please select a valid service type.',
            'name.required' => 'Name is required.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'message.max' => 'Message cannot exceed 5000 characters.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'locale' => $this->locale ?? app()->getLocale(),
            'ip_address' => $this->ip(),
            'user_agent' => $this->userAgent(),
        ]);
    }
}
