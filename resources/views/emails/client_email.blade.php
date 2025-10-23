<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $emailSubject }}</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; text-align: center; }
        .content { padding: 20px; background: #f9f9f9; }
        .footer { text-align: center; padding: 15px; font-size: 12px; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>🇩🇪 Sprachraum</h2>
        </div>
        <div class="content">
            <p>Hello {{ $registration->first_name }},</p>
            <div>{!! nl2br(e($emailMessage)) !!}</div>
        </div>
        <div class="footer">
            <p>Sprachraum Team<br>
            Visit us at: <a href="{{ config('app.url') }}">{{ config('app.url') }}</a></p>
        </div>
    </div>
</body>
</html>
