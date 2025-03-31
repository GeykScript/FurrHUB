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
    @vite('resources/js/app.jsx')

</head>


<!-- bg-[#60E1FF] blue -->
<!-- F0A02C  orange-->
<!-- 38B6FF -->
<!-- nav part -->
<x-nav-bar />
<div class="lg:pt-[90px] pt-[110px] lg:mb-10"></div>





<body class="font-sans antialiased bg-white-600 dark:text-black/50 min-h-screen flex flex-col">
    <div class="bg-white flex-grow">
        <div class="relative  p-2">
            <!-- title cart part -->
            <div class="flex flex-row xl:text-5xl text-xl font-bold xl:px-[10rem]">
                <i data-lucide="shopping-bag" class="xl:w-[5rem] xl:h-[5rem] w-[2rem] h-[2rem] mt-3 xl:mt-0 text-orange-500"> </i>
                <div class="items-center justify-center p-4">
                    <h1 class="items-center text-orange-500">Shopping Cart </h1>
                </div>
            </div>
            <div class="lg:mt-10   ">
                <div class="md:px-[10rem] flex gap-5 items-center px-4  text-sm md:text-lg">
                    <a href="{{route('dashboard')}}" class="hover:underline hover:text-orange-400">Home</a>
                    <div> > </div>
                    <a href="{{route('shoppingCart')}}" class="hover:underline text-orange-500">Shopping Cart</a>
                </div>
            </div>
            <div class="xl:px-[10rem] xl:py-8 lg:px-5 lg:py-5 ">
                <!-- table head part -->
                <div class="w-full text-xl text-gray-500 dark:text-gray-400">
                    <div class="grid grid-cols-1 xl:grid-cols-5 gap-4 text-xl font-bold text-gray-800 uppercase border border-sky-300 bg-sky-200 p-4 hidden xl:grid rounded-xl">
                        <div class="flex justify-between pr-[20rem] col-span-2">

                            <div class="px-20 py-3 text-center xl:text-left">Product</div>
                        </div>

                        <div class="px-6 py-3 text-center col-span-1">Total Price</div>
                        <div class="px-6 py-3 text-center col-span-1">Quantity</div>
                        <div class="px-6 py-3 text-center col-span-1">Actions</div>
                    </div>
                </div>



                <!-- product part -->
                <div class="relative h-full mt-2 gap-4">

                    @if($cartItems->isEmpty())
                    <div class="flex bg-white p-40 border-gray-300 text-gray-900 text-xl items-center justify-center bg-[#FAFAFA]">
                        <p>No items in your cart.</p>
                    </div>
                    @else
                    @foreach ($cartItems as $item)
                    <div class="grid grid-rows-1 xl:grid-cols-5 xl:gap-5 gap-4 bg-white p-4 border-b border-gray-300 text-gray-900 text-xl items-center bg-[#FAFAFA] mt-2">
                        <div class="flex flex-col xl:flex-row items-center xl:gap-20 gap-2 col-span-2">
                            <div class="flex flex-row items-center gap-10">
                                <div class="flex justify-center xl:justify-start">
                                    @php
                                    $isChecked = session()->has('buy_now_product_id') && session('buy_now_product_id') == $item->product_id;
                                    @endphp
                                    <input
                                        id="checkbox-item-{{ $item->product_id }}"
                                        type="checkbox"
                                        value="{{ $item->product_id }}"
                                        class="rounded border-2 border-sky-400 text-sky-600 shadow-sm focus:ring-sky-500 w-[1.3rem] h-[1.3rem] hover:cursor-pointer"
                                        {{ $isChecked ? 'checked' : '' }}>
                                    <label for="checkbox-item-{{ $item->product_id }}" class="sr-only">checkbox</label>
                                    @if($isChecked)
                                    {{ session()->forget('buy_now_product_id') }}
                                    @endif
                                </div>
                                <img src="{{ asset('storage/Products/' . $item->product->image_url) }}" alt="product" class="w-40 h-40 rounded-2">
                            </div>
                            <p class="lg:w-80 text-wrap text-center text-xl font-bold xl:text-left">{{ $item->product->name }}</p>
                        </div>
                        <div class="flex justify-center font-bold col-span-1 items-center">
                            <p class="text-orange-500 text-xl">{{ number_format($item->product->discounted_price, 2) }}</p>
                        </div>
                        <div class="flex justify-center col-span-1">
                            <form>
                                <div id="Quantity-inputs" class="relative flex items-center max-w-[10rem] bg-white border border-gray-200 rounded-xl">
                                    <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input"
                                        class="bg-white hover:bg-gray-100 border-gray-100 border rounded-s-xl p-3 h-11 focus:outline-none">
                                        <i data-lucide="minus" class="text-gray-500"></i>
                                    </button>
                                    <input type="number" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation"
                                        class="bg-white border-x-0 border-gray-100 h-11 text-center text-gray-900 text-xl focus:outline-none focus:ring-0 focus:border-transparent block w-10 xl:w-full py-2.5 appearance-none [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none"
                                        value="{{ $item->quantity }}" min="1" required />
                                    <button type="button" id="increment-button" data-input-counter-increment="quantity-input"
                                        class="bg-white hover:bg-gray-100 border-gray-100 border rounded-e-xl p-3 h-11 focus:outline-none">
                                        <i data-lucide="plus" class="text-gray-500"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="flex justify-start md:justify-center col-span-1">
                            <a href="#" class="font-medium text-red-500 hover:text-red-400 flex gap-1">
                                <i data-lucide="trash-2"></i>
                                <span class="text-xs lg:text-lg p-1 md:p-0">Remove</span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @endif


                    <!-- fixed bottom part -->
                    @if(!$cartItems->isEmpty())

                    <div class="sticky bottom-0 p-4 border-t-0 border-gray-300 shadow-[0_-2px_10px_rgba(0,0,0,0.2)] mt-5 bg-orange-200 rounded-lg xl:h-24">

                        <form action="{{ route('checkoutPage') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 xl:grid-cols-5 gap-4 xl:mt-3">
                                <div class="col-span-2 flex flex-row justify-between lg:pr-[10rem] ">
                                    <div class="flex flex-row items-center gap-2">
                                        <input id="checkbox-all-search" type="checkbox" class="rounded border-2 border-orange-400 text-orange-600 shadow-sm focus:ring-orange-500 w-[1.3rem] h-[1.3rem] hover:cursor-pointer">
                                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                        <p class="xl:text-xl font-bold text-gray-800">Select All</p>
                                    </div>
                                    <div class="flex justify-start ">
                                        <button type="submit" class="font-medium text-red-500 hover:text-red-400 flex gap-1 items-center">
                                            <i data-lucide="trash-2"></i>
                                            <span class="text-xs lg:text-lg p-1 md:p-0 font-semibold hidden md:block">Remove</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex flex-row items-center gap-2 col-span-1 xl:col-span-1">
                                    <p class="xl:text-xl text-sm text-gray-800">Total</p>
                                    <p class="xl:text-xl text-sm text-orange-500">(<span>3</span> items)</p>
                                </div>
                                <div class="flex flex-row items-center gap-2 col-span-1 xl:col-span-1 lg:justify-center">
                                    <p class="xl:text-3xl text-lg font-bold text-orange-500">₱</p>
                                    <p class="xl:text-2xl text-lg font-bold text-orange-500">1050.00</p>
                                </div>
                                <div class="flex flex-row justify-center items-center col-span-2 xl:col-span-1">
                                    <button type="submit" class="bg-orange-500 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded-xl w-full xl:w-[15rem] xl:h-12">Checkout</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>


<!-- Footer -->
<x-footer bgColor=" bg-gradient-to-r from-orange-600" />

</html>