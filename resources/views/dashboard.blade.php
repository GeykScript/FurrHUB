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

<header class="fixed top-0 left-0 w-full z-50 flex flex-col flex-col-reverse md:flex-row justify-between items-center lg:px-10 bg-[#F0A02C] shadow-lg">
    <div class="flex h-[90px] w-[220px] lg:h-[120px] lg-w-[240px] hidden md:block">
        <a href="{{route('dashboard')}}" class="border-none focus:outline-none focus:ring-0 focus:border-transparent">
            <img src="{{ asset('logo/furrhub.png') }}" alt="furrhub-logo" class="h-[100px]  lg:h-[120px] lg:w-[290px] object-cover" /></a>
    </div>

    <div class="flex flex-row lg:w-[60rem] w-auto p-2 justify-around lg:gap-10">
        <form class="flex items-center w-full 2xl:w-[58rem]  p-2 rounded-lg">
            <input type="search" placeholder="Search" aria-label="Search"
                class="w-full h-[40px] lg:h-[50px]   px-4 text-[13px] lg:text-[18px] rounded-l-lg outline-none border-none focus:outline-none focus:ring-0 focus:border-transparent" />
            <button type="submit"
                class="bg-[#35B5D3] h-[40px] lg:h-[50px] lg:w-[80px] w-[50px] flex items-center justify-center rounded-r-lg">
                <img src="{{ asset('logo/search-white.svg') }}" alt="search" class="h-[22px] w-[22px] lg:h-[30px] lg:w-[30px]" />
            </button>
        </form>

        <div class="flex flex-row text-white  font-semibold mt-4">
            <a href="{{route('shoppingCart')}}" class="flex flex-row gap-0 align-center">
                <img src="{{ asset ('logo/cart.svg')}}" alt="user" class="h-[27px] w-[30px] lg:h-[35px] lg:w-[43px]" />
                <div class="bg-[#F23D3D] h-[20px] w-[35px]  lg:h-[27px] lg:w-[45px] rounded-full flex justify-center items-center">
                    <p class="xl:text-[16px] text-[10px] ">0</p>
                </div>
            </a>
            <!-- <p class="pt-1 text-">Cart</p> -->
        </div>
    </div>

    <div class="flex flex-row gap-3 ml-auto xl:ml-0">
        <div class="flex flex-row text-black text-[12px] lg:text-[20px] font-semibold px-3 lg:px-0">
            <nav class="flex flex-row gap-1 md:gap-1 align-center">
                @if (Route::has('login'))

                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-md leading-4 font-medium rounded-md  hover:text-gray-800 focus:outline-none transition ease-in-out duration-150">
                            <div class="flex flex-row items-center justify-center">
                                <p class="">{{ Auth::user()->first_name}} {{ Auth::user()->last_name}}</p>
                                <img src="{{ asset ('logo/user.svg')}}" alt="user" class="h-[25px] w-[30px] lg:h-[40px] lg:w-[43px]" />

                            </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @else <a class="pt-1   hover:text-white" href="{{ route('login') }}">Log in </a>
                <p class="pt-1">|</p>
                @if (Route::has('register'))
                <a class="pt-1 hover:text-white" href="{{ route('register') }}">Sign up</a>
                @endif
                @endauth

                @endif
            </nav>
        </div>
    </div>
</header>


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
                <div class="group relative  xl:min-w-[230px] min-w-[150px]    p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100  hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                    <a href="{{route('product.view')}}" class="foucs:outline-none">
                        <img src="{{ asset('images/products/dog.jpg') }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover  lg:aspect-auto lg:h-74">
                        <div class="mt-2 flex justify-between flex flex-col gap-1">
                            <p class="text-sm font-normal text-gray-500 text-end">120 sold</p>
                            <h5 class="font-normal text-wrap text-orange-500 text-sm">FurrHUB</h5>
                            <h4 class="font-semibold text-wrap text-black text-md">Pedigree 18 Pouch Variety Pack</h4>
                            <div class="flex justify-between">
                                <h4 class="font-bold text-wrap text-orange-500 text-lg"><span class="text-xl">₱</span> 350.00</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="group relative  xl:min-w-[230px] min-w-[150px]    p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100  hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                    <a href="{{route('product.view')}}" class="foucs:outline-none">
                        <img src="{{ asset('images/products/cat-foods.webp') }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover  lg:aspect-auto lg:h-74">
                        <div class="mt-2 flex justify-between flex flex-col gap-1">
                            <p class="text-sm font-normal text-gray-500 text-end">120 sold</p>
                            <h5 class="font-normal text-wrap text-orange-500 text-sm">FurrHUB</h5>
                            <h4 class="font-semibold text-wrap text-black text-md">Royal Canin Cat Food</h4>
                            <div class="flex justify-between">
                                <h4 class="font-bold text-wrap text-orange-500 text-lg"><span class="text-xl">₱</span> 350.00</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="group relative  xl:min-w-[230px] min-w-[150px]    p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100  hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                    <a href="{{route('product.view')}}" class="foucs:outline-none">
                        <img src="{{ asset('images/products/dog.jpg') }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover  lg:aspect-auto lg:h-74">
                        <div class="mt-2 flex justify-between flex flex-col gap-1">
                            <p class="text-sm font-normal text-gray-500 text-end">120 sold</p>
                            <h5 class="font-normal text-wrap text-orange-500 text-sm">FurrHUB</h5>
                            <h4 class="font-semibold text-wrap text-black text-md">Pedigree 18 Pouch Variety Pack</h4>
                            <div class="flex justify-between">
                                <h4 class="font-bold text-wrap text-orange-500 text-lg"><span class="text-xl">₱</span> 350.00</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="group relative  xl:min-w-[230px] min-w-[150px]    p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100  hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                    <a href="{{route('product.view')}}" class="foucs:outline-none">
                        <img src="{{ asset('images/products/cat-foods.webp') }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover  lg:aspect-auto lg:h-74">
                        <div class="mt-2 flex justify-between flex flex-col gap-1">
                            <p class="text-sm font-normal text-gray-500 text-end">120 sold</p>
                            <h5 class="font-normal text-wrap text-orange-500 text-sm">FurrHUB</h5>
                            <h4 class="font-semibold text-wrap text-black text-md">Royal Canin Cat Food</h4>
                            <div class="flex justify-between">
                                <h4 class="font-bold text-wrap text-orange-500 text-lg"><span class="text-xl">₱</span> 350.00</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="group relative  xl:min-w-[230px] min-w-[150px]    p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100  hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                    <a href="{{route('product.view')}}" class="foucs:outline-none">
                        <img src="{{ asset('images/products/dog.jpg') }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover  lg:aspect-auto lg:h-74">
                        <div class="mt-2 flex justify-between flex flex-col gap-1">
                            <p class="text-sm font-normal text-gray-500 text-end">120 sold</p>
                            <h5 class="font-normal text-wrap text-orange-500 text-sm">FurrHUB</h5>
                            <h4 class="font-semibold text-wrap text-black text-md">Pedigree 18 Pouch Variety Pack</h4>
                            <div class="flex justify-between">
                                <h4 class="font-bold text-wrap text-orange-500 text-lg"><span class="text-xl">₱</span> 350.00</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="group relative  xl:min-w-[230px] min-w-[150px]    p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100  hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                    <a href="{{route('product.view')}}" class="foucs:outline-none">
                        <img src="{{ asset('images/products/cat-foods.webp') }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover  lg:aspect-auto lg:h-74">
                        <div class="mt-2 flex justify-between flex flex-col gap-1">
                            <p class="text-sm font-normal text-gray-500 text-end">120 sold</p>
                            <h5 class="font-normal text-wrap text-orange-500 text-sm">FurrHUB</h5>
                            <h4 class="font-semibold text-wrap text-black text-md">Royal Canin Cat Food</h4>
                            <div class="flex justify-between">
                                <h4 class="font-bold text-wrap text-orange-500 text-lg"><span class="text-xl">₱</span> 350.00</h4>
                            </div>
                        </div>
                    </a>
                </div>
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
                <div class="group relative  xl:min-w-[230px] min-w-[150px]    p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100  hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                    <a href="{{route('product.view')}}" class="foucs:outline-none">
                        <img src="{{ asset('images/products/dog.jpg') }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover lg:aspect-auto lg:h-74">
                        <div class="mt-2 flex justify-between flex flex-col gap-1">
                            <p class="text-sm font-normal text-gray-500 text-end">120 sold</p>
                            <h5 class="font-normal text-wrap text-orange-500 text-sm">FurrHUB</h5>
                            <h4 class="font-semibold text-wrap text-black text-md">Pedigree 18 Pouch Variety Pack</h4>
                            <div class="flex justify-between">
                                <h4 class="font-bold text-wrap text-orange-500 text-lg"><span class="text-xl">₱</span> 350.00</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="group relative  xl:min-w-[230px] min-w-[150px]    p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100  hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                    <a href="{{route('product.view')}}" class="foucs:outline-none">
                        <img src="{{ asset('images/products/cat-foods.webp') }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover  lg:aspect-auto lg:h-74">
                        <div class="mt-2 flex justify-between flex flex-col gap-1">
                            <p class="text-sm font-normal text-gray-500 text-end">120 sold</p>
                            <h5 class="font-normal text-wrap text-orange-500 text-sm">FurrHUB</h5>
                            <h4 class="font-semibold text-wrap text-black text-md">Royal Canin Cat Food</h4>
                            <div class="flex justify-between">
                                <h4 class="font-bold text-wrap text-orange-500 text-lg"><span class="text-xl">₱</span> 350.00</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="group relative  xl:min-w-[230px] min-w-[150px]    p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100  hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                    <a href="{{route('product.view')}}" class="foucs:outline-none">
                        <img src="{{ asset('images/products/dog.jpg') }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover  lg:aspect-auto lg:h-74">
                        <div class="mt-2 flex justify-between flex flex-col gap-1">
                            <p class="text-sm font-normal text-gray-500 text-end">120 sold</p>
                            <h5 class="font-normal text-wrap text-orange-500 text-sm">FurrHUB</h5>
                            <h4 class="font-semibold text-wrap text-black text-md">Pedigree 18 Pouch Variety Pack</h4>
                            <div class="flex justify-between">
                                <h4 class="font-bold text-wrap text-orange-500 text-lg"><span class="text-xl">₱</span> 350.00</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="group relative  xl:min-w-[230px] min-w-[150px]    p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100  hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                    <a href="{{route('product.view')}}" class="foucs:outline-none">

                        <img src="{{ asset('images/products/cat-foods.webp') }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover  lg:aspect-auto lg:h-74">
                        <div class="mt-2 flex justify-between flex flex-col gap-1">
                            <p class="text-sm font-normal text-gray-500 text-end">120 sold</p>
                            <h5 class="font-normal text-wrap text-orange-500 text-sm">FurrHUB</h5>
                            <h4 class="font-semibold text-wrap text-black text-md">Royal Canin Cat Food</h4>
                            <div class="flex justify-between">
                                <h4 class="font-bold text-wrap text-orange-500 text-lg"><span class="text-xl">₱</span> 350.00</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="group relative  xl:min-w-[230px] min-w-[150px]    p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100  hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                    <a href="{{route('product.view')}}" class="foucs:outline-none">

                        <img src="{{ asset('images/products/dog.jpg') }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover  lg:aspect-auto lg:h-74">
                        <div class="mt-2 flex justify-between flex flex-col gap-1">
                            <p class="text-sm font-normal text-gray-500 text-end">120 sold</p>
                            <h5 class="font-normal text-wrap text-orange-500 text-sm">FurrHUB</h5>
                            <h4 class="font-semibold text-wrap text-black text-md">Pedigree 18 Pouch Variety Pack</h4>
                            <div class="flex justify-between">
                                <h4 class="font-bold text-wrap text-orange-500 text-lg"><span class="text-xl">₱</span> 350.00</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="group relative  xl:min-w-[230px] min-w-[150px]    p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100  hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                    <a href="{{route('product.view')}}" class="foucs:outline-none">

                        <img src="{{ asset('images/products/cat-foods.webp') }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover  lg:aspect-auto lg:h-74">
                        <div class="mt-2 flex justify-between flex flex-col gap-1">
                            <p class="text-sm font-normal text-gray-500 text-end">120 sold</p>
                            <h5 class="font-normal text-wrap text-orange-500 text-sm">FurrHUB</h5>
                            <h4 class="font-semibold text-wrap text-black text-md">Royal Canin Cat Food</h4>
                            <div class="flex justify-between">
                                <h4 class="font-bold text-wrap text-orange-500 text-lg"><span class="text-xl">₱</span> 350.00</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="group relative  xl:min-w-[230px] min-w-[150px]    p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100  hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                    <a href="{{route('product.view')}}" class="foucs:outline-none">

                        <img src="{{ asset('images/products/dog.jpg') }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover  lg:aspect-auto lg:h-74">
                        <div class="mt-2 flex justify-between flex flex-col gap-1">
                            <p class="text-sm font-normal text-gray-500 text-end">120 sold</p>
                            <h5 class="font-normal text-wrap text-orange-500 text-sm">FurrHUB</h5>
                            <h4 class="font-semibold text-wrap text-black text-md">Pedigree 18 Pouch Variety Pack</h4>
                            <div class="flex justify-between">
                                <h4 class="font-bold text-wrap text-orange-500 text-lg"><span class="text-xl">₱</span> 350.00</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="group relative  xl:min-w-[230px] min-w-[150px]    p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100  hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                    <a href="{{route('product.view')}}" class="foucs:outline-none">

                        <img src="{{ asset('images/products/cat-foods.webp') }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover  lg:aspect-auto lg:h-74">
                        <div class="mt-2 flex justify-between flex flex-col gap-1">
                            <p class="text-sm font-normal text-gray-500 text-end">120 sold</p>
                            <h5 class="font-normal text-wrap text-orange-500 text-sm">FurrHUB</h5>
                            <h4 class="font-semibold text-wrap text-black text-md">Royal Canin Cat Food</h4>
                            <div class="flex justify-between">
                                <h4 class="font-bold text-wrap text-orange-500 text-lg"><span class="text-xl">₱</span> 350.00</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="group relative  xl:min-w-[230px] min-w-[150px]    p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100  hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                    <a href="{{route('product.view')}}" class="foucs:outline-none">

                        <img src="{{ asset('images/products/dog.jpg') }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover  lg:aspect-auto lg:h-74">
                        <div class="mt-2 flex justify-between flex flex-col gap-1">
                            <p class="text-sm font-normal text-gray-500 text-end">120 sold</p>
                            <h5 class="font-normal text-wrap text-orange-500 text-sm">FurrHUB</h5>
                            <h4 class="font-semibold text-wrap text-black text-md">Pedigree 18 Pouch Variety Pack</h4>
                            <div class="flex justify-between">
                                <h4 class="font-bold text-wrap text-orange-500 text-lg"><span class="text-xl">₱</span> 350.00</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="group relative  xl:min-w-[230px] min-w-[150px]    p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100  hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                    <a href="{{route('product.view')}}" class="foucs:outline-none">

                        <img src="{{ asset('images/products/dog.jpg') }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover  lg:aspect-auto lg:h-74">
                        <div class="mt-2 flex justify-between flex flex-col gap-1">
                            <p class="text-sm font-normal text-gray-500 text-end">120 sold</p>
                            <h5 class="font-normal text-wrap text-orange-500 text-sm">FurrHUB</h5>
                            <h4 class="font-semibold text-wrap text-black text-md">Pedigree 18 Pouch Variety Pack</h4>
                            <div class="flex justify-between">
                                <h4 class="font-bold text-wrap text-orange-500 text-lg"><span class="text-xl">₱</span> 350.00</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="group relative  xl:min-w-[230px] min-w-[150px]    p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100  hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                    <a href="{{route('product.view')}}" class="foucs:outline-none">

                        <img src="{{ asset('images/products/dog.jpg') }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover  lg:aspect-auto lg:h-74">
                        <div class="mt-2 flex justify-between flex flex-col gap-1">
                            <p class="text-sm font-normal text-gray-500 text-end">120 sold</p>
                            <h5 class="font-normal text-wrap text-orange-500 text-sm">FurrHUB</h5>
                            <h4 class="font-semibold text-wrap text-black text-md">Pedigree 18 Pouch Variety Pack</h4>
                            <div class="flex justify-between">
                                <h4 class="font-bold text-wrap text-orange-500 text-lg"><span class="text-xl">₱</span> 350.00</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="group relative  xl:min-w-[230px] min-w-[150px]    p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100  hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                    <a href="{{route('product.view')}}" class="foucs:outline-none">

                        <img src="{{ asset('images/products/cat-foods.webp') }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover  lg:aspect-auto lg:h-74">
                        <div class="mt-2 flex justify-between flex flex-col gap-1">
                            <p class="text-sm font-normal text-gray-500 text-end">120 sold</p>
                            <h5 class="font-normal text-wrap text-orange-500 text-sm">FurrHUB</h5>
                            <h4 class="font-semibold text-wrap text-black text-md">Royal Canin Cat Food</h4>
                            <div class="flex justify-between">
                                <h4 class="font-bold text-wrap text-orange-500 text-lg"><span class="text-xl">₱</span> 350.00</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="w-full mt-4 flex justify-center">
                <button type="submit" class="bg-orange-500 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded-xl w-full xl:w-[15rem] xl:h-12">See more</button>
            </div>
        </div>

    </div>

</body>
<!-- Footer -->
<x-footer bgColor=" bg-gradient-to-r from-orange-600" />

</html>