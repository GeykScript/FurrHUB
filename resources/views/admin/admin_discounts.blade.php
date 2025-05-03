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
<dialog id="addDiscount" class="p-6 rounded-lg shadow-lg w-full max-w-xl backdrop:bg-black/30 border-none outline-none">
    <div class="bg-white p-6 rounded-lg text-center justify-center">
        <div class="w-full">
            <form id="addDiscountForm" method="POST" action="{{route('admin_discounts.add')}}">
                @csrf
                <div class="flex justify-center items-center mt-4 gap-2">
                    <i data-lucide="ticket" class="text-orange-500 w-12 h-12"></i>
                    <h1 class="text-xl font-semibold text-orange-500">Add New Discount</h1>
                </div>
                <div class="mt-3 grid grid-cols-2 gap-2">
                    <p class="col-span-1 text-gray-700 text-start font-semibold">Discount Code: </p>
                    <input type="text" name="discount_code" id="discount_code" required class="col-span-2 focus:outline-none focus:ring-2 focus:ring-orange-400 border border-gray-300 rounded-lg p-2 w-full">
                    <p class="col-span-1 text-gray-700 text-start font-semibold">Description:</p>
                    <textarea name="discount_description" id="discount_description" required class="col-span-2 focus:outline-none focus:ring-2 focus:ring-orange-400 border border-gray-300 rounded-lg p-2 w-full"></textarea>
                    <p class="col-span-1 text-gray-700 text-start font-semibold">Discount Value:</p>

                    <input type="number" name="discount_value" id="discount_value" required class="col-span-2 focus:outline-none focus:ring-2 focus:ring-orange-400 border border-gray-300 rounded-lg p-2 w-full">
                </div>

                <div class="mt-3 grid grid-cols-2 gap-2">
                    <p class="col-span-1 text-gray-700 text-start font-semibold">Start Date:</p>
                    <p class="col-span-1 text-gray-700 text-start font-semibold">End Date:</p>
                    <input type="datetime-local" name="discount_start_date" class="col-span-1 focus:outline-none focus:ring-2 focus:ring-orange-400 border border-gray-300 rounded-lg p-2 w-full">
                    <input type="datetime-local" name="discount_end_date" required class="col-span-1 focus:outline-none focus:ring-2 focus:ring-orange-400 border border-gray-300 rounded-lg p-2 w-full">
                </div>

                <div class="flex  mt-4">
                    <button type="submit" class="mr-4 w-full outline-none focus:outline-none border-white bg-orange-400 text-white py-2 px-4 rounded-lg hover:bg-orange-500">Add Discount</button>
                    <button type="button" onclick="document.getElementById('addDiscount').close();" class="w-full outline-none focus:outline-none border-orange-500 bg-white text-orange-600 py-2 px-4 rounded-lg hover:border-red-600 hover:bg-orange-100">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</dialog>

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
                            <a href="{{ route('admin_services_history') }}" class="block p-3 flex items-center text-black hover:bg-gray-300 rounded transition duration-200">
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
                            <a href="{{ route('admin_discounts') }}" class="block p-3 flex items-center text-base text-white bg-[#F0A02C]  rounded transition duration-200">
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
                        <div> <i data-lucide="ticket" class="md:w-12 md:h-12 w-6 h-6 text-orange-500 mx-auto"></i></div>
                        <h1 class="md:text-4xl text-md font-bold text-orange-500 ">Manage Discounts</h1>
                    </div>
                </div>
            </div>
            <div class="mt-2 w-full">
                <div class="md:px-[5rem] flex gap-5 items-center px-4  text-sm md:text-lg">
                    <a href="{{route('admin_dashboard')}}" class="hover:underline hover:text-orange-400">Dashboard</a>
                    <div> > </div>
                    <a href="{{route('admin_discounts')}}" class="hover:underline text-orange-500">Discounts</a>
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


                        <button onclick="addDiscount(this)"
                            class="bg-orange-500 flex items-center justify-center gap-2 text-white font-bold p-3 rounded-lg  hover:bg-orange-600 transition duration-200">
                            <i data-lucide="plus"></i>
                            <p>Add Discount</p>
                        </button>

                    </div>

                    <table id="DiscountTable" class="min-w-full divide-y divide-gray-200 text-sm text-left text-gray-700">
                        <thead class="bg-orange-300 text-gray-700 uppercase text-xs">
                            <tr>
                                <th class="px-4 py-3">ID</th>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Description</th>
                                <th class="px-4 py-3">Discount Value</th>
                                <th class="px-4 py-3">Start Date</th>
                                <th class="px-4 py-3">End Date </th>
                                <th class="px-4 py-3">Status </th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($discounts as $discount)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-2">{{ $discount->discount_id }}</td>
                                <td class="px-4 py-2">{{ $discount->code }}</td>
                                <td class="px-4 py-2">{{ $discount->description }}</td>
                                <td class="px-4 py-2">{{ number_format($discount->discount_value * 100) }}%</td>
                                <td class="px-4 py-2">{{ $discount->start_date }}</td>
                                <td class="px-4 py-2">{{ $discount->end_date }}</td>
                                <td class="px-4 py-2">
                                    @if($discount->status_id == 7)
                                    <span class="text-green-500 font-semibold">{{ $discount->status->status_name }}</span>
                                    @else
                                    <span class="text-red-500 font-semibold">{{ $discount->status->status_name }}</span>
                                    @endif
                                </td>
                                </td>
                                <td class="px-4 py-2">
                                    <button
                                        onclick="editDiscount(this)"
                                        data-id="{{$discount->discount_id}}"
                                        data-name="{{$discount->code}}"
                                        data-description="{{$discount->description}}"
                                        data-value="{{$discount->discount_value * 100}}"
                                        data-start="{{ \Carbon\Carbon::parse($discount->start_date)->format('Y-m-d\TH:i') }}"
                                        data-end="{{ \Carbon\Carbon::parse($discount->end_date)->format('Y-m-d\TH:i') }}"
                                        data-status="{{$discount->status_id}}">
                                        <i data-lucide="square-pen" class="text-orange-500"></i></button>
                                </td>
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


    <dialog id="editDiscount" class="p-6 rounded-lg shadow-lg w-full max-w-xl backdrop:bg-black/30 border-none outline-none">
        <div class="bg-white p-6 rounded-lg text-center justify-center">

            <div class="w-full">
                <!-- Hidden input for order ID -->
                <form id="editDiscountForm" method="POST" action="{{route('admin_discounts.edit')}}">
                    @csrf
                    <input type="hidden" name="discount_id" id="edit-discount_id">
                    <div class="flex justify-center items-center mt-4 gap-2">
                        <i data-lucide="ticket" class="text-orange-500 w-12 h-12"></i>
                        <h1 class="text-xl font-semibold text-orange-500">Edit Discount</h1>
                    </div>
                    <div class="mt-3 grid grid-cols-2 gap-2">
                        <p class="col-span-1 text-gray-700 text-start font-semibold">Discount Code: </p>
                        <input type="text" name="discount_code" id="edit-discount_code" required class="col-span-2 focus:outline-none focus:ring-2 focus:ring-orange-400 border border-gray-300 rounded-lg p-2 w-full">
                        <p class="col-span-1 text-gray-700 text-start font-semibold">Description:</p>
                        <textarea name="discount_description" id="edit-discount_description" required class="col-span-2 focus:outline-none focus:ring-2 focus:ring-orange-400 border border-gray-300 rounded-lg p-2 w-full"></textarea>
                        <p class="col-span-1 text-gray-700 text-start font-semibold">Discount Value:</p>
                        <input type="number" name="discount_value" id="edit-discount_value" required class="col-span-2 focus:outline-none focus:ring-2 focus:ring-orange-400 border border-gray-300 rounded-lg p-2 w-full">
                    </div>
                    <div class="mt-3 grid grid-cols-2 gap-2">
                        <p class="col-span-1 text-gray-700 text-start font-semibold">Start Date:</p>
                        <p class="col-span-1 text-gray-700 text-start font-semibold">End Date:</p>
                        <input type="datetime-local" name="discount_start_date" id="edit-discount_start_date"
                            value="{{ old('discount_start_date', \Carbon\Carbon::parse($discount->start_date)->format('Y-m-d\TH:i')) }}"
                            required class="col-span-1 focus:outline-none focus:ring-2 focus:ring-orange-400 border border-gray-300 rounded-lg p-2 w-full">

                        <input type="datetime-local" name="discount_end_date" id="edit-discount_end_date"
                            value="{{ old('discount_end_date', \Carbon\Carbon::parse($discount->end_date)->format('Y-m-d\TH:i')) }}"
                            required class="col-span-1 focus:outline-none focus:ring-2 focus:ring-orange-400 border border-gray-300 rounded-lg p-2 w-full">

                    </div>
                    <div class="mt-3">
                        <label class="block text-gray-700 text-sm items-start text-start font-semibold mb-2">Discount Availability:</label>
                        <div class="flex items-center gap-4">
                            <label class="flex items-center">
                                <input type="radio" name="discount_status" value="7"
                                    class="text-orange-500 focus:ring-orange-400">
                                <span class="ml-2 text-sm text-gray-700">Available</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="discount_status" value="8"
                                    class="text-orange-500 focus:ring-orange-400">
                                <span class="ml-2 text-sm text-gray-700">Not Available</span>
                            </label>
                        </div>
                    </div>
                    <div class="flex  mt-5">
                        <button type="submit" class="mr-4 w-full outline-none focus:outline-none border-white bg-orange-400 text-white py-2 px-4 rounded-lg hover:bg-orange-500">Save Changes</button>
                        <button type="button" onclick="document.getElementById('editDiscount').close();" class="w-full outline-none focus:outline-none border-orange-500 bg-white text-orange-600 py-2 px-4 rounded-lg hover:border-red-600 hover:bg-orange-100">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </dialog>


    <script>
        function addDiscount(button) {

            // Show the modal
            document.getElementById('addDiscount').showModal();
        }

        function editDiscount(button) {

            document.getElementById('edit-discount_id').value = button.getAttribute('data-id');
            document.getElementById('edit-discount_code').value = button.getAttribute('data-name');
            document.getElementById('edit-discount_description').value = button.getAttribute('data-description');
            document.getElementById('edit-discount_value').value = button.getAttribute('data-value');
            document.getElementById('edit-discount_start_date').value = button.getAttribute('data-start');
            document.getElementById('edit-discount_end_date').value = button.getAttribute('data-end');
            document.querySelector(`input[name="discount_status"][value="${button.getAttribute('data-status')}"]`).checked = true;


            // Show the modal
            document.getElementById('editDiscount').showModal();
        }



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