<?php

namespace App\Services;

use App\Models\ContactInquiry;
use App\Models\ServiceInquiry;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class EmailService
{
    /**
     * Send email notifications for contact inquiry
     */
    public function sendContactInquiryNotifications(ContactInquiry $inquiry): void
    {
        try {
            // Email to admin/team
            $adminEmails = config('mail.admin_emails', ['admin@consultancy.rw']);

            foreach ($adminEmails as $adminEmail) {
                Mail::send('emails.contact-inquiry-admin', compact('inquiry'), function ($message) use ($adminEmail, $inquiry) {
                    $message->to($adminEmail)
                        ->subject("New Contact Inquiry - {$inquiry->reference}")
                        ->replyTo($inquiry->email, $inquiry->name);
                });
            }

            // Confirmation email to customer
            Mail::send('emails.contact-inquiry-confirmation', compact('inquiry'), function ($message) use ($inquiry) {
                $message->to($inquiry->email, $inquiry->name)
                    ->subject(__('common.contact.form.confirmation_subject'));
            });

            Log::info('Contact inquiry email notifications sent successfully', [
                'inquiry_id' => $inquiry->id,
                'reference' => $inquiry->reference,
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to send contact inquiry email notifications', [
                'inquiry_id' => $inquiry->id,
                'reference' => $inquiry->reference,
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    /**
     * Send email notifications for service inquiry
     */
    public function sendServiceInquiryNotifications(ServiceInquiry $inquiry): void
    {
        try {
            // Email to admin/team
            $adminEmails = config('mail.admin_emails', ['admin@consultancy.rw']);

            foreach ($adminEmails as $adminEmail) {
                Mail::send('emails.service-inquiry-admin', compact('inquiry'), function ($message) use ($adminEmail, $inquiry) {
                    $message->to($adminEmail)
                        ->subject("New Service Inquiry - {$inquiry->reference} ({$inquiry->service_display_name})")
                        ->replyTo($inquiry->email, $inquiry->name);
                });
            }

            // Confirmation email to customer
            Mail::send('emails.service-inquiry-confirmation', compact('inquiry'), function ($message) use ($inquiry) {
                $message->to($inquiry->email, $inquiry->name)
                    ->subject(__('common.services.form.confirmation_subject', ['service' => $inquiry->service_display_name]));
            });

            Log::info('Service inquiry email notifications sent successfully', [
                'inquiry_id' => $inquiry->id,
                'reference' => $inquiry->reference,
                'service_type' => $inquiry->service_type,
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to send service inquiry email notifications', [
                'inquiry_id' => $inquiry->id,
                'reference' => $inquiry->reference,
                'service_type' => $inquiry->service_type,
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    /**
     * Get service display name for email templates
     */
    public function getServiceDisplayName(string $serviceType): string
    {
        $serviceNames = [
            'business_consultancy' => 'Business Consultancy',
            'accounting' => 'Accounting Services',
            'tax_advisory' => 'Tax Advisory',
            'financial_planning' => 'Financial Planning',
            'business_registration' => 'Business Registration',
            'audit_compliance' => 'Audit & Compliance',
            'training' => 'Training & Capacity Building',
            'career_development' => 'Career Development',
            'feasibility_studies' => 'Feasibility Studies',
            'data_analytics' => 'Business Intelligence & Data Analytics',
            'market_research' => 'Market Research',
        ];

        return $serviceNames[$serviceType] ?? ucfirst(str_replace('_', ' ', $serviceType));
    }
}
