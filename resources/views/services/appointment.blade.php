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


<!-- Modal Edit -->
<dialog id="petEdit" class="p-6 rounded-lg shadow-lg w-full max-w-lg backdrop:bg-black/30 overflow-hidden">
    <form method="POST" action="{{ route('appointment.editpet') }}" enctype="multipart/form-data" class="relative bg-white p-6 rounded-lg">
        @csrf
        <input type="hidden" name="pet_id" id="pet_id">

        <div class="mb-2">
            <h1 class="text-2xl font-bold text-center text-orange-500">Edit Pet</h1>
            <p class="text-sm text-gray-500 text-center">Edit your pet's information.</p>
        </div>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <!-- Close Button -->
            <div class="absolute top-2 right-2">
                <button type="button" onclick="document.getElementById('petEdit').close()" class="text-orange-500 hover:text-orange-600">
                    <img src="{{asset ('logo/x.svg')}}" alt="cancel" class="h-5 w-5 md:h-7 md:w-7 hover:cursor-pointer" />
                </button>
            </div>
            <div class="col-span-2 flex flex-col items-center">
                <div class="lg:w-[200px] lg:h-[200px] w-[150px] h-[150px] bg-orange-300 rounded-full flex items-center justify-center">
                    <img id="preview" src="" class="lg:w-[200px] lg:h-[200px] w-[150px] h-[150px] rounded-full object-cover">
                </div>

                <label for="pet_img" class="mt-3 inline-flex items-center p-2 gap-2 border border-orange-500 text-orange-500 text-sm rounded-lg hover:bg-orange-100 cursor-pointer">
                    <input type="file" id="pet_img" name="pet_img" class="hidden" accept="image/*" onchange="previewImage(event)">
                    <span class="ml-2">Edit Profile </span><i data-lucide="upload" class="h-4 w-4"></i>
                </label>
            </div>

            <!-- Pet's Name -->
            <div class="col-span-2 sm:col-span-2 gap-2">
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-3">
                    <div class="col-span-2">
                        <label class="block text-gray-700" for="pet_name">Pet’s Name</label>
                        <x-text-input type="text" id="pet_name" name="pet_name" class="w-full px-4 py-2 border border-gray-300 rounded-lg  mt-2" required></x-text-input>
                    </div>
                    <div class="lg:col-span-1 col-span-2">
                        <label class="block text-gray-700" for="pet_age">Age (yr.)</label>
                        <x-text-input type="text" id="pet_age" name="pet_age" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-400 mt-2 appearance-none" required></x-text-input>
                    </div>
                    <div class="lg:col-span-1 col-span-2">
                        <label class="block text-gray-500" for="pet_gender">Gender</label>
                        <input readonly type="text" id="pet_gender" name="pet_gender" class="text-gray-500 w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none  focus:border-gray-200 focus:ring-0 mt-2" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 mt-2">
                    <div class="lg:col-span-1 col-span-2">
                        <label class="block text-gray-700" for="pet_weight">Weight (kg)</label>
                        <x-text-input type="text" id="pet_weight" name="pet_weight" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-400 mt-2" required></x-text-input>
                    </div>
                    <div class="lg:col-span-1 col-span-2">
                        <label class="block text-gray-700">Size</label>
                        <select id="pet_size" name="pet_size" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-400 mt-2" required>
                            <option value="">--Select--</option>
                            <option value="Small">Small</option>
                            <option value="Medium">Medium</option>
                            <option value="Large">Large</option>
                            <option value="Extra Large">Extra Large</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 mt-2">
                    <div class="lg:col-span-1 col-span-2">
                        <label class="block text-gray-500">Birthday</label>
                        <input type="text" readonly id="pet_birthday" name="pet_birthday" class="text-gray-500 w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none  focus:border-gray-200 focus:ring-0 mt-2" required>
                    </div>
                    <div class="lg:col-span-1 col-span-2">
                        <label class="block text-gray-500">Color</label>
                        <input readonly type="text" id="pet_color" name="pet_color" class="text-gray-500 w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none  focus:border-gray-200 focus:ring-0 mt-2" required>
                    </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 mt-2">
                    <div class="lg:col-span-1 col-span-2">
                        <label class="block text-gray-500">Type</label>
                        <input type="text" readonly id="pet_type" name="pet_type" class="text-gray-500 w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none  focus:border-gray-200 focus:ring-0 mt-2" required>
                    </div>
                    <div class="lg:col-span-1 col-span-2">
                        <label class="block text-gray-500">Breed</label>
                        <input readonly type="text" id="pet_breed" name="pet_breed" class="text-gray-500 w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none  focus:border-gray-200 focus:ring-0 mt-2" required>
                    </div>
                </div>
            </div>
        </div>
        <!-- Buttons -->
        <div class="flex flex-col-reverse lg:flex-row justify-end items-center gap-4 mt-6 w-full">
            <a onclick="document.getElementById('petEdit').close()" class="text-gray-500 hover:text-gray-700 hover:cursor-pointer">Cancel</a>
            <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-lg hover:bg-orange-600 w-full sm:w-auto">Submit</button>
        </div>
    </form>
