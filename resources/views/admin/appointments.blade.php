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
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="fixed top-0 left-0 w-72 h-full bg-white border-l shadow-lg z-50">
            <div class="p-4 ">
                <div class="flex items-center mb-8">
                    <img src="{{ asset('logo/logo1.png') }}" alt="FurrHub Logo" class="h-[70px] w-[150px] lg:h-[125px] lg:w-[300px]" />
                </div>

                <nav class="font-bold">
                    <ul>
                        <li class="mb-2 border border-gray shadow-sm rounded-lg">
                            <a href="{{ route('admin_dashboard') }}" class="block p-3 flex items-center text-lg text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="house" class="w-10 h-10 pr-2 ml-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="mb-2 border border-gray shadow-sm rounded-lg">
                            <a href="{{route('users')}}" class="block p-3 flex text-lg items-center text-black hover:bg-gray-100 rounded transition duration-200">
                                <i data-lucide="circle-user" class="w-10 h-10 pr-2 ml-2"></i>
                                Users
                            </a>
                        </li>
                        <li class="mb-2 border border-gray shadow-sm rounded-lg">
                            <a href="{{route('messages')}}" class="block p-3 text-lg flex items-center text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="messages-square" class="w-10 h-10 pr-2 ml-2"></i>
                                Messages
                            </a>
                        </li>
                        <li class="mb-2 border border-gray shadow-sm rounded-lg">
                            <a href="{{route('services')}}" class="block p-3 flex text-lg items-center text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="heart" class="w-10 h-10 pr-2 ml-2"></i>
                                Services
                            </a>
                        </li>
                        <li class="mb-2 border border-gray shadow-sm rounded-lg">
                            <a href="{{route('service_history')}}" class="block p-3 flex text-lg items-center text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="notebook-text" class="w-10 h-10 pr-2 ml-2"></i>
                                Service History
                            </a>
                        </li>
                        <li class="mb-2 border border-gray shadow-sm rounded-lg">
                            <a href="{{route('products')}}" class="block p-3 flex text-lg items-center text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="shopping-basket" class="w-10 h-10 pr-2 ml-2"></i>
                                Manage Products
                            </a>
                        </li>
                        <li class="mb-2 border border-gray shadow-sm rounded-lg">
                            <a href="orders" class="block p-3 flex text-lg items-center text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="shopping-cart" class="w-10 h-10 pr-2 ml-2"></i>
                                Orders
                            </a>
                        </li>
                        <li class="mb-2 border border-gray shadow-sm rounded-lg">
                            <a href="appointments" class="block p-3 flex items-center text-lg text-white bg-[#F0A02C] rounded transition duration-200">
                                <i data-lucide="notepad-text" class="w-10 h-10 pr-2 ml-2"></i>
                                Appointments
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
            <div class="absolute bottom-0 w-full p-6 ">
                <button class="w-full bg-[#4B4B4B] text-white font-bold py-2 rounded hover:bg-gray-300 transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-400">Log Out</button>
            </div>
        </div>

        <!-- Main Content -->
        <main class="flex-1 ml-72 w-full bg-gray-100">
            <!-- Top Bar -->
            <div class="bg-[#F0A02C] shadow-sm h-26">
                <div class="max-w-full mx-auto px-4 py-3 flex justify-between items-center">
                    <div class="flex items-center">
                        <i data-lucide="calendar-clock" class=" w-16 h-16 pr-2 ml-4 text-white"></i>
                        <div id="datetime" class="text-2xl text-white font-bold mr-6 ml-4"></div>
                    </div>
                    <div class="flex items-center ">
                        <div class="flex items-center justify-between ">
                            <span class="text-2xl text-black font-bold">John Doe</span>
                            <i data-lucide="circle-user" class=" w-10 h-10 pr-2 ml-2"> </i>
                            <div x-data="{ open: false }" class="relative">
                                <button @click="open = !open" class="focus:outline-none">
                                    <i data-lucide="chevron-down"></i>
                                </button>
                                <div x-show="open" @click.outside="open = false"
                                    class="absolute right-1 mt-2 w-48 bg-white rounded-md shadow-lg z-50">
                                    <a href="#" class="block px-4 py-2 text-lg text-black hover:bg-gray-300">Profile</a>
                                    <a href="#" class="block px-4 py-2 text-lg text-black hover:bg-gray-300">Settings</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 pl-2 flex items-center text-gray-600 text-sm">
                <span>Home</span>
                <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-[#F0A02C]">Manage Appointments</span>
            </div>

            <!-- Appointments Header -->
            <div class="mt-4 pl-2 flex items-center">
                <div class="bg-orange-100 rounded-lg p-2 mr-3">
                    <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-[#F0A02C]">APPOINTMENTS</h1>
            </div>

            <!-- Search and Filter -->
            <div class="mt-4 pl-2 flex justify-between items-center">
                <div class="relative">
                    <input type="text" placeholder="Search..." class="pl-8 pr-4 py-2 border rounded-md w-64">
                    <svg class="w-4 h-4 absolute left-2 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>

                <div class="flex items-center">
                    <span class="mr-3 text-m text-gray-600">Status:</span>
                    <div class="relative">
                        <select class="border rounded-md px-4 py-2 pr-10 appearance-none bg-white">
                            <option>All</option>
                        </select>
                        <svg class="w-4 h-4 absolute right-2 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>

                    <span class="ml-8 mr-5 text-m text-gray-600">Generate Report:</span>
                    <button class="text-blue-500 mr-2">
                        <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                        </svg>
                    </button>
                    <button class="text-red-500">
                        <svg class="w-8 h-8  mr-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Appointments Table -->
            <div class="mt-4 bg-white rounded-lg border border-black overflow-hidden">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-100 text-gray-600 text-xs">
                            <th class="py-2 px-1 text-left">Appt. ID</th>
                            <th class="py-2 px-1 text-left">Customer Name</th>
                            <th class="py-2 px-1 text-left">Service Applied</th>
                            <th class="py-2 px-1 text-left">Pet Name</th>
                            <th class="py-2 px-1 text-left">Appointment date</th>
                            <th class="py-2 px-1 text-left">Ref. Number</th>
                            <th class="py-2 px-1 text-left">P. Method</th>
                            <th class="py-2 px-1 text-left">P. Status</th>
                            <th class="py-2 px-1 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        <tr class="border-t">
                            <td class="py-3 px-4">1</td>
                            <td class="py-3 px-4">John Doe</td>
                            <td class="py-3 px-4">Ultrasound</td>
                            <td class="py-3 px-4">Max</td>
                            <td class="py-3 px-4">25-03-2025</td>
                            <td class="py-3 px-4">2553-2424-456</td>
                            <td class="py-3 px-4">GCash</td>
                            <td class="py-3 px-4"><span class="text-orange-500 font-medium">Pending</span></td>
                            <td class="py-3 px-4"><span class="text-orange-500 font-medium">Pending</span></td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-3 px-4">1</td>
                            <td class="py-3 px-4">John Doe</td>
                            <td class="py-3 px-4">Ultrasound</td>
                            <td class="py-3 px-4">Max</td>
                            <td class="py-3 px-4">25-03-2025</td>
                            <td class="py-3 px-4">2553-2424-456</td>
                            <td class="py-3 px-4">GCash</td>
                            <td class="py-3 px-4"><span class="text-orange-500 font-medium">Pending</span></td>
                            <td class="py-3 px-4"><span class="text-orange-500 font-medium">Pending</span></td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-3 px-4">1</td>
                            <td class="py-3 px-4">John Doe</td>
                            <td class="py-3 px-4">Ultrasound</td>
                            <td class="py-3 px-4">Max</td>
                            <td class="py-3 px-4">25-03-2025</td>
                            <td class="py-3 px-4">2553-2424-456</td>
                            <td class="py-3 px-4">GCash</td>
                            <td class="py-3 px-4"><span class="text-orange-500 font-medium">Pending</span></td>
                            <td class="py-3 px-4"><span class="text-orange-500 font-medium">Pending</span></td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-3 px-4">1</td>
                            <td class="py-3 px-4">John Doe</td>
                            <td class="py-3 px-4">Ultrasound</td>
                            <td class="py-3 px-4">Max</td>
                            <td class="py-3 px-4">25-03-2025</td>
                            <td class="py-3 px-4">2553-2424-456</td>
                            <td class="py-3 px-4">GCash</td>
                            <td class="py-3 px-4"><span class="text-orange-500 font-medium">Pending</span></td>
                            <td class="py-3 px-4"><span class="text-orange-500 font-medium">Pending</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
</body>
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

</html>