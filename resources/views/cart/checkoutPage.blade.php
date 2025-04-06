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


<!--Modal for Showing Address-->
<dialog id="addressModal" class="p-6 rounded-lg shadow-lg w-full max-w-lg backdrop:bg-black/30 focus:outline-none">
    <form method="POST" action="{{ route('checkoutPage') }}" class="relative bg-white p-6 rounded-lg">
        @csrf
        <input type="text" name="selected_items" id="selected_item" value="{{ $product_ids }}" hidden>
        <div class="absolute top-2 right-2  focus:outline-none">
            <a href="{{ route('shoppingCart') }}" class="focus:outline-none"> <img src=" {{asset ('logo/x.svg')}}" alt="cancel" class="h-5 w-5 md:h-7 md:w-7 hover:cursor-pointer focus:outline-none" /> </a>
        </div>
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Create Address</h2>
        <div class="grid lg:grid-cols-2 gap-4">
            <div>
                <x-input-label for="fullname">Full Name</x-input-label>
                <x-text-input type="text" id="fullname" name="fullname" class="border p-2 rounded w-full mt-1" required></x-text-input>
            </div>
            <div>
                <x-input-label for="contact_number">Contact Number</x-input-label>
                <x-text-input type="text" id="contact_number" name="contact_number" class="border p-2 rounded w-full mt-1" required></x-text-input>
            </div>
        </div>

        <div class="mt-4">
            <x-input-label for="province">Province</x-input-label>
            <x-text-input type="text" id="province" name="province" class="border p-2 rounded w-full mt-1" required></x-text-input>
        </div>

        <div class="mt-4">
            <x-input-label for="city">City</x-input-label>
            <x-text-input type="text" id="city" name="city" class="border p-2 rounded w-full mt-1" required></x-text-input>
        </div>

        <div class="mt-4">
            <x-input-label for="barangay">Barangay</x-input-label>
            <x-text-input type="text" id="barangay" name="barangay" class="border p-2 rounded w-full mt-1" required></x-text-input>
        </div>

        <div class="grid lg:grid-cols-2 gap-4">
            <div class="mt-4">
                <x-input-label for="street">Street, Building, House No.</x-input-label>
                <x-text-input type="text" id="street" name="street" class="border p-2 rounded w-full mt-1" required></x-text-input>
            </div>

            <div class="mt-4">
                <x-input-label for="postal_code">Postal Code</x-input-label>
                <x-text-input type="text" id="postal_code" name="postal_code" class="border p-2 rounded w-full mt-1" required></x-text-input>
            </div>
        </div>

        <div class="mt-4">
            <x-input-label for="description">Description</x-input-label>
            <x-text-input
                type="text"
                id="description"
                name="description"
                placeholder="e.g., Landmark, house color, etc."
                class="border p-2 rounded w-full mt-1"
                required>
            </x-text-input>
        </div>

        <div class="mt-4 flex items-center">
            <label for="default" class="inline-flex items-center cursor-pointer">
                <input id="default" type="checkbox" name="default" checked
                    class="rounded border-gray-300 text-sky-600 w-[1.3rem] h-[1.3rem]"
                    onclick="return false;">
                <span class="ml-2 text-md text-gray-600">Set as Default Address</span>
            </label>
        </div>

        <div class="flex justify-end gap-5 mt-6 items-center">
            <a href="{{ route('shoppingCart') }}" class="text-orange-500 hover:text-orange-600">Cancel</a>

            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg">Create</button>
        </div>
    </form>
</dialog>

<!-- Modal for creating address -->
<dialog id="AddaddressModal" class="p-6 rounded-lg shadow-lg w-full max-w-lg backdrop:bg-black/30 focus:outline-none">
    <form method="POST" action="{{ route('checkoutPage') }}" class="relative bg-white p-6 rounded-lg">
        @csrf
        <input type="text" name="selected_items" id="selected_item" value="{{ $product_ids }}" hidden>
        <div class="absolute top-2 right-2  focus:outline-none">
            <p onclick="document.getElementById('AddaddressModal').close()" class="focus:outline-none"> <img src=" {{asset ('logo/x.svg')}}" alt="cancel" class="h-5 w-5 md:h-7 md:w-7 hover:cursor-pointer focus:outline-none focus:cursor-pointer" /> </p>
        </div>
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Create Address</h2>

        <div class="grid lg:grid-cols-2 gap-4">
            <div>
                <x-input-label for="fullname">Full Name</x-input-label>
                <x-text-input type="text" id="fullname" name="fullname" class="border p-2 rounded w-full mt-1" required></x-text-input>
            </div>
            <div>
                <x-input-label for="contact_number">Contact Number</x-input-label>
                <x-text-input type="text" id="contact_number" name="contact_number" class="border p-2 rounded w-full mt-1" required></x-text-input>
            </div>
        </div>

        <div class="mt-4">
            <x-input-label for="province">Province</x-input-label>
            <x-text-input type="text" id="province" name="province" class="border p-2 rounded w-full mt-1" required></x-text-input>
        </div>

        <div class="mt-4">
            <x-input-label for="city">City</x-input-label>
            <x-text-input type="text" id="city" name="city" class="border p-2 rounded w-full mt-1" required></x-text-input>
        </div>

        <div class="mt-4">
            <x-input-label for="barangay">Barangay</x-input-label>
            <x-text-input type="text" id="barangay" name="barangay" class="border p-2 rounded w-full mt-1" required></x-text-input>
        </div>

        <div class="grid lg:grid-cols-2 gap-4">
            <div class="mt-4">
                <x-input-label for="street">Street, Building, House No.</x-input-label>
                <x-text-input type="text" id="street" name="street" class="border p-2 rounded w-full mt-1" required></x-text-input>
            </div>

            <div class="mt-4">
                <x-input-label for="postal_code">Postal Code</x-input-label>
                <x-text-input type="text" id="postal_code" name="postal_code" class="border p-2 rounded w-full mt-1" required></x-text-input>
            </div>
        </div>

        <div class="mt-4">
            <x-input-label for="description">Description</x-input-label>
            <x-text-input
                type="text"
                id="description"
                name="description"
                placeholder="e.g., Landmark, house color, etc."
                class="border p-2 rounded w-full mt-1"
                required>
            </x-text-input>
        </div>

        <div class="mt-4 flex items-center">
            <label for="default" class="inline-flex items-center cursor-pointer">
                <input id="default" type="checkbox" name="default" checked
                    class="rounded border-gray-300 text-sky-600 w-[1.3rem] h-[1.3rem]"
                    onclick="return false;">
                <span class="ml-2 text-md text-gray-600">Set as Default Address</span>
            </label>
        </div>

        <div class="flex justify-end gap-5 mt-6 items-center">
            <a onclick="document.getElementById('AddaddressModal').close()" class="text-orange-500 hover:text-orange-600 hover:cursor-pointer">Cancel</a>
            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg">Create</button>
        </div>
    </form>
