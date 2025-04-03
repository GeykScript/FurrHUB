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
                    <a href="{{route('shoppingCart')}}" class="hover:underline hover:text-orange-400">Shopping Cart</a>
                    <div> > </div>
                    <a href="{{route('checkoutPage')}}" class="hover:underline text-orange-500">Check Out Products</a>
                </div>
            </div>


            <div>
                <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-8 md:px-[10rem] mt-10">
                    <div class="col-span-6 lg:col-span-6 grid grid-cols-6 gap-4 bg-orange-200 p-8 rounded-lg">
                        <div class="col-span-6 px-2 flex gap-2 text-lg">
                            <i data-lucide="map-pin-house" class="text-orange-500 "></i>
                            <h1 class="font-bold  text-orange-500 ">Delivery Address</h1>
                        </div>
                        <div class="col-span-6 lg:col-span-1">
                            <div class="flex flex-col font-bold lg:text-lg px-2">
                                <h1 class="text-left flex gap-2"><i data-lucide="user"></i> {{$user->first_name}} {{$user->last_name}}</h1>
                                <h1 class="text-left flex gap-2"><i data-lucide="phone-call"> </i> {{$user->phone}} </h1>
                            </div>
                        </div>
                        <div class="col-span-6 lg:col-span-4">
                            <h1 class=" lg:text-lg"> {{$defaultAddress->street}}, {{$defaultAddress->barangay}} ,{{$defaultAddress->city}} ,{{$defaultAddress->province}}, {{$defaultAddress->postal_code}} ({{$defaultAddress->description}})</h1>
                        </div>
                        <div class="col-span-1 lg:col-span-1 flex justify-end gap-4 items-center">
                            <div class="border-2 border-orange-500 rounded-lg p-2  text-orange-500 items-center justify-center">
                                <h1 class="text-center">Default</h1>
                            </div>
                            <div class=" rounded-lg p-4 text-sky-500 font-bold items-center justify-center">
                                <button class="text-center">Change</button>
                            </div>
                        </div>
                    </div>
                    @php
                    $count = 0;
                    @endphp

                    @foreach($cartItems as $cartItem)
                    @php
                    if ($cartItem->quantity) {
                    $count++;
                    }
                    @endphp


                    <div class="col-span-6 grid grid-cols-6 gap-4  p-4 rounded-lg shadow-lg">
                        <div class="col-span-6 px-8 ">
                            <h1 class="font-bold">Product Ordered</h1>
                        </div>
                        <div class="col-span-6 lg:col-span-1">
                            <div class="flex flex-col items-center justify-center">
                                <img src="{{ asset('storage/Products/' . $cartItem->product->image_url) }}" alt="Best-Product" class="aspect-square w-32 rounded-lg bg-gray-500 object-cover lg:aspect-auto lg:h-74">
                            </div>
                        </div>
                        <div class="col-span-6 lg:col-span-2 p-4">
                            <p class="font-semibold text-lg">{{$cartItem->product->name}}</p>
                            <p class="mt-2">Retail Price: <span class="font-semibold">₱ {{number_format($cartItem->product->price,2)}}</span></p>
                            <p>Discount: <span class="font-bold">{{$cartItem->product->discount_value}}</span></p>
                            <h1 class="mt-6">Shipping Fee: <span class="text-orange-500 font-bold">₱ 50 </span></h1>
                        </div>
                        <div class="col-span-6 lg:col-span-1">
                            <div class="flex flex-col gap-2">
                                <h1 class="text-center font-bold">Unit Price</h1>
                                <h1 class="text-center"><span class="font-bold">₱</span> {{number_format($cartItem->product->discounted_price,2)}}</h1>
                            </div>
                        </div>
                        <div class="col-span-6 lg:col-span-1">
                            <div class="flex flex-col gap-2">
                                <h1 class="text-center font-bold">Quantity</h1>
                                <h1 class="text-center">{{$cartItem->quantity}}</h1>
                            </div>
                        </div>
                        <div class="col-span-6 lg:col-span-1">
                            <div class="flex flex-col gap-2">
                                <h1 class="text-center font-bold">Item Sub Total</h1>
                                @php
                                $total_price = $cartItem->quantity * $cartItem->product->discounted_price;
                                @endphp
                                <h1 class="text-center text-orange-500"><span class="font-bold">₱</span> {{ number_format($total_price,2)}}</h1>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-span-6 shadow-lg p-8">
                        <div class="flex flex-col md:flex-row lg:gap-10  justify-end items-end px-5">
                            <div class="flex gap-1 lg:text-xl text-sm">
                                <h1 class="">No. of items: </h1>
                                <h1 class="font-bold text-orange-500">{{$total_quantity}}</h1>
                            </div>
                            <div class="flex gap-1 lg:text-xl text-sm">
                                <h1 class="">Order Total:</h1>
                                <h1 class="font-bold text-orange-500 ">₱ {{number_format($total_amount,2)}}</h1>
                            </div>

                        </div>
                    </div>
                    <div class="col-span-6 grid grid-cols-6 gap-4  p-6 rounded-lg shadow-lg ">
                        <div class="col-span-6 mt-4 ">
                            <form action="{{ route('checkout.process') }}" method="POST">
                                @csrf
                                <input type="hidden" name="quantity" value="{{$cartItem->quantity}}">
                                <input type="hidden" name="discounted_price" value="{{$cartItem->product->discounted_price}}">
                                <input type="hidden" name="retail_price" value="{{$cartItem->product->price}}">
                                <input type="hidden" name="total_price" value="{{$total_price}}">
                                <input type="hidden" name="total_quantity" value="{{$total_quantity}}">
                                <input type="hidden" name="total_amount" value="{{$total_amount}}">
                                <input type="hidden" name="shipping_fee" value="50">
                                <input type="hidden" name="product_id" value="{{$cartItem->product->product_id}}">

                                <div class="flex flex-col lg:gap-4 gap-1 justify-end items-end lg:p-4 p-1">
                                    <div class="flex gap-1 text-sm lg:text-lg">
                                        <h1 class="">Items Sub Total:</h1>
                                        <h1 class="font-bold">₱ {{number_format($total_amount,2)}}</h1>
                                    </div>

                                    <div class="flex gap-1 text-sm lg:text-lg">
                                        <h1 class="">Shipping Sub Total:</h1>
                                        @php
                                        $shipping_fee = 50;
                                        $shipping_fee = $shipping_fee * $count;
                                        @endphp
                                        <h1 class="font-bold">₱ {{number_format($shipping_fee,2)}}</h1>
                                    </div>

                                    <div class="flex gap-1 mt-3">
                                        <h1 class="font-bold lg:text-2xl text-lg">Total Payment </h1>
                                        <h1 class="text-orange-500 font-bold lg:text-2xl text-lg">₱ {{number_format($total_amount + $shipping_fee,2)}}</h1>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-span-6 mt-4">
                                    <div class="flex flex-col gap-4 justify-end items-end">
                                        <button type="submit" class="bg-orange-500 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded-xl w-full xl:w-[15rem] xl:h-12">Place Order</button>
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