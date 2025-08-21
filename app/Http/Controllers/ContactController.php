<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactInquiryRequest;
use App\Models\ContactInquiry;
use App\Services\EmailService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    protected EmailService $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    /**
     * Submit contact form inquiry
     */
    public function submit(ContactInquiryRequest $request): JsonResponse
    {
        $inquiry = null;
        $dbSuccess = false;
        $emailSuccess = false;
        $errors = [];

        // Attempt to save to database
        try {
            $inquiry = ContactInquiry::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'company' => $request->company,
                'service' => $request->service,
                'message' => $request->message,
                'locale' => $request->locale,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            $dbSuccess = true;

            Log::info('Contact inquiry saved to database successfully', [
                'inquiry_id' => $inquiry->id,
                'reference' => $inquiry->reference,
            ]);

        } catch (\Exception $e) {
            $errors['database'] = $e->getMessage();

            Log::error('Failed to save contact inquiry to database', [
                'error' => $e->getMessage(),
                'request_data' => $request->except(['_token']),
            ]);
        }

        // Attempt to send email notifications (independent of database success)
        try {
            // If database failed, create a temporary inquiry object for email
            if (!$inquiry) {
                $inquiry = new ContactInquiry([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'company' => $request->company,
                    'service' => $request->service,
                    'message' => $request->message,
                    'locale' => $request->locale,
                ]);
                $inquiry->reference = 'TEMP-' . time() . '-' . substr(md5($request->email), 0, 8);
            }

            $this->emailService->sendContactInquiryNotifications($inquiry);
            $emailSuccess = true;

        } catch (\Exception $e) {
            $errors['email'] = $e->getMessage();

            Log::error('Failed to send contact inquiry email notifications', [
                'inquiry_id' => $inquiry?->id ?? 'temp',
                'reference' => $inquiry?->reference ?? 'unknown',
                'error' => $e->getMessage(),
            ]);
        }

        // Determine response based on what succeeded
        if ($dbSuccess || $emailSuccess) {
            $responseData = [
                'success' => true,
                'message' => __('common.contact.form.success_message'),
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
                ];
            }

            if (!empty($errors)) {
                $responseData['partial_errors'] = $errors;
                Log::warning('Contact form submission completed with partial errors', [
                    'errors' => $errors,
                    'db_success' => $dbSuccess,
                    'email_success' => $emailSuccess,
                ]);
            }

            return response()->json($responseData, 201);

        } else {
            // Both database and email failed
            Log::error('Contact form submission completely failed', [
                'errors' => $errors,
                'request_data' => $request->except(['_token']),
            ]);

            return response()->json([
                'success' => false,
                'message' => __('common.contact.form.error_message'),
                'errors' => $errors,
            ], 500);
        }
    }


}
