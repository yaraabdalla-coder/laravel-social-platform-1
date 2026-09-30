```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>

<body style="margin:0; padding:0; background:#f4f6f8; font-family:Arial, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center" style="padding:40px 0;">

            <table width="600" cellpadding="0" cellspacing="0" 
                   style="background:white; border-radius:12px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.1);">

                <!-- Header -->
                <tr>
                    <td style="background:#2563eb; padding:30px; text-align:center; color:white;">
                        <h1 style="margin:0; font-size:28px;">
                            Reset Password
                        </h1>
                    </td>
                </tr>

                <!-- Content -->
                <tr>
                    <td style="padding:40px; color:#333;">

                        <h2 style="font-size:22px;">
                            Hello!
                        </h2>

                        <p style="font-size:16px; line-height:1.6;">
                            We received a request to reset your password.
                            Click the button below to create a new password.
                        </p>

                        <div style="text-align:center; margin:35px 0;">
                            <a href="{{ $resetUrl }}"
                               style="
                               background:#2563eb;
                               color:white;
                               padding:15px 30px;
                               text-decoration:none;
                               border-radius:8px;
                               font-size:16px;
                               display:inline-block;
                               ">
                                Reset Password
                            </a>
                        </div>

                        <p style="font-size:14px; color:#666;">
                            If you did not request a password reset, you can safely ignore this email.
                        </p>

                        <p style="font-size:14px; color:#666;">
                            This link will expire soon for security reasons.
                        </p>

                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td style="background:#f1f5f9; padding:20px; text-align:center;">

                        <p style="margin:0; font-size:13px; color:#777;">
                            © {{ date('Y') }} Your Company. All rights reserved.
                        </p>

                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
```
