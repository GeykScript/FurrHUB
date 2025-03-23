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
                <div class="md:ml-6 ml-3 text-sm md:text-3xl font-medium">Sign Up</div>
            </div>
            <div>
                <a href="{{ route('welcome') }}">
                    <img src="{{asset ('logo/x.svg')}}" alt="cancel" class="h-5 w-5 md:h-10 md:w-10 hover:cursor-pointer" />
                </a>
            </div>
        </div>
    </div>
</header>

<body class="bg-sky-300">
    <div class="flex flex-col md:flex-row justify-center items-center md:mt-10 mt-4">
        <div class="md:h-[45rem] md:w-[38rem] h-[21rem] w-[20rem] ">
            <img src="{{asset('images/furrhub-login-signin/5.jpg')}}" alt="" class="w-[100%] h-[100%] md:rounded-l-[15px] md:rounded-r-[0px]  rounded-t-[15px] " />
        </div>
        <div class="md:h-[45rem] bg-white md:w-[40rem]  w-[20rem] h-[50rem] md:rounded-r-[15px] rounded-b-[10px] md:rounded-b-[0px]   flex items-center justify-center">
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!--Form-->
            <form method="POST" action="{{ route('register') }}" class="w-[80%] md:w-[75%]">
                <div class="flex justify-center ">
                    <h1 class="md:text-[2rem] text-[1rem]  uppercase tracking-widest font-semibold text-gray-600">Sign Up</h1>
                </div>
                @csrf

                <div class="grid md:grid-cols-2 md:gap-2 grid-rows-1 gap-2 mt-4">
                    <div class="md:col-span-1">
                        <!-- First Name -->
                        <x-input-label for="first_name" :value="__('First name')" />
                        <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="given-name" />
                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    </div>
                    <!-- Last Name -->
                    <div class="md:col-span-1">
                        <x-input-label for="last_name" :value="__('Last name')" />
                        <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autocomplete="family-name" />
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                    </div>

                </div>
                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full md:h-[3.3rem] h-[2.4rem]" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="example@gmail.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Phone Number -->
                <div class="mt-4">
                    <x-input-label for="phone" :value="__('Phone number')" />
                    <x-text-input id="phone" class="block mt-1 w-full md:h-[3.3rem] h-[2.4rem]"
                        type="text" name="phone" :value="old('phone')" required autofocus
                        autocomplete="tel" placeholder="09xxxxxxxx" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>



                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full md:h-[3.3rem] h-[2.4rem]"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                        type="password"
                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">



                </div>

                <!-- terms and condition -->
                <div class=" mt-1  text-sm items-center justify-center text-wrap">
                    <p>By signing up, you agree to FurrHUB’s <span class="text-sky-400 hover:text-sky-500 font-semibold"> Terms of Service & Privacy Policy </span> </p>
                </div>


                <!-- Login Button -->
                <div class="flex items-center justify-center mt-5 flex-col ">
                    <x-primary-button class="w-full justify-center  md:h-[3rem] h-[2.4rem]">
                        {{ __('Sign Up') }}
                    </x-primary-button>

                    <!-- Register Link -->
                    <div class=" mt-5  text-sm">
                        <p>Already have an account? <b> <a class="underline text-sm text-sky-400 hover:text-sky-500 " href="{{ route('login') }}">
                                    {{ __('Log In') }}
                                </a></b></p>
                    </div>

                </div>

            </form>

        </div>
    </div>
</body>
<!-- Footer -->
<x-footer bgColor="bg-gray-100" />


</html>