</dialog>

<dialog id="cancelAppointment" class="p-6 rounded-lg shadow-lg w-full max-w-md backdrop:bg-black/30 border-none outline-none">
    <div class="bg-white p-6 rounded-lg text-center justify-center">
        <div class="flex justify-center items-center text-center">
            <i data-lucide="triangle-alert" class="text-center w-20 h-20 text-red-500"></i>
            <!-- Hidden input for appointment ID -->
            <form id="cancelAppointmentForm" method="POST" action="{{ route('appointment.cancel-appointment') }}">
                @csrf
                <input type="hidden" name="appointment_id" id="appointment_id">
            </form>
        </div>
        <p class="mt-2 text-lg text-gray-800">Are you sure you want to cancel this appointment?</p>
        <div class="flex justify-center mt-4">
            <!-- Button to submit the form and cancel the appointment -->
            <button id="confirmDeleteBtn" class="mr-4 w-full outline-none focus:outline-none border-white bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600" onclick="document.getElementById('cancelAppointmentForm').submit();">
                Yes
            </button>
            <!-- Button to close the modal without cancellation -->
            <button onclick="document.getElementById('cancelAppointment').close();" class="w-full outline-none focus:outline-none border-red-500 bg-white text-red-600 py-2 px-4 rounded-lg hover:border-red-600 hover:bg-red-100">
                No
            </button>
        </div>
    </div>
</dialog>

<!-- nav part -->
<x-nav-bar-2></x-nav-bar-2>


<div class="lg:pt-[80px] pt-[70px] lg:mb-10"></div>

