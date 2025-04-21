<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'FurrHUB') }}</title>
    <link rel="icon" href="{{ asset('logo/logo1.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="icon" href="{{ asset('logo/logo1.png') }}" type="image/png">

    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/welcome-page.css', 'resources/js/carousel.jsx'])
   

</head>

<!-- nav part -->
<x-nav-bar />
<div class="lg:pt-[140px] pt-[110px] lg:mb-10"></div>

<body class="font-sans antialiased bg-gray-50 dark:text-black min-h-screen flex flex-col">
    <div class="flex-grow flex flex-col items-center justify-center text-center px-4">
        <!-- Logo -->
        <img src="{{ asset('logo/logo1.png') }}" alt="FurrHUB Logo" class="w-42 h-42 mb-6 mt-10 ">

        <!-- Success Message -->
        <div class="text-4xl font-semibold text-green-600 mb-4">
            Order Successfully Placed!
        </div>
        <p class="text-gray-700 text-lg mb-8 max-w-xl">
            Thank you for your purchase. You can view your order details or return to your dashboard to continue browsing.
        </p>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="{{ route('orders') }}"
                class="px-6 py-3 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition duration-300 shadow">
                View Order Details
            </a>
            <a href="{{ route('dashboard') }}"
                class="px-6 py-3 bg-orange-100 text-gray-800 rounded-lg hover:bg-orange-200 transition duration-300 shadow">
                Return to Dashboard
            </a>
        </div>
    </div>
</body>
<div class="lg:pt-[100px] pt-[110px] lg:mb-10"></div>


<!-- Footer -->
<x-footer bgColor=" bg-gradient-to-r from-orange-600" />

</html>