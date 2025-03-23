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
                    <h1 class="items-center text-orange-500">Check Out Product</h1>
                </div>
            </div>
            <div class="lg:mt-10   ">
                <div class="md:px-[10rem] flex gap-5 items-center px-4  text-sm md:text-lg">
                    <a href="{{route('shoppingCart')}}" class="hover:underline hover:text-orange-400">Home</a>
                    <div> > </div>
                    <a href="{{route('shoppingCart')}}" class="hover:underline text-orange-500">Check Out Products</a>
                </div>
            </div>

            <!-- cart part -->
            <div>
                <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-8 md:px-[10rem] mt-10">
                    <div class="col-span-6 lg:col-span-6 grid grid-cols-6 gap-4 bg-orange-200 p-4 rounded-lg">
                        <div class="col-span-6 px-8">
                            <h1 class="font-bold  text-orange-500 ">Delivery Address</h1>
                        </div>
                        <div class="col-span-6 lg:col-span-1">
                            <div class="flex flex-col">
                                <h1 class="text-center">John Doe</h1>
                                <h1 class="text-center">09231234567</h1>
                            </div>
                        </div>
                        <div class="col-span-6 lg:col-span-3">
                            <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita molestias tempora quibusdam cumque labore distinctio libero nulla omnis accusantium natus veniam, perspiciatis fuga eos. Iusto consectetur obcaecati iure nam ipsam.</h1>
                        </div>
                        <div class="col-span-6 lg:col-span-1">
                            <div class="border-2 border-orange-500 rounded-lg p-4 text-orange-500 items-center justify-center">
                                <h1 class="text-center">Default</h1>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class=" rounded-lg p-4 text-sky-500 font-bold items-center justify-center">
                                <h1 class="text-center">Change</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-6 grid grid-cols-6 gap-4  p-4 rounded-lg shadow-lg">
                        <div class="col-span-6 px-8 ">
                            <h1 class="font-bold   ">Product Ordered</h1>
                        </div>
                        <div class="col-span-6 lg:col-span-1">
                            <div class="flex flex-col items-center justify-center">
                                <img src="{{ asset('images/products/dog.jpg') }}" alt="Best-Product" class="aspect-square w-32 rounded-lg bg-gray-500 object-cover lg:aspect-auto lg:h-74">
                            </div>
                        </div>
                        <div class="col-span-6 lg:col-span-2">
                            <h1 clas>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita molestias tempora quibusdam cumque labore distinctio libero nulla omnis accusantium natus veniam, perspiciatis fuga eos. Iusto consectetur obcaecati iure nam ipsam.</h1>
                        </div>
                        <div class="col-span-6 lg:col-span-1">
                            <div class="flex flex-col">
                                <h1 class="text-center font-bold">Unit Price</h1>
                                <h1 class="text-center"><span class="font-bold">₱</span> 200</h1>
                            </div>
                        </div>
                        <div class="col-span-6 lg:col-span-1">
                            <div class="flex flex-col">
                                <h1 class="text-center font-bold">Quantity</h1>
                                <h1 class="text-center"><span class="font-bold">₱</span> 200</h1>
                            </div>
                        </div>
                        <div class="col-span-6 lg:col-span-1">
                            <div class="flex flex-col">
                                <h1 class="text-center font-bold">Item Sub Total</h1>
                                <h1 class="text-center"><span class="font-bold">₱</span> 200</h1>
                                <h1 class="text-center mt-6">Shipping Fee: <span class="text-orange-500 font-bold">₱ 50 </span></h1>

                            </div>
                        </div>
                    </div>
                    <div class="col-span-6 shadow-lg p-8">
                        <div class="flex flex-row gap-4 justify-end items-end px-5">
                            <div class="flex gap-1">
                                <h1 class="">No. of items: </h1>
                                <h1 class="font-bold">2</h1>
                            </div>
                            <div class="flex gap-1">
                                <h1 class="">Order Total:</h1>
                                <h1 class="font-bold text-orange-500">₱ 200</h1>
                            </div>

                        </div>
                    </div>
                    <div class="col-span-6 grid grid-cols-6 gap-4  p-6 rounded-lg shadow-lg ">
                        <div class="col-span-6 mt-4 ">
                            <form action="{{ route('checkout.process') }}" method="POST">
                                @csrf
                                <div class="flex flex-col gap-4 justify-end items-end p-4">
                                    <div class="flex gap-1">
                                        <h1 class="">Items Sub Total:</h1>
                                        <h1 class="font-bold"> 200</h1>
                                    </div>
                                    <div class="flex gap-1">
                                        <h1 class="">Shipping Sub Total:</h1>
                                        <h1 class="font-bold">₱ 200</h1>
                                    </div>
                                    <div class="flex gap-1">
                                        <h1 class="font-bold text-2xl">Total Payment </h1>
                                        <h1 class="text-orange-500 font-bold text-2xl">₱ 1,050</h1>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-span-6 mt-4">
                                    <div class="flex flex-col gap-4 justify-end items-end">
                                        <button type="submit" class="bg-orange-500 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded-xl w-full xl:w-[15rem] xl:h-12">Proceed</button>

                                    </div>

                                </div>

                        </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>
    </div>
</body>


<!-- Footer -->
<x-footer bgColor=" bg-gradient-to-r from-orange-600" />

</html>