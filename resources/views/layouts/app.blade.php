<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('mylogo1.png') }}">
    <title>{{ config('app.name', 'Bridgefield Capital Group') }}</title>
    @vite('resources/css/app.css')
    <style>
        :root {
            --primary-color: #fbbf24;
            --primary-dark: #d97706;
            --primary-light: #fcd34d;
            --bg-dark: #000000;
            --bg-darker: #0a0a0a;
            --text-light: #ffffff;
        }
        
        body {
            background-color: var(--bg-dark);
            color: var(--text-light);
            font-family: 'Instrument Sans', sans-serif;
        }
        
        .navbar {
            background-color: rgba(0, 0, 0, 0.95) !important;
            border-bottom: 1px solid rgba(251, 191, 36, 0.2);
        }
        
        .navbar-brand {
            color: var(--primary-color) !important;
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        .nav-link {
            color: var(--primary-color) !important;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--primary-light) !important;
        }
        
        .btn-brand {
            background-color: var(--primary-color);
            color: var(--bg-dark);
            border: none;
            font-weight: 600;
        }
        
        .btn-brand:hover {
            background-color: var(--primary-light);
            color: var(--bg-dark);
        }
        
        .btn-outline-brand {
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
        }
        
        .btn-outline-brand:hover {
            background-color: var(--primary-color);
            color: var(--bg-dark);
            border-color: var(--primary-color);
        }
        
        .card {
            background-color: var(--bg-darker);
            border: 1px solid rgba(251, 191, 36, 0.2);
            color: var(--text-light);
        }
        
        .card-header {
            background-color: rgba(251, 191, 36, 0.1);
            border-bottom: 1px solid rgba(251, 191, 36, 0.2);
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .form-control {
            background-color: var(--bg-darker);
            border: 1px solid rgba(251, 191, 36, 0.2);
            color: var(--text-light);
        }
        
        .form-control:focus {
            background-color: var(--bg-darker);
            color: var(--text-light);
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(251, 191, 36, 0.25);
        }
        
        .form-label {
            color: var(--primary-light);
            font-weight: 500;
        }
        
        .invalid-feedback {
            color: #ff6b6b;
        }
        
        h1, h2, h3 {
            color: var(--primary-light);
        }
        
        a {
            color: var(--primary-color);
            text-decoration: none;
        }
        
        a:hover {
            color: var(--primary-light);
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>