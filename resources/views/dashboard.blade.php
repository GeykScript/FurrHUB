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

<!-- carousel part -->
<div class="w-full relative mt-2">
    <div class="swiper progress-slide-carousel swiper-container relative ">
        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <a href="{{route('appointment')}}" class="">
                    <div class="rounded-2xl h-[15rem] md:h-full ">
                        <img src="{{ asset('images/Furrhub-carousel/1.jpg') }}" alt="carousel-pet-services" class="w-[100%] h-[100%] object-cover " />
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{route('appointment')}}" class="">
                    <div class="rounded-2xl h-[15rem] md:h-full ">
                        <img src="{{ asset('images/Furrhub-carousel/2.jpg') }}" alt="carousel-pet-services" class="w-[100%] h-[100%] object-cover " />
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{route('appointment')}}" class="">
                    <div class="rounded-2xl h-[15rem] md:h-full ">
                        <img src="{{ asset('images/Furrhub-carousel/3.jpg') }}" alt="carousel-pet-services" class="w-[100%] h-[100%] object-cover " />
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{route('appointment')}}" class="">
                    <div class="rounded-2xl h-[15rem] md:h-full ">
                        <img src="{{ asset('images/Furrhub-carousel/4.jpg') }}" alt="carousel-pet-services" class="w-[100%] h-[100%] object-cover " />
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{route('appointment')}}" class="">
                    <div class="rounded-2xl h-[15rem] md:h-full ">
                        <img src="{{ asset('images/Furrhub-carousel/5.jpg') }}" alt="carousel-pet-services" class="w-[100%] h-[100%] object-cover " />
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{route('appointment')}}" class="">
                    <div class="rounded-2xl h-[15rem] md:h-full ">
                        <img src="{{ asset('images/Furrhub-carousel/6.jpg') }}" alt="carousel-pet-services" class="w-[100%] h-[100%] object-cover " />
                    </div>
                </a>
            </div>



        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

<!-- catergory part -->

