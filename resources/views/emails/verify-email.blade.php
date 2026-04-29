<img src="{{ asset('mylogo1.png') }}" alt="Bridgefield Capital Group" style="max-width: 150px; display: block; margin: 0 auto;">

# Welcome to Bridgefield Capital Group

## Verify Your Email Address

Hi {{ $user->name }},

Thank you for registering with Bridgefield Capital Group. To complete your registration and start investing, please verify your email address by clicking the button below.

<div style="text-align: center; margin: 30px 0;">
<a href="{{ $verificationUrl }}" style="background-color: #fbbf24; color: #000000; padding: 12px 30px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;">Verify Email Address</a>
</div>

If you did not create an account, no further action is required. This verification link will expire in 60 minutes.

If the button doesn't work, copy and paste this link into your browser:  
[{{ $verificationUrl }}]({{ $verificationUrl }})

Thanks,  
Bridgefield Capital Group