@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header text-center">
                    <div class="mb-3">
                        <img src="{{ asset('mylogo1.png') }}" alt="Bridgefield Capital Group" class="w-16 h-16 rounded mx-auto">
                    </div>
                    <h2 class="mb-0">Email Verification</h2>
                </div>

                <div class="card-body p-5">
                    <div class="mb-4 text-center">
                        <svg class="mx-auto h-12 w-12 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <h3 class="mt-3 text-lg font-medium">Verify Your Email Address</h3>
                        <p class="mt-2 text-sm text-gray-300">
                            Before proceeding, please check your email for a verification link.
                        </p>
                        <p class="mt-2 text-sm text-gray-300">
                            If you did not receive the email, we will gladly send you another.
                        </p>
                    </div>

                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            A fresh verification link has been sent to your email address.
                        </div>
                    @endif

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-brand btn-lg">
                                Resend Verification Email
                            </button>
                        </div>
                    </form>

                    <div class="text-center">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link text-muted">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection