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


<!-- ADDED TO CART DIALOG -->
@if(session('success'))
<dialog id="successDialog" class="p-6 rounded-lg shadow-lg w-full max-w-md backdrop:bg-black/30 border-none outline-none">
    <div class="bg-white p-6 rounded-lg text-center justify-center">
        <div class="flex justify-center items-center text-center">
            <i data-lucide="circle-check-Big" class="text-center w-20 h-20 text-green-500"></i>

        </div>
        <p class="mt-2 text-lg text-gray-800">{{ session('success') }}</p>
        <button onclick="document.getElementById('successDialog').close();" class="mt-4 w-full  outline-none focus:outline-none border-white  bg-orange-500 text-white py-2 px-4 rounded-lg hover:bg-orange-600">
            Okay
        </button>
    </div>
</dialog>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const successDialog = document.getElementById("successDialog");
        if (successDialog) {
            successDialog.showModal();
        }
    });
</script>
@endif



<!-- nav part -->
<x-nav-bar />
<div class="pt-[100px]"></div>



<!-- catergory part -->

<body class="font-sans antialiased bg-white-400 dark:text-black/50">
    <div class="bg-white">

        <div class="md:px-[12rem]  px-2 mt-10">
            <div class="flex flex-row items-center justify-start md:px-10 px-2 mt-5 h-20  ">
                <div class="flex flex-row items-center md:gap-2 gap-1 ">
                    <div> <i data-lucide="heart" class="md:w-12 md:h-12 w-6 h-6 text-orange-500 mx-auto"></i></div>
                    <h1 class="md:text-4xl text-md font-bold text-orange-500 ">My Wishlists</h1>
                </div>
            </div>
        </div>
        <div class="mt-2 w-full">
            <div class="md:px-[15rem] flex gap-5 items-center px-4  text-sm md:text-lg">
                <a href="{{route('dashboard')}}" class="hover:underline hover:text-orange-400">Dashboard</a>
                <div> > </div>
                <a href="{{route('wishlists')}}" class="hover:underline text-orange-500">Wishlists</a>
            </div>
        </div>

        @if($wishlistItems->isEmpty())
        <div class="flex flex-col lg:flex-row items-center text-center justify-center lg:items-start p-20 mt-6 border  w-full max-w-5xl  mx-auto rounded-lg shadow-md bg-white">
            <p class="text-gray-500 lg:text-lg">Your wishlist is empty.</p>
        </div>
        @endif

        <div class="flex flex-col items-center justify-center w-full px-4">
            @foreach($wishlistItems as $wishlist)
            <div class="flex flex-col lg:flex-row items-center lg:items-start gap-6 p-6 md:px-12 mt-6 border pb-6 w-full max-w-5xl mx-auto rounded-lg shadow-md bg-white">
                <!-- Image Section -->
                <div class="flex-shrink-0">
                    <img src="{{ asset('storage/Products/' . $wishlist->product->image_url) }}"
                        alt="Wishlists Image"
                        class="w-32 h-32 rounded-lg object-cover bg-gray-500">
                </div>

                <!-- Notification Details -->
                <div class="flex-1 text-center lg:text-left">
                    <h1 class="font-bold text-xl lg:text-2xl text-gray-800">{{ $wishlist->product->name }}</h1>
                    <h3 class="mt-2 text-gray-500 lg:text-xl lg:text-base text-orange-500"><span class="font-bold">₱ </span> {{ number_format($wishlist->product->discounted_price, 2) }}</h3>
                    <p class="mt-2 text-gray-700 text-sm lg:text-base">{{ $wishlist->product->description}}</p>

                    <!-- Hidden Details -->
                    <details class="mt-3">
                        <summary class="cursor-pointer bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg text-sm inline-block">
                            View Details
                        </summary>
                        <div class="mt-2 p-4 border rounded-lg bg-gray-100">
                            <p class="text-gray-700">Product Sales: {{number_format($wishlist->product->quantity_sold,2)}} items sold</p>
                            @if (!empty($wishlist->product->discount))
                            <p class="text-gray-700">Discount: {{ $wishlist->product->discount_value }}</p>
                            @endif
                            <p class="text-gray-700">Retail Price: ₱ {{number_format($wishlist->product->price,2) }}</p>
                            <p class="text-gray-700">Discounted Price: ₱ {{number_format($wishlist->product->discounted_price,2) }}</p>


                        </div>
                    </details>
                </div>
                <div class="flex flex-col items-center justify-center gap-2">
                    <form action="{{ route('wishlist.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" name="wishlist_id" value="{{ encrypt($wishlist->wishlist_id) }}">
                        <button type="submit" class="font-medium text-red-500 hover:text-red-400 flex gap-1 items-center">
                            <i data-lucide="trash-2"></i>
                            <span class="text-xs lg:text-lg p-1 md:p-0 font-semibold hidden md:block">Remove</span>
                        </button>
                    </form>

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