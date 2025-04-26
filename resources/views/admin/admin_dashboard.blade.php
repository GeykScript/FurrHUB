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

<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="fixed top-0 left-0 w-72 h-full bg-white border-l shadow-lg z-50">
            <div class="p-4">
                <div class="flex items-center mb-6">
                    <img src="{{ asset('logo/logo1.png') }}" alt="FurrHub Logo" class="h-[60px] w-[130px] lg:h-[110px] lg:w-[245px]" />
                </div>

                <nav class="font-semibold">
                    <ul>
                        <li class="mb-2 border border-gray-300 shadow-sm rounded-lg">
                            <a href="{{ route('admin_dashboard') }}" class="block p-3 flex items-center text-base text-white bg-[#F0A02C] rounded transition duration-200">
                                <i data-lucide="house" class="w-7 h-7 pr-2 ml-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="mb-2 border border-gray-300 shadow-sm rounded-lg">
                            <a href="{{ route('admin_messages') }}" class="block p-3 flex items-center text-base text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="messages-square" class="w-7 h-7 pr-2 ml-2"></i>
                                Messages
                            </a>
                        </li>
                        <li class="mb-2 border border-gray-300 shadow-sm rounded-lg">
                            <a href="{{ route('admin_services') }}" class="block p-3 flex items-center text-base text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="heart" class="w-7 h-7 pr-2 ml-2"></i>
                                Services
                            </a>
                        </li>
                        <li class="mb-2 border border-gray-300 shadow-sm rounded-lg">
                            <a href="{{ route('admin_services_history') }}" class="block p-3 flex items-center text-base text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="notebook-text" class="w-7 h-7 pr-2 ml-2"></i>
                                Service History
                            </a>
                        </li>
                        <li class="mb-2 border border-gray-300 shadow-sm rounded-lg">
                            <a href="{{ route('admin_products') }}" class="block p-3 flex items-center text-base text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="shopping-basket" class="w-7 h-7 pr-2 ml-2"></i>
                                Manage Products
                            </a>
                        </li>
                        <li class="mb-2 border border-gray-300 shadow-sm rounded-lg">
                            <a href="{{ route('admin_orders') }}" class="block p-3 flex items-center text-base text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="shopping-cart" class="w-7 h-7 pr-2 ml-2"></i>
                                Orders
                            </a>
                        </li>
                        <li class="mb-2 border border-gray-300 shadow-sm rounded-lg">
                            <a href="{{ route('admin_appointments') }}" class="block p-3 flex items-center text-base text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="notepad-text" class="w-7 h-7 pr-2 ml-2"></i>
                                Appointments
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="absolute bottom-0 w-full p-4">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-[#4B4B4B] text-white font-semibold py-2 rounded hover:bg-gray-400 transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-400">
                        Log Out
                    </button>
                </form>
            </div>
        </div>


        <!-- Main Content -->
        <main class=" ml-72 w-full bg-gray-100">
            <!-- Top Bar -->
            <div class="bg-[#F0A02C] shadow-sm h-26">
                <div class="max-w-full mx-auto px-4 py-3 flex justify-between items-center">
                    <div class="flex items-center">
                        <i data-lucide="calendar-clock" class=" w-16 h-16 pr-2 ml-4 text-white"></i>
                        <div id="datetime" class="text-2xl text-white font-bold mr-6 ml-4"></div>
                    </div>
                    <div class="flex items-center ">
                        <div class="flex items-center justify-between ">
                            <span class="text-2xl text-black  font-semibold">{{$admin->fname}} {{$admin->lname}}</span>
                            <i data-lucide="circle-user" class=" w-10 h-10 pr-2 ml-2"> </i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dashboard Content -->
            <div class="p-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <div class="bg-white rounded-lg shadow p-4 flex items-center">
                        <div class="bg-orange-100 text-orange-500 rounded-full p-3 mr-4">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500 mb-1">TOTAL ORDERS</div>
                            <div class="text-lg font-bold text-gray-800">{{ number_format($total_orders) }}</div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-4 flex items-center">
                        <div class="bg-orange-100 text-orange-500 rounded-full p-3 mr-4">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                            </svg>
                        </div>
                        <div>

                            <div class="text-xs text-gray-500 mb-1">TOTAL REVENUE</div>
                            @php
                            $appointment_revenue = 0;
                            @endphp
                            @foreach($appointments as $appointment)
                            @php
                            $appointment_revenue += number_format($appointment->total_payment,2);
                            @endphp
                            @endforeach
                            <div class="text-lg font-bold text-gray-800">₱ {{number_format($appointment_revenue + $order_revenue)}}</div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-4 flex items-center">
                        <div class="bg-orange-100 text-orange-500 rounded-full p-3 mr-4">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500 mb-1">TOTAL APPOINTMENTS</div>
                            <div class="text-lg font-bold text-gray-800">{{number_format($total_appointments)}}</div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-4 flex items-center">
                        <div class="bg-orange-100 text-orange-500 rounded-full p-3 mr-4">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500 mb-1">TOTAL USERS</div>
                            <div class="text-lg font-bold text-gray-800">{{number_format($total_users)}}</div>
                        </div>
                    </div>
                </div>

                <!-- Best Selling Products -->
                <div class="bg-white rounded-lg shadow mb-6">
                    <div class="px-6 py-4 border-b">
                        <h2 class="text-2xl font-bold text-gray-800">Best Selling Products</h2>
                    </div>
                    <div class="divide-y">
                        @foreach($best_selling_products as $product)
                        <div class="flex items-center p-4 hover:bg-gray-50 transition duration-150">
                            <img src="{{ asset('storage/Products/' . $product->image_url) }}" alt="{{ $product->name }}" class="w-16 h-16 mr-4 rounded object-cover">
                            <div>
                                <h3 class="text-lg font-bold text-gray-800 mb-1">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-500">Sold Items: {{ number_format($product->quantity_sold) }} pcs</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Order Status -->
                <div class="bg-white rounded-lg shadow">
                    <div class="px-6 py-4 border-b">
                        <h2 class="text-2xl font-bold text-gray-800">Order Status</h2>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-6">
                        <div class="text-center">
                            <div class="bg-orange-100 text-orange-500 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-3">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path>
                                </svg>
                            </div>
                            <div class="text-2xl font-bold text-gray-800 mb-1">{{number_format($total_orders)}}</div>
                            <div class="text-sm text-gray-500">Orders</div>
                        </div>
                        <div class="text-center">
                            <div class="bg-blue-100 text-blue-500 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-3">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm3 1h6v2H5V6zm6 4H5v2h6v-2z"></path>
                                    <path d="M15 7h1a2 2 0 012 2v6a2 2 0 01-2 2h-1V7z"></path>
                                </svg>
                            </div>
                            <div class="text-2xl font-bold text-gray-800 mb-1">{{number_format($shipping_orders)}}</div>
                            <div class="text-sm text-gray-500">Shipped</div>
                        </div>
                        <div class="text-center">
                            <div class="bg-green-100 text-green-500 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-3">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="text-2xl font-bold text-gray-800 mb-1">{{number_format($delivered_orders)}}</div>
                            <div class="text-sm text-gray-500">Delivered</div>
                        </div>
                        <div class="text-center">
                            <div class="bg-red-100 text-red-500 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-3">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="text-2xl font-bold text-gray-800 mb-1">{{number_format($cancelled_orders)}}</div>
                            <div class="text-sm text-gray-500">Cancelled</div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <script>
        function updateDateTime() {
            const now = new Date();

            // Format date
            const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            const month = months[now.getMonth()];
            const day = now.getDate();
            const year = now.getFullYear();

            // Format time
            let hours = now.getHours();
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const ampm = hours >= 12 ? 'PM' : 'AM';

            hours = hours % 12;
            hours = hours ? hours : 12; // Convert 0 to 12

            // Create formatted strings
            const dateString = `${month} ${day}, ${year}`;
            const timeString = `${hours}:${minutes} ${ampm}`;

            // Update DOM
            document.getElementById('datetime').innerHTML = `${dateString} <br> ${timeString}`;
        }

        // Update immediately and then every second
        updateDateTime();
        setInterval(updateDateTime, 1000);
    </script>
</body>

</html>