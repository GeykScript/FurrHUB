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
                    <h1 class="md:text-4xl text-lg font-bold text-orange-500 ">Add Pet</h1>
                </div>
            </div>
        </div>
        <div class="mt-2 w-full">
            <div class="md:px-[15rem] flex gap-5 items-center px-4  text-sm md:text-lg">
                <a href="{{route('appointment')}}" class="hover:underline hover:text-orange-400">Dashboard</a>
                <div> > </div>
                <a href="{{route('notifications')}}" class="hover:underline text-orange-500">Pet</a>
            </div>
        </div>


        <form class="md:px-[15rem] px-4 py-8" action="{{route ('appointment.addpet')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-1 xl:grid-cols-2 gap-4">
                <!-- Left Column -->
                <div class="flex flex-col gap-4">
                    <div>
                        <label class="block text-gray-700">Pet’s Name</label>
                        <x-text-input type="text" id="pet_name" name="pet_name" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-400 mt-2" required></x-text-input>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Animal Type</label>
                        <div class="flex items-center gap-4">
                            <!-- Radio option for Dog -->
                            <label class="w-1/2 flex items-center gap-2 px-4 py-2 rounded-lg text-gray-700 bg-white  ">
                                <input type="radio" id="pet_type" name="pet_type" value="dog" class="peer h-5 w-5 text-orange-400 focus:ring-orange-400 border-gray-300">
                                <span class="peer-checked:text-orange-400">Dog</span>
                            </label>
                            <!-- Radio option for Cat -->
                            <label class="w-1/2 flex items-center gap-2 px-4 py-2 rounded-lg text-gray-700 bg-white ">
                                <input type="radio" id="pet_type" name="pet_type" value="cat" class="peer h-5 w-5 text-orange-400 focus:ring-orange-400 border-gray-300">
                                <span class="peer-checked:text-orange-400">Cat</span>
                            </label>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class=" block text-gray-700">Pet’s Birthday</label>
                            <x-text-input type="date" id="pet_birthday" name="pet_birthday" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-400 mt-2" required></x-text-input>
                        </div>
                        <div>
                            <label class="block text-gray-700">Age</label>
                            <x-text-input type="text" id="pet_age" name="pet_age" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-400 mt-2" required></x-text-input>

                        </div>
                        <div>
                            <label class="block text-gray-700">Gender</label>
                            <x-text-input type="text" id="pet_gender" name="pet_gender" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-400 mt-2" required> </x-text-input>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class=" block text-gray-700">Pet’s Breed</label>
                            <x-text-input type="text" id="pet_breed" name="pet_breed" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-400 mt-2" required></x-text-input>
                        </div>

                        <div>
                            <label class="block text-gray-700">Color</label>
                            <x-text-input type="text" id="pet_color" name="pet_color" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-400 mt-2" required> </x-text-input>
                        </div>
                    </div>


                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700">Weight (kg)</label>
                            <x-text-input type="text" id="pet_weight" name="pet_weight" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-400 mt-2" required></x-text-input>
                        </div>
                        <div>
                            <label class="block text-gray-700">Size</label>
                            <select id="pet_size" name="pet_size" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-400 mt-2" required>
                                <option value="">--Select--</option>
                                <option value="Small">Small</option>
                                <option value="Medium">Medium</option>
                                <option value="Large">Large</option>
                                <option value="Extra Large">Extra Large</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="flex flex-col gap-10">
                    <!-- Upload Photo Section -->
                    <div>
                        <label class="block text-gray-700">Upload Photo</label>
                        <div class="border-dashed border-2 p-6 text-center rounded-lg cursor-pointer mt-2 w-full h-40 flex items-center justify-center hover:bg-gray-100" onclick="document.getElementById('uploadPhoto').click()">
                            <p id="text-uploadPhoto" class="text-gray-500">
                                Drag your photo here or <span class="text-orange-500 cursor-pointer">Browse from device</span>
                            </p>
                            <p id="fileName-uploadPhoto" class="mt-2 text-sm text-orange-600 px-3 py-1 rounded-md w-fit max-w-full truncate" hidden></p>
                            <input type="file" id="uploadPhoto" name="uploadPhoto" class="hidden" accept="image/*">
                            <i data-lucide="image-up" class="text-orange-500 ml-1"></i>
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
    <script>
        document.getElementById('uploadPhoto').addEventListener('change', function() {
            const fileNameDisplay = document.getElementById('fileName-uploadPhoto');
            const text = document.getElementById('text-uploadPhoto');

            if (this.files.length > 0) {
                fileNameDisplay.removeAttribute('hidden'); 
                fileNameDisplay.textContent = `📁 Selected file: ${this.files[0].name}`;
                text.textContent = '';
            } else {
                fileNameDisplay.textContent = '';
                text.textContent = 'Drag your photo here or Browse from device';
            }
        });

        document.getElementById('proofVaccination').addEventListener('change', function() {
            const fileNameDisplay = document.getElementById('fileName-proofVaccination');
            const text = document.getElementById('text-proofVaccination');

            if (this.files.length > 0) {
                fileNameDisplay.removeAttribute('hidden'); 
                fileNameDisplay.textContent = `📁 Selected file: ${this.files[0].name}`;
                text.textContent = '';
            } else {
                fileNameDisplay.textContent = '';
                text.textContent = 'Drag your photo here or Browse from device';
            }
        });
    </script>


    <x-return-top />

</body>
<!-- Footer -->
<x-footer bgColor=" bg-gradient-to-r from-orange-600" />

</html>