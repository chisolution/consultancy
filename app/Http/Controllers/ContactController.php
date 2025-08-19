<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactInquiryRequest;
use App\Models\ContactInquiry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
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
            $this->sendEmailNotifications($inquiry);

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

    /**
     * Send email notifications for contact inquiry
     */
    protected function sendEmailNotifications(ContactInquiry $inquiry): void
    {
        try {
            // Email to admin/team
            $adminEmails = config('mail.admin_emails', ['admin@consultancy.com']);

            foreach ($adminEmails as $adminEmail) {
                Mail::send('emails.contact-inquiry-admin', compact('inquiry'), function ($message) use ($adminEmail, $inquiry) {
                    $message->to($adminEmail)
                        ->subject("New Contact Inquiry - {$inquiry->reference}")
                        ->replyTo($inquiry->email, $inquiry->name);
                });
            }

            // Confirmation email to client
            Mail::send('emails.contact-inquiry-confirmation', compact('inquiry'), function ($message) use ($inquiry) {
                $message->to($inquiry->email, $inquiry->name)
                    ->subject(__('common.contact.form.confirmation_subject'));
            });

        } catch (\Exception $e) {
            Log::error('Failed to send contact inquiry emails', [
                'inquiry_id' => $inquiry->id,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
