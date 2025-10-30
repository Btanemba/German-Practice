<p>New contact request:</p>

<ul>
    <li><strong>First name:</strong> {{ $data['first_name'] }}</li>
    <li><strong>Last name:</strong> {{ $data['last_name'] }}</li>
    <li><strong>Email:</strong> {{ $data['email'] }}</li>
</ul>

<p><strong>Message:</strong></p>
<p>{{ nl2br(e($data['message'])) }}</p>