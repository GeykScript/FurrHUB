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


<!-- bg-[#60E1FF] blue -->
<!-- F0A02C  orange-->
<!-- 38B6FF -->
<!-- nav part -->
<x-nav-bar />
<div class="pt-[100px]"></div>



<!-- catergory part -->

<body class="font-sans antialiased bg-white-400 dark:text-black/50">
    <div class="bg-white">

        <div class="md:px-[12rem]  px-2 mt-10">
            <div class="flex flex-row items-center justify-start md:px-10 px-2 mt-5 h-20  ">
                <div class="flex flex-row items-center md:gap-2 gap-1 ">
                    <div> <i data-lucide="bell" class="md:w-12 md:h-12 w-6 h-6 text-orange-500 mx-auto"></i></div>
                    <h1 class="md:text-4xl text-md font-bold text-orange-500 ">Notifications</h1>
                </div>
            </div>
        </div>
        <div class="mt-2 w-full">
            <div class="md:px-[15rem] flex gap-5 items-center px-4  text-sm md:text-lg">
                <a href="{{route('dashboard')}}" class="hover:underline hover:text-orange-400">Dashboard</a>
                <div> > </div>
                <a href="{{route('notifications')}}" class="hover:underline text-orange-500">Notifications</a>
            </div>
        </div>


        <div class="flex flex-col items-center justify-center w-full px-4">
            @foreach($notifications as $notification)
            <div class="flex flex-col lg:flex-row items-center lg:items-start gap-6 p-6 md:px-12 mt-6 border pb-6 w-full max-w-5xl mx-auto rounded-lg shadow-md bg-white">
                <!-- Image Section -->
                <div class="flex-shrink-0">
                    <img src="{{ asset('logo/furrhub.png') }}"
                        alt="Notification Image"
                        class="w-40  h-40 rounded-lg object-contain ">
                </div>

                <!-- Notification Details -->
                <div class="flex-1 text-center lg:text-left">
                    <h1 class="font-bold text-xl lg:text-2xl text-gray-800">Order Delivered</h1>
                    <h3 class="mt-2 text-gray-700 text-sm lg:text-base">{{ $notification->order_name }}</h3>
                    <p class="ml-2 text-gray-500 text-sm lg:text-base">{{ $notification->order_address }}</p>
                    <p class="ml-2 text-gray-500 text-sm lg:text-base">Delivered: {{ $notification->delivered_date }}</p>
                    <a href="{{route('orders')}}" class="mt-2 bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg text-sm inline-block">View Details</a>
                </div>
            </div>
            @endforeach
        </div>


    </div>



    <x-return-top />

</body>
<!-- Footer -->
<x-footer bgColor=" bg-gradient-to-r from-orange-600" />

</html>