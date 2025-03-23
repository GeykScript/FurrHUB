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


<header class="fixed top-0 z-50 flex bg-[#F0A02C] flex-row justify-start items-center w-full xl:px-10 px-5 py-1  shadow-lg  shadow-[0_8px_10px_rgba(0,0,0,0.2)]">
    <div class="flex flex-row items-center justify-start w-full ">
        <a href="{{route ('dashboard')}}" class="hover:cursor-pointer focus:outline-none">
            <img src="{{ asset('logo/furrhub.png') }}" alt="furrhub-logo" class="h-[60px] w-full md:h-[130px] md:w-[250px] hidden xl:block " />
        </a>
        <div class="flex flex-col  lg:flex-row flex-col-reverse items-center justify-between w-full">
            <div></div>

            <div class="flex flex-row lg:gap-20 lg:text-lg text-sm gap-10">
                <a href="{{route ('dashboard')}}" class="hover:text-white text-gray-800 flex"><i data-lucide="house"></i><span class="md:block hidden"> Home</span></a>
                <a href="#pets" class="hover:text-white text-gray-900 flex"><i data-lucide="paw-print"></i><span class="md:block hidden"> My Pets</span></a>
                <a href="#appointments" class="hover:text-white text-gray-900 flex"><i data-lucide="notebook-pen"></i><span class="md:block hidden">Appointments</span></a>
                <a href="#pricelists" class="hover:text-white text-gray-900 flex"><i data-lucide="philippine-peso"></i><span class="md:block hidden">Price Lists</span></a>
            </div>


            <div class="flex flex-row gap-3 ml-auto xl:ml-0">
                <div class="flex flex-row text-black text-[12px] lg:text-[20px] font-semibold px-3 lg:px-0">
                    <nav class="flex flex-row gap-1 md:gap-1 align-center">
                        @if (Route::has('login'))

                        @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-md leading-4 font-medium rounded-md  hover:text-gray-800 focus:outline-none transition ease-in-out duration-150">
                                    <div class="flex flex-row items-center justify-center">
                                        <p class="">{{ Auth::user()->first_name}} {{ Auth::user()->last_name}}</p>
                                        <img src="{{ asset ('logo/user.svg')}}" alt="user" class="h-[25px] w-[30px] lg:h-[40px] lg:w-[43px]" />

                                    </div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">

                                <x-dropdown-link :href="route('profile.edit')" class="hover:bg-orange-300">
                                    <div class="flex flex-row items-center gap-1">
                                        <i data-lucide="circle-user" class=" text-black"></i>
                                        {{ __('Profile') }}
                                    </div>
                                </x-dropdown-link>

                                <x-dropdown-link class="hover:bg-orange-300">
                                    <div class="flex flex-row items-center gap-1">
                                        <i data-lucide="bell" class=" text-black"></i>

                                        {{ __('Notifications') }}
                                    </div>
                                </x-dropdown-link>

                                <x-dropdown-link class="hover:bg-orange-300">
                                    <div class="flex flex-row items-center gap-1">
                                        <i data-lucide="message-square-text" class=" text-black"></i>
                                        {{ __('Messages') }}
                                    </div>
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout') " class="hover:bg-orange-300"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        <div class="flex flex-row items-center gap-1">
                                            <i data-lucide="log-out" class=" text-black"></i>
                                            {{ __('Log Out') }}
                                        </div>
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                        @else <a class="pt-1   hover:text-white" href="{{ route('login') }}">Log in </a>
                        <p class="pt-1">|</p>
                        @if (Route::has('register'))
                        <a class="pt-1 hover:text-white" href="{{ route('register') }}">Sign up</a>
                        @endif
                        @endauth

                        @endif
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="lg:pt-[80px] pt-[70px] lg:mb-10"></div>

