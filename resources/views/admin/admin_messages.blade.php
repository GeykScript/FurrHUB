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
                            <a href="{{ route('admin_messages') }}" class="block p-3 flex items-center text-base text-white bg-[#F0A02C] rounded transition duration-200">
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
            <!-- Top Bar -->
            <div class="bg-[#F0A02C] shadow-sm h-26">
                <div class="max-w-full mx-auto px-4 py-3 flex justify-between items-center">
                    <div class="flex items-center">
                        <i data-lucide="calendar-clock" class=" w-16 h-16 pr-2 ml-4 text-white"></i>
                        <div id="datetime" class="text-2xl text-white font-bold mr-6 ml-4"></div>
                    </div>
                    <div class="flex items-center ">
                        <div class="flex items-center justify-between ">
                            <span class="text-2xl text-black font-bold">{{$admin->fname}} {{$admin->lname}}</span>
                            <i data-lucide="circle-user" class=" w-10 h-10 pr-2 ml-2"> </i>

                        </div>
                    </div>
                </div>
            </div>


            <div>
                <div class="flex flex-row items-center justify-start md:px-10 px-2 mt-5 h-20  ">
                    <div class="flex flex-row items-center md:gap-2 gap-1 ">
                        <div> <i data-lucide="message-square-text" class="md:w-12 md:h-12 w-6 h-6 text-orange-500 mx-auto"></i></div>
                        <h1 class="md:text-4xl text-md font-bold text-orange-500 ">My Messages</h1>
                    </div>
                </div>
            </div>
            <div class="mt-2 w-full">
                <div class="md:px-[15rem] flex gap-5 items-center px-4  text-sm md:text-lg">
                    <a href="{{route('admin_dashboard')}}" class="hover:underline hover:text-orange-400">Dashboard</a>
                    <div> > </div>
                    <a href="{{route('admin_messages')}}" class="hover:underline text-orange-500">Messages</a>
                </div>
            </div>
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-2 xl:gap-0  xl:px-[13rem] p-8">
                <div class="flex flex-col h-[400px]">
                    <div class="col-span-1  bg-white shadow-md xl:rounded-l-xl p-5 flex-1 overflow-y-auto h-[calc(100vh-150px)] custom-scrollbar">
                        <h1 class="px-2 text-lg  font-semibold">Users</h1>
                        @foreach ($users as $user)
                        <div class="flex p-2">
                            @if($user->profile_img == null)
                            <i data-lucide="circle-user" class="xl:w-10 w-6 h-6 xl:h-10 rounded-full object-cover text-orange-500"></i>
                            @else
                            <img src="{{ asset('storage/profile_picture/' . $user->profile_img) }}" class="xl:w-10 w-6 h-6 xl:h-10 rounded-full object-cover">
                            @endif
                            <a href="{{ route('admin_messages', ['user_id' => $user->id]) }}" class="flex-1 ml-4 text-lg text-gray-700 hover:text-orange-500 hover:underline">
                                {{ $user->first_name }} {{ $user->last_name }}
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>


                <div class="col-span-2 flex flex-col h-[400px] ">
                    <div id="messagesContainer" class="bg-white p-4 rounded-r-xl shadow-md flex-1 overflow-y-auto h-[calc(100vh-150px)] custom-scrollbar  border border-gray-200 ">
                        <!-- Chat Messages -->

                        <!-- No Messages -->
                        <div id="noMessages" class="{{ $messages->isEmpty() ? 'flex' : 'hidden' }} items-center justify-center h-full">
                            <h1 class="text-center text-gray-500">No messages yet.</h1>
                        </div>

                        @foreach ($messages as $message)

                        @if ($message->user_msg != null)
                        <div class="flex items-start mb-4">
                            <div class="flex items-center gap-3">
                                <img src="{{ asset('storage/profile_picture/' . $selected_user->profile_img) }}" class="xl:w-10 w-6 h-6 xl:h-10 rounded-full object-cover">
                                <div class="bg-white shadow-lg border border-gray-200 p-3 rounded-md max-w-xs md:text-lg text-xs ">{{$message->user_msg}}</div>
                            </div>
                        </div>
                        @endif

                        @if ($message->admin_reply != null)
                        <div class="flex items-start justify-end mb-4">
                            <div class="flex items-center gap-3">
                                <div class="bg-white shadow-lg border border-gray-200 p-3 rounded-md max-w-xs md:text-lg text-xs">{{$message->admin_reply}}</div>
                                <img src="{{ asset('logo/furrhub.png') }}" class="xl:w-20 w-10 h-6 xl:h-16 rounded-full object-cover">
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>

                    <!-- REMOVE IMAGE SEND FEATURE-->
                    <!-- <div id="previewContainer" class="hidden flex items-center justify-between bg-white p-4 rounded-b-xl shadow-md border border-gray-200 mt-2">
                    <div>
                        <img id="preview"
                            src="#"
                            alt="message_photo"
                            class="xl:w-12 w-10 h-10 xl:h-12 rounded-md object-cover">
                    </div>
                    <button type="button"
                        onclick="removeImage()"
                        class="ml-4 text-sm text-red-500 hover:underline"
                        id="removeBtn">
                        Remove
                    </button>
                </div> -->
                    <!-- REMOVE IMAGE SEND FEATURE-->
                    <!-- <label for="upload" class="inline-flex items-center p-2 gap-2 border border-orange-500 text-orange-500 text-sm rounded-lg hover:bg-orange-100 cursor-pointer">
                        <input type="file" id="upload" name="upload" class="hidden" onchange="previewImage(event)">
                        <i data-lucide="image-up" class="h-4 w-4"></i>
                    </label> -->
                    <form action="{{route('send_message')}}" id="AdminmessageForm" class="mt-2 flex items-center border border-gray-300 gap-2 rounded-lg p-2" method="POST" enctype="multipart/form-data">
                        @csrf

                        @if ($selected_user != null)
                        <input type="hidden" name="selected_user" id="selected_user" value="{{ $selected_user->id }}">
                        @endif

                        <x-text-input
                            type="text"
                            name="message"
                            id="message"
                            class=" p-2 focus:outline-none focus:ring-1 focus:ring-orange-300 focus:border-orange-300 w-full"
                            placeholder="Type a message...">
                        </x-text-input>
                        <button type="submit">
                            <i data-lucide="send-horizontal" class="text-orange-400 hover:text-orange-500"></i>
                        </button>
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



        $(document).ready(function() {
            $('#AdminmessageForm').on('submit', function(e) {
                e.preventDefault();

                let message = $('#message').val();
                let selectedUser = $('#selected_user').val();

                if (!message.trim()) return;

                $.ajax({
                    url: "{{ route('send_message') }}",
                    method: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        message: message,
                        selected_user: selectedUser
                    },
                    success: function(response) {
                        $('#message').val('');

                        // Hide "No messages yet" if visible
                        $('#noMessages').addClass('hidden').removeClass('flex');

                        // Append the new admin message to the container
                        $('#messagesContainer').append(`
                        <div class="flex items-start justify-end mb-4">
                            <div class="flex items-center gap-3">
                                <div class="bg-white shadow-lg border border-gray-200 p-3 rounded-md max-w-xs md:text-lg text-xs">${message}</div>
                                <img src="{{ asset('logo/furrhub.png') }}" class="xl:w-20 w-10 h-6 xl:h-16 rounded-full object-cover">
                            </div>
                        </div>
                    `);
                    },
                    error: function(xhr) {
                        alert("Message failed to send.");
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>

</body>

</html>