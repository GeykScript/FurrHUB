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
<dialog id="cancelOrder" class="p-6 rounded-lg shadow-lg w-full max-w-md backdrop:bg-black/30 border-none outline-none">
    <div class="bg-white p-6 rounded-lg text-center justify-center">
        <div class="flex justify-center items-center text-center">
            <i data-lucide="triangle-alert" class="text-center w-20 h-20 text-red-500"></i>
            <!-- Hidden input for appointment ID -->
            <form id="cancelOrderForm" method="POST" action="{{ route('orders.cancel-order') }}">
                @csrf
                <input type="hidden" name="order_id" id="order_id">
            </form>
        </div>
        <p class="mt-2 text-lg text-gray-800">Are you sure you want to cancel this order?</p>
        <div class="flex justify-center mt-4">
            <!-- Button to submit the form and cancel the appointment -->
            <button id="confirmDeleteBtn" class="mr-4 w-full outline-none focus:outline-none border-white bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600" onclick="document.getElementById('cancelOrderForm').submit();">
                Yes
            </button>
            <!-- Button to close the modal without cancellation -->
            <button onclick="document.getElementById('cancelOrder').close();" class="w-full outline-none focus:outline-none border-red-500 bg-white text-red-600 py-2 px-4 rounded-lg hover:border-red-600 hover:bg-red-100">
                No
            </button>
        </div>
    </div>
</dialog>

<dialog id="reviewOrder" class="p-6 rounded-lg shadow-lg w-full max-w-lg backdrop:bg-black/30 border-none outline-none">
    <div class="bg-white p-6 rounded-lg text-center justify-center">


        <!-- Hidden input for appointment ID -->
        <form id="reviewOrderForm" method="POST" action="{{ route('orders.review-order') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="order_ids" id="order_ids">
            <input type="hidden" name="product_ids" id="product_ids">
            <input type="hidden" id="rating" name="rating" value="5">

            <p class="mt-2 text-xl  text-gray-800">Rate Order</p>
            <p class="text-sm text-gray-500">Please rate your order experience.</p>
            <div class="flex justify-center items-center text-center">
                <i data-lucide="star" class="text-center w-12 h-20 text-yellow-400"></i>
                <i data-lucide="star" class="text-center w-12 h-20 text-yellow-400"></i>
                <i data-lucide="star" class="text-center w-12 h-20 text-yellow-400"></i>
                <i data-lucide="star" class="text-center w-12 h-20 text-yellow-400"></i>
                <i data-lucide="star" class="text-center w-12 h-20 text-yellow-400"></i>
            </div>
            <div class="w-full mt-4">
                <label for="description" class="block text-gray-700 mt-4">Description</label>
                <p class="text-sm text-gray-500">Please provide a brief description of your experience.</p>
                <input type="text" id="description" name="description" class="w-full focus:outline-none focus:border-orange-200 focus:ring-1 focus:ring-orange-200 border-gray-300 rounded-md mt-2 px-3 py-2" placeholder="Write your review here..." required>

            </div>
            <div class="mt-4">
                <label for="uploadPhoto" class="block text-gray-700">Upload Photo</label>
                <p class="text-sm text-gray-500">Optional: Upload a photo related to your order.</p>
                <div class="border-dashed border-2  text-center rounded-lg cursor-pointer mt-2 w-full h-20 flex items-center justify-center hover:bg-gray-100" onclick="document.getElementById('uploadPhoto').click()">
                    <p id="text-uploadPhoto" class="text-gray-500">
                        Drag your photo here or <span class="text-orange-500 cursor-pointer">Browse from device</span>
                    </p>
                    <p id="fileName-uploadPhoto" class="mt-2 text-sm text-orange-600 px-3 py-1 rounded-md w-fit max-w-full truncate" hidden></p>
                    <input type="file" id="uploadPhoto" name="uploadPhoto" class="hidden" accept="image/*">
                </div>
            </div>
        </form>
        <div class="flex justify-center mt-4">
            <!-- Button to submit the form and cancel the appointment -->
            <button id="confirmDeleteBtn" class="mr-4 w-full outline-none focus:outline-none border-white bg-orange-500 text-white py-2 px-4 rounded-lg hover:bg-orange-600" onclick="document.getElementById('reviewOrderForm').submit();">
                Rate
            </button>
            <!-- Button to close the modal without cancellation -->
            <button onclick="document.getElementById('reviewOrder').close();" class="w-full outline-none focus:outline-none border-orange-500 bg-white text-orange-600 py-2 px-4 rounded-lg hover:border-orange-600 hover:bg-orange-100">
                Cancel
            </button>
        </div>
    </div>
</dialog>


