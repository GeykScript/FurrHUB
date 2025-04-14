<header class="fixed top-0 z-50 flex bg-[#F0A02C] flex-row justify-start items-center w-full xl:px-10 px-5 py-1  shadow-lg  shadow-[0_8px_10px_rgba(0,0,0,0.2)]">
    <div class="flex flex-row items-center justify-start w-full ">
        <a href="{{route ('dashboard')}}" class="hover:cursor-pointer focus:outline-none">
            <img src="{{ asset('logo/furrhub.png') }}" alt="furrhub-logo" class="h-[60px] w-full md:h-[130px] md:w-[250px] hidden xl:block " />
        </a>
        <div class="flex flex-col  lg:flex-row flex-col-reverse items-center justify-between w-full">
            <div></div>

            <div class="flex flex-row lg:gap-20 lg:text-lg text-sm gap-10">
                <a href="{{route ('dashboard')}}" class="hover:text-white text-gray-900 flex"><i data-lucide="house"></i><span class="md:block hidden"> Home</span></a>
                <a href="#pets" class="hover:text-white text-gray-900 flex"><i data-lucide="paw-print"></i><span class="md:block hidden"> My Pets</span></a>
                <a href="#appointments" class="hover:text-white text-gray-900 flex"><i data-lucide="notebook-pen"></i><span class="md:block hidden">Appointments</span></a>
                <a href="#pricelists" class="hover:text-white text-gray-900 flex"><i data-lucide="philippine-peso"></i><span class="md:block hidden">Price Lists</span></a>
            </div>


            <div class="flex flex-row gap-3 ml-auto xl:ml-0">
                <div class="flex flex-row text-black text-[12px] xl:text-[20px] font-semibold px-3 lg:px-0">
                    <nav class="flex flex-row gap-1 md:gap-1 align-center">
                        @if (Route::has('login'))

                        @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-md leading-4 font-medium rounded-md  hover:text-gray-800 focus:outline-none transition ease-in-out duration-150">
                                    <div class="flex flex-row items-center gap-2 justify-center">

                                        <p class="">{{ Auth::user()->first_name}} {{ Auth::user()->last_name}}</p>

                                        @if (Auth::user()->profile_img)
                                        <img id="profile" src="{{ asset('storage/profile_picture/' . Auth::user()->profile_img) }}" alt="Profile Picture" class="h-[25px] w-[25px] lg:h-[37px] lg:w-[39px] border border-gray-800 rounded-full object-cover">
                                        @else
                                        <img id="profile" src="{{ asset('logo/user.png') }}" alt="Profile Picture" class="h-[25px] w-[25px] lg:h-[35px] lg:w-[35px]  rounded-full object-cover">
                                        @endif
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

                                <x-dropdown-link :href="route('orders')" class="hover:bg-orange-300">
                                    <div class="flex flex-row items-center gap-1">
                                        <i data-lucide="shopping-bag" class=" text-black"></i>
                                        {{ __('My Orders') }}
                                    </div>
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('wishlists')" class="hover:bg-orange-300">
                                    <div class="flex flex-row items-center gap-1">
                                        <i data-lucide="heart" class=" text-black "></i>
                                        {{ __('My Wishlists') }}
                                    </div>
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('notifications')" class="hover:bg-orange-300">
                                    <div class="flex flex-row items-center space-x-2 relative gap-1">
                                        <div class="relative">
                                            <!-- Bell Icon -->
                                            <i data-lucide="bell" class="text-black text-lg"></i>

                                            <!-- Notification Badge -->
                                            <span class="absolute -top-1 -left-1 bg-red-500 text-white rounded-full h-[16px] w-[16px] text-[9px] font-semibold flex items-center justify-center">
                                                10
                                            </span>
                                        </div>

                                        {{ __('Notifications') }}
                                    </div>

                                </x-dropdown-link>

                                <x-dropdown-link :href="route('messages')" class="hover:bg-orange-300">
                                    <div class="flex flex-row items-center space-x-2 relative gap-1">
                                        <div class="relative">
                                            <i data-lucide="message-square-text" class=" text-black"></i>
                                            <!-- Notification Badge -->
                                            <span class="absolute -top-1 -left-1 bg-red-500 text-white rounded-full h-[16px] w-[16px] text-[9px] font-semibold flex items-center justify-center">
                                                22
                                            </span>
                                        </div>
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