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
        try {
            // Create the contact inquiry
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

            // Send email notifications
            $this->emailService->sendContactInquiryNotifications($inquiry);

            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $inquiry->id,
                    'reference' => $inquiry->reference,
                    'status' => $inquiry->status,
                ],
                'message' => __('common.contact.form.success_message'),
            ], 201);

        } catch (\Exception $e) {
            Log::error('Contact form submission failed', [
                'error' => $e->getMessage(),
                'request_data' => $request->except(['_token']),
            ]);

            return response()->json([
                'success' => false,
                'message' => __('common.contact.form.error_message'),
            ], 500);
        }
    }


}