<script>
    document.getElementById('uploadPhoto').addEventListener('change', function() {
        const fileNameDisplay = document.getElementById('fileName-uploadPhoto');
        const text = document.getElementById('text-uploadPhoto');

        if (this.files.length > 0) {
            fileNameDisplay.removeAttribute('hidden');
            fileNameDisplay.textContent = `📁 Selected file: ${this.files[0].name}`;
            text.textContent = '';
        } else {
            fileNameDisplay.textContent = '';
            text.textContent = 'Drag your photo here or Browse from device';
        }
    });


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

    function cancelModal(button) {
        document.getElementById('order_id').value = button.getAttribute('data-id');
        document.getElementById('cancelOrder').showModal();
    }

    function reviewModal(button) {
        document.getElementById('order_ids').value = button.getAttribute('data-order-id');
        document.getElementById('product_ids').value = button.getAttribute('data-items');

        document.getElementById('reviewOrder').showModal();
    }

    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('[data-lucide="star"]');
        const ratingInput = document.getElementById('rating');

        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                // Set fill for all stars up to the clicked one
                stars.forEach((s, i) => {
                    if (i <= index) {
                        s.setAttribute('fill', '#F6CD29');
                    } else {
                        s.setAttribute('fill', 'white');
                    }
                });

                // Update the input value
                ratingInput.value = index + 1;
            });
        });
    });
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
                    <h2 class="text-lg font-bold flex justify-end px-4">
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

                    @php
                    $productIds = $items->pluck('product_id')->implode(',');
                    @endphp
                    <div class="flex flex-col lg:flex-row items-center gap-4 px-12  border-b-2 py-2 ">
                        <!-- Image Section -->
                        <div class="flex-shrink-0">
                            <img src="{{ asset('storage/Products/' . $order_item->product->image_url) }}" alt="Order Image" class="w-20 h-20 rounded-lg object-cover">
                        </div>
                        <div class=" w-full flex justify-between items-center gap-2">
                            <h1 class="text-wrap font-semibold">{{$order_item->product->name}}</h1>
                            <div class="flex gap-5 items-center">
                                <h1>x{{$order_item->quantity}}</h1>
                                <h1>₱ {{$order_item->price}}</h1>
                            </div>

                        </div>
                    </div>
                    @endforeach

                    @if ($order->statuses->status_name == 'Delivered' && !in_array($order->order_id, $reviewed_orders) && $order->payment_status_relation?->status_name == 'Paid')
                    <div class="flex justify-end items-end text-sm mt-2 text-gray-600">
                        <h1 class="italic">Please review your order. It will be automatically marked as reviewed after 3 days.</h1>
                    </div>
                    @elseif ($order->statuses->status_name == 'Delivered' && in_array($order->order_id, $reviewed_orders) && $order->payment_status_relation?->status_name == 'Paid')
                    <div class="flex justify-end items-end text-sm mt-2 text-green-500">
                        <h1 class="italic">This order has already been reviewed.</h1>
                    </div>
                    @endif

                    <!-- Details Toggle -->
                    <div class="flex justify-end items-end">

                        <details class="mt-3 max-w-md w-full">
                            <summary class="cursor-pointer text-gray-500 hover:text-gray-600 font-bold py-2 px-4 rounded-lg text-sm text-end ">
                                View Details
                            </summary>
                            <div class="mt-2 p-4  border rounded-lg bg-gray-50">

                                <div class="flex flex-col gap-2 px-10">
                                    <h1>Shipping Fee: <span class="font-semibold"> ₱ 50</span></h1>
                                    <h1>Total Amount: <span class="font-semibold"> ₱ {{$order->total_amount}}</span></h1>
                                    <h1>Total Items: <span class="font-semibold"> {{$total_item}} items</span></h1>
                                    <h1>Payment Method: <span class="font-semibold">{{$order->payment->payment_name}}</span></h1>
                                    <h1>Payment Status: <span class="font-semibold">{{$order->payment_status_relation?->status_name}}</span></h1>
                                </div>

                                @if ($order->payment_status_relation?->status_name == 'Not Paid' && $order->statuses->status_name == 'To Ship')
                                <div class="flex justify-end items-end">
                                    <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 mt-2" onclick="cancelModal(this)" data-id="{{ $order->order_id }}">Cancel Order</button>
                                </div>
                                @endif

                                @if ($order->statuses->status_name == 'Delivered' && !in_array($order->order_id, $reviewed_orders) && $order->payment_status_relation?->status_name == 'Paid')
                                <div class=" w-full flex justify-center items-center px-10">
                                    <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 w-full mt-2"
                                        onclick="reviewModal(this)"
                                        data-order-id="{{ $order->order_id }}"
                                        data-items="{{ $productIds }}">Rate Order</button>
                                </div>
                                @endif
                            </div>
                        </details>
                    </div>
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