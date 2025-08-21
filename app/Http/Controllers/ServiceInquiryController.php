<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceInquiryRequest;
use App\Models\ServiceInquiry;
use App\Services\EmailService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ServiceInquiryController extends Controller
{
    protected EmailService $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    /**
     * Submit service inquiry form
     */
    public function submit(ServiceInquiryRequest $request): JsonResponse
    {
        $inquiry = null;
        $dbSuccess = false;
        $emailSuccess = false;
        $errors = [];

        // Prepare form data (service-specific fields)
        $formData = $this->prepareFormData($request);

        // Attempt to save to database
        try {
            $inquiry = ServiceInquiry::create([
                'service_type' => $request->service_type,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'company' => $request->company,
                'message' => $request->message,
                'form_data' => $formData,
                'locale' => $request->locale,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            $dbSuccess = true;

            Log::info('Service inquiry saved to database successfully', [
                'inquiry_id' => $inquiry->id,
                'reference' => $inquiry->reference,
                'service_type' => $inquiry->service_type,
            ]);

        } catch (\Exception $e) {
            $errors['database'] = $e->getMessage();

            Log::error('Failed to save service inquiry to database', [
                'error' => $e->getMessage(),
                'service_type' => $request->service_type,
                'request_data' => $request->except(['_token']),
            ]);
        }

        // Attempt to send email notifications (independent of database success)
        try {
            // If database failed, create a temporary inquiry object for email
            if (!$inquiry) {
                $inquiry = new ServiceInquiry([
                    'service_type' => $request->service_type,
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'company' => $request->company,
                    'message' => $request->message,
                    'form_data' => $formData,
                    'locale' => $request->locale,
                ]);
                $inquiry->reference = 'TEMP-SRV-' . time() . '-' . substr(md5($request->email), 0, 8);
            }

            $this->emailService->sendServiceInquiryNotifications($inquiry);
            $emailSuccess = true;

        } catch (\Exception $e) {
            $errors['email'] = $e->getMessage();

            Log::error('Failed to send service inquiry email notifications', [
                'inquiry_id' => $inquiry?->id ?? 'temp',
                'reference' => $inquiry?->reference ?? 'unknown',
                'service_type' => $request->service_type,
                'error' => $e->getMessage(),
            ]);
        }

        // Determine response based on what succeeded
        if ($dbSuccess || $emailSuccess) {
            $responseData = [
                'success' => true,
                'message' => __('common.services.form.success_message'),
                'status' => [
                    'database' => $dbSuccess,
                    'email' => $emailSuccess,
                ]
            ];

            if ($dbSuccess && $inquiry) {
                $responseData['data'] = [
                    'id' => $inquiry->id,
                    'reference' => $inquiry->reference,
                    'status' => $inquiry->status,
                    'service_type' => $inquiry->service_type,
                ];
            }

            if (!empty($errors)) {
                $responseData['partial_errors'] = $errors;
                Log::warning('Service inquiry submission completed with partial errors', [
                    'errors' => $errors,
                    'service_type' => $request->service_type,
                    'db_success' => $dbSuccess,
                    'email_success' => $emailSuccess,
                ]);
            }

            return response()->json($responseData, 201);

        } else {
            // Both database and email failed
            Log::error('Service inquiry submission completely failed', [
                'errors' => $errors,
                'service_type' => $request->service_type,
                'request_data' => $request->except(['_token']),
            ]);

            return response()->json([
                'success' => false,
                'message' => __('common.services.form.error_message'),
                'errors' => $errors,
            ], 500);
        }
    }

    /**
     * Prepare service-specific form data
     */
    protected function prepareFormData(ServiceInquiryRequest $request): array
    {
        $serviceType = $request->service_type;
        $formData = [];

        // Extract service-specific fields based on service type
        switch ($serviceType) {
            case 'business_consultancy':
                $formData = [
                    'business_stage' => $request->business_stage,
                    'industry' => $request->industry,
                ];
                break;

            case 'accounting':
                $formData = [
                    'accounting_service' => $request->accounting_service,
                    'company_size' => $request->company_size,
                ];
                break;

            case 'tax_advisory':
                $formData = [
                    'tax_issue' => $request->tax_issue,
                    'entity_type' => $request->entity_type,
                ];
                break;

            case 'audit_compliance':
                $formData = [
                    'audit_type' => $request->audit_type,
                    'company_size' => $request->company_size,
                ];
                break;

            case 'training':
                $formData = [
                    'team_size' => $request->team_size,
                    'training_focus' => $request->training_focus,
                ];
                break;

            case 'career_development':
                $formData = [
                    'career_stage' => $request->career_stage,
                    'focus_area' => $request->focus_area,
                ];
                break;

            case 'financial_planning':
                $formData = [
                    'age' => $request->age,
                    'financial_goals' => $request->financial_goals,
                ];
                break;

            case 'feasibility_studies':
                $formData = [
                    'business_concept' => $request->business_concept,
                    'target_location' => $request->target_location,
                    'investment_range' => $request->investment_range,
                ];
                break;

            case 'data_analytics':
                $formData = [
                    'data_source' => $request->data_source,
                    'analytics_goal' => $request->analytics_goal,
                    'preferred_tool' => $request->preferred_tool,
                ];
                break;

            case 'market_research':
                $formData = [
                    'research_type' => $request->research_type,
                    'target_market' => $request->target_market,
                ];
                break;
        }

        // Remove null values
        return array_filter($formData, fn($value) => $value !== null);
    }


}
