<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verify Your Email</title>
</head>
<body style="margin:0;padding:0;background:#0b0f17;color:#f8fafc;font-family:Arial, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="background:#0b0f17;padding:24px;">
        <tr>
            <td align="center">
                <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="max-width:600px;background:#090b10;border-radius:24px;overflow:hidden;border:1px solid #1f2937;">
                    <tr>
                        <td style="background:#fbbf24;padding:32px;text-align:center;">
                            <img src="{{ asset('mylogo1.png') }}" alt="Bridgefield Capital Group" style="max-width:120px;height:auto;margin:0 auto;display:block;">
                            <h1 style="margin:20px 0 0;color:#111827;font-size:28px;">Verify Your Email</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:32px;color:#e5e7eb;">
                            <p style="font-size:16px;line-height:1.75;margin:0 0 20px;">Hi {{ $user->name }},</p>
                            <p style="font-size:16px;line-height:1.75;margin:0 0 20px;">
                                Thank you for registering with Bridgefield Capital Group. To complete your registration and start investing, please verify your email address by clicking the button below.
                            </p>
                            <div style="text-align:center;margin:32px 0;">
                                <a href="{{ $verificationUrl }}" style="background:#fbbf24;color:#111827;font-weight:700;text-decoration:none;padding:14px 28px;border-radius:999px;display:inline-block;">Verify Email Address</a>
                            </div>
                            <p style="font-size:14px;line-height:1.75;color:#9ca3af;margin:0 0 8px;">If the button doesn't work, copy and paste this link into your browser:</p>
                            <p style="word-break:break-word;font-size:14px;color:#9ca3af;margin:0 0 24px;"><a href="{{ $verificationUrl }}" style="color:#fbbf24;">{{ $verificationUrl }}</a></p>
                            <p style="font-size:14px;line-height:1.75;color:#9ca3af;margin:0;">If you did not request this email, you can safely ignore it.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background:#0f172a;padding:20px;text-align:center;color:#94a3b8;font-size:12px;">
                            © {{ date('Y') }} Bridgefield Capital Group. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