<body class="font-sans antialiased bg-white-400 dark:text-black/50">
    <div class="bg-white">
        <div class="w-full overflow-x-auto flex justify-center mt-4 custom-scrollbar lg:p-4">
            <div class="w-full flex xl:gap-8 gap-2 sm:justify-center whitespace-nowrap scrollbar">

                <div class="flex flex-col items-center space-y-2 min-w-[80px] sm:min-w-[100px] lg:p-2">
                    <a href="{{route('foods')}}" class="hover:text-[#F0A02C] flex flex-col items-center space-y-2">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 xl:w-24 xl:h-24  rounded-lg ">
                            <img src="{{asset('images/Furrhub-Product-Categories/Food.png')}}" alt="Food-category" class="transition-transform duration-300 hover:scale-110 " />
                        </div>
                        <p class="text-sm sm:text-sm font-medium text-center">Foods</p>
                    </a>
                </div>

                <div class="flex flex-col items-center space-y-2 min-w-[80px] sm:min-w-[100px] lg:p-2">
                    <a href="{{route('treats')}}" class="hover:text-[#F0A02C] flex flex-col items-center space-y-2">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 xl:w-24 xl:h-24  rounded-lg">
                            <img src="{{asset('images/Furrhub-Product-Categories/Treats.png')}}" alt="Treats-category" class="transition-transform duration-300 hover:scale-110 " />
                        </div>
                        <p class="text-sm sm:text-sm font-medium text-center">Treats</p>
                    </a>
                </div>

                <div class="flex flex-col items-center space-y-2 min-w-[80px] sm:min-w-[100px] lg:p-2">
                    <a href="{{route('toys')}}" class="hover:text-[#F0A02C] flex flex-col items-center space-y-2">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 xl:w-24 xl:h-24  rounded-lg">
                            <img src="{{asset('images/Furrhub-Product-Categories/Toys.png')}}" alt="Toys-category" class="transition-transform duration-300 hover:scale-110 " />
                        </div>
                        <p class="text-sm sm:text-sm font-medium text-center">Toys</p>
                    </a>
                </div>

                <div class="flex flex-col items-center space-y-2 min-w-[80px] sm:min-w-[100px] lg:p-2 text-wrap">
                    <a href="{{route('grooming-supplies')}}" class="hover:text-[#F0A02C] flex flex-col items-center space-y-2">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 xl:w-24 xl:h-24  rounded-lg">
                            <img src="{{asset('images/Furrhub-Product-Categories/Grooming Supplies.png')}}" alt="Grooming Supplies-category" class="transition-transform duration-300 hover:scale-110 " />
                        </div>
                        <p class="text-sm sm:text-sm font-medium text-center text-wrap">Grooming Supplies</p>
                    </a>
                </div>

                <div class="flex flex-col items-center space-y-2 min-w-[80px] sm:min-w-[100px] lg:p-2 text-wrap">
                    <a href="{{route('accessories')}}" class="hover:text-[#F0A02C] flex flex-col items-center space-y-2">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 xl:w-24 xl:h-24  rounded-lg">
                            <img src="{{asset('images/Furrhub-Product-Categories/Accessories.png')}}" alt="Accessories-category" class="transition-transform duration-300 hover:scale-110 " />
                        </div>
                        <p class="text-sm sm:text-sm font-medium text-center text-wrap"> Accessories</p>
                    </a>
                </div>

                <div class="flex flex-col items-center space-y-2 min-w-[80px] sm:min-w-[100px] lg:p-2">
                    <a href="{{route('health-needs')}}" class="hover:text-[#F0A02C] flex flex-col items-center space-y-2">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 xl:w-24 xl:h-24  rounded-lg">
                            <img src="{{asset('images/Furrhub-Product-Categories/Health Needs.png')}}" alt="Health Needs-category" class="transition-transform duration-300 hover:scale-110 " />
                        </div>
                        <p class="text-sm sm:text-sm font-medium text-center text-wrap">Health Needs</p>
                    </a>
                </div>

                <div class="flex flex-col items-center space-y-2 min-w-[80px] sm:min-w-[100px] lg:p-2">
                    <a href="{{route('essentials')}}" class="hover:text-[#F0A02C] flex flex-col items-center space-y-2">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 xl:w-24 xl:h-24  rounded-lg">
                            <img src="{{asset('images/Furrhub-Product-Categories/Essentials.png')}}" alt="Essentials-category" class="transition-transform duration-300 hover:scale-110 " />
                        </div>
                        <p class="text-sm sm:text-sm font-medium text-center">Essentials</p>
                    </a>
                </div>
            </div>
        </div>

        <div class="md:px-[3rem]  px-2">
            <div class="flex flex-row items-center justify-between md:px-10 px-2 mt-5 h-20  rounded-lg bg-gradient-to-r from-orange-600  to-orange-400    ">
                <div class="flex flex-row items-center md:gap-5 gap-1 ">
                    <div> <i data-lucide="paw-print" class="md:w-10 md:h-10 w-6 h-6 text-white mx-auto"></i></div>
                    <h1 class="md:text-4xl text-md font-bold text-white ">Best Seller Products!</h1>

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
    </div>


    <x-authenticity-banner />

    <!-- discover services -->
    <div class=" lg:px-12">
        <div class="grid grid-cols-6 lg:p-4 p-2 lg:gap-4 gap-2 bg-sky-100  mt-2 rounded-lg">

            <div class="col-span-6 lg:col-span-3 justify-center items-center">
                <a href="{{route('appointment')}}" class="focus:outline-none">
                    <img src="{{asset('images/services/book-now.jpg')}}" alt="" class="rounded-md  lg:w-full transition-transform duration-300 hover:scale-105">
                </a>
            </div>
            <div class="lg:col-span-1 col-span-2">
                <a href="{{route('appointment')}}" class="focus:outline-none">
                    <img src="{{asset('images/services/1.jpg')}}"
                        alt=""
                        class="lg:w-full lg:h-full rounded-md transition-transform duration-300 hover:scale-105 object-cover">
                </a>
            </div>

            <div class="lg:col-span-1 col-span-2">
                <a href="{{route('appointment')}}" class="focus:outline-none">
                    <img src="{{asset('images/services/2.jpg')}}"
                        alt=""
                        class="lg:w-full lg:h-full rounded-md transition-transform duration-300 hover:scale-105 object-cover">
                </a>
            </div>

            <div class="lg:col-span-1 col-span-2">
                <a href="{{route('appointment')}}" class="focus:outline-none">
                    <img src="{{asset('images/services/3.jpg')}}"
                        alt=""
                        class="lg:w-full lg:h-full rounded-md transition-transform duration-300 hover:scale-105 object-cover">
                </a>
            </div>
        </div>
    </div>

    <!-- discover products -->
    <div class=" md:px-[3rem] mt-3 px-[1rem]">
        <div class="flex flex-row  w-full items-center justify-center">
            <h1 class="text-center md:text-4xl text-xl font-bold  uppercase tracking-widest my-10 text-orange-500 ">Discover Products </h1>
            <div> <i data-lucide="paw-print" class="w-10 h-10 text-orange-500 mx-auto"></i> </div>
        </div>


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



    <!-- Return to Top Button -->
    <x-return-top />
</body>
<!-- Footer -->
<x-footer bgColor=" bg-gradient-to-r from-orange-600" />

</html>