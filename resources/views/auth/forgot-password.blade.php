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


<header class="flex bg-white  flex-row justify-start items-center w-full md:px-10 px-5 py-1">
    <div class="flex flex-row items-center justify-start w-full">
        <div class="">
            <a href="{{ route('welcome') }}" class="border-none focus:outline-none focus:ring-0 focus:border-transparent">

                <img src="{{ asset('logo/logo1.png') }}" alt="furrhub-logo" class="h-[60px] w-[150px] lg:h-[120px] lg:w-[300px] " />
            </a>
        </div>
        <div class="flex flex-row items-center justify-between w-full">
            <div class="flex flex-row  items-center justify-evenly ml-1 md:ml-5">
                <div class="bg-black md:w-[2px] md:h-[3rem] w-[1px] h-[2rem]"></div>
                <div class="md:ml-6 ml-3 text-sm md:text-3xl font-medium">Forgot Password</div>
            </div>
            <div>
                <a href="{{ route('login') }}">
                    <img src="{{asset ('logo/x.svg')}}" alt="cancel" class="h-5 w-5 md:h-10 md:w-10 hover:cursor-pointer" />
                </a>
            </div>
        </div>
    </div>
</header>

<body class="bg-sky-300">
    <div class="flex flex-col md:flex-row justify-center items-center md:mt-10 mt-4">
        <div class="md:h-[688px] md:w-[600px] h-[21rem] w-[20rem] ">
            <img src="{{asset('images/furrhub-login-signin/1.jpg')}}" alt="" class="w-[100%] h-[100%] md:rounded-l-[15px] md:rounded-r-[0px]  rounded-t-[15px] " />
        </div>
        <div class="md:h-[43rem] bg-white md:w-[40rem]  w-[20rem] h-[28rem] md:rounded-r-[15px] rounded-b-[10px] md:rounded-b-[0px]  flex items-center justify-center">

            <div class="w-[80%] md:w-[75%] h[10rem]">
                <div class="flex justify-center">
                    <h1 class="md:text-[2rem] text-[1rem]  uppercase tracking-widest font-semibold text-gray-600">FORGOT PASSWORD</h1>
                </div>
                <div class="mb-4 text-md text-gray-600 mt-10">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">

                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full md:h-[3.3rem]" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-center mt-4">
                        <x-primary-button>
                            {{ __('Send Reset Link') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<!-- Footer -->
<x-footer />

</html>