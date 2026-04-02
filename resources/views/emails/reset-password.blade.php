<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: Arial; background:#f9fafb; padding:30px;">

<div style="max-width:600px; margin:auto; background:white; padding:30px; border-radius:12px;">

    <h2 style="color:#f97316;">Password Reset Request</h2>

    <p>Hello {{ $user->name }},</p>

    <p>We received a request to reset your password.</p>

    <div style="text-align:center; margin:30px 0;">
        <a href="{{ $resetUrl }}"
           style="background:#f97316; color:white; padding:12px 25px; border-radius:6px; text-decoration:none;">
            Reset Password
        </a>
    </div>
    <p>This link will expire in 60 minutes.</p>
    <p>If you didn’t request this, you can ignore this email.</p>

    <p style="margin-top:40px; font-size:12px; color:#888;">
        © {{ date('Y') }} {{ config('app.name') }}
    </p>

</div>

</body>
</html>
