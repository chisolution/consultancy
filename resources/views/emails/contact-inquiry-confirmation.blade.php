<!DOCTYPE html>
<html lang="{{ $inquiry->locale }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you for contacting us</title>
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
            background: linear-gradient(135deg, #10B981, #059669);
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
        .contact-info {
            background: white;
            padding: 15px;
            border-radius: 6px;
            border: 1px solid #dee2e6;
            margin: 20px 0;
        }
        .btn {
            display: inline-block;
            background: #3B82F6;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Thank You for Contacting Us!</h1>
        <p>We've received your inquiry and will respond soon</p>
    </div>

    <div class="content">
        <p>Dear {{ $inquiry->name }},</p>

        <p>Thank you for reaching out to our professional consultancy team. We have successfully received your inquiry and wanted to confirm the details:</p>

        <div class="highlight">
            <strong>Inquiry Reference:</strong> {{ $inquiry->reference }}<br>
            <strong>Submitted:</strong> {{ $inquiry->created_at->format('F j, Y \a\t g:i A') }}<br>
            @if($inquiry->service)
            <strong>Service Interest:</strong> {{ ucfirst(str_replace('_', ' ', $inquiry->service)) }}<br>
            @endif
        </div>

        <p><strong>What happens next?</strong></p>
        <ul>
            <li>Our team will review your inquiry within 24 hours</li>
            <li>A specialist consultant will contact you to discuss your needs</li>
            <li>We'll provide a customized proposal for your requirements</li>
        </ul>

        <p>In the meantime, feel free to explore our services and learn more about how we can help your business succeed.</p>

        <div class="contact-info">
            <h3>Contact Information</h3>
            <p>
                <strong>Office:</strong> KG 123 St, Gasabo District, Kigali, Rwanda<br>
                <strong>Phone:</strong> +250 XXX XXX XXX<br>
                <strong>Email:</strong> hello@consultancy.rw<br>
                <strong>Hours:</strong> Monday - Friday, 8:00 AM - 6:00 PM CAT
            </p>
        </div>

        <p>If you have any urgent questions or need immediate assistance, please don't hesitate to call us directly.</p>

        <p>Best regards,<br>
        <strong>Professional Consultancy Team</strong><br>
        Rwanda</p>
    </div>

    <div class="footer">
        <p><strong>Professional Business Consultancy</strong></p>
        <p>Comprehensive business solutions tailored to your needs across multiple markets</p>
        <p>This is an automated confirmation email. Please do not reply to this message.</p>
    </div>
</body>
</html>
