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


<header class="flex bg-white  flex-row justify-start items-center w-full md:px-10 px-5 py-1">
    <div class="flex flex-row items-center justify-start w-full">
        <div class="">
            <a href="{{ route('dashboard') }}" class="border-none focus:outline-none focus:ring-0 focus:border-transparent">

                <img src="{{ asset('logo/logo1.png') }}" alt="furrhub-logo" class="h-[60px] w-[150px] lg:h-[120px] lg:w-[300px] " />
            </a>
        </div>
        <div class="flex flex-row items-center justify-between w-full">
            <div class="flex flex-row  items-center justify-evenly ml-1 md:ml-5">
                <div class="bg-black md:w-[2px] md:h-[3rem] w-[1px] h-[2rem]"></div>
                <div class="md:ml-6 ml-3 text-sm md:text-3xl font-medium">Terms & Condition</div>
            </div>
            <div>
                <a href="{{ route('dashboard') }}" class="hover:cursor-pointer focus:outline-none">
                    <img src="{{asset ('logo/x.svg')}}" alt="cancel" class="h-5 w-5 md:h-10 md:w-10 hover:cursor-pointer" />
                </a>
            </div>
        </div>
    </div>
</header>

<body class="bg-sky-100">
    <div class="flex flex-col md:flex-row justify-center items-center md:mt-10 mt-4">
        <!-- Terms and Conditions Section -->
        <div class="w-full md:w-2/3  bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Terms Header Section -->
            <div class="flex items-center justify-center mb-6 p-8 bg-orange-500 rounded-t-xl text-white">
                <i data-lucide="paw-print" class="text-white w-16 h-16 mb-4"></i>
                <h2 class="text-3xl md:text-4xl font-semibold text-center">FurrHUB Terms & Conditions</h2>
            </div>

            <!-- Terms Content Section -->
            <div class="space-y-6 p-12 text-gray-700 ">
                <h3 class="text-2xl font-semibold text-orange-500">1. Introduction</h3>
                <p class="text-lg">
                    Welcome to FurrHUB. These Terms and Conditions outline the rules and regulations for the use of FurrHUB's website and services. By accessing and using this website, you agree to comply with these terms. Please read them carefully before proceeding with any purchases, appointments, or interactions on the platform.
                </p>

                <h3 class="text-2xl font-semibold text-orange-500">2. Services and Products</h3>
                <p class="text-lg">
                    FurrHUB offers a variety of products and services, including pet supplies and professional pet care services such as grooming and veterinary appointments. All products and services provided are subject to availability and can be modified or discontinued at any time without prior notice.
                </p>

                <h3 class="text-2xl font-semibold text-orange-500">3. User Responsibilities</h3>
                <p class="text-lg">
                    By using this website, you agree to:
                <ul class="list-disc ml-8">
                    <li class="mb-2">Provide accurate and up-to-date information during registration and transactions.</li>
                    <li class="mb-2">Not engage in any activity that would disrupt or harm the services or security of the website.</li>
                    <li class="mb-2">Respect the rights and privacy of other users on the platform.</li>
                </ul>
                </p>

                <h3 class="text-2xl font-semibold text-orange-500">4. Payment and Pricing</h3>
                <p class="text-lg">
                    All payments for products and services are due at the time of purchase. Pricing is subject to change at the sole discretion of FurrHUB. In case of discrepancies in pricing, we reserve the right to correct errors and adjust charges accordingly.
                </p>

                <h3 class="text-2xl font-semibold text-orange-500">5. Order Refund Policy</h3>
                <p class="text-lg">
                    Our order refund policy is currently in development. Please contact our customer support team if you encounter any issues with your order, and we will assist you in resolving them as quickly as possible.
                </p>

                <h3 class="text-2xl font-semibold text-orange-500">6. Appointment Cancellations</h3>
                <p class="text-lg">
                    You can cancel appointments at least 24 hours in advance by logging into your account. Late cancellations may incur a fee depending on the type of service.
                </p>

                <h3 class="text-2xl font-semibold text-orange-500">7. Limitation of Liability</h3>
                <p class="text-lg">
                    FurrHUB shall not be held liable for any indirect, incidental, or consequential damages arising from the use of our products and services. Our total liability shall not exceed the total amount paid for the product or service in question.
                </p>

                <h3 class="text-2xl font-semibold text-orange-500">8. Privacy Policy</h3>
                <p class="text-lg">
                    Your privacy is important to us. Please refer to our Privacy Policy to understand how we collect, use, and protect your personal information.
                </p>

                <h3 class="text-2xl font-semibold text-orange-500">9. Changes to Terms</h3>
                <p class="text-lg">
                    We reserve the right to modify or update these Terms and Conditions at any time. Any changes will be posted on this page, and your continued use of the website constitutes acceptance of those changes.
                </p>

                <h3 class="text-2xl font-semibold text-orange-500">10. Governing Law</h3>
                <p class="text-lg">
                    These Terms and Conditions shall be governed by and construed in accordance with the laws of the jurisdiction in which FurrHUB operates.
                </p>
            </div>

            <!-- Footer Section -->
            <div class="mt-6 p-6 bg-orange-500 text-center rounded-b-xl text-white gap-2">
                <p class="text-lg">By using this website, you acknowledge that you have read, understood, and agreed to these Terms and Conditions.</p>
                <a href="{{ route('dashboard') }}" class="bg-white text-orange-500 py-2 px-6 rounded-lg font-semibold text-lg hover:bg-orange-400 transition duration-300 ">Shop Now</a>
            </div>

        </div>
    </div>
</body>

</html>