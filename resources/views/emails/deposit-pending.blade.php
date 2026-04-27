@extends('vendor.mail.html.layout')

@section('content')
<div style="background-color: #000000; color: #ffffff; font-family: Arial, sans-serif; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #0a0a0a; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <!-- Header -->
        <div style="background-color: #fbbf24; padding: 20px; text-align: center;">
            <img src="{{ asset('mylogo1.png') }}" alt="Bridgefield Capital Group" style="max-width: 150px; height: auto;">
            <h1 style="color: #000000; margin: 10px 0 0 0; font-size: 24px; font-weight: bold;">Deposit Request Received</h1>
        </div>

        <!-- Content -->
        <div style="padding: 30px;">
            <h2 style="color: #fbbf24; margin-bottom: 20px;">Deposit Submission Confirmed</h2>

            <p style="font-size: 16px; line-height: 1.6; margin-bottom: 20px;">
                Hi {{ $user->name }},
            </p>

            <p style="font-size: 16px; line-height: 1.6; margin-bottom: 20px;">
                We have received your deposit request for <strong style="color: #fbbf24;">${{ number_format($deposit->amount, 2) }}</strong>.
            </p>

            <div style="background-color: #1a1a1a; padding: 20px; border-radius: 5px; margin: 20px 0;">
                <h3 style="color: #fbbf24; margin-bottom: 15px;">Deposit Details</h3>
                <p style="margin: 5px 0;"><strong>Amount:</strong> ${{ number_format($deposit->amount, 2) }}</p>
                <p style="margin: 5px 0;"><strong>Network:</strong> {{ strtoupper($deposit->network) }}</p>
                <p style="margin: 5px 0;"><strong>Status:</strong> <span style="color: #fbbf24; font-weight: bold;">Pending Admin Approval</span></p>
            </div>

            <p style="font-size: 16px; line-height: 1.6; margin-bottom: 20px;">
                Our team is currently reviewing your deposit. This process typically takes 24-48 hours. You will receive another email once your deposit is approved and your wallet is updated.
            </p>

            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ url('/dashboard') }}" style="background-color: #fbbf24; color: #000000; padding: 12px 30px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;">View Dashboard</a>
            </div>

            <p style="font-size: 14px; line-height: 1.6; margin-bottom: 20px; color: #cccccc;">
                If you have any questions, please contact our support team.
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