<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Chat Message</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }
        .content {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 0 0 10px 10px;
            border: 1px solid #e9ecef;
        }
        .message-box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #667eea;
            margin: 20px 0;
        }
        .user-info {
            background: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .label {
            font-weight: bold;
            color: #495057;
            margin-bottom: 5px;
        }
        .value {
            color: #6c757d;
            margin-bottom: 15px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
            color: #6c757d;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>💬 New Chat Message from Website</h2>
    </div>

    <div class="content">
        <div class="user-info">
            <div class="label">👤 From:</div>
            <div class="value">{!! e($userName) !!} ({!! e($userEmail) !!})</div>

            <div class="label">🕒 Time:</div>
            <div class="value">{!! e($timestamp) !!}</div>

            <div class="label">🌐 Page:</div>
            <div class="value">{!! e($page) !!}</div>
        </div>

        <div class="message-box">
            <div class="label">💬 Message:</div>
            <p style="margin: 10px 0; line-height: 1.6; color: #212529;">{!! e($message) !!}</p>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <a href="mailto:{!! e($userEmail) !!}"
               style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                      color: white;
                      padding: 12px 24px;
                      text-decoration: none;
                      border-radius: 25px;
                      display: inline-block;
                      font-weight: bold;">
                📧 Reply to {!! e($userName) !!}
            </a>
        </div>
    </div>

    <div class="footer">
        <p>This message was sent from the German Practice website chat widget.</p>
        <p>You can reply directly to this email to respond to the user.</p>
    </div>
</body>
</html>
