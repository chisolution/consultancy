<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Inquiry - {{ $inquiry->reference }}</title>
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
            padding: 20px;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background: #f8f9fa;
            padding: 20px;
            border: 1px solid #e9ecef;
        }
        .footer {
            background: #6c757d;
            color: white;
            padding: 15px;
            border-radius: 0 0 8px 8px;
            font-size: 14px;
        }
        .field {
            margin-bottom: 15px;
        }
        .field-label {
            font-weight: bold;
            color: #495057;
        }
        .field-value {
            margin-top: 5px;
            padding: 8px;
            background: white;
            border-radius: 4px;
            border: 1px solid #dee2e6;
        }
        .priority-high {
            color: #dc3545;
            font-weight: bold;
        }
        .priority-medium {
            color: #fd7e14;
            font-weight: bold;
        }
        .priority-low {
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>New Contact Inquiry</h1>
        <p>Reference: <strong>{{ $inquiry->reference }}</strong></p>
        <p>Received: {{ $inquiry->created_at->format('F j, Y \a\t g:i A') }}</p>
    </div>

    <div class="content">
        <div class="field">
            <div class="field-label">Name:</div>
            <div class="field-value">{{ $inquiry->name }}</div>
        </div>

        <div class="field">
            <div class="field-label">Email:</div>
            <div class="field-value">
                <a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a>
            </div>
        </div>

        @if($inquiry->phone)
        <div class="field">
            <div class="field-label">Phone:</div>
            <div class="field-value">{{ $inquiry->phone }}</div>
        </div>
        @endif

        @if($inquiry->company)
        <div class="field">
            <div class="field-label">Company:</div>
            <div class="field-value">{{ $inquiry->company }}</div>
        </div>
        @endif

        @if($inquiry->service)
        <div class="field">
            <div class="field-label">Service Interest:</div>
            <div class="field-value">{{ ucfirst(str_replace('_', ' ', $inquiry->service)) }}</div>
        </div>
        @endif

        <div class="field">
            <div class="field-label">Message:</div>
            <div class="field-value">{{ nl2br(e($inquiry->message)) }}</div>
        </div>

        <div class="field">
            <div class="field-label">Priority:</div>
            <div class="field-value">
                <span class="priority-{{ $inquiry->priority }}">
                    {{ ucfirst($inquiry->priority) }}
                </span>
            </div>
        </div>

        <div class="field">
            <div class="field-label">Language:</div>
            <div class="field-value">{{ $inquiry->locale === 'fr' ? 'French' : 'English' }}</div>
        </div>

        @if($inquiry->ip_address)
        <div class="field">
            <div class="field-label">IP Address:</div>
            <div class="field-value">{{ $inquiry->ip_address }}</div>
        </div>
        @endif
    </div>

    <div class="footer">
        <p><strong>Action Required:</strong> Please respond to this inquiry within 24 hours.</p>
        <p>You can manage this inquiry in the admin dashboard.</p>
        <p>This email was sent automatically from the consultancy website contact form.</p>
    </div>
</body>
</html>
