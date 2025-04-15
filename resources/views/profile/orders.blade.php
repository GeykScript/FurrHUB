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
                <button class="text-wrap px-3 sm:px-8 py-2 filter-tab border-b-2 w-full sm:w-auto text-center" data-filter="Paid" onclick="filterOrders('Paid')">Paid</button>
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
            'Paid' => 'Paid',
            'To Ship' => 'To Ship',
            'Delivered' => 'Delivered',
            'Cancelled' => 'Cancelled',
            default => 'All',
            };

            $items = $order_items->where('order_id', $order->order_id);

            @endphp

            <div class="orders flex flex-col lg:flex-row items-center lg:items-start gap-6 p-6 md:px-12 mt-6 border pb-6 w-full max-w-5xl mx-auto rounded-lg shadow-md bg-white" data-category="{{ $category }}">
                <!-- Image Section -->
                <div class="flex-shrink-0">
                    <img src="{{ asset('logo/furrhub.png') }}" alt="Order Image" class="w-32 h-32 rounded-lg object-contain">
                </div>

                <!-- Order Details -->
                <div class="flex-1 text-center lg:text-left gap-2">
                    <h2 class="text-xl font-bold flex flex-row justify-between items-center">
                        Reference Number: {{ $order->reference_number }}

                    </h2>

                    <p class="text-lg text-gray-500 flex flex-row gap-4">
                        <b>Date:</b> {{ $order->created_at }}
                    </p>

                    <!-- Details Toggle -->
                    <details class="mt-3">
                        <summary class="cursor-pointer bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg text-sm inline-block">
                            View Details
                        </summary>
                        <div class="mt-2 p-4 border rounded-lg bg-gray-100">
                            @foreach ($items as $order_item)
                            <div>
                                <h1>{{$order_item->product->name}}</h1>
                            </div>
                            @endforeach
                            @if ($order->status == 1)
                            <div class="flex justify-end items-end">
                                <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 mt-2" onclick="cancelModal(this)" data-id="{{ $order->order_id }}">Cancel Appointment</button>
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