</dialog>


<!-- Modal for Updating  address -->
<dialog id="changeAddressModal" class="p-6 rounded-lg shadow-lg w-full max-w-lg backdrop:bg-black/30 focus:outline-none">
    <form method="POST" action="{{ route('checkoutPage') }}" class="relative bg-white p-6 rounded-lg">
        @csrf
        <input type="text" name="selected_items" id="selected_item" value="{{ $product_ids }}" hidden>
        <div class="absolute top-2 right-2  focus:outline-none">
            <p onclick="document.getElementById('changeAddressModal').close()" class="focus:outline-none"> <img src=" {{asset ('logo/x.svg')}}" alt="cancel" class="h-5 w-5 md:h-7 md:w-7 hover:cursor-pointer focus:outline-none focus:cursor-pointer" /> </p>
        </div>
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Change Address</h2>
        <div class="flex flex-row gap-4">
            <div>
                <h2 class="text-md text-gray-800 mb-4">Please select your address:</h2>
                @foreach($addresses as $address)
                <label class="w-full flex items-center gap-2 px-4 py-2 rounded-lg text-gray-700 bg-white hover:bg-sky-100 mt-2">
                    <input id="update_address_{{ $address->address_id }}" type="radio" name="update_address_id"
                        class="peer h-5 w-5 text-sky-500 focus:ring-0 border-2 peer-checked:border-sky-400 border-gray-700"
                        value="{{ $address->address_id }}" {{ $address->default == 1 ? 'checked' : '' }}>
                    <span class="peer-checked:text-sky-600">
                        <i data-lucide="house" class="w-6 h-6 "></i>
                        {{$address->street}}, {{$address->barangay}}, {{$address->city}},
                        {{$address->province}}, {{$address->postal_code}} ({{$address->description}})
                    </span>
                </label>
                @endforeach
            </div>
        </div>
        <div class="mt-4 flex items-center p-4 text-orange-500 hover:text-orange-400 gap-2 border-t-2 border-b-2 border-orange-200  hover:cursor-pointer">
            <i data-lucide="house-plus" class="hover:cursor-pointer"></i>
            <a onclick="document.getElementById('AddaddressModal').showModal()" class="text-center hover:cursor-pointer font-semibold">Add address</a>
        </div>
        <div class="flex justify-end gap-5 mt-6 items-center">
            <a onclick="document.getElementById('changeAddressModal').close()" class="text-orange-500 hover:text-orange-600 hover:cursor-pointer">Cancel</a>
            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg">Change</button>
        </div>
    </form>
</dialog>


<!--Check if the address is empty-->
<!-- If the address is empty, show the modal to create a new address -->
@if($addresses->isEmpty())
<script>
    window.onload = function() {
        document.getElementById('addressModal').showModal();
    };
</script>
@endif



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
                    @if(!$addresses->isEmpty())
                    <div class="col-span-6 lg:col-span-6 grid grid-cols-6 gap-4 bg-orange-200 p-10 rounded-lg">
                        <div class="col-span-6 px-2 flex gap-2 text-xl">
                            <i data-lucide="map-pin-house" class="text-orange-500 "></i>
                            <h1 class="font-bold  text-orange-500 ">Delivery Address</h1>
                        </div>
                        <div class="col-span-6 lg:col-span-1">
                            <div class="flex flex-col gap-2 lg:gap-0 font-bold lg:text-lg px-2">
                                <h1 class="text-left flex gap-2"><i data-lucide="user"></i> {{$user->first_name}} {{$user->last_name}}</h1>
                                <h1 class="text-left flex gap-2"><i data-lucide="phone-call"> </i> {{$user->phone}} </h1>
                            </div>
                        </div>
                        <div class="col-span-6 lg:col-span-4">
                            <h1 class=" lg:text-xl"> {{$defaultAddress->street}}, {{$defaultAddress->barangay}} ,{{$defaultAddress->city}} ,{{$defaultAddress->province}}, {{$defaultAddress->postal_code}} ({{$defaultAddress->description}})</h1>
                        </div>
                        <div class="col-span-6 lg:col-span-1 flex justify-end gap-4 items-center">
                            <div class="border-2 border-orange-500 rounded-lg p-2  text-orange-500 items-center justify-center">
                                <h1 class="text-center">Default</h1>
                            </div>
                            <div class="rounded-lg p-4 text-sky-500 font-bold items-center justify-center">
                                <button onclick="document.getElementById('changeAddressModal').showModal()" class="text-center">Change</button>
                            </div>
                        </div>
                    </div>

                    @endif

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