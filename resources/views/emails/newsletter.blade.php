<!DOCTYPE html>
<html>
<body>
    <p>{{ $content }}</p>

    <hr>
    <p style="font-size: 12px; color: #777;">
        If you wish to unsubscribe, click
        <a href="{{ route('unsubscribe', ['email' => $subscriber->email]) }}">here</a>.
    </p>
</body>
</html>
