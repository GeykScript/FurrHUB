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
<div class="pt-[100px]"></div>



<!-- catergory part -->

<body class="font-sans antialiased bg-white-400 dark:text-black/50">
    <div class="bg-white">

        <div class="md:px-[12rem]  px-2 xl:mt-10">
            <div class="flex flex-row items-center justify-start md:px-10 px-2 mt-5 h-20  ">
                <div class="flex flex-row items-center md:gap-2 gap-1 ">
                    <div> <i data-lucide="paw-print" class=" w-12 h-12 text-orange-500 mx-auto"></i></div>
                    <h1 class="md:text-4xl text-lg font-bold text-orange-500 ">Make an Appointment</h1>
                </div>
            </div>
        </div>
        <div class="mt-2 w-full">
            <div class="md:px-[15rem] flex gap-5 items-center px-4  text-sm md:text-lg">
                <a href="{{route('appointment')}}" class="hover:underline hover:text-orange-400">Dashboard</a>
                <div> > </div>
                <a href="{{route('appointment.add-appointment')}}" class="hover:underline text-orange-500">Appointment</a>
            </div>
        </div>


        <form class="md:px-[15rem] px-4 py-8" action="" method="">
            <div class="grid grid-cols-1 sm:grid-cols-1 xl:grid-cols-2 gap-4">
                <!-- Left Column -->
                <div class="flex flex-col gap-4">
                    <div>
                        <p><strong>Note:</strong> Before availing our services, please ensure that your pet is at least 7 days post-vaccination for their safety and well-being.</p>
                    </div>
                    <div>
                        <label class="block text-gray-700">Owner Name</label>
                        <x-text-input type="text" readonly class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-400 mt-2" required value="{{$user->first_name }} {{ $user->last_name }} "></x-text-input>
                    </div>
                    <div>
                        <label class="block text-gray-700">Pet's Name</label>
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-400 mt-2" required>
                            <option value="">--Select--</option>
                            @foreach($pets as $pet)
                            <option value="{{ $pet->pet_id }}">{{ $pet->pet_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div>
                        <p>Our services are available from Monday to Friday, between 9:00 AM and 4:00 PM only.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700">Date</label>
                            <x-text-input
                                type="date"
                                class="w-full px-4 py-2 border rounded-lg  mt-2 appearance-none"
                                required
                                min="1"></x-text-input>
                            <p class="text-sm text-red-500" id="dateError" hidden>Please select a date between Monday and Friday.</p>
                        </div>
                        <div>
                            <label class="block text-gray-700">Time</label>
                            <x-text-input type="time" class="w-full px-4 py-2 border rounded-lg  mt-2" required></x-text-input>
                            <p class="text-sm text-red-500" id="timeError" hidden>Please select a time between 9:00 AM and 4:00 PM.</p>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700  mb-2">Type of Service</label>
                        <div class="flex items-center gap-4">
                            <!-- Grooming Button -->
                            <button type="button" class="w-1/2 px-4 py-2 rounded-lg text-gray-700 bg-white border " id="groomingBtn">
                                Grooming
                            </button>

                            <!-- Veterinary Button -->
                            <button type="button" class="w-1/2 px-4 py-2 rounded-lg text-gray-700 bg-white border " id="vetBtn">
                                Veterinary
                            </button>

                            <!-- Wellness & Laboratory Button -->
                            <button type="button" class="w-1/2 px-4 py-3 rounded-lg text-gray-700 text-xs bg-white border" id="wellnessBtn">
                                Wellness & Laboratory
                            </button>

                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700">Offered Services:</label>

                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-400 mt-2" id="grooming"  required>
                            <option value="">--Select Grooming Services--</option>
                            @foreach($grooming_service as $grooming)
                            @if (!empty($product->discount))
                            <option value="{{$grooming->service_id}}">{{$grooming->name}} ₱ {{ number_format($grooming->discounted_price, 2) }}</option>
                            @else
                            <option value="{{$grooming->service_id}}">{{$grooming->name}} ₱ {{ number_format($grooming->price, 2) }}</option>
                            @endif
                            @endforeach
                        </select>
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-400 mt-2" id="vet" hidden required>
                            <option value="">--Select Vet Services--</option>
                            @foreach($veterinary_service as $veterinary)
                            @if (!empty($product->discount))
                            <option value="{{$veterinary->service_id}}">{{$veterinary->name}} ₱ {{ number_format($veterinary->discounted_price, 2) }}</option>
                            @else
                            <option value="{{$veterinary->service_id}}">{{$veterinary->name}} ₱ {{ number_format($veterinary->price, 2) }}</option>
                            @endif
                            @endforeach
                        </select>
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-400 mt-2" id="wellness" hidden required>
                            <option value="">--Select Wellness & Lab Services--</option>
                            @foreach($wellness_service as $wellness)
                            @if (!empty($product->discount))
                            <option value="{{$wellness->service_id}}">{{$wellness->name}} ₱ {{ number_format($wellness->discounted_price, 2) }}</option>
                            @else
                            <option value="{{$wellness->service_id}}">{{$wellness->name}} ₱ {{ number_format($wellness->price, 2) }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>


                </div>

                <!-- Right Column -->
                <div class="flex flex-col gap-10 p-4 rounded-lg shadow-md">
                    <div>
                        <h1 class="text-2xl font-bold text-orange-500 flex gap-2"><span><i data-lucide="paw-print"></i></span>Important Note For Our Customers</h1>
                        <p class="text-gray-700 mt-2">Please ensure that your pet is properly registered with us. This is important for the safety and well-being of your pet during their visit.</p>

                        <div class="text-gray-700 bg-white rounded-lg shadow-md p-4 mt-4">
                            <h2 class="text-lg font-bold mt-3">First-Time Customers / No Prior Services</h2>
                            <p class="ml-2">No additional documents are required for your first visIt, Just ensure your pet is properly registered.</p>
                        </div>
                        <div class="text-gray-700 bg-white rounded-lg shadow-md p-4 mt-4">
                            <h2 class="text-lg font-bold mt-3">Customers With Prior Services</h2>
                            <p class="ml-2">Please bring your pet’s booklet or vaccination proof to your appointment.</p>
                        </div>
                        <div class="text-gray-700 bg-white rounded-lg shadow-md p-4 mt-4">
                            <h2 class="text-lg font-bold mt-3">Service Payment</h2>
                            <p class="ml-2">Please be advised that payment will be settled upon completion of the service.</p>
                        </div>



                    </div>
                </div>

                <!-- Buttons -->
                <div class="col-span-1 sm:col-span-2 flex flex-col sm:flex-row flex-col-reverse justify-center sm:justify-end items-center gap-4 mt-6 w-full">
                    <a href="{{route('appointment')}}" class="text-gray-500 hover:text-gray-700">Cancel</a>
                    <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-lg hover:bg-orange-600 w-full sm:w-auto">Submit</button>
                </div>
            </div>
        </form>

    </div>



    <x-return-top />


    <script>
        // Initially, set Grooming as selected
        let selectedBtn = document.getElementById('groomingBtn');
        selectedBtn.classList.add('border-orange-400', 'text-orange-400'); // Highlight Grooming button

        document.getElementById('groomingBtn').addEventListener('click', function() {
            // Remove highlight from all buttons
            document.getElementById('groomingBtn').classList.add('border-orange-400', 'text-orange-400');
            document.getElementById('vetBtn').classList.remove('border-orange-400', 'text-orange-400');
            document.getElementById('wellnessBtn').classList.remove('border-orange-400', 'text-orange-400');

            // Show Grooming select, hide others
            document.getElementById('grooming').removeAttribute('hidden');
            document.getElementById('vet').setAttribute('hidden', true);
            document.getElementById('wellness').setAttribute('hidden', true);
        });

        document.getElementById('vetBtn').addEventListener('click', function() {
            // Remove highlight from all buttons
            document.getElementById('groomingBtn').classList.remove('border-orange-400', 'text-orange-400');
            document.getElementById('vetBtn').classList.add('border-orange-400', 'text-orange-400');
            document.getElementById('wellnessBtn').classList.remove('border-orange-400', 'text-orange-400');

            // Show Veterinary select, hide others
            document.getElementById('vet').removeAttribute('hidden');
            document.getElementById('grooming').setAttribute('hidden', true);
            document.getElementById('wellness').setAttribute('hidden', true);
        });

        document.getElementById('wellnessBtn').addEventListener('click', function() {
            // Remove highlight from all buttons
            document.getElementById('groomingBtn').classList.remove('border-orange-400', 'text-orange-400');
            document.getElementById('vetBtn').classList.remove('border-orange-400', 'text-orange-400');
            document.getElementById('wellnessBtn').classList.add('border-orange-400', 'text-orange-400');

            // Show Wellness select, hide others
            document.getElementById('wellness').removeAttribute('hidden');
            document.getElementById('grooming').setAttribute('hidden', true);
            document.getElementById('vet').setAttribute('hidden', true);
        });




        document.addEventListener("DOMContentLoaded", function() {
            const dateInput = document.querySelector('input[type="date"]');
            const timeInput = document.querySelector('input[type="time"]');
            const dateError = document.getElementById('dateError');
            const timeError = document.getElementById('timeError');

            // Function to check the selected date and time
            function checkDateAndTime() {
                const selectedDate = new Date(dateInput.value);
                const selectedTime = timeInput.value;
                const dayOfWeek = selectedDate.getDay(); // Sunday = 0, Monday = 1, ..., Saturday = 6

                // Check if the selected day is Monday to Friday (1-5)
                if (dayOfWeek === 0 || dayOfWeek === 6) {
                    dateError.hidden = false; // Show the error message
                    dateInput.classList.add('border-red-500'); // Add red border to input
                } else {
                    dateError.hidden = true; // Hide the error message
                    dateInput.classList.remove('border-red-500'); // Remove red border
                }

                // Check if the selected time is between 9:00 AM and 4:00 PM
                const [hours, minutes] = selectedTime.split(":");
                const timeInMinutes = parseInt(hours) * 60 + parseInt(minutes);
                if (timeInMinutes < 540 || timeInMinutes > 960) { // 9:00 AM = 540, 4:00 PM = 960
                    timeError.hidden = false; // Show the error message
                    timeInput.classList.add('border-red-500'); // Add red border to input
                } else {
                    timeError.hidden = true; // Hide the error message
                    timeInput.classList.remove('border-red-500'); // Remove red border
                }
            }

            // Event listeners to trigger the validation
            dateInput.addEventListener("change", checkDateAndTime);
            timeInput.addEventListener("change", checkDateAndTime);
        });
    </script>
</body>
<!-- Footer -->
<x-footer bgColor=" bg-gradient-to-r from-orange-600" />

</html>