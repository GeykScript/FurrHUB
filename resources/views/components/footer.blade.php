@props(['bgColor' => 'bg-sky-200']) <!-- Default to bg-sky-200 if not specified -->
<footer class="flex flex-col justify-center items-center {{ $bgColor }} md:h-[22rem] h-[24rem] md:mt-10 mt-5 w-full border-t-[0.3rem] border-gray-200 text-black ">

    <div class="">
        <img src="{{ asset('logo/logo1.png') }}" alt="furrhub-logo" class="h-[70px] w-[150px] lg:h-[110px] lg:w-[210px] " />
    </div>

    <div class="flex md:flex-row flex-col   md:items-center md:justify-center  mt-3 md:text-md lg:text-lg   text-sm">
        <ul class="flex md:flex-row flex-col  md:justify-around  md:w-[48rem] lg:w-[65rem] w-[18rem]  flex-start gap-4 md:gap-0">
            <li class="w-[11rem]">
                <p class="md:text-center text-start hover:text-gray-800"><a href="{{route('faqs')}}">FAQ's</a></p>
            </li>
            <li class="flex md:flex-col flex-row items-center md:justify-center gap-10 md:gap-0  hover:text-gray-800">
                <p class="">PAYMENTS</p>
                <div class="flex flex-row items-center sm:justify-around w-full gap-2 md:mt-5">
                     <img src="{{ asset('logo/payments/gcash-logo.png')  }}" alt="gcash" class="md:h-[40px] md:w-[40px] w-[30px] h-[30px] rounded-md  transition-transform duration-300 hover:scale-110" />
                     <img src="{{ asset('logo/payments/maya-logo.jpg')}}" alt="maya" class="md:h-[40px] md:w-[50px] w-[30px] h-[30px] rounded-md  transition-transform duration-300 hover:scale-110" />
                     <img src="{{ asset('logo/payments/visa.svg')  }}" alt="visa" class="md:h-[40px] md:w-[40px] rounded-md w-[30px] h-[30px] transition-transform duration-300 hover:scale-110" />
                     <img src="{{ asset('logo/payments/mastercard.svg') }}" alt="mastercard" class="md:h-[50px] md:w-[50px] w-[30px] h-[30px]  transition-transform duration-300 hover:scale-110" />
                </div>
            </li>


            <li class="flex w-[6rem] md:text-center text-start hover:text-gray-800"><a href="{{route('about_us')}}">ABOUT US</a></li>
            <li class="flex md:flex-col flex-row items-center md:justify-center gap-10 md:gap-0  hover:text-gray-800">
                <p class="">CONTACTS</p>
                <div class="flex flex-row items-center sm:justify-around w-full gap-2 md:mt-5">
                     <img src="{{ asset('logo/socials/facebook.svg') }}" alt="gcash" class="md:h-[40px] md:w-[40px] w-[30px] h-[30px] transition-transform duration-300 hover:scale-110" />
                     <img src="{{ asset('logo/socials/instagram.svg') }}" alt="maya" class="md:h-[40px] md:w-[40px] w-[30px] h-[30px] transition-transform duration-300 hover:scale-110" />
                     <img src="{{ asset('logo/socials/tiktok.svg') }}" alt="visa" class="md:h-[40px] md:w-[40px] rounded-md w-[30px] h-[30px] transition-transform duration-300 hover:scale-110" />
                     <img src="{{ asset('logo/socials/gmail.svg') }}" alt="mastercard" class="md:h-[50px] md:w-[50px] w-[30px] h-[30px]  transition-transform duration-300 hover:scale-110" />
                </div>
            </li>
            <li class="flex w-[12rem] md:text-center text-start hover:text-gray-800"><a href="{{route('terms_and_conditions')}}">TERMS & CONDITIONS </a></li>
        </ul>
    </div>
    <div class="mt-5 ">
        <hr class="w-[full] mt-5 border-t-2 border-gray-700 md:w-[40rem]  lg:w-[60rem]" />

        <p class="text-center mt-5 text-sm text-gray-700">© 2025 Furrhub. All rights reserved</p>
    </div>
</footer>