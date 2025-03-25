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
                <div class="bg-white p-4 rounded-r-xl shadow-md flex-1 overflow-y-auto h-[calc(100vh-150px)] custom-scrollbar  border border-gray-200 ">
                    <!-- Chat Messages -->
                    <div class="flex items-start mb-4">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/services/jazz.jpg') }}" class="xl:w-10 w-6 h-6 xl:h-10 rounded-full">
                            <div class="bg-white shadow-lg border border-gray-200 p-3 rounded-md max-w-xs">Lorem ipsum dolor sit amet consectetur.</div>
                        </div>

                    </div>
                    <!-- Reply Messages -->
                    <div class="flex items-start justify-end mb-4">
                        <div class="flex items-center gap-3">
                            <div class="bg-white shadow-lg border border-gray-200 p-3 rounded-md max-w-xs">Lorem ipsum dolor sit amet consectetur.</div>
                            <img src="{{ asset('images/services/max.jpg') }}" class="xl:w-10 w-6 h-6 xl:h-10 rounded-full">
                        </div>
                    </div>
                    <!-- Chat Messages -->
                    <div class="flex items-start mb-4">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/services/jazz.jpg') }}" class="xl:w-10 w-6 h-6 xl:h-10 rounded-full">
                            <div class="bg-white shadow-lg border border-gray-200 p-3 rounded-md max-w-xs">Lorem ipsum dolor sit amet consectetur.</div>
                        </div>

                    </div>
                    <!-- Reply Messages -->
                    <div class="flex items-start justify-end mb-4">
                        <div class="flex items-center gap-3">
                            <div class="bg-white shadow-lg border border-gray-200 p-3 rounded-md max-w-xs">Lorem ipsum dolor sit amet consectetur.</div>
                            <img src="{{ asset('images/services/max.jpg') }}" class="xl:w-10 w-6 h-6 xl:h-10 rounded-full">
                        </div>
                    </div>
                    <!-- Chat Messages -->
                    <div class="flex items-start mb-4">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/services/jazz.jpg') }}" class="xl:w-10 w-6 h-6 xl:h-10 rounded-full">
                            <div class="bg-white shadow-lg border border-gray-200 p-3 rounded-md max-w-xs">Lorem ipsum dolor sit amet consectetur.</div>
                        </div>

                    </div>
                    <!-- Reply Messages -->
                    <div class="flex items-start justify-end mb-4">
                        <div class="flex items-center gap-3">
                            <div class="bg-white shadow-lg border border-gray-200 p-3 rounded-md max-w-xs">Lorem ipsum dolor sit amet consectetur.</div>
                            <img src="{{ asset('images/services/max.jpg') }}" class="xl:w-10 w-6 h-6 xl:h-10 rounded-full">
                        </div>
                    </div>

                </div>

                <div class="mt-2 flex items-center border border-gray-300 gap-2 rounded-lg p-2">
                    <label for="upload" class="inline-flex items-center p-2  gap-2 border border-orange-500 text-orange-500 text-sm rounded-lg hover:bg-orange-100 cursor-pointer">
                        <input type="file" id="upload" name="upload" class="hidden">
                        <i data-lucide="image-up" class="h-4 w-4"></i>
                    </label>
                    <x-text-input
                        type="text"
                        class=" p-2 focus:outline-none focus:ring-1 focus:ring-orange-300 focus:border-orange-300 w-full"
                        placeholder="Type a message...">
                    </x-text-input>
                    <button>
                        <i data-lucide="send-horizontal" class="text-orange-400 hover:text-orange-500"></i>
                    </button>
                </div>
            </div>
        </div>



    </div>



    <x-return-top />

</body>
<!-- Footer -->
<x-footer bgColor=" bg-gradient-to-r from-orange-600" />

</html>