<!DOCTYPE html>
<html lang="{{ $inquiry->locale }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you for your service inquiry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #3B82F6, #1E40AF);
            color: white;
            padding: 30px 20px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }
        .content {
            background: #f8f9fa;
            padding: 30px 20px;
            border: 1px solid #e9ecef;
        }
        .footer {
            background: #6c757d;
            color: white;
            padding: 20px;
            border-radius: 0 0 8px 8px;
            font-size: 14px;
        }
        .highlight {
            background: #e7f3ff;
            padding: 15px;
            border-radius: 6px;
            border-left: 4px solid #3B82F6;
            margin: 20px 0;
        }
        .service-info {
            background: white;
            padding: 15px;
            border-radius: 6px;
            border: 1px solid #dee2e6;
            margin: 20px 0;
        }
        .contact-info {
            background: white;
            padding: 15px;
            border-radius: 6px;
            border: 1px solid #dee2e6;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Thank You for Your Service Inquiry!</h1>
        <p>{{ $inquiry->service_display_name }}</p>
    </div>

    <div class="content">
        <p>Dear {{ $inquiry->name }},</p>

        <p>Thank you for your interest in our <strong>{{ $inquiry->service_display_name }}</strong> services. We have successfully received your detailed inquiry and our specialist team is reviewing your requirements.</p>

        <div class="highlight">
            <strong>Inquiry Reference:</strong> {{ $inquiry->reference }}<br>
            <strong>Service:</strong> {{ $inquiry->service_display_name }}<br>
            <strong>Submitted:</strong> {{ $inquiry->created_at->format('F j, Y \a\t g:i A') }}
        </div>

        @if($inquiry->form_data && count($inquiry->form_data) > 0)
        <div class="service-info">
            <h3>Your Requirements Summary:</h3>
            @foreach($inquiry->form_data as $key => $value)
                @if($value)
                <p><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ is_array($value) ? implode(', ', $value) : $value }}</p>
                @endif
            @endforeach
        </div>
        @endif

        <p><strong>What happens next?</strong></p>
        <ul>
            <li>Our {{ $inquiry->service_display_name }} specialist will review your requirements within 24 hours</li>
            <li>We'll prepare a customized proposal based on your specific needs</li>
            <li>A senior consultant will contact you to discuss the project scope and timeline</li>
            <li>We'll provide transparent pricing and next steps for your project</li>
        </ul>

        <p>Our team has extensive experience in {{ strtolower($inquiry->service_display_name) }} and we're excited to help you achieve your business objectives.</p>

        <div class="contact-info">
            <h3>Contact Information</h3>
            <p>
                <strong>Office:</strong> KG 123 St, Gasabo District, Kigali, Rwanda<br>
                <strong>Phone:</strong> +250 XXX XXX XXX<br>
                <strong>Email:</strong> hello@consultancy.rw<br>
                <strong>Hours:</strong> Monday - Friday, 8:00 AM - 6:00 PM CAT
            </p>
        </div>

        <p>If you have any additional questions or need to provide more information about your project, please feel free to contact us directly.</p>

        <p>Best regards,<br>
        <strong>{{ $inquiry->service_display_name }} Team</strong><br>
        Professional Consultancy Rwanda</p>
    </div>

    <div class="footer">
        <p><strong>Professional Business Consultancy</strong></p>
        <p>Specialized {{ $inquiry->service_display_name }} solutions tailored to your business needs</p>
        <p>This is an automated confirmation email. Please do not reply to this message.</p>
    </div>
</body>
</html>
