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

<body class="bg-gray-100 text-gray-800 font-sans">
    <div class="max-w-xl mx-auto my-10 bg-white shadow-lg rounded-xl overflow-hidden">
        <div class="bg-orange-100 p-6 text-center">
            <h2 class="text-2xl font-bold text-orange-600">Thank you for your order, {{ $user->name }}! 🛍️</h2>
        </div>
        <div class="p-6">
            <p class="text-base mb-2">
                <span class="font-semibold">Order Reference Number:</span>
                <span class="text-gray-700">{{ $referenceNumber }}</span>
            </p>
            <p class="text-base mb-4">
                <span class="font-semibold">Total Payment:</span>
                <span class="text-green-600 font-bold">₱{{ number_format($totalPayment, 2) }}</span>
            </p>

            <h4 class="text-lg font-semibold text-orange-600 mb-2">Ordered Products:</h4>
            <ul class="list-disc list-inside space-y-1 text-sm text-gray-700">
                @foreach($products as $product)
                <li>
                    {{ $product['name'] }} - Quantity: {{ $product['quantity'] }} - ₱{{ number_format($product['price'], 2) }}
                </li>
                @endforeach
            </ul>

            <p class="mt-6 text-base">We’ll let you know once your order is shipped. 🐾</p>
        </div>
        <div class="bg-gray-200 text-center text-xs text-gray-500 p-4">
            © {{ date('Y') }} FurrHUB. All rights reserved.
        </div>
    </div>
</body>

</html>