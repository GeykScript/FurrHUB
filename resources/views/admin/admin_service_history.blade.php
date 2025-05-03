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
                            <a href="{{ route('admin_services') }}" class="block p-3 flex items-center text-base text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="heart" class="w-7 h-7 pr-2 ml-2"></i>
                                Services
                            </a>
                        </li>
                        <li class="mb-2 border border-gray-300 shadow-sm rounded-lg">
                            <a href="{{ route('admin_services_history') }}" class="block p-3 flex items-center text-white bg-[#F0A02C] rounded transition duration-200">
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
                        <li class="mb-2 border border-gray-300 shadow-sm rounded-lg">
                            <a href="{{ route('admin_discounts') }}" class="block p-3 flex items-center text-base  text-black hover:bg-gray-300  rounded transition duration-200">
                                <i data-lucide="ticket" class="w-7 h-7 pr-2 ml-2"></i>
                                Discounts
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
                        <h1 class="md:text-4xl text-md font-bold text-orange-500 ">Services History</h1>
                    </div>
                </div>
            </div>
            <div class="mt-2 w-full">
                <div class="md:px-[5rem] flex gap-5 items-center px-4  text-sm md:text-lg">
                    <a href="{{route('admin_dashboard')}}" class="hover:underline hover:text-orange-400">Dashboard</a>
                    <div> > </div>
                    <a href="{{route('admin_services_history')}}" class="hover:underline text-orange-500">Services Provided History</a>
                </div>
            </div>

            <div class="flex flex-col items-center justify-center mt-5 w-full px-20">
                <div class="overflow-x-auto w-full shadow-lg rounded-lg p-6 bg-white">
                    @if (session()->has('success'))
                    <div class="col-span-3 mt-1 text-white bg-green-400  border border-green-400 p-3 rounded relative mb-3">
                        <span class="text-sm font-medium ">{{ session('success') }}</span>
                    </div>
                    @endif
                    <div class="flex justify-end items-end gap-1">
                        <p class="p-3">Generate Report: </p>
                        <a href="{{route('admin_services_history.preview_pdf')}}" target="_blank" class="bg-blue-500 flex items-center justify-center gap-2 text-white font-bold p-3 rounded-lg hover:bg-blue-600 transition duration-200"><i data-lucide="eye"></i>Preview</a>

                        <a href="{{route('admin_services_history.export_pdf')}}" class="bg-red-500 flex items-center justify-center gap-2 text-white font-bold p-3 rounded-lg hover:bg-red-600 transition duration-200">PDF<i data-lucide="file-text"></i></a>

                        <a href="{{route('admin_services_history.export_excel')}}" class=" mr-2 bg-green-500 flex items-center justify-center gap-2 text-white font-bold p-3 rounded-lg  hover:bg-green-600 transition duration-200">EXCEL<i data-lucide="sheet"></i></a>

                    </div>


                    <table id="ServiceHistoryTable" class="min-w-full divide-y divide-gray-200 text-sm text-left text-gray-700">
                        <thead class="bg-orange-300 text-gray-700 uppercase text-xs">
                            <tr>
                                <th class="px-4 py-3">Customer Name</th>
                                <th class="px-4 py-3">Pet Name</th>
                                <th class="px-4 py-3">Type of Service</th>
                                <th class="px-4 py-3">Service Availed</th>
                                <th class="px-4 py-3">Initial Fee</th>
                                <th class="px-4 py-3">Appointment Date </th>
                                <th class="px-4 py-3">Time </th>
                                <th class="px-4 py-3">Total Payment</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($appointments as $appointment)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-2">{{ $appointment->user->first_name}} {{ $appointment->user->last_name}}</td>
                                <td class="px-4 py-2">{{ $appointment->pet->pet_name}}</td>

                                <td class="px-4 py-2">
                                    @if ($appointment->service?->category == 8)
                                    Grooming
                                    @elseif ($appointment->service?->category == 9)
                                    Veterinary
                                    @elseif ($appointment->service?->category == 10)
                                    Wellness & Laboratory
                                    @else
                                    {{ $appointment->service?->category?->name ?? 'No Category' }}
                                    @endif
                                </td>
                                <td class="px-4 py-2">{{ $appointment->service->name}}</td>
                                <td class="px-4 py-2"><span class="font-semibold">₱</span> {{ number_format(!empty($appointment->service->discounted_price) ? $appointment->service->discounted_price : $appointment->service->price, 2) }}</td>
                                <td class="px-4 py-2">{{$appointment->appointment_date}}</td>
                                <td class="px-4 py-2">{{$appointment->appointment_time}}</td>
                                <td class="px-4 py-2"><span class="font-semibold">₱</span> {{ number_format($appointment->total_payment, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

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