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


<!-- bg-[#60E1FF] blue -->
<!-- F0A02C  orange-->
<!-- 38B6FF -->
<!-- nav part -->
<x-nav-bar />
<div class="pt-[100px]"></div>



<!-- catergory part -->

<body class="font-sans antialiased bg-white-400 dark:text-black/50">
    <div class="bg-white">

        <div class="md:px-[12rem]  px-2 mt-10">
            <div class="flex flex-row items-center justify-start md:px-10 px-2 mt-5 h-20  ">
                <div class="flex flex-row items-center md:gap-2 gap-1 ">
                    <div> <i data-lucide="message-square-text" class="md:w-12 md:h-12 w-6 h-6 text-orange-500 mx-auto"></i></div>
                    <h1 class="md:text-4xl text-md font-bold text-orange-500 ">My Messages</h1>
                </div>
            </div>
        </div>
        <div class="mt-2 w-full">
            <div class="md:px-[15rem] flex gap-5 items-center px-4  text-sm md:text-lg">
                <a href="{{route('dashboard')}}" class="hover:underline hover:text-orange-400">Dashboard</a>
                <div> > </div>
                <a href="{{route('messages')}}" class="hover:underline text-orange-500">Messages</a>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-2 xl:gap-0  xl:px-[13rem] p-8">
            <div class="col-span-1 hidden xl:flex flex-col justify-center items-center bg-orange-200 p-4 shadow-md xl:rounded-l-xl ">
                <img src="{{ asset('logo/furrhub.png') }}" alt="logo" class="lg:w-[320px] lg:h-[260px] w-[170px] h-[100px] object-cover">
                <div class="xl:px-20 p-2 text-center bg-orange-300 border-2 border-orange-400 rounded-lg mt-4">
                    <h1>Ask a Question</h1>
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
                            <img src="{{ asset('storage/profile_picture/' . Auth::user()->profile_img) }}" class="xl:w-10 w-6 h-6 xl:h-10 rounded-full object-cover">
                            <div class="bg-white shadow-lg border border-gray-200 p-3 rounded-md max-w-xs md:text-lg text-xs">{{$message->user_msg}}</div>
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

                <form action="{{route('messages.send')}}" id="messageForm" class="mt-2 flex items-center border border-gray-300 gap-2 rounded-lg p-2" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- REMOVE IMAGE SEND FEATURE-->
                    <!-- <label for="upload" class="inline-flex items-center p-2 gap-2 border border-orange-500 text-orange-500 text-sm rounded-lg hover:bg-orange-100 cursor-pointer">
                        <input type="file" id="upload" name="upload" class="hidden" onchange="previewImage(event)">
                        <i data-lucide="image-up" class="h-4 w-4"></i>
                    </label> -->
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
        
        <!-- REMOVE IMAGE SEND FEATURE-->
        <!-- <script>
            function previewImage(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = document.getElementById('preview');
                        const container = document.getElementById('previewContainer');

                        preview.src = e.target.result;
                        container.classList.remove('hidden'); // Show the container
                    };
                    reader.readAsDataURL(file);
                }
            }

            function removeImage() {
                const preview = document.getElementById('preview');
                const container = document.getElementById('previewContainer');
                const uploadInput = document.getElementById('upload');

                preview.src = '#';
                uploadInput.value = '';
                container.classList.add('hidden'); // Hide the container
            }
        </script> -->
    </div>
    <script>
        $('#messageForm').on('submit', function(e) {
            e.preventDefault();

            let message = $('#message').val();
            if (!message.trim()) return;

            $.ajax({
                url: "{{ route('messages.send') }}",
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    message: message
                },
                success: function(response) {
                    $('#message').val('');

                    // Hide "No messages yet" if it's visible
                    $('#noMessages').addClass('hidden').removeClass('flex');

                    // Append the new message
                    $('#messagesContainer').append(`
                <div class="flex items-start mb-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('storage/profile_picture/' . Auth::user()->profile_img) }}" class="xl:w-10 w-6 h-6 xl:h-10 rounded-full object-cover">
                        <div class="bg-white shadow-lg border border-gray-200 p-3 rounded-md max-w-xs md:text-lg text-xs">${message}</div>
                    </div>
                </div>
            `);
                },
                error: function() {
                    alert("Message failed to send.");
                }
            });
        });
    </script>


    <x-return-top />

</body>
<!-- Footer -->
<x-footer bgColor=" bg-gradient-to-r from-orange-600" />

</html>