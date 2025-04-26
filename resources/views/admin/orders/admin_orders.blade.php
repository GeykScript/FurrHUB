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
                            <a href="{{route('admin_messages')}}" class="block p-3 text-lg flex items-center text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="messages-square" class="w-10 h-10 pr-2 ml-2"></i>
                                Messages
                            </a>
                        </li>
                        <li class="mb-2 border border-gray shadow-sm rounded-lg">
                            <a href="{{route('admin_services')}}" class="block p-3 flex items-center text-lg text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="heart" class="w-10 h-10 pr-2 ml-2"></i>
                                Services
                            </a>
                        </li>
                        <li class="mb-2 border border-gray shadow-sm rounded-lg">
                            <a href="{{route('admin_services_history')}}" class="block p-3 flex text-lg items-center text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="notebook-text" class="w-10 h-10 pr-2 ml-2"></i>
                                Service History
                            </a>
                        </li>
                        <li class="mb-2 border border-gray shadow-sm rounded-lg">
                            <a href="{{route('admin_products')}}" class="block p-3 flex text-lg items-center text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="shopping-basket" class="w-10 h-10 pr-2 ml-2"></i>
                                Manage Products
                            </a>
                        </li>
                        <li class="mb-2 border border-gray shadow-sm rounded-lg">
                            <a href="{{route('admin_orders')}}" class="block p-3 flex text-lg items-center   text-white bg-[#F0A02C]   rounded transition duration-200">
                                <i data-lucide="shopping-cart" class="w-10 h-10 pr-2 ml-2"></i>
                                Orders
                            </a>
                        </li>
                        <li class="mb-2 border border-gray shadow-sm rounded-lg">
                            <a href="{{route('admin_appointments')}}" class="block p-3 flex items-center text-lg text-black hover:bg-gray-300 rounded transition duration-200">
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
                        <div> <i data-lucide="shopping-cart" class="md:w-12 md:h-12 w-6 h-6 text-orange-500 mx-auto"></i></div>
                        <h1 class="md:text-4xl text-md font-bold text-orange-500 ">Manage Orders</h1>
                    </div>
                </div>
            </div>
            <div class="mt-2 w-full">
                <div class="md:px-[5rem] flex gap-5 items-center px-4  text-sm md:text-lg">
                    <a href="{{route('admin_dashboard')}}" class="hover:underline hover:text-orange-400">Dashboard</a>
                    <div> > </div>
                    <a href="{{route('admin_orders')}}" class="hover:underline text-orange-500">Orders</a>
                </div>
            </div>

            <div class="flex flex-col items-center justify-center mt-5 w-full px-12">
                <div class="overflow-x-auto w-full shadow-lg rounded-lg p-6">
                    @if (session()->has('success'))
                    <div class="col-span-3 mt-1 text-white bg-green-400  border border-green-400 p-3 rounded relative mb-3">
                        <span class="text-sm font-medium ">{{ session('success') }}</span>
                    </div>
                    @endif
                    <div class="flex justify-end items-end gap-1">
                        <p class="p-3">Generate Report: </p>
                        <a href="{{route('admin_orders.DO_export_pdf')}}" class="bg-orange-400 flex items-center justify-center gap-2 text-white font-bold p-3 rounded-lg hover:bg-orange-500 transition duration-200">OFD Orders<i data-lucide="file-text"></i></a>
                        <a href="{{route('admin_orders.preview_pdf')}}" target="_blank" class="bg-blue-500 flex items-center justify-center gap-2 text-white font-bold p-3 rounded-lg hover:bg-blue-600 transition duration-200"><i data-lucide="eye"></i>Preview</a>
                        <a href="{{route('admin_orders.export_pdf')}}" class="bg-red-500 flex items-center justify-center gap-2 text-white font-bold p-3 rounded-lg hover:bg-red-600 transition duration-200">PDF<i data-lucide="file-text"></i></a>
                        <a href="{{route('admin_orders.export_excel')}}" class=" mr-2 bg-green-500 flex items-center justify-center gap-2 text-white font-bold p-3 rounded-lg  hover:bg-green-600 transition duration-200">EXCEL<i data-lucide="sheet"></i></a>

                    </div>


                    <table id="OrderTable" class="min-w-full divide-y divide-gray-200 text-sm text-left text-gray-700">
                        <thead class="bg-orange-300 text-gray-700 uppercase text-xs">
                            <tr>
                                <th class="px-4 py-3">ID</th>
                                <th class="px-4 py-3">Buyer</th>
                                <th class="px-4 py-3">Ref No#</th>
                                <th class="px-4 py-3">Products</th>
                                <th class="px-4 py-3">Quantity</th>
                                <th class="px-4 py-3">Total Amount</th>
                                <th class="px-4 py-3">Payment Method</th>
                                <th class="px-4 py-3">Address</th>
                                <th class="px-4 py-3">Order Date</th>
                                <th class="px-4 py-3">Payment Status</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Delivery Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($orders as $order)

                            @php
                            $items = $order_items->where('order_id', $order->order_id);
                            @endphp

                            <tr class="hover:bg-gray-100 transition duration-200">
                                <td class="px-4 py-3">{{$order->order_id}}</td>
                                <td class="px-4 py-3">{{$order->user->first_name}} {{$order->user->last_name}}</td>
                                <td class="px-4 py-3">{{$order->reference_number}}</td>

                                <td class="px-4 py-3">
                                    @foreach($items as $order_item)
                                    <li>
                                        {{$order_item->product->name}}
                                    </li>
                                    @endforeach
                                </td>
                                <td class="px-4 py-3">
                                    @foreach($items as $order_item)
                                    <p class="flex flex-col"> {{$order_item->quantity}}x </p>
                                    @endforeach
                                </td>

                                <td class="px-4 py-3 ">₱ {{number_format($order->total_amount)}}</td>
                                <td class="px-4 py-3 ">{{$order->payment->payment_name}}</td>
                                <td class="px-4 py-3 ">{{$order->address->street}} {{$order->address->barangay}}, {{$order->address->city}}, {{$order->address->province}}, {{$order->address->postal_code}}</td>
                                <td class="px-4 py-3 ">{{$order->created_at}}</td>
                                <td class="px-4 py-3 ">{{$order->payment_status_relation?->status_name}}</td>
                                @if($order->statuses?->status_name == 'Delivered')
                                <td class="px-4 py-3 text-green-500 font-semibold">{{$order->statuses?->status_name}}</td>
                                @elseif($order->statuses?->status_name == 'To Ship')
                                <td class="px-4 py-3 text-orange-500">
                                    <button class="border-b border-orange-500"
                                        onclick="orderModal(this)"
                                        data-id="{{$order->order_id}}"
                                        data-name="{{$order->user->first_name}} {{$order->user->last_name}}"
                                        data-address="{{$order->address->street}} {{$order->address->barangay}}, {{$order->address->city}}, {{$order->address->province}}, {{$order->address->postal_code}}"
                                        data-payment-status="{{$order->payment->payment_name}}">
                                        {{$order->statuses?->status_name}}
                                    </button>
                                </td>
                                @endif
                                <td class="px-4 py-3 ">{{$order->Delivery_Date}}</td>
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
    <dialog id="orderModal" class="p-6 rounded-lg shadow-lg w-full max-w-md backdrop:bg-black/30 border-none outline-none">
        <div class="bg-white p-6 rounded-lg text-center justify-center">
            <div class="flex flex-col justify-start items-start mt-4">
                <!-- Display order name -->


                <div class="flex  gap-1 text-gray-700">
                    <p>Order Status:</p>
                    <p id="order_name_p" class="text-gray-700"></p>
                </div>
                <!-- Display order address -->
                <div class="flex gap-1 text-gray-700">
                    <p>Address:</p>
                    <p id="order_address_p" class="text-gray-700"></p>
                </div>
                <div class="flex gap-1 text-gray-700">
                    <p>Payment: </p>
                    <p id="payment_status_p" class="text-gray-700"></p>
                </div>
                <!-- Display payment status -->
            </div>
            <div class=" mt-3 flex justify-center items-center text-center">
                <!-- Hidden input for order ID -->
                <form id="orderform" method="POST" action="{{route('admin_orders.deliver_order')}}">
                    @csrf
                    <input type="hidden" name="order_id" id="order_id">

                    <div class="mt-3 grid grid-cols-2 gap-1">
                        <p class="col-span-2 text-gray-700 text-start">Delivery Date:</p>
                        <input type="date" name="order_date" required class="col-span-1 focus:outline-none focus:ring-2 focus:ring-orange-400 border border-gray-300 rounded-lg p-2 w-full">
                        <input type="time" name="order_time" required class="col-span-1 focus:outline-none focus:ring-2 focus:ring-orange-400 border border-gray-300 rounded-lg p-2 w-full mt-2">
                    </div>

                    <div class="flex  mt-4">
                        <button type="submit" class="mr-4 w-full outline-none focus:outline-none border-white bg-orange-400 text-white py-2 px-4 rounded-lg hover:bg-orange-500">Delivered</button>
                        <button onclick="document.getElementById('orderModal').close();" class="w-full outline-none focus:outline-none border-orange-500 bg-white text-orange-600 py-2 px-4 rounded-lg hover:border-red-600 hover:bg-orange-100">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>


        </div>
    </dialog>
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

        function orderModal(button) {
            // Set the value of the hidden order_id input
            document.getElementById('order_id').value = button.getAttribute('data-id');

            // Set the text content of the <p> elements
            document.getElementById('order_name_p').textContent = button.getAttribute('data-name');
            document.getElementById('order_address_p').textContent = button.getAttribute('data-address');
            document.getElementById('payment_status_p').textContent = button.getAttribute('data-payment-status');

            // Show the modal
            document.getElementById('orderModal').showModal();
        }
    </script>
</body>

</html>