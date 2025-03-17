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

        <div class="md:px-[3rem]  px-2 mt-10">
            <div class="flex flex-row items-center justify-center md:px-10 px-2 mt-5 h-20  rounded-lg bg-gradient-to-r from-orange-600  to-orange-400    ">
                <div class="flex flex-row items-center md:gap-5 gap-1 ">
                    <div> <i data-lucide="paw-print" class="md:w-10 md:h-10 w-6 h-6 text-white mx-auto"></i></div>
                    <h1 class="md:text-4xl text-md font-bold text-white ">Essentials Category</h1>
                </div>
            </div>
        </div>
        <div class="mt-10 w-full">
            <div class="md:px-20 flex gap-5 items-center px-4  text-sm md:text-lg">
                <a href="{{route('dashboard')}}" class="hover:underline hover:text-orange-400">Dashboard</a>
                <div> > </div>
                <a href="{{route('essentials')}}" class="hover:underline text-orange-500">Essentials Category</a>
            </div>
        </div>
        <div class="md:px-20 md:p-4 rounded-lg mt-5">
            <div class="flex items-center md:justify-start justify-center ">
                <span class="text-orange-600 md:text-lg">Sort by:</span>
                <button class="hover:bg-orange-500 text-gray-800 px-3 py-1 rounded-md">Popular</button>
                <button class="text-gray-600 hover:text-gray-900 px-3 py-1">Latest</button>
                <div class="relative">
                    <select class="p-2 border rounded-md md:w-40 w-20">
                        <option value="">Price</option>
                        <option value="low">₱0 - ₱500</option>
                        <option value="mid">₱500 - ₱1000</option>
                        <option value="high">₱1000+</option>
                    </select>
                </div>
            </div>
        </div>

        <div class=" md:px-[3rem] mt-3 px-[1rem]">


            @php
            $products = [
            [
            'name' => 'Pedigree 18 Pouch Variety Pack',
            'shop' => 'FurrHUB',
            'price' => 350.00,
            'image' => 'images/products/dog.jpg',
            'sold' => 120
            ],
            [
            'name' => 'Royal Canin Adult Cat Food',
            'shop' => 'FurrHUB',
            'price' => 350.00,
            'image' => 'images/products/cat-foods.webp',
            'sold' => 90
            ]
            ];
            @endphp

            <div id="product-container" class="grid grid-cols-2 lg:grid-cols-6 gap-4">
                @for ($i = 0; $i < 12; $i++)
                    @php
                    $product=$products[$i % count($products)];
                    @endphp
                    <div class="group relative xl:min-w-[230px] min-w-[150px] p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100 hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                    <a href="{{ route('product.view') }}" class="focus:outline-none">
                        <img src="{{ asset($product['image']) }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover lg:aspect-auto lg:h-74">
                        <div class="mt-2 flex justify-between flex flex-col gap-1">
                            <p class="text-sm font-normal text-gray-500 text-end">{{ $product['sold'] }} sold</p>
                            <h5 class="font-normal text-wrap text-orange-500 text-sm">{{ $product['shop'] }}</h5>
                            <h4 class="font-semibold text-wrap text-black text-md">{{ $product['name'] }}</h4>
                            <div class="flex justify-between">
                                <h4 class="font-bold text-wrap text-orange-500 text-lg"><span class="text-xl">₱</span> {{ number_format($product['price'], 2) }}</h4>
                            </div>
                        </div>
                    </a>
            </div>
            @endfor
        </div>

        <!-- Hidden Products -->
        <div id="hidden-products" class="grid grid-cols-2 lg:grid-cols-6 gap-4 hidden">
            <!-- Additional hidden products -->
            @for ($i = 0; $i < 12; $i++)
                @php
                if ($i < 6) {
                $product=$products[0];
                } else {
                $product=$products[1];
                }
                @endphp
                <div class="group relative xl:min-w-[230px] min-w-[150px] p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100 hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                <a href="{{ route('product.view') }}" class="focus:outline-none">
                    <img src="{{ asset($product['image']) }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover lg:aspect-auto lg:h-74">
                    <div class="mt-2 flex justify-between flex flex-col gap-1">
                        <p class="text-sm font-normal text-gray-500 text-end">{{ $product['sold'] }} sold</p>
                        <h5 class="font-normal text-wrap text-orange-500 text-sm">{{ $product['shop'] }}</h5>
                        <h4 class="font-semibold text-wrap text-black text-md">{{ $product['name'] }}</h4>
                        <div class="flex justify-between">
                            <h4 class="font-bold text-wrap text-orange-500 text-lg"><span class="text-xl">₱</span> {{ number_format($product['price'], 2) }}</h4>
                        </div>
                    </div>
                </a>
        </div>
        @endfor
    </div>

    <!-- Show More Button -->
    <div class="text-center mt-4">
        <button id="showMoreBtn" class="w-40 px-4 py-2 bg-orange-500 text-white font-semibold rounded-lg shadow hover:bg-orange-600 transition">
            Show More
        </button>
    </div>
    </div>
    </div>
    <x-return-top />

</body>
<!-- Footer -->
<x-footer bgColor=" bg-gradient-to-r from-orange-600" />

</html>