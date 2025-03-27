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
        filterOrders("All"); // Show all orders by default
    });

    function filterOrders(status) {
        let orders = document.querySelectorAll(".order-item");

        orders.forEach(order => {
            let orderStatus = order.getAttribute("data-status");

            if (status === "All" || orderStatus === status) {
                order.style.display = "flex";
            } else {
                order.style.display = "none";
            }
        });

        updateActiveTab(status);
    }

    function updateActiveTab(activeTab) {
        let tabs = document.querySelectorAll(".filter-tab");
        tabs.forEach(tab => {
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
            <div class="flex flex-row  mt-6 text-[12px] md:text-lg">
                <button class="text-wrap px-3 sm:px-8 py-2 filter-tab border-b-2 w-full sm:w-auto text-center" data-filter="All" onclick="filterOrders('All')">All</button>
                <button class="text-wrap px-3 sm:px-8 py-2 filter-tab border-b-2 w-full sm:w-auto text-center" data-filter="To Pay" onclick="filterOrders('To Pay')">To Pay</button>
                <button class="text-wrap px-3 sm:px-8 py-2 filter-tab border-b-2 w-full sm:w-auto text-center" data-filter="To Ship" onclick="filterOrders('To Ship')">To Ship</button>
                <button class="text-wrap px-3 sm:px-8 py-2 filter-tab border-b-2 w-full sm:w-auto text-center" data-filter="Delivered" onclick="filterOrders('Delivered')">Delivered</button>
                <button class="text-wrap px-3 sm:px-8 py-2 filter-tab border-b-2 w-full sm:w-auto text-center" data-filter="Cancelled" onclick="filterOrders('Cancelled')">Cancelled</button>
            </div>
        </div>
        <div class="order-item flex flex-col lg:flex-row items-center lg:items-start gap-6 p-6 md:px-12 mt-6 border pb-6 w-full max-w-5xl mx-auto rounded-lg shadow-md bg-white" data-status="Delivered">
            <!-- Image Section -->
            <div class="flex-shrink-0">
                <img src="{{ asset('images/products/dog.jpg') }}"
                    alt="Notification Image"
                    class="w-32 h-32 rounded-lg object-cover bg-gray-500">
            </div>
            <div class="flex-1 text-center lg:text-left">
                <h2 class="text-xl font-bold">Parcel has been delivered</h2>
                <p class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio dolorum ipsum ducimus, provident ipsam veritatis cum animi qui nemo eum nulla modi id? Ea quam veritatis dolorem, officia nam eos.</p>
                <p class="text-gray-500">x2</p>
            </div>
            <div class="flex flex-col items-right gap-12 justify-between">
                <p class="text-green-500 font-bold text-right">Delivered</p>
                <p class="font-bold text-gray-700">Order Total: <span class="text-orange-500">₱ 400.00 </span></p>
            </div>
        </div>
        <div class="order-item flex flex-col lg:flex-row items-center lg:items-start gap-6 p-6 md:px-12 mt-6 border pb-6 w-full max-w-5xl mx-auto rounded-lg shadow-md bg-white" data-status="To Pay">
            <!-- Image Section -->
            <div class="flex-shrink-0">
                <img src="{{ asset('images/products/dog.jpg') }}"
                    alt="Notification Image"
                    class="w-32 h-32 rounded-lg object-cover bg-gray-500">
            </div>
            <div class="flex-1 text-center lg:text-left">
                <h2 class="text-xl font-bold">Awaiting payment</h2>
                <p class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio dolorum ipsum ducimus, provident ipsam veritatis cum animi qui nemo eum nulla modi id? Ea quam veritatis dolorem, officia nam eos.</p>
                <p class="text-gray-500">x2</p>
            </div>
            <div class="flex flex-col items-right gap-12 justify-between">
                <p class="text-yellow-500 font-bold text-right">To Pay</p>
                <p class="font-bold text-gray-700">Order Total: <span class="text-orange-500">₱ 400.00 </span></p>
            </div>
        </div>
        <div class="order-item flex flex-col lg:flex-row items-center lg:items-start gap-6 p-6 md:px-12 mt-6 border pb-6 w-full max-w-5xl mx-auto rounded-lg shadow-md bg-white" data-status="To Ship">
            <!-- Image Section -->
            <div class="flex-shrink-0">
                <img src="{{ asset('images/products/dog.jpg') }}"
                    alt="Notification Image"
                    class="w-32 h-32 rounded-lg object-cover bg-gray-500">
            </div>
            <div class="flex-1 text-center lg:text-left">
                <h2 class="text-xl font-bold">Parcel is being prepared</h2>
                <p class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio dolorum ipsum ducimus, provident ipsam veritatis cum animi qui nemo eum nulla modi id? Ea quam veritatis dolorem, officia nam eos.</p>
                <p class="text-gray-500">x2</p>
            </div>
            <div class="flex flex-col items-right gap-12 justify-between">
                <p class="text-sky-500 font-bold text-right">To Ship</p>
                <p class="font-bold text-gray-700">Order Total: <span class="text-orange-500">₱ 400.00 </span></p>
            </div>
        </div>
        <div class="order-item flex flex-col lg:flex-row items-center lg:items-start gap-6 p-6 md:px-12 mt-6 border pb-6 w-full max-w-5xl mx-auto rounded-lg shadow-md bg-white" data-status="Cancelled">
            <!-- Image Section -->
            <div class="flex-shrink-0">
                <img src="{{ asset('images/products/dog.jpg') }}"
                    alt="Notification Image"
                    class="w-32 h-32 rounded-lg object-cover bg-gray-500">
            </div>
            <div class="flex-1 text-center lg:text-left">
                <h2 class="text-xl font-bold">Parcel has been cancelled</h2>
                <p class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio dolorum ipsum ducimus, provident ipsam veritatis cum animi qui nemo eum nulla modi id? Ea quam veritatis dolorem, officia nam eos.</p>
                <p class="text-gray-500">x2</p>
            </div>
            <div class="flex flex-col items-right gap-12 justify-between">
                <p class="text-red-500 font-bold text-right">Cancelled</p>
                <p class="font-bold text-gray-700">Order Total: <span class="text-orange-500">₱ 400.00 </span></p>
            </div>
        </div>

    </div>

    </div>



    <x-return-top />

</body>
<!-- Footer -->
<x-footer bgColor=" bg-gradient-to-r from-orange-600" class="" />

</html>