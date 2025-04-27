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

<header class="flex bg-white flex-row justify-start items-center w-full px-5 py-3 md:px-10 md:py-1">
    <div class="flex flex-row items-center justify-start w-full">
        <div class="">
            <a href="{{ route('dashboard') }}" class="border-none focus:outline-none focus:ring-0 focus:border-transparent">
                <img src="{{ asset('logo/logo1.png') }}" alt="furrhub-logo" class="h-[60px] w-[150px] lg:h-[120px] lg:w-[300px]" />
            </a>
        </div>
        <div class="flex flex-row items-center justify-between w-full">
            <div class="flex flex-row items-center justify-evenly ml-1 md:ml-5">
                <div class="bg-black md:w-[2px] md:h-[3rem] w-[1px] h-[2rem]"></div>
                <div class="md:ml-6 ml-3 text-sm md:text-3xl font-medium">About Us</div>
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
    <div class="flex flex-col md:flex-row justify-center items-center md:mt-10 mt-4 px-4">
        <!-- About Us Section -->
        <div class="w-full md:w-2/3 bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header Section -->
            <div class=" flex flex-col  items-center justify-center mb-6 p-8 bg-white rounded-t-xl text-orange-500 mb-2">
                <img src="{{ asset('logo/logo1.png') }}" alt="furrhub-logo" class="" />

                <h2 class="text-4xl font-semibold text-center">Welcome to FurrHUB</h2>
            </div>

            <!-- Introduction Section -->
            <div class="p-8 bg-white rounded-xl shadow-lg mt-4">
                <p class="text-lg text-gray-700 mb-4">
                    At FurrHUB, we understand that pets are family, and we're here to make sure that your furry friends get the best products and services. From top-notch pet food and comfy bedding to trendy accessories and professional grooming, we’ve got everything your pet needs to live their best life.
                </p>
                <p class="text-lg text-gray-700">
                    Our mission is to provide the highest quality for your pets with just a few clicks. Explore our wide variety of trusted brands and schedule appointments easily—all designed to keep your pet happy, healthy, and stylish.
                </p>
            </div>

            <!-- Our Promise Section -->
            <div class="p-8 bg-white rounded-xl shadow-lg mt-6">
                <h3 class="text-2xl font-semibold text-orange-500 mb-4">Why Choose Us?</h3>
                <p class="text-lg text-gray-700 mb-4">
                    Our passionate team believes in building lasting relationships with pet parents like you. We’re committed to offering an exceptional experience for both you and your pets, making every part of your pet care journey easier and more enjoyable.
                </p>
            </div>

            <!-- Customer-Focused Section -->
            <div class="p-8 bg-white rounded-xl shadow-lg mt-6">
                <h3 class="text-2xl font-semibold text-orange-500 mb-4">Our Commitment to You</h3>
                <p class="text-lg text-gray-700 mb-4">
                    FurrHUB is more than just a pet store—it’s a community. We aim to make your life easier by offering a user-friendly platform where you can shop, schedule appointments, and get expert advice for all things pet-related.
                </p>
                <p class="text-lg text-gray-700">
                    Thank you for trusting FurrHUB to be a part of your pet's journey. We can’t wait to provide you with the best care and products to ensure your pet's happiness and well-being.
                </p>
            </div>

            <!-- Call to Action Section -->
            <div class="p-8 bg-orange-500 rounded-b-xl text-center text-white">
                <h3 class="text-2xl font-semibold mb-4">Ready to Shop and Care for Your Pet?</h3>
                <p class="text-lg mb-4">Browse our wide selection of products and book an appointment for grooming or vet services—all in one place. Your pet’s best life starts here!</p>
                <a href="{{route('dashboard')}}" class="bg-white text-orange-500 py-2 px-6 rounded-lg font-semibold text-lg hover:bg-orange-400 transition duration-300">Start Shopping</a>
            </div>
        </div>
    </div>
</body>


</html>