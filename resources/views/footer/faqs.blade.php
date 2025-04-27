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
            <a href="{{ route('dashboard') }}" class="border-none focus:outline-none focus:ring-0 focus:border-transparent">

                <img src="{{ asset('logo/logo1.png') }}" alt="furrhub-logo" class="h-[60px] w-[150px] lg:h-[120px] lg:w-[300px] " />
            </a>
        </div>
        <div class="flex flex-row items-center justify-between w-full">
            <div class="flex flex-row  items-center justify-evenly ml-1 md:ml-5">
                <div class="bg-black md:w-[2px] md:h-[3rem] w-[1px] h-[2rem]"></div>
                <div class="md:ml-6 ml-3 text-sm md:text-3xl font-medium">Frequently Asked Questions</div>
            </div>
            <div>
                <a href="{{ route('dashboard') }}" class="hover:cursor-pointer focus:outline-none">
                    <img src="{{asset ('logo/x.svg')}}" alt="cancel" class="h-5 w-5 md:h-10 md:w-10 hover:cursor-pointer" />
                </a>
            </div>
        </div>
    </div>
</header>

<body class="bg-sky-100">
    <div class="flex flex-col md:flex-row justify-center items-center md:mt-10 mt-4">
        <!-- FAQ Section -->
        <div class="w-full md:w-2/3  bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- FAQ Header Section -->
            <div class="flex items-center justify-center mb-6 p-8 bg-orange-500 rounded-t-xl text-white">
                <i data-lucide="paw-print" class="text-white w-16 h-16 mb-4"></i>
                <h2 class="text-3xl md:text-4xl font-semibold text-center">FurrHUB FAQs</h2>
            </div>

            <div class="space-y-6 p-4">
                <!-- Question 1 -->
                <div class="border-b-2 border-gray-300">
                    <button class="w-full flex justify-between text-left text-xl font-semibold text-gray-800 py-4 px-6 hover:bg-gray-100 focus:outline-none transition duration-300 transform hover:scale-105" onclick="toggleFAQ(0)">
                        What products do you offer for cats and dogs?
                        <i class="text-gray-500 transition transform" id="icon-0" data-lucide="chevron-down"></i>
                    </button>
                    <div class="faq-answer hidden px-6 py-4 text-gray-600 text-lg">
                        We offer a wide range of products for cats and dogs including food, toys, grooming supplies, accessories, and much more!
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="border-b-2 border-gray-300">
                    <button class="w-full flex justify-between text-left text-xl font-semibold text-gray-800 py-4 px-6 hover:bg-gray-100 focus:outline-none transition duration-300 transform hover:scale-105" onclick="toggleFAQ(1)">
                        How can I book an appointment for my pet?
                        <i class="text-gray-500 transition transform" id="icon-1" data-lucide="chevron-down"></i>
                    </button>
                    <div class="faq-answer hidden px-6 py-4 text-gray-600 text-lg">
                        You can book an appointment directly through our website by visiting the "Appointments" section. Simply select the service, choose a time, and confirm.
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="border-b-2 border-gray-300">
                    <button class="w-full flex justify-between text-left text-xl font-semibold text-gray-800 py-4 px-6 hover:bg-gray-100 focus:outline-none transition duration-300 transform hover:scale-105" onclick="toggleFAQ(2)">
                        What time are appointments available?
                        <i class="text-gray-500 transition transform" id="icon-2" data-lucide="chevron-down"></i>
                    </button>
                    <div class="faq-answer hidden px-6 py-4 text-gray-600 text-lg">
                        Our appointments are available Monday to Friday, from 9:00 AM to 4:00 PM.
                    </div>
                </div>

                <!-- Question 4 -->
                <div class="border-b-2 border-gray-300">
                    <button class="w-full flex justify-between text-left text-xl font-semibold text-gray-800 py-4 px-6 hover:bg-gray-100 focus:outline-none transition duration-300 transform hover:scale-105" onclick="toggleFAQ(3)">
                        Do you offer delivery for products?
                        <i class="text-gray-500 transition transform" id="icon-3" data-lucide="chevron-down"></i>
                    </button>
                    <div class="faq-answer hidden px-6 py-4 text-gray-600 text-lg">
                        Yes! We offer delivery for all our products. You can choose from different shipping options at checkout.
                    </div>
                </div>

                <!-- Question 5 -->
                <div class="border-b-2 border-gray-300">
                    <button class="w-full flex justify-between text-left text-xl font-semibold text-gray-800 py-4 px-6 hover:bg-gray-100 focus:outline-none transition duration-300 transform hover:scale-105" onclick="toggleFAQ(4)">
                        Can I cancel my appointment?
                        <i class="text-gray-500 transition transform" id="icon-4" data-lucide="chevron-down"></i>
                    </button>
                    <div class="faq-answer hidden px-6 py-4 text-gray-600 text-lg">
                        Yes, you can cancel your appointment through your account. Please make sure to do so at least 24 hours before the scheduled time.
                    </div>
                </div>
            </div>

            <!-- Footer CTA Section -->
            <div class="mt-6 p-6 bg-orange-500 text-center rounded-b-xl text-white">
                <h3 class="text-xl font-semibold mb-4">Still have questions?</h3>
                <p class="text-lg mb-4">If you need further assistance, feel free to reach out to our support team. We're here to help!</p>
                <a href="{{ route('dashboard') }}" class="bg-white text-orange-500 py-2 px-6 rounded-lg font-semibold text-lg hover:bg-orange-400 transition duration-300">Contact Us</a>
            </div>
        </div>
    </div>

    <script>
        function toggleFAQ(index) {
            const faqAnswers = document.querySelectorAll('.faq-answer');
            const targetAnswer = faqAnswers[index];
            const icon = document.getElementById('icon-' + index);

            if (targetAnswer.classList.contains('hidden')) {
                targetAnswer.classList.remove('hidden');
                icon.setAttribute("data-lucide", "chevron-up");
            } else {
                targetAnswer.classList.add('hidden');
                icon.setAttribute("data-lucide", "chevron-down");
            }
        }
    </script>
</body>





</html>