@extends('vendor.mail.html.layout')

@section('content')
<div style="background-color: #000000; color: #ffffff; font-family: Arial, sans-serif; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #0a0a0a; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <!-- Header -->
        <div style="background-color: #fbbf24; padding: 20px; text-align: center;">
            <img src="{{ asset('mylogo1.png') }}" alt="Bridgefield Capital Group" style="max-width: 150px; height: auto;">
            <h1 style="color: #000000; margin: 10px 0 0 0; font-size: 24px; font-weight: bold;">Deposit Approved!</h1>
        </div>

        <!-- Content -->
        <div style="padding: 30px;">
            <h2 style="color: #fbbf24; margin-bottom: 20px;">Your Deposit Has Been Approved</h2>

            <p style="font-size: 16px; line-height: 1.6; margin-bottom: 20px;">
                Congratulations {{ $user->name }}!
            </p>

            <p style="font-size: 16px; line-height: 1.6; margin-bottom: 20px;">
                Your deposit of <strong style="color: #fbbf24;">${{ number_format($deposit->amount, 2) }}</strong> has been approved and added to your wallet.
            </p>

            <div style="background-color: #1a1a1a; padding: 20px; border-radius: 5px; margin: 20px 0;">
                <h3 style="color: #fbbf24; margin-bottom: 15px;">Deposit Summary</h3>
                <p style="margin: 5px 0;"><strong>Amount Approved:</strong> ${{ number_format($deposit->amount, 2) }}</p>
                <p style="margin: 5px 0;"><strong>Network:</strong> {{ strtoupper($deposit->network) }}</p>
                <p style="margin: 5px 0;"><strong>Status:</strong> <span style="color: #28a745; font-weight: bold;">Approved</span></p>
                <p style="margin: 5px 0;"><strong>Wallet Updated:</strong> Yes</p>
            </div>

            <p style="font-size: 16px; line-height: 1.6; margin-bottom: 20px;">
                Your wallet balance has been updated and you can now use these funds to invest in our premium plans or purchase cryptocurrencies.
            </p>

            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ url('/dashboard') }}" style="background-color: #fbbf24; color: #000000; padding: 12px 30px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;">View Portfolio</a>
            </div>

            <p style="font-size: 14px; line-height: 1.6; margin-bottom: 20px; color: #cccccc;">
                Thank you for choosing Bridgefield Capital Group for your investment needs.
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