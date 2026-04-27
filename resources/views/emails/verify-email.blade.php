@extends('vendor.mail.html.layout')

@section('content')
<div style="background-color: #000000; color: #ffffff; font-family: Arial, sans-serif; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #0a0a0a; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <!-- Header -->
        <div style="background-color: #fbbf24; padding: 20px; text-align: center;">
            <img src="{{ asset('mylogo1.png') }}" alt="Bridgefield Capital Group" style="max-width: 150px; height: auto;">
            <h1 style="color: #000000; margin: 10px 0 0 0; font-size: 24px; font-weight: bold;">Welcome to Bridgefield Capital Group</h1>
        </div>

        <!-- Content -->
        <div style="padding: 30px;">
            <h2 style="color: #fbbf24; margin-bottom: 20px;">Verify Your Email Address</h2>

            <p style="font-size: 16px; line-height: 1.6; margin-bottom: 20px;">
                Hi {{ $user->name }},
            </p>

            <p style="font-size: 16px; line-height: 1.6; margin-bottom: 20px;">
                Thank you for registering with Bridgefield Capital Group. To complete your registration and start investing, please verify your email address.
            </p>

            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ $verificationUrl }}" style="background-color: #fbbf24; color: #000000; padding: 12px 30px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;">Verify Email Address</a>
            </div>

            <p style="font-size: 14px; line-height: 1.6; margin-bottom: 20px; color: #cccccc;">
                If you did not create an account, no further action is required. This verification link will expire in 24 hours.
            </p>

            <p style="font-size: 14px; line-height: 1.6; margin-bottom: 20px; color: #cccccc;">
                If the button doesn't work, copy and paste this link into your browser:
                <br>
                <a href="{{ $verificationUrl }}" style="color: #fbbf24;">{{ $verificationUrl }}</a>
            </p>
        </div>

        <!-- Footer -->
        <div style="background-color: #000000; padding: 20px; text-align: center; border-top: 1px solid #333;">
            <p style="font-size: 12px; color: #cccccc; margin: 0;">
                © 2026 Bridgefield Capital Group. All rights reserved.
            </p>
        </div>
    </div>
</div>
@endsection