<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceInquiryRequest;
use App\Models\ServiceInquiry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ServiceInquiryController extends Controller
{
    /**
     * Submit service inquiry form
     */
    public function submit(ServiceInquiryRequest $request): JsonResponse
    {
        try {
            // Prepare form data (service-specific fields)
            $formData = $this->prepareFormData($request);

            // Create the service inquiry
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

            // Send email notifications
            $this->sendEmailNotifications($inquiry);

            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $inquiry->id,
                    'reference' => $inquiry->reference,
                    'status' => $inquiry->status,
                    'service_type' => $inquiry->service_type,
                ],
                'message' => __('common.services.form.success_message'),
            ], 201);

        } catch (\Exception $e) {
            Log::error('Service inquiry submission failed', [
                'error' => $e->getMessage(),
                'request_data' => $request->except(['_token']),
            ]);

            return response()->json([
                'success' => false,
                'message' => __('common.services.form.error_message'),
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

    /**
     * Send email notifications for service inquiry
     */
    protected function sendEmailNotifications(ServiceInquiry $inquiry): void
    {
        try {
            // Email to admin/team
            $adminEmails = config('mail.admin_emails', ['admin@consultancy.com']);

            foreach ($adminEmails as $adminEmail) {
                Mail::send('emails.service-inquiry-admin', compact('inquiry'), function ($message) use ($adminEmail, $inquiry) {
                    $message->to($adminEmail)
                        ->subject("New Service Inquiry - {$inquiry->reference} ({$inquiry->service_display_name})")
                        ->replyTo($inquiry->email, $inquiry->name);
                });
            }

            // Confirmation email to client
            Mail::send('emails.service-inquiry-confirmation', compact('inquiry'), function ($message) use ($inquiry) {
                $message->to($inquiry->email, $inquiry->name)
                    ->subject(__('common.services.form.confirmation_subject', ['service' => $inquiry->service_display_name]));
            });

        } catch (\Exception $e) {
            Log::error('Failed to send service inquiry emails', [
                'inquiry_id' => $inquiry->id,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
