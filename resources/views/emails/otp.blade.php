<!DOCTYPE html>
<html>
<head>
    <title>Your OTP Code</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.4;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 15px;
        }
        .container {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 15px;
        }
        .otp-code {
            text-align: center;
            font-size: 36px;
            letter-spacing: 3px;
            background-color: #f0f7ff;
            color: #0066cc;
            padding: 10px;
            border-radius: 6px;
            margin: 10px 0;
            border: 1px dashed #0066cc;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-top: 5px;
        }
        .footer p {
            margin: 2px 0;
        }
        .logo {
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 style="margin: 0 0 10px 0;">Hello! This Will expire in <strong>5 Minutes</strong></h2>
            <p style="margin: 5px 0;">Your verification code is below:</p>
        </div>
        
        <div class="otp-code">{{ $otp }}</div>

    </div>
</body>
</html>