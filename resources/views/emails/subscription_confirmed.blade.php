<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Subscription Confirmed</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6;">
    <h2 style="color: #2d89ef;">Thank You for Subscribing!</h2>

    <p>Hello,</p>
    <p>We’re excited to have you on board! You’ve successfully subscribed to our newsletter.</p>

    <p>Stay tuned for updates, announcements, and exclusive content delivered straight to your inbox.</p>

    <p>If you ever wish to unsubscribe, click
        <a href="{{ route('unsubscribe', ['email' => $email]) }}">here</a>.
    </p>

    <p>Warm regards,<br>
    <strong>LGWT</strong></p>
</body>
</html>