<body class="font-sans antialiased bg-white-400 dark:text-black/50 min-h-screen flex flex-col">
    <div class="bg-white flex-grow">
        <div class="rounded-2xl  md:h-full ">
            <img src="{{asset('images/welcome-booking.png')}}" alt="" class="w-full lg:h-full h-[150px]  object-contain" />
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

                        @if (session()->has('success'))
                        <div class="col-span-3 mt-1 text-white bg-green-400  border border-green-400 p-3 rounded relative">
                            <span class="text-sm font-medium ">{{ session('success') }}</span>
                        </div>
                        @endif
                    </div>
                    <!---pet images-->
                    <div class="grid grid-cols-2 gap-2  md:grid-cols-3 lg:grid-cols-3 lg:gap-6 mt-6 justify-center ">
                        @foreach ($pets as $pet)
                        <button
                            class="edit-pet-btn hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105"
                            onclick="openPetEditModal(this)"
                            data-id="{{ $pet->pet_id }}"
                            data-name="{{ $pet->pet_name }}"
                            data-type="{{ $pet->animal_type }}"
                            data-breed="{{ $pet->pet_breed }}"
                            data-age="{{ $pet->age }}"
                            data-color="{{ $pet->color }}"
                            data-gender="{{ $pet->gender }}"
                            data-birthday="{{ $pet->birthday }}"
                            data-weight="{{ $pet->weight }}"
                            data-size="{{ $pet->Size }}"
                            data-img="{{ asset('storage/pet_picture/' . $pet->pet_img) }}">
                            <img src="{{ asset('storage/pet_picture/' . $pet->pet_img) }}" class="w-32 h-32 object-cover rounded-lg" />
                            <h1 class="mt-2 font-semibold">{{ $pet->pet_name }}</h1>
                        </button>
                        @endforeach
                        <!--add new pet-->
                        <a href="{{route('add-pet')}}" class="flex flex-col justify-center items-center text-center p-4  hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 ">
                            <div class="w-[110px] h-[110px] flex justify-center items-center border-4 border-gray-700 bg-sky-400 hover:bg-sky-300 rounded-xl transition duration-200">
                                <i data-lucide="plus" class="w-[30px] h-[30px]"></i>
                            </div>
                            <p class="mt-2 font-semibold">Add Pet</p>
                        </a>
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
            @if (session()->has('appointment_success'))
            <div class="col-span-3 mt-1 text-white bg-green-400  border border-green-400 p-3 rounded relative">
                <span class="text-sm font-medium ">{{ session('appointment_success') }}</span>
            </div>
            @endif
            <a href="{{route('appointment.add-appointment')}}" class="flex items-center justify-end hover:underline hover:text-orange-400">
                <i data-lucide="plus" class="w-[20px] h-[20px] sm:w-[30px] sm:h-[30px] text-orange-500"></i>
                <h2 class="text-sm sm:text-lg font-semibold text-orange-500">Make an Appointment</h2>
            </a>

            <!-- Appointment Categories -->
            <div class="flex flex-col items-center justify-center w-full px-4">
                <!-- Filters -->
                <div class="flex flex-row mt-6 text-[12px] md:text-lg">
                    <button class="text-wrap px-3 sm:px-8 py-2 filter-tab border-b-2 w-full sm:w-auto text-center" data-filter="Grooming" onclick="filterAppointments('Grooming')">Grooming</button>
                    <button class="text-wrap px-3 sm:px-8 py-2 filter-tab border-b-2 w-full sm:w-auto text-center" data-filter="Wellness & Laboratory" onclick="filterAppointments('Wellness & Laboratory')">Wellness & Laboratory</button>
                    <button class="text-wrap px-3 sm:px-8 py-2 filter-tab border-b-2 w-full sm:w-auto text-center" data-filter="Veterinary" onclick="filterAppointments('Veterinary')">Veterinary</button>
                </div>
            </div>

            <div class="flex flex-col items-center justify-center w-full px-4">
                @foreach ($appointments as $appointment)
                @php
                $category = match($appointment->service?->category) {
                8 => 'Grooming',
                9 => 'Veterinary',
                10 => 'Wellness & Laboratory',
                default => $appointment->service?->category?->name ?? 'No Category'
                };
                @endphp


                <div class="appointments flex flex-col lg:flex-row items-center lg:items-start gap-6 p-6 md:px-12 mt-6 border pb-6 w-full max-w-5xl mx-auto rounded-lg shadow-md bg-white" data-category="{{ $category }}">
                    <!-- Image Section -->
                    <div class="flex-shrink-0">
                        <img src="{{ asset('logo/furrhub.png') }}"
                            alt="Notification Image"
                            class="w-32 h-32 rounded-lg object-contain">
                    </div>

                    <!-- Notification Details -->
                    <div class="flex-1 text-center lg:text-left gap-2">
                        <h2 class="text-xl font-bold flex lg:flex-row flex-col flex-col-reverse justify-between">{{ $appointment->service->name }}
                            @if ($appointment->status->status_name == 'Completed')
                            <span class="text-green-500">{{$appointment->status->status_name}}</span>
                            @elseif ($appointment->status->status_name == 'Pending')
                            <span class="text-orange-500">{{$appointment->status->status_name}}</span>
                            @elseif ($appointment->status->status_name == 'Cancelled')
                            <span class="text-red-500">{{$appointment->status->status_name}}</span>
                            @endif
                        </h2>
                        <p class="text-lg text-gray-500 flex flex-row gap-4">
                            <b>Date:</b> {{ $appointment->appointment_date }}
                            <span><b>Time:</b> {{ $appointment->appointment_time }}</span>
                        </p>
                        <p class="text-lg text-gray-500"><b>Pet: </b>{{ $appointment->pet->pet_name }}</p>

                        <!-- Hidden Details -->
                        <details class="mt-3">
                            <summary class="cursor-pointer bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg text-sm inline-block">
                                View Details
                            </summary>
                            <div class="mt-2 p-4 border rounded-lg bg-gray-100">
                                <h1 class="text-lg text-gray-700 ml-2"><span class="text-gray-900 mr-2">Service:</span> {{ $appointment->service->name }}</h1>
                                <h1 class="text-lg text-gray-700 ml-2"><span class="text-gray-900 mr-2">Initial Service Fee:</span> ₱{{ number_format(!empty($appointment->service->discounted_price) ? $appointment->service->discounted_price : $appointment->service->price, 2) }}</h1>
                                <h1 class="text-lg text-gray-700 ml-2"><span class="text-gray-900 mr-2">Payment Method:</span> {{ $appointment->payment->payment_name }}</h1>
                                <h1 class="text-lg text-gray-700 ml-2"><span class="text-gray-900 mr-2">Payment Status:</span> {{ $appointment->statuses->status_name }}</h1>
                                @if ($appointment->status->status_name == 'Pending' )
                                <div class="flex justify-end items-end">
                                    <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 mt-2 "
                                        onclick=" cancelModal(this)"
                                        data-id="{{ $appointment->appointment_id }}">Cancel Appointment</button>
                                </div>
                                @endif
                            </div>
                        </details>
                    </div>
                </div>

                @endforeach
                <div id="noAppointmentsMessage" class="hidden text-center mt-10 text-gray-500 text-lg font-semibold">
                    <div class="flex justify-center items-center">
                        <img src="{{ asset('logo/furrhub.png') }}"
                            alt="Notification Image"
                            class="w-32 h-32 rounded-lg object-contain">
                    </div>
                    <p> No appointments. </p>

                </div>
            </div>

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
                    <div class="mx-auto max-w-lg mt-2 p-4">
                        <ul id="list-item" class="list-disc space-y-3 text-gray-900 text-left text-sm">
                            @php
                            $count = 0;
                            @endphp

                            @foreach ($grooming_service as $grooming)
                            @php
                            $count++;
                            $isHidden = $count > 5 ? 'hidden' : '';
                            @endphp

                            <li class="{{ $isHidden }}">
                                {{ $grooming->name }}

                                @if ($grooming->discount_id != null)
                                <div class="flex flex-row gap-2 mt-1">
                                    <p class="text-orange-500 line-through">₱ {{ number_format($grooming->price, 2) }}</p>
                                    <p class="text-orange-500">-</p>
                                    <p class="text-orange-500 font-bold">₱ {{ number_format($grooming->discounted_price, 2) }}</p>
                                    <p class="text-orange-500 text-center">({{ $grooming->discount_value }} Discount)</p>
                                </div>
                                @else
                                <div class="flex flex-row gap-2 mt-1">
                                    <p class="text-orange-500 font-bold">₱ {{ number_format($grooming->price, 2) }}</p>
                                </div>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border-2  border-orange-300 b shadow-lg transition-transform duration-300 ease-in-out transform hover:scale-105">
                    <h3 class="mb-4 text-2xl font-semibold bg-orange-500 text-white p-2 rounded">Wellness & Laboratory</h3>

                    <!-- List -->
                    <div class="mx-auto max-w-lg mt-2 p-4">
                        <ul id="list-item" class="list-disc  space-y-3 text-gray-900 text-left text-sm">
                            @php
                            $count = 0;
                            @endphp

                            @foreach ($wellness_service as $wellness)
                            @php
                            $count++;
                            $isHidden = $count > 5 ? 'hidden' : '';
                            @endphp

                            <li class="{{ $isHidden }}">
                                {{ $wellness->name }}
                                @if ($wellness->discount_id != null)
                                <div class="flex flex-row gap-2 mt-1">
                                    <p class="text-orange-500 line-through">₱ {{ number_format($wellness->price, 2) }}</p>
                                    <p class="text-orange-500">-</p>
                                    <p class="text-orange-500 font-bold">₱ {{ number_format($wellness->discounted_price, 2) }}</p>
                                    <p class="text-orange-500 text-center">({{ $wellness->discount_value }} Discount)</p>
                                </div>
                                @else
                                <div class="flex flex-row gap-2 mt-1">
                                    <p class="text-orange-500 font-bold">₱ {{ number_format($wellness->price, 2) }}</p>
                                </div>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border-2 border-orange-300 shadow-lg transition-transform duration-300 ease-in-out transform hover:scale-105">
                    <h3 class="mb-4 text-lg font-semibold bg-orange-500 text-white p-2 rounded">VACCINATION & PHARMACY</h3>

                    <!-- List -->
                    <div class="mx-auto max-w-lg mt-2 p-4">
                        <ul id="list-item" class="list-disc space-y-3 text-gray-900 text-left text-sm">
                            @php
                            $count = 0;
                            @endphp

                            @foreach ($veterinary_service as $veterinary)
                            @php
                            $count++;
                            $isHidden = $count > 5 ? 'hidden' : '';
                            @endphp

                            <li class="{{ $isHidden }}">
                                {{ $veterinary->name }}
                                @if ($veterinary->discount_id != null)

                                <div class="flex flex-row gap-2 mt-1">
                                    <p class="text-orange-500 line-through">₱ {{ number_format($veterinary->price, 2) }}</p>
                                    <p class="text-orange-500">-</p>
                                    <p class="text-orange-500 font-bold">₱ {{ number_format($veterinary->discounted_price, 2) }}</p>
                                    <p class="text-orange-500 text-center">({{ $veterinary->discount_value }} Discount)</p>
                                </div>
                                @else
                                <div class="flex flex-row gap-2 mt-1">
                                    <p class="text-orange-500 font-bold">₱ {{ number_format($veterinary->price, 2) }}</p>
                                </div>
                                @endif
                            </li>
                            @endforeach
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

        document.addEventListener("DOMContentLoaded", function() {
            filterAppointments("Grooming"); // Show default category on load
        });

        function filterAppointments(category) {
            let appointments = document.querySelectorAll(".appointments");
            let hasVisible = false;

            appointments.forEach(appointment => {
                let appointmentCategory = appointment.getAttribute("data-category")?.trim();

                if (appointmentCategory === category) {
                    appointment.style.display = "flex";
                    hasVisible = true;
                } else {
                    appointment.style.display = "none";
                }
            });

            // Show or hide the "no appointments" message
            const noAppointmentsMessage = document.getElementById("noAppointmentsMessage");
            if (noAppointmentsMessage) {
                noAppointmentsMessage.style.display = hasVisible ? "none" : "block";
            }

            updateActiveTab(category);
        }

        function updateActiveTab(activeTab) {
            let tabs = document.querySelectorAll(".filter-tab");
            tabs.forEach(tab => {
                if (tab.getAttribute("data-filter") === activeTab) {
                    tab.classList.add("border-orange-500", "text-orange-500", "font-bold");
                } else {
                    tab.classList.remove("border-orange-500", "text-orange-500", "font-bold");
                }
            });
        }


        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('preview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    const icon = document.querySelector('[data-lucide="user"]');
                    if (icon) {
                        icon.style.display = 'none';
                    }
                };
                reader.readAsDataURL(file);
            }
        }

        function openPetEditModal(button) {
            document.getElementById('pet_id').value = button.getAttribute('data-id');
            document.getElementById('pet_name').value = button.getAttribute('data-name');
            document.getElementById('pet_type').value = button.getAttribute('data-type');
            document.getElementById('pet_breed').value = button.getAttribute('data-breed');
            document.getElementById('pet_color').value = button.getAttribute('data-color');
            document.getElementById('pet_age').value = button.getAttribute('data-age');
            document.getElementById('pet_gender').value = button.getAttribute('data-gender');
            document.getElementById('pet_weight').value = button.getAttribute('data-weight');
            document.getElementById('pet_size').value = button.getAttribute('data-size');
            document.getElementById('preview').src = button.getAttribute('data-img');
            document.getElementById('pet_birthday').value = button.getAttribute('data-birthday');

            document.getElementById('petEdit').showModal();
        }

        function cancelModal(button) {
            document.getElementById('appointment_id').value = button.getAttribute('data-id');
            document.getElementById('cancelAppointment').showModal();
        }
    </script>



    <!-- Return to Top Button -->
    <x-return-top />
</body>

<x-footer bgColor=" bg-gradient-to-r from-orange-600" />

</html>