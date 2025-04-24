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
                            <a href="{{ route('admin_dashboard') }}" class="block p-3 flex items-center text-lg text-white bg-[#F0A02C] rounded transition duration-200">
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
                <!-- Breadcrumb -->
                <div class="flex items-center text-lg text-gray-600 mb-6">
                    <a href="{{ route('products') }}" class="hover:text-[#F0A02C]">HOME</a>
                    <svg class="h-4 w-4 mx-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-[#F0A02C] text-lg">EDIT PRODUCT</span>
                </div>

                <!-- Add Product Form -->
                <div class="bg-white rounded-md shadow-md p-6">
                    <div class="flex items-center mb-6">
                        <div class="bg-yellow-100 rounded-md p-2 mr-3">
                            <svg class="h-6 w-6 text-[#F0A02C]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h1 class="text-2xl font-bold text-[#F0A02C]">EDIT PRODUCT</h1>
                    </div>

                    <form>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Left Column -->
                            <div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-2">Product Name</label>
                                    <input type="text" placeholder="Lorem ipsum dolor" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-2">Product Category</label>
                                    <div class="relative">
                                        <select class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-yellow-500 appearance-none">
                                            <option>Select Product Category</option>
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-2">Product Description</label>
                                    <textarea rows="5" placeholder="Lorem ipsum dolor sit amet consectetur, adipiscing elit. Ipsa eligendi odit tempora suscipit delecti quod quaerat" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500"></textarea>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-2">Stock Quantity</label>
                                    <input type="number" value="200" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-gray-700 mb-2">Expiration Date</label>
                                        <input type="text" placeholder="MM / DD / YY" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                                    </div>

                                    <div>
                                        <label class="block text-gray-700 mb-2">Product Serial No.</label>
                                        <input type="text" placeholder="XXXX XXXXX XXXX" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-2">Product Images</label>
                                    <div class="border border-gray-300 border-dashed rounded-md p-6 text-center">
                                        <p class="text-gray-500 mb-2">Drag your photo here or</p>
                                        <button type="button" class="text-[#F0A02C] font-medium">Browse from device</button>
                                        <div class="mt-4 flex justify-center">
                                            <svg class="h-10 w-10 text-[#F0A02C]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-2">Uploaded Images</label>
                                    <div class="flex space-x-2">
                                        <div class="w-16 h-16 rounded-md overflow-hidden">
                                            <img src="{{ asset('logo/logo1.png') }}" alt="Product thumbnail" class="w-full h-full object-cover">
                                        </div>
                                        <div class="w-16 h-16 rounded-md overflow-hidden">
                                            <img src="{{ asset('logo/logo1.png') }}" class="w-full h-full object-cover">
                                        </div>
                                        <div class="w-16 h-16 rounded-md overflow-hidden">
                                            <img src="{{ asset('logo/logo1.png') }}" class="w-full h-full object-cover">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-2">Price</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500">₱</span>
                                        </div>
                                        <input type="text" value="300.00" class="w-full border border-gray-300 rounded-md pl-8 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label class="block text-gray-700 mb-2">Discount</label>
                                        <input type="text" value="0.10" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                                    </div>

                                    <div>
                                        <label class="block text-gray-700 mb-2">Discount Valid Until</label>
                                        <input type="text" placeholder="MM / DD / YY" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                                    </div>
                                </div>

                                <div class="mb-6">
                                    <label class="block text-gray-700 mb-2">Discounted Price</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500">₱</span>
                                        </div>
                                        <input type="text" value="300.00" class="w-full border border-gray-300 rounded-md pl-8 py-2 bg-gray-100 focus:outline-none" readonly>
                                    </div>
                                </div>

                                <div class="flex justify-end space-x-4">
                                    <button type="button" class="px-6 py-2 border border-gray-300 rounded-md text-[#F0A02C] hover:bg-gray-50">
                                        <a href="{{ route('products') }}">Cancel</a>
                                    </button>
                                    <button type="submit" class="px-6 py-2 bg-[#F0A02C] text-white rounded-md hover:bg-yellow-600">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
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