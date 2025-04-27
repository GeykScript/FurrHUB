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

    <link rel="stylesheet" href="//cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">

    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/welcome-page.css', 'resources/js/carousel.jsx'])

</head>

<body class="bg-gray-100">
    <div class="flex ">
        <!-- Sidebar -->
        <div class="fixed top-0 left-0 w-72 h-full bg-white border-l shadow-lg z-50">
            <div class="p-4">
                <div class="flex items-center mb-6">
                    <img src="{{ asset('logo/logo1.png') }}" alt="FurrHub Logo" class="h-[60px] w-[130px] lg:h-[110px] lg:w-[245px]" />
                </div>

                <nav class="font-semibold">
                    <ul>
                        <li class="mb-2 border border-gray-300 shadow-sm rounded-lg">
                            <a href="{{ route('admin_dashboard') }}" class="block p-3 flex items-center text-base text-black hover:bg-gray-300 rounded transition duration-200">
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
                            <a href="{{ route('admin_services') }}" class="block p-3 flex items-center text-base text-white bg-[#F0A02C] rounded transition duration-200">
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
        <main class="flex-1 ml-72 w-full bg-gray-100">
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

            <div>
                <div class="flex flex-row items-center justify-start md:px-10 px-2 mt-5 h-20  ">
                    <div class="flex flex-row items-center md:gap-2 gap-1 ">
                        <div> <i data-lucide="heart" class="md:w-12 md:h-12 w-6 h-6 text-orange-500 mx-auto"></i></div>
                        <h1 class="md:text-4xl text-md font-bold text-orange-500 ">Services</h1>
                    </div>
                </div>
            </div>
            <div class="mt-2 w-full">
                <div class="md:px-[5rem] flex gap-5 items-center px-4  text-sm md:text-lg">
                    <a href="{{route('admin_services')}}" class="hover:underline hover:text-orange-400">Dashboard</a>
                    <div> > </div>
                    <a href="{{route('admin_services')}}" class="hover:underline hover:text-orange-400">Services</a>
                    <div> > </div>
                    <p class="hover:underline text-orange-400">Edit Services</p>
                </div>
            </div>

            <div class="flex flex-col items-center justify-center mt-10 w-full px-12">
                <div class="overflow-x-auto  shadow-lg bg-white rounded-lg p-20">

                    <form action="{{ route('admin_services.save') }}" method="POST" class="flex flex-col gap-4">
                        @csrf
                        <input type="hidden" name="service_id" value="{{ $service_id }}">
                        <div>
                            <label for="service_name" class="block text-gray-700 text-sm font-semibold mb-2">Service Name:</label>
                            <input type="text" id="service_name" name="service_name" required value="{{ $service->name }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400 shadow-sm">
                        </div>

                        <div>
                            <label for="service_description" class="block text-gray-700 text-sm font-semibold mb-2">Service Description:</label>
                            <textarea id="service_description" name="service_description" rows="4" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400 shadow-sm resize-none"> {{$service->description}}</textarea>
                        </div>
                        <div>
                            <label for="service_category" class="block text-gray-700 text-sm font-semibold mb-2">Category:</label>
                            <select name="service_category" id="service_category" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-orange-400 shadow-sm">
                                <option value="8" {{ $service->category == 8 ? 'selected' : '' }}>Grooming</option>
                                <option value="9" {{ $service->category == 9 ? 'selected' : '' }}>Veterinary</option>
                                <option value="10" {{ $service->category == 10 ? 'selected' : '' }}>Wellness & Laboratory</option>
                            </select>
                        </div>


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="service_price" class="block text-gray-700 text-sm font-semibold mb-2">Service Price:</label>
                                <input type="number" id="service_price" name="service_price" required value="{{number_format($service->price) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400 shadow-sm">
                            </div>

                            <div>
                                <label for="service_discount" class="block text-gray-700 text-sm font-semibold mb-2">Apply Discount:</label>
                                <select name="service_discount" id="service_discount"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-orange-400 shadow-sm">
                                    <option value="">Select Discount</option>
                                    @foreach ($discounts as $discount)
                                    @if ($service->discount_id == $discount->discount_id)
                                    <option value="{{ $discount->discount_id }}" selected data-discount="{{ $discount->discount_value }}">{{ $discount->discount_value * 100 }}%</option>
                                    @else
                                    <!-- Check if the discount value is not already selected -->
                                    @if (!isset($selectedDiscounts) || !in_array($discount->discount_value, $selectedDiscounts))
                                    <option value="{{ $discount->discount_id }}" data-discount="{{ $discount->discount_value }}">{{ $discount->discount_value * 100 }}%</option>
                                    @php
                                    // Store the selected discount value to avoid repeating it in the options
                                    $selectedDiscounts[] = $discount->discount_value;
                                    @endphp
                                    @endif
                                    @endif
                                    @endforeach
                                    <option value=" ">No Discount</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Availability:</label>
                            <div class="flex items-center gap-4">
                                <label class="flex items-center">
                                    <input type="radio" name="service_status" value="7" {{ $service->status == 7 ? 'checked' : '' }}
                                        class="text-orange-500 focus:ring-orange-400">
                                    <span class="ml-2 text-sm text-gray-700">Available</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="service_status" value="8" {{ $service->status == 8 ? 'checked' : '' }}
                                        class="text-orange-500 focus:ring-orange-400">
                                    <span class="ml-2 text-sm text-gray-700">Not Available</span>
                                </label>
                            </div>
                        </div>

                        <div class="pt-4 flex justify-end gap-3 items-end">
                            <a href="{{route('admin_services')}}" class="py-2 px-4">Cancel</a>
                            <button type="submit"
                                class=" bg-orange-500 text-white py-2 px-4 rounded-lg hover:bg-orange-600 transition-colors shadow-md font-semibold">
                                Submit
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </main>
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