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
<x-nav-bar-2 />
<div class="lg:pt-[180px] pt-[100px]"></div>



<!-- catergory part -->

<body class="font-sans antialiased bg-white-400 dark:text-black/50">
    <div class="bg-white">
        <div class="mt-2 w-full  ">
            <div class="md:px-[15rem] flex gap-5 items-center px-4  text-sm md:text-lg">
                <a href="{{route('appointment')}}" class="hover:underline hover:text-orange-400">Dashboard</a>
                <div> > </div>
                <a href="{{route('appointment.add-appointment')}}" class="hover:underline text-orange-500">Appointment</a>
            </div>
        </div>
        <div class="md:px-[12rem]  px-2 ">
            <div class="flex flex-row items-center justify-start md:px-10 px-2 mt-5 h-20  ">
                <div class="flex flex-row items-center md:gap-2 gap-1 ">
                    <div> <i data-lucide="paw-print" class=" w-12 h-12 text-orange-500 mx-auto"></i></div>
                    <h1 class="md:text-4xl text-lg font-bold text-orange-500 ">FurrHUB Services Appointment</h1>
                </div>
            </div>
        </div>


        <div class="md:px-[15rem] px-4 py-8">
            <div class="grid grid-cols-1 sm:grid-cols-1 xl:grid-cols-2 gap-4">
                <!-- Left Column -->
                @foreach ($appointments as $appointment)
                <div class="grid grid-cols-2 p-0">
                    <div class="flex justify-center items-start p-0 lg:col-span-1 col-span-2">
                        <img src="{{ asset('storage/pet_picture/' . $appointment->pet->pet_img) }}" class="w-[19rem] h-[18rem] object-cover rounded-lg " />
                    </div>
                    <div class="gap-3 flex flex-col justify-start items-start">
                        <h1 class="text-xl text-orange-500 font-bold">Pet Details</h1>
                        <h1 class="text-5xl text-orange-600 font-bold">{{$appointment->pet->pet_name}}</h1>
                        <h1 class="text-lg text-gray-700 ml-2"><span class="text-gray-900 mr-2">Type:</span> {{$appointment->pet->animal_type}}</h1>
                        <h1 class="text-lg text-gray-700 ml-2"><span class="text-gray-900 mr-2">Breed:</span> {{$appointment->pet->pet_breed}}</h1>
                        <h1 class="text-lg text-gray-700 ml-2"><span class="text-gray-900 mr-2">Weight:</span> {{$appointment->pet->weight}} kg</h1>
                        <h1 class="text-lg text-gray-700 ml-2"><span class="text-gray-900 mr-2">Size:</span> {{$appointment->pet->Size}}</h1>
                        <h1 class="text-lg text-gray-700 ml-2"><span class="text-gray-900 mr-2">Birthdate:</span> {{$appointment->pet->birthday}}</h1>
                    </div>

                    <div class="gap-3 col-span-2 flex flex-col justify-start items-start px-8">
                        <h1 class="text-xl text-orange-500 font-bold mt-2">Appointment Details</h1>
                        <h1 class="text-lg text-gray-700 ml-2"><span class="text-gray-900 mr-2">Date:</span> {{$appointment->appointment_date}}</h1>
                        <h1 class="text-lg text-gray-700 ml-2"><span class="text-gray-900 mr-2">Time:</span> {{ $appointment->appointment_time}}</h1>
                        <h1 class="text-lg text-gray-700 ml-2">
                            <span class="text-gray-900 mr-2">Service:</span>
                            @if ($appointment->service?->category == 8)
                            Grooming
                            @elseif ($appointment->service?->category == 9)
                            Veterinary
                            @elseif ($appointment->service?->category == 10)
                            Wellness & Laboratory
                            @else
                            {{ $appointment->service?->category?->name ?? 'No Category' }}
                            @endif
                        </h1>
                        <h1 class="text-lg text-gray-700 ml-2"><span class="text-gray-900 mr-2">Service:</span> {{$appointment->service->name}}</h1>
                        <h1 class="text-lg text-gray-700 ml-2"><span class="text-gray-900 mr-2">Service Fee:</span> ₱ {{ number_format(!empty($appointment->service->discounted_price) ? $appointment->service->discounted_price : $appointment->service->price, 2) }}</h1>
                        <h1 class="text-lg text-gray-700 ml-2"><span class="text-gray-900 mr-2">Payment Method:</span> {{$appointment->payment->payment_name}}</h1>
                        <h1 class="text-lg text-gray-700 ml-2"><span class="text-gray-900 mr-2">Payment Status:</span> {{$appointment->statuses->status_name}}</h1>


                    </div>
                </div>

                @endforeach

                <!-- Right Column -->
                <div class="flex flex-col gap-10 p-4 rounded-lg shadow-md">
                    <div>
                        <h1 class="text-2xl font-bold text-orange-500 flex gap-2"><span><i data-lucide="paw-print"></i></span>Important Note For Our Customers</h1>
                        <p class="text-gray-700 mt-2">Please follow the instructions and ensure your pet is accounted for before the visit for their safety and well-being.</p>

                        <div class="text-gray-700 bg-white rounded-lg shadow-md p-4 mt-4">
                            <h2 class="text-lg font-bold mt-3">Service Fee Disclaimer</h2>
                            <p class="ml-2">The <span class="text-orange-500">service fee is not fixed </span> and may vary depending on the medications, additional treatments, and other services your pet requires. Please note that the total price may be higher based on your pet’s needs.</p>
                        </div>

                        <div class="text-gray-700 bg-white rounded-lg shadow-md p-4 mt-4">
                            <h2 class="text-lg font-bold mt-3">Timely Attendance & Cancellations</h2>
                            <p class="ml-2">Please arrive on time for your appointment. If you need to cancel, inform us ahead to avoid unnecessary charges and help us serve others.</p>
                        </div>
                        <div class="text-gray-700 bg-white rounded-lg shadow-md p-4 mt-4">
                            <h2 class="text-lg font-bold mt-3">Customer Requirements</h2>
                            <p class="ml-2"> <span class="text-orange-500">For first-time customers </span>, no additional documents are required,
                                just ensure your pet is properly accounted for. <span class="text-orange-500">For customers with prior services </span>, please bring your <span class="underline"> pet’s booklet or vaccination proof </span>to the appointment.</p>
                        </div>

                    </div>
                </div>

                <!-- Buttons -->
                <div class="col-span-1 sm:col-span-2 flex flex-col sm:flex-row  justify-center  items-center gap-4 mt-6 w-full px-8">
                    <a href="{{route('appointment')}}" class="bg-orange-500 text-white px-6 py-2 rounded-lg hover:bg-orange-600 w-full sm:w-auto">Return to Dashboard</a>
                </div>
            </div>
        </div>


    </div>



    <x-return-top />


</body>
<!-- Footer -->
<x-footer bgColor=" bg-gradient-to-r from-orange-600" />

</html>