<body class="font-sans antialiased bg-white-400 dark:text-black/50 min-h-screen flex flex-col">
    <div class="bg-white flex-grow">
        <div class="rounded-2xl  md:h-full ">
            <img src="{{asset('images/welcome-booking.jpg')}}" alt="" class="w-full lg:h-full h-[160px]  object-cover" />
        </div>
        <!-- welcome to furrhub services -->
        <div class="relative xl:p-6 p-2 items-start mt-2" id="pets">
            <div class="flex flex-row xl:text-5xl text-lg font-bold xl:px-[10rem] gap-2">
                <i data-lucide="paw-print" class="xl:w-[5rem] xl:h-[5rem] w-[4rem] h-[4rem] mt-3 xl:mt-0 text-orange-500"> </i>
                <div class="items-center justify-center xl:p-1 p-3">

                    @if (Route::has('login'))
                    @auth
                    <p class="xl:text-4xl font-normal">Hello, <span class="font-bold">{{ Auth::user()->first_name}} </span> </p>
                    @endauth
                    @endif
                    <h1 class="items-center text-orange-500">Welcome to FurrHUB Services!</h1>
                </div>
            </div>
        </div>

        <div class=" xl:p-12 p-2 flex flex-col items-center">
            <div class="flex justify-center mt-1">
                <div class="w-full max-w-5xl">
                    <div class="grid grid-cols-1 gap-4 text-center">
                        <div class="flex items-center justify-center">
                            <i data-lucide="bone" class="w-[50px] h-[50px] text-sky-600"></i>
                            <h1 class="xl:text-4xl  text-3xl font-bold text-sky-600 ">My Pets</h1>
                        </div>
                        <div class="flex items-center text-center justify-center">
                            <h1 class="xl:text-lg text-center">Your pets have no appointment today.</h1>
                        </div>
                    </div>
                    <!---pet images-->
                    <div class="grid grid-cols-2 gap-2  md:grid-cols-3 lg:grid-cols-3 lg:gap-6 mt-6 justify-center">
                        <div class="flex flex-col justify-center items-center text-center p-4 hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                            <img src="{{ asset('images/services/max.jpg') }}" alt="Max" class="w-32 h-32 object-cover rounded-lg">
                            <h1 class="mt-2 font-semibold">Max</h1>
                        </div>
                        <div class="flex flex-col justify-center items-center text-center p-4 hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                            <img src="{{ asset('images/services/jazz.jpg') }}" alt="Max" class="w-32 h-32 object-cover rounded-lg">
                            <h1 class="mt-2 font-semibold ">Jazz</h1>
                        </div>
                        <!--add new pet-->
                        <div class="flex flex-col justify-center items-center text-center p-4  hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 ">
                            <div class="w-[110px] h-[110px] flex justify-center items-center border-4 border-gray-700 bg-sky-400 hover:bg-sky-300 rounded-xl transition duration-200">
                                <i data-lucide="plus" class="w-[30px] h-[30px]"></i>
                            </div>
                            <h1 class="mt-2 font-semibold">Add Pet</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=" xl:p-12 p-2 flex flex-col items-center" id="appointments">
            <!-- My Appointments Section -->
            <div class="bg-white  rounded-lg mt-2 text-center w-full md:max-w-6xl md:mx-auto">
                <!-- Title -->
                <div class="flex items-center gap-2 justify-center">
                    <i data-lucide="notebook-pen" class="w-[40px] h-[40px] sm:w-[50px] sm:h-[50px] text-sky-600"></i>
                    <h2 class="text-2xl sm:text-4xl font-semibold text-sky-600">My Appointments</h2>
                </div>

                <!-- Appointment Categories -->
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-2 sm:gap-4 bg-orange-200 p-4 rounded-xl lg:mt-10 mt-3">
                    <button class="text-sm sm:text-lg font-semibold text-gray-700 px-4 py-2 rounded-lg hover:bg-orange-400">
                        Grooming
                    </button>
                    <button class="text-sm sm:text-lg font-semibold text-gray-700 px-4 py-2 rounded-lg hover:bg-yellow-400">
                        Wellness & Laboratory
                    </button>
                    <button class="text-sm sm:text-lg font-semibold text-gray-700 px-4 py-2 rounded-lg hover:bg-orange-400">
                        Veterinary
                    </button>
                    <button class="text-sm sm:text-lg font-semibold text-gray-700 px-4 py-2 rounded-lg hover:bg-sky-400">
                        Pet Insurance
                    </button>
                </div>
                <!-- No Appointments Text -->
                <p class="text-gray-700 text-sm sm:text-lg mt-8 mb-12">No Appointments Found.</p>
            </div>
        </div>
    </div>
    <!-- Why Choose Us Section -->
    <section class="bg-orange-500 py-16 px-6 text-white w-full pb-20">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center lg:items-start">
            <!-- Left Section: Title -->
            <div class="lg:w-1/3 text-center lg:text-left mb-12 lg:mb-0">
                <h2 class="text-4xl sm:text-6xl font-bold flex items-center gap-4 leading-tight">
                    <span class="relative">
                        <span class="absolute -top-3 -left-6 text-yellow-400 text-7xl"></span>
                        Why choose us?
                    </span>
                </h2>
            </div>
            <!-- Right Section: Features Grid -->
            <div class="lg:w-2/3 grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="flex items-center gap-4">
                    <div class="w-10 sm:w-12 h-10 sm:h-12 bg-yellow-400 rounded-full flex items-center justify-center">
                        <i data-lucide="circle-check-big" class="text-gray-700 w-8 sm:w-10 h-8 sm:h-10"></i>
                    </div>
                    <span class="text-base sm:text-lg font-semibold leading-relaxed">Safety & Comfort First, Always</span>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-10 sm:w-12 h-10 sm:h-12 bg-yellow-400 rounded-full flex items-center justify-center">
                        <i data-lucide="circle-check-big" class="text-gray-700 w-8 sm:w-10 h-8 sm:h-10"></i>
                    </div>
                    <span class="text-base sm:text-lg font-semibold leading-relaxed">Expertise You Can Trust</span>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-10 sm:w-12 h-10 sm:h-12 bg-yellow-400 rounded-full flex items-center justify-center">
                        <i data-lucide="circle-check-big" class="text-gray-700 w-8 sm:w-10 h-8 sm:h-10"></i>
                    </div>
                    <span class="text-base sm:text-lg font-semibold leading-relaxed">A Warm, Family-Friendly Atmosphere</span>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-10 sm:w-12 h-10 sm:h-12 bg-yellow-400 rounded-full flex items-center justify-center">
                        <i data-lucide="circle-check-big" class="text-gray-700 w-8 sm:w-10 h-8 sm:h-10"></i>
                    </div>
                    <span class="text-base sm:text-lg font-semibold leading-relaxed">Your Satisfaction, Our Priority</span>
                </div>
            </div>
        </div>
    </section>

    <!-- discover services -->
    <div class="lg:px-12">
        <div class="flex flex-col items-center justify-center mt-10">
            <div class="flex flex-col items-center justify-center">
                <h1 class="text-4xl font-bold text-sky-600 text-center">Discover Our Services</h1>
                <p class="text-lg text-gray-700 mt-2 text-center">We offer a wide range of services and learnings for your pets.</p>
            </div>
            <div class="grid grid-cols-6 lg:p-4 p-2 lg:gap-4 gap-2 bg-gray-100 mt-10 rounded-lg">
                <div class="col-span-6 lg:col-span-3 flex flex-col items-center">
                    <a href="#" class="focus:outline-none">
                        <img src="{{asset('images/services/learn-now.jpg')}}" alt="" class="rounded-md lg:w-full transition-transform duration-300 hover:scale-105">
                    </a>
                </div>
                <div class="lg:col-span-1 col-span-2 flex flex-col items-center">
                    <a href="#" class="focus:outline-none">
                        <img src="{{asset('images/services/1.jpg')}}" alt="Pet Insurance" class="lg:w-full lg:h-full rounded-md transition-transform duration-300 hover:scale-105 object-cover">
                    </a>
                    <p class="text-center text-gray-700 font-semibold mt-2">Veterinary</p>
                </div>
                <div class="lg:col-span-1 col-span-2 flex flex-col items-center">
                    <a href="#" class="focus:outline-none">
                        <img src="{{asset('images/services/2.jpg')}}" alt="Veterinary" class="lg:w-full lg:h-full rounded-md transition-transform duration-300 hover:scale-105 object-cover">
                    </a>
                    <p class="text-center text-gray-700 font-semibold mt-2">Grooming</p>
                </div>
                <div class="lg:col-span-1 col-span-2 flex flex-col items-center">
                    <a href="#" class="focus:outline-none">
                        <img src="{{asset('images/services/3.jpg')}}" alt="Grooming" class="lg:w-full lg:h-full rounded-md transition-transform duration-300 hover:scale-105 object-cover">
                    </a>
                    <p class="text-center text-gray-700 font-semibold mt-2">Wellness & Laboratory</p>
                </div>

            </div>
        </div>
    </div>

    <!-- Price Lists Section -->



    <section class="bg-orange-100" id="pricelists">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <div class="flex justify-center items-center">
                    <h2 class="mb-4 lg:text-4xl text-xl tracking-tight font-extrabold text-orange-500 mr-2">Affordable </h2>
                    <i data-lucide="philippine-peso " class="mb-4 lg:w-10 lg:h-10 tracking-tight font-extrabold text-orange-500"></i>
                    <h2 class=" mb-4 lg:text-4xl text-xl tracking-tight font-extrabold text-orange-500">ricelists</h2>
                </div>

                <p class=" mb-5 font-light text-gray-500 sm:text-xl">Find the best deals at budget-friendly prices without compromising quality!</p>
            </div>
            <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                <!-- Pricing Card -->
                <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border-2 border-orange-300 shadow-lg transition-transform duration-300 ease-in-out transform hover:scale-105">
                    <h3 class="mb-4 text-2xl font-semibold bg-orange-500 text-white p-2 rounded">GROOMING</h3>
                    <p class="font-light text-gray-500 sm:text-lg">Reliable healthcare and diagnostic services at affordable prices!</p>
                    <!-- List -->
                    <div class="mx-auto max-w-lg mt-2 p-4">
                        <ul id="list-item" class="list-disc space-y-3 text-gray-900 text-left text-sm">
                            <li>Dog Full Grooming (≤10kg) - <span class="text-orange-500">₱600</span></li>
                            <li class="hidden">Dog Full Grooming (11-20kg) - <span class="text-orange-500">₱800</span></li>
                            <li class="hidden">Dog Full Grooming (21-30kg) - <span class="text-orange-500">₱1,000</span></li>
                            <li>Dog Full Grooming (31-40kg) - <span class="text-orange-500">₱1,300</span></li>
                            <li class="hidden">Dog Full Grooming (41-50kg) - <span class="text-orange-500">₱1,600</span></li>
                            <li>Bath & Blowdry (≤10kg) - <span class="text-orange-500">₱300</span></li>
                            <li class="hidden">Bath & Blowdry (11-20kg) - <span class="text-orange-500">₱500</span></li>
                            <li>Bath & Blowdry (21-30kg) - <span class="text-orange-500">₱700</span></li>
                            <li>Medicated Bath (≤10kg) - <span class="text-orange-500">₱300</span></li>
                            <li class="hidden">Medicated Bath (11-20kg) - <span class="text-orange-500">₱500</span></li>
                            <li class="hidden">Medicated Bath (21-30kg) - <span class="text-orange-500">₱700</span></li>
                            <li class="hidden">Dematting - <span class="text-orange-500">₱500</span></li>
                            <li>Pet Massage - <span class="text-orange-500">₱200</span></li>
                            <li class="hidden">Dog Full Grooming (51-60kg) - <span class="text-orange-500">₱1,900</span></li>
                        </ul>
                    </div>
                </div>

                <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border-2  border-orange-300 b shadow-lg transition-transform duration-300 ease-in-out transform hover:scale-105">
                    <h3 class="mb-4 text-2xl font-semibold bg-orange-500 text-white p-2 rounded">Wellness & Laboratory</h3>
                    <p class="font-light text-gray-500 sm:text-lg">Reliable healthcare and diagnostic services at affordable prices!</p>

                    <!-- List -->
                    <div class="mx-auto max-w-lg mt-2 p-4">
                        <ul id="list-item" class="list-disc  space-y-3 text-gray-900 text-left text-sm">
                            <li>Issuance of Health Certificate - <span class="text-orange-500">₱400.00</span></li>
                            <li>Additional Puppy Book Charge - <span class="text-orange-500">₱100.00</span></li>
                            <li>General Health Profile - <span class="text-orange-500">₱2,500.00</span></li>
                            <li>Tooth Extraction Simple - <span class="text-orange-500">₱700.00</span></li>
                            <li>Wound Cleaning - <span class="text-orange-500">₱400.00</span></li>
                            <li>Consultation - <span class="text-orange-500">₱500.00</span></li>
                            <li class="hidden">Dental Extraction (Per Tooth) Complicated - <span class="text-orange-500">₱700.00</span></li>
                            <li class="hidden">Anal Sac Draining (Preventive) - <span class="text-orange-500">₱300.00</span></li>
                            <li class="hidden">Anal Gland Expression (Routine) - <span class="text-orange-500">₱500.00</span></li>
                            <li class="hidden">Digital X-ray - <span class="text-orange-500">₱1,000.00</span></li>
                            <li class="hidden">Ultrasound - <span class="text-orange-500">₱700.00</span></li>
                            <li class="hidden">Complete Blood Count - <span class="text-orange-500">₱800.00</span></li>
                            <li class="hidden">Urinalysis Microscopic Exam - <span class="text-orange-500">₱600.00</span></li>
                            <li class="hidden">Bacterial Culture and Antibiotic Sensitivity - <span class="text-orange-500">₱500.00</span></li>
                            <li class="hidden">Intestinal Parasite Check - <span class="text-orange-500">₱2,500.00</span></li>
                            <li class="hidden">Heartworm Antigen Test Kit - <span class="text-orange-500">₱1,000.00</span></li>
                            <li class="hidden">Distemper Antigen Test Kit - <span class="text-orange-500">₱1,000.00</span></li>
                            <li class="hidden">Skin Cytology - <span class="text-orange-500">₱350.00</span></li>
                            <li class="hidden">Ear Cytology - <span class="text-orange-500">₱350.00</span></li>
                            <li class="hidden">Professional Dental Cleaning 10kg below - <span class="text-orange-500">₱3,000.00</span></li>
                        </ul>
                    </div>
                </div>

                <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border-2 border-orange-300 shadow-lg transition-transform duration-300 ease-in-out transform hover:scale-105">
                    <h3 class="mb-4 text-lg font-semibold bg-orange-500 text-white p-2 rounded">VACCINATION & PHARMACY</h3>
                    <p class="font-light text-gray-500 sm:text-lg">Reliable healthcare and diagnostic services at affordable prices!</p>

                    <!-- List -->
                    <div class="mx-auto max-w-lg mt-2 p-4">
                        <ul id="list-item" class="list-disc space-y-3 text-gray-900 text-left text-sm">
                            <li>Deworming 21kg to 30kg Tablet - <span class="text-orange-500">₱500.00</span></li>
                            <li>Tricat Vaccine - <span class="text-orange-500">₱1,200.00</span></li>
                            <li>Vaccine 6-in-1 - <span class="text-orange-500">₱950.00</span></li>
                            <li>Vaccine Kennel Cough - <span class="text-orange-500">₱1,000.00</span></li>
                            <li>Vaccine Anti Rabies - <span class="text-orange-500">₱400.00</span></li>
                            <li>RCCP Vaccine - <span class="text-orange-500">₱1,000.00</span></li>
                            <li class="hidden">Proheart Injection 5kg below - <span class="text-orange-500">₱1,500.00</span></li>
                            <li class="hidden">Proheart Injection 6kg to 10kg - <span class="text-orange-500">₱2,000.00</span></li>
                            <li class="hidden">Proheart Injection 11kg to 15kg - <span class="text-orange-500">₱2,500.00</span></li>
                            <li class="hidden">Deworming 6kg to 10kg Tablet - <span class="text-orange-500">₱300.00</span></li>
                            <li class="hidden">Deworming 11kg to 20kg Tablet - <span class="text-orange-500">₱400.00</span></li>
                            <li class="hidden">Proheart Injection 16kg to 20kg - <span class="text-orange-500">₱4,500.00</span></li>
                            <li class="hidden">Antibiotic Injection 5kg below - <span class="text-orange-500">₱300.00</span></li>
                            <li class="hidden">Antibiotic Injection 6kg to 10kg - <span class="text-orange-500">₱400.00</span></li>
                            <li class="hidden">Antibiotic Injection 11kg to 20kg - <span class="text-orange-500">₱500.00</span></li>
                            <li class="hidden">Multivitamin Injection 5kg below - <span class="text-orange-500">₱300.00</span></li>
                            <li class="hidden">Multivitamin Injection 6kg to 10kg - <span class="text-orange-500">₱400.00</span></li>
                            <li class="hidden">Multivitamin Injection 11kg to 20kg - <span class="text-orange-500">₱500.00</span></li>
                            <li class="hidden">Multivitamin Injection 21kg to 40kg - <span class="text-orange-500">₱700.00</span></li>
                            <li class="hidden">Tolfidine Injection - <span class="text-orange-500">₱300.00</span></li>
                            <li class="hidden">Corforta Roborant - <span class="text-orange-500">₱350.00</span></li>
                            <li class="hidden">Biocan - <span class="text-orange-500">₱800.00</span></li>
                            <li class="hidden">Deworming 5kg below Tablet - <span class="text-orange-500">₱190.00</span></li>
                            <li class="hidden">Vaccine 8-in-1 - <span class="text-orange-500">₱750.00</span></li>
                    </div>
                    </ul>
                </div>
            </div>
            <div class="flex justify-center ">
                <button id="see-more-btn" class="mt-4 px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 w-32">
                    See More
                </button>
            </div>
        </div>
    </section>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const button = document.getElementById("see-more-btn");
                        const hiddenItems = document.querySelectorAll("ul li.hidden");
                        let expanded = false;

                        button.addEventListener("click", function() {
                            if (!expanded) {
                                hiddenItems.forEach(item => item.classList.remove("hidden"));
                                button.textContent = "Show Less";
                            } else {
                                hiddenItems.forEach(item => item.classList.add("hidden"));
                                button.textContent = "See More";
                            }
                            expanded = !expanded;
                        });
                    });
                </script>



    <!-- Return to Top Button -->
    <x-return-top />
</body>

<x-footer bgColor=" bg-gradient-to-r from-orange-600" />

</html>