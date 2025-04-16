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


<script>
    document.addEventListener("DOMContentLoaded", function() {
        filterOrders("All"); // default filter on page load
    });

    function filterOrders(category) {
        const orders = document.querySelectorAll(".orders");
        let hasVisible = false;

        orders.forEach(order => {
            const orderCategory = order.getAttribute("data-category")?.trim();
            if (category == "All" || orderCategory === category) {
                order.style.display = "flex";
                hasVisible = true;
            } else {
                order.style.display = "none";
            }
        });

        const noMsg = document.getElementById("noOrdersMessage");
        if (noMsg) noMsg.style.display = hasVisible ? "none" : "block";

        updateActiveTab(category);
    }

    function updateActiveTab(activeTab) {
        document.querySelectorAll(".filter-tab").forEach(tab => {
            if (tab.getAttribute("data-filter") === activeTab) {
                tab.classList.add("border-orange-500", "text-orange-500", "font-bold");
            } else {
                tab.classList.remove("border-orange-500", "text-orange-500", "font-bold");
            }
        });
    }
</script>

<!-- bg-[#60E1FF] blue -->
<!-- F0A02C  orange-->
<!-- 38B6FF -->
<!-- nav part -->
<x-nav-bar />
<div class="pt-[100px]"></div>

<!-- catergory part -->

<body class="font-sans antialiased bg-white-400 dark:text-black/50 min-h-screen flex flex-col">
    <div class="bg-white flex-1">

        <div class="md:px-[12rem]  px-2 mt-10">
            <div class="flex flex-row items-center justify-start md:px-10 px-2 mt-5 h-20  ">
                <div class="flex flex-row items-center md:gap-2 gap-1 ">
                    <div> <i data-lucide="shopping-bag" class="md:w-12 md:h-12 w-6 h-6 text-orange-500 mx-auto"></i></div>
                    <h1 class="md:text-4xl text-md font-bold text-orange-500 ">My Orders</h1>
                </div>
            </div>
        </div>
        <div class="mt-2 w-full">
            <div class="md:px-[15rem] flex gap-5 items-center px-4  text-sm md:text-lg">
                <a href="{{route('dashboard')}}" class="hover:underline hover:text-orange-400">Dashboard</a>
                <div> > </div>
                <a href="{{route('orders')}}" class="hover:underline text-orange-500">Orders</a>
            </div>
        </div>

        <div class="flex flex-col items-center justify-center w-full px-4">
            <!-- Filters -->
            <div class="flex flex-row mt-6 text-[12px] md:text-lg">
                <button class="text-wrap px-3 sm:px-8 py-2 filter-tab border-b-2 w-full sm:w-auto text-center" data-filter="All" onclick="filterOrders('All')">All</button>
                <button class="text-wrap px-3 sm:px-8 py-2 filter-tab border-b-2 w-full sm:w-auto text-center" data-filter="To Ship" onclick="filterOrders('To Ship')">To Ship</button>
                <button class="text-wrap px-3 sm:px-8 py-2 filter-tab border-b-2 w-full sm:w-auto text-center" data-filter="Delivered" onclick="filterOrders('Delivered')">Delivered</button>
                <button class="text-wrap px-3 sm:px-8 py-2 filter-tab border-b-2 w-full sm:w-auto text-center" data-filter="Cancelled" onclick="filterOrders('Cancelled')">Cancelled</button>
            </div>
        </div>

        <div class="flex flex-col items-center justify-center w-full px-4">
            @foreach ($all_orders as $order)
            @php
            $statusName = $order->statuses->status_name ?? null;

            $category = match ($statusName) {
            'To Ship' => 'To Ship',
            'Delivered' => 'Delivered',
            'Cancelled' => 'Cancelled',
            default => 'All',
            };

            $items = $order_items->where('order_id', $order->order_id);

            @endphp

            <div class="orders flex flex-col lg:flex-row items-center lg:items-start gap-6 p-6 md:px-12 mt-6 border pb-6 w-full max-w-5xl mx-auto rounded-lg shadow-md bg-white" data-category="{{ $category }}">

                <!-- Order Details -->
                <div class="flex-1 text-center lg:text-left gap-2">
                    <h2 class="text-xl font-bold flex justify-end">
                        @if ($order->statuses->status_name == 'Delivered')
                        <span class="text-green-500">{{$order->statuses->status_name}}</span>
                        @elseif ($order->statuses->status_name == 'To Ship')
                        <span class="text-orange-500">{{$order->statuses->status_name}}</span>
                        @elseif ($order->statuses->status_name == 'Cancelled')
                        <span class="text-red-500">{{$order->statuses->status_name}}</span>
                        @endif
                    </h2>
                    @php
                    $total_item = 0;
                    @endphp

                    @foreach ($items as $order_item)
                    @php

                    $total_item = $order_item->quantity + $total_item; ;
                    @endphp
                    <div class="flex flex-col lg:flex-row items-center gap-4 px-12  border-b-2 py-2 ">
                        <!-- Image Section -->
                        <div class="flex-shrink-0">
                            <img src="{{ asset('storage/Products/' . $order_item->product->image_url) }}" alt="Order Image" class="w-20 h-20 rounded-lg object-cover">
                        </div>
                        <div class=" w-full flex justify-between items-center gap-2">
                            <h1 class="text-wrap">{{$order_item->product->name}}</h1>
                            <div class="flex gap-5 items-center">
                                <h1>x{{$order_item->quantity}}</h1>
                                <h1>₱ {{$order_item->price}}</h1>
                            </div>

                        </div>
                    </div>
                    @endforeach
                    <!-- Details Toggle -->
                    <details class="mt-3 px-12 ">
                        <summary class="cursor-pointer text-gray-500 hover:text-gray-600 font-bold py-2 px-4 rounded-lg text-sm text-end ">
                            View Details
                        </summary>
                        <div class="mt-2 p-4 px-12 border rounded-lg bg-gray-100">
                            <div>
                                <h1>Total Amount: <span class="font-semibold"> ₱ {{$order->total_amount}}</span></h1>
                                <h1>Total Items: {{$total_item}} items</h1>
                                <h1 class="flex ">{{$order->payment->payment_name}} - {{$order->payment_status_relation?->status_name}}</h1>
                            </div>

                            @if ($order->payment_status_relation?->status_name == 'Not Paid')
                            <div class="flex justify-end items-end">
                                <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 mt-2" onclick="cancelModal(this)" data-id="{{ $order->order_id }}">Cancel Order</button>
                            </div>
                            @endif

                            @if ($order->statuses->status_name == 'Delivered')
                            <div class="flex justify-end items-end">
                                <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 mt-2" onclick="cancelModal(this)" data-id="{{ $order->order_id }}">Review Order</button>
                            </div>
                            @endif
                        </div>
                    </details>
                </div>
            </div>
            @endforeach
            <div id="noOrdersMessage" class="hidden text-center mt-10 text-gray-500 text-lg font-semibold">
                <div class="flex justify-center items-center">
                    <img src="{{ asset('logo/furrhub.png') }}"
                        alt="Notification Image"
                        class="w-32 h-32 rounded-lg object-contain">
                </div>
                <p> No Orders. </p>

            </div>
        </div>
    </div>
    </div>



    <x-return-top />

</body>
<!-- Footer -->
<x-footer bgColor=" bg-gradient-to-r from-orange-600" class="" />

</html>