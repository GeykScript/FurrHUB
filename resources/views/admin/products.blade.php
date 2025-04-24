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
                            <a href="{{ route('admin_dashboard') }}" class="block p-3 flex items-center text-lg text-black hover:bg-gray-100 rounded transition duration-200">
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
                            <a href="{{route('products')}}" class="block p-3 flex text-lg items-center text-white bg-[#F0A02C] rounded transition duration-200">
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
                            <a href="appointments" class="block p-3 flex items-center text-lg text-black hover:bg-gray-300 rounded transition duration-200">
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
            <div class="bg-[#F0A02C] shadow-sm h-26">
                <div class="max-w-full mx-auto px-4 py-3 flex justify-between items-center">
                    <div class="flex items-center">
                        <svg fill="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 pl-2">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="m22 2.25h-3.25v-1.5c-.014-.404-.344-.726-.75-.726s-.736.322-.75.725v.001 1.5h-4.5v-1.5c-.014-.404-.344-.726-.75-.726s-.736.322-.75.725v.001 1.5h-4.5v-1.5c-.014-.404-.344-.726-.75-.726s-.736.322-.75.725v.001 1.5h-3.25c-1.104 0-2 .895-2 1.999v17.75c0 1.105.895 2 2 2h20c1.105 0 2-.895 2-2v-17.75c0-1.104-.896-1.999-2-1.999zm.5 19.75c0 .276-.224.499-.499.5h-20.001c-.276 0-.5-.224-.5-.5v-17.75c.001-.276.224-.499.5-.499h3.25v1.5c.014.404.344.726.75.726s.736-.322.75-.725v-.001-1.5h4.5v1.5c.014.404.344.726.75.726s.736-.322.75-.725v-.001-1.5h4.5v1.5c.014.404.344.726.75.726s.736-.322.75-.725v-.001-1.5h3.25c.276 0 .499.224.499.499z"></path>
                                <path d="m5.25 9h3v2.25h-3z"></path>
                                <path d="m5.25 12.75h3v2.25h-3z"></path>
                                <path d="m5.25 16.5h3v2.25h-3z"></path>
                                <path d="m10.5 16.5h3v2.25h-3z"></path>
                                <path d="m10.5 12.75h3v2.25h-3z"></path>
                                <path d="m10.5 9h3v2.25h-3z"></path>
                                <path d="m15.75 16.5h3v2.25h-3z"></path>
                                <path d="m15.75 12.75h3v2.25h-3z"></path>
                                <path d="m15.75 9h3v2.25h-3z"></path>
                            </g>
                        </svg>
                        <div id="datetime" class="text-2xl text-white font-bold mr-6 ml-4"></div>
                    </div>
                    <div class="flex items-center">
                        <div class="flex items-center">
                            <span class="text-2xl text-black font-bold">John Doe</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-10 h-10 pr-2 ml-2"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path d="M406.5 399.6C387.4 352.9 341.5 320 288 320l-64 0c-53.5 0-99.4 32.9-118.5 79.6C69.9 362.2 48 311.7 48 256C48 141.1 141.1 48 256 48s208 93.1 208 208c0 55.7-21.9 106.2-57.5 143.6zm-40.1 32.7C334.4 452.4 296.6 464 256 464s-78.4-11.6-110.5-31.7c7.3-36.7 39.7-64.3 78.5-64.3l64 0c38.8 0 71.2 27.6 78.5 64.3zM256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-272a40 40 0 1 1 0-80 40 40 0 1 1 0 80zm-88-40a88 88 0 1 0 176 0 88 88 0 1 0 -176 0z" />
                            </svg>
                            <div x-data="{ open: false }" class="relative ml-4">
                                <button @click="open = !open" class="focus:outline-none">
                                    <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                    </svg>
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

            <!-- Products Content -->
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            <li class="inline-flex items-center">
                                <a href="#" class="text-gray-700 hover:text-[#F0A02C] text-lg">HOME</a>
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center mb-6">
                        <div class="flex-1">
                            <h1 class="text-3xl font-bold text-[#F0A02C]">
                                <i class="fas fa-box mr-2"></i>PRODUCTS
                            </h1>
                        </div>
                        <div class="flex space-x-2">
                            <div class="relative">
                                <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2 border rounded-lg w-64">
                                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                            </div>
                            <button class="px-2 py-1 text-gray-600 border rounded-lg hover:bg-gray-100">
                                Generate Report:
                                <i class="fas fa-file-pdf mx-1"></i>
                                <i class="fas fa-file-excel mx-1"></i>
                            </button>
                            <button class="px-4 py-2 bg-[#F0A02C] text-white rounded-lg">
                                <a href="{{ route('add-products') }}" class="fas fa-plus mr-1">Add Product</a>
                            </button>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="py-3 px-4 text-left">ID</th>
                                    <th class="py-3 px-4 text-left">Product Image</th>
                                    <th class="py-3 px-4 text-left">Name</th>
                                    <th class="py-3 px-4 text-left">Category</th>
                                    <th class="py-3 px-4 text-left">Description</th>
                                    <th class="py-3 px-4 text-left">Price</th>
                                    <th class="py-3 px-4 text-left">Sold</th>
                                    <th class="py-3 px-4 text-left">Discount</th>
                                    <th class="py-3 px-4 text-left">Stock</th>
                                    <th class="py-3 px-4 text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4">1</td>
                                    <td class="py-3 px-4">
                                        <img src="/api/placeholder/50/50" alt="Pedigree" class="w-10 h-10 object-cover">
                                    </td>
                                    <td class="py-3 px-4">Pedigree</td>
                                    <td class="py-3 px-4">Food</td>
                                    <td class="py-3 px-4 text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                    <td class="py-3 px-4">₱150</td>
                                    <td class="py-3 px-4">1020</td>
                                    <td class="py-3 px-4">10%</td>
                                    <td class="py-3 px-4">In stock</td>
                                    <td class="py-3 px-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-500 hover:text-blue-700">
                                                <a href="{{ route('edit-product') }}" class="fas fa-edit"></a>
                                            </button>
                                            <button class="text-red-500 hover:text-red-700">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4">2</td>
                                    <td class="py-3 px-4">
                                        <img src="/api/placeholder/50/50" alt="Pedigree" class="w-10 h-10 object-cover">
                                    </td>
                                    <td class="py-3 px-4">Pedigree</td>
                                    <td class="py-3 px-4">Food</td>
                                    <td class="py-3 px-4 text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                    <td class="py-3 px-4">₱150</td>
                                    <td class="py-3 px-4">1020</td>
                                    <td class="py-3 px-4">10%</td>
                                    <td class="py-3 px-4">In stock</td>
                                    <td class="py-3 px-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-500 hover:text-blue-700">
                                                <a href="{{ route('edit-product') }}" class="fas fa-edit"></a>
                                            </button>
                                            <button class="text-red-500 hover:text-red-700">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4">3</td>
                                    <td class="py-3 px-4">
                                        <img src="/api/placeholder/50/50" alt="Pedigree" class="w-10 h-10 object-cover">
                                    </td>
                                    <td class="py-3 px-4">Pedigree</td>
                                    <td class="py-3 px-4">Food</td>
                                    <td class="py-3 px-4 text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                    <td class="py-3 px-4">₱150</td>
                                    <td class="py-3 px-4">1020</td>
                                    <td class="py-3 px-4">10%</td>
                                    <td class="py-3 px-4">In stock</td>
                                    <td class="py-3 px-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-500 hover:text-blue-700">
                                                <a href="{{ route('edit-product') }}" class="fas fa-edit"></a>
                                            </button>
                                            <button class="text-red-500 hover:text-red-700">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 flex justify-end">
                        <button class="text-green-500 hover:text-green-700 flex items-center ml-auto">
                            <i class="fas fa-trash-restore mr-1"></i> Restore Deleted Products
                        </button>
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
            document.getElementById('datetime').innerHTML = `${dateString}<br>${timeString}`;
        }

        // Update immediately 
        updateDateTime();
    </script>
</body>

</html>