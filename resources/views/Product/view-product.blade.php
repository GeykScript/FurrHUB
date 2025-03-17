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


<div class="lg:pt-[150px] pt-[100px]"></div>

<!-- product menu -->

<body class="font-sans antialiased bg-white-400 dark:text-black/50">
    <div class="bg-white">
        <div class="flex flex-row justify-start items-center lg:px-10 px-2 gap-5 text-gray-600 text-semibold lg:text-lg mt-3 mb-3">
            @if (Route::has('login'))
            @auth
            <a href="{{route('dashboard')}}" class="hover:text-orange-500">Home</a>
            <h1>
                < </h1>
                    <h1 class="text-orange-500 font-semibold">Product name</h1>
                    @else
                    <a href=" {{route('welcome')}}" class="hover:text-orange-500">Home</a>
                    <h1>
                        < </h1>
                            <h1 class="text-orange-500 font-semibold">Product name</h1>
                            @endauth
                            @endif
        </div>

        <!-- product details -->
        <div class="grid grid-cols-1 lg:grid-cols-5    gap-5 lg:px-10 p-4  2xl:px-20 ">
            <div class="lg:col-span-2 col-span-5 p-4 rounded-lg shadow-xl border-2 border-gray-100">
                <div class="swiper progress-slide-carousel swiper-container relative w-full h-full">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide w-full h-full">
                            <img src="{{ asset('images/products/dog.jpg') }}" alt="carousel-pet-services"
                                class="w-full h-64 md:h-96 lg:h-full rounded-md object-cover md:object-contain" />
                        </div>
                        <div class="swiper-slide w-full h-full">
                            <img src="{{ asset('images/products/cat-foods.webp') }}" alt="carousel-pet-services"
                                class="w-full h-64 md:h-96 lg:h-full rounded-md object-cover md:object-contain" />
                        </div>
                        <div class="swiper-slide w-full h-full">
                            <img src="{{ asset('images/products/dog.jpg') }}" alt="carousel-pet-services"
                                class="w-full h-64 md:h-96 lg:h-full rounded-md object-cover md:object-contain" />
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <!-- product details -->
            <div class="lg:col-span-3  col-span-5  rounded-lg shadow-xl border-2 border-gray-100 lg:p-20 p-4">
                <div class="">
                    <h1 class="lg:text-4xl text-xl font-bold text-gray-700 text-wrap">Pedigree 18 Pouch Variety Pack</h1>
                    <div class="flex flex-row gap-5 lg:mt-5  mt-2 lg:text-lg  text-sm text-gray-700">
                        <h1>FurrHUB</h1>
                        <h1>|</h1>
                        <h1>PSN: <span>xxxxxxxxxxxx</span></h1>
                    </div>
                    <hr class="lg:border-2 border-1 border-gray-400 mt-2">
                    <div class="flex justify-end gap-1 mt-3 font-semibold lg:text-xl text-orange-400">
                        <h1>1020</h1>
                        <h1>Sold</h1>
                    </div>
                    <div class="lg:text-lg  text-gray-700 flex lg:gap-2 gap-1  mt-2">
                        <h1>Expiration Date:</h1>
                        <h1>MM/DD/YY</h1>
                    </div>
                    <div class="flex flex-row lg:gap-2 gap-1 mt-5 lg:text-4xl text-xl text-orange-500 font-semibold bg-orange-200 p-4  rounded-lg">
                        <h1 class="lg:text-5xl text-xl">₱</h1>
                        <h1 class="lg:mt-1">350</h1>
                    </div>
                    <div class="flex flex-row gap-5 mt-5 lg:text-lg text-gray-700">
                        <h1 class="font-semibold">Stock: </h1>
                        <li class="text-green-500 font-semibold">In stock</li>
                    </div>
                    <div class="flex flex-row gap-5 mt-5 lg:text-lg text-gray-700 items-center">
                        <h1 class="font-semibold">Quantity:</h1>
                        <div class="flex justify-start col-span-1">
                            <form>
                                <div id="Quantity-inputs" class="relative flex items-center max-w-[10rem] bg-white border border-gray-200 rounded-xl">
                                    <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input"
                                        class="bg-white hover:bg-gray-100 border-gray-100 border rounded-s-xl p-3 h-11 focus:outline-none">
                                        <i data-lucide="minus" class="text-gray-500"></i>

                                    </button>
                                    <input type="number" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation"
                                        class="bg-white border-x-0 border-gray-100 h-11 text-center text-gray-900 text-xl focus:outline-none  focus:ring-0 focus:border-transparent block w-10 xl:w-full py-2.5 appearance-none [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none"
                                        value="1" min="1" required />
                                    <button type="button" id="increment-button" data-input-counter-increment="quantity-input"
                                        class="bg-white hover:bg-gray-100 border-gray-100 border rounded-e-xl p-3 h-11 focus:outline-none">
                                        <i data-lucide="plus" class="text-gray-500"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="flex justify-end px-4 font-semibold lg:text-lg text-sm text-sky-500 mt-3">
                        <h1 class="hover:text-sky-600 hover:cursor-pointer">Add to Wishlists?</h1>
                    </div>
                    <div class="flex flex-row items-center lg:gap-5 gap-2 mt-3 lg:text-lg text-gray-700 grid grid-cols-1 lg:grid-cols-6  px-2">
                        <a href="{{route('shoppingCart')}}" class="col-span-3 w-full border-2 border-orange-500 hover:bg-orange-500 hover:text-white text-orange-500 font-bold py-2 px-4 rounded-lg flex justify-center items-center gap-2">
                            <i data-lucide="shopping-basket"></i>
                            <p class=""> Add to Cart </p>
                        </a>
                        <a href="{{route('shoppingCart')}}" class="col-span-3 w-full bg-orange-500 hover:bg-orange-600 text-white text-center font-bold py-2 px-4 rounded-lg ">
                            <p href="{{route('shoppingCart')}}">
                                Buy Now
                            </p>
                        </a>
                    </div>
                </div>
            </div>

            <!-- product details -->
            <div class="col-span-5 mt-2 ">
                <h1 class="lg:text-3xl text-xl font-bold text-gray-700 text-wrap">Product Details</h1>
                <h1 class="text-wrap mt-1 px-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa eligendi odit tempora suscipit deleniti quod quaerat, labore quidem sed libero! Porro autem libero quidem nam. Architecto ipsa est voluptate aut.</h1>
                <h1 class="text-wrap mt-1 px-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa eligendi odit tempora suscipit deleniti quod quaerat, labore quidem sed libero! Porro autem libero quidem nam. Architecto ipsa est voluptate aut.</h1>
            </div>

            <!-- product reviews -->
            <h1 class="lg:text-2xl text-md font-bold text-gray-700 text-wrap">Customer Reviews</h1>
            <div class="col-span-5  rounded-lg shadow-xl border-2 border-gray-100">
                <div class="flex flex-col gap-1 p-4">
                    <div class="flex flex-row gap-2">
                        <i data-lucide="circle-user"></i>
                        <h1 class="lg:text-sm text-sm font-bold text-gray-700 text-wrap">John Doe</h1>
                    </div>
                    <p class="px-7">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit animi quo optio saepe deleniti laudantium distinctio, quidem labore veniam iure magni! Laudantium impedit modi fugiat. Harum sunt aliquam pariatur sapiente!</p>
                    <div class="flex flex-row gap-2 mt-2">
                        <div class="grid grid-cols-3 lg:grid-cols-12 gap-2">
                            <img src="{{ asset('images/products/dog.jpg') }}" alt="reviews-photos" class="lg:h-[10rem] lg:w-[10rem]  w-[5rem] h-[5rem] object-contain" />
                            <img src="{{ asset('images/products/dog.jpg') }}" alt="reviews-photos" class="lg:h-[10rem] lg:w-[10rem]  w-[5rem] h-[5rem] object-contain" />
                            <img src="{{ asset('images/products/dog.jpg') }}" alt="reviews-photos" class="lg:h-[10rem] lg:w-[10rem]  w-[5rem] h-[5rem] object-contain" />
                            <img src="{{ asset('images/products/dog.jpg') }}" alt="reviews-photos" class="lg:h-[10rem] lg:w-[10rem]  w-[5rem] h-[5rem] object-contain" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-5  rounded-lg shadow-xl border-2 border-gray-100">
                <div class="flex flex-col gap-1 p-4">
                    <div class="flex flex-row gap-2">
                        <i data-lucide="circle-user"></i>
                        <h1 class="lg:text-sm text-sm font-bold text-gray-700 text-wrap">John Doe</h1>
                    </div>
                    <p class="px-7">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit animi quo optio saepe deleniti laudantium distinctio, quidem labore veniam iure magni! Laudantium impedit modi fugiat. Harum sunt aliquam pariatur sapiente!</p>

                </div>
            </div>
        </div>

        <!-- related products -->
        <div class="md:px-[3rem]  px-2">
            <div class="flex flex-row items-center justify-between md:px-10 px-2 mt-5 h-20  rounded-lg bg-gradient-to-r from-orange-600  to-orange-400    ">
                <div class="flex flex-row items-center md:gap-5 gap-1 ">
                    <div> <i data-lucide="paw-print" class="md:w-10 md:h-10 w-6 h-6 text-white mx-auto"></i></div>
                    <h1 class="md:text-4xl text-md font-bold text-white ">You also may like</h1>
                </div>
            </div>
        </div>
        <div class="md:px-[3rem] mt-3 px-[1rem]">
            <div class="grid grid-cols-2 lg:grid-cols-6 gap-4  ">
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

                @for ($i = 0; $i < 6; $i++)
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

        <!-- banner -->
        <x-authenticity-banner />

    </div>
    </div>

    <!-- Return to Top Button -->
    <x-return-top />
</body>
<!-- Footer -->
<x-footer bgColor=" bg-gradient-to-r from-orange-600" />

</html>