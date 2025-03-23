<x-app-layout class="bg-sky-300">
    <header class="flex bg-white  flex-row justify-start items-center w-full md:px-10 px-5 py-1">
        <div class="flex flex-row items-center justify-start w-full">
            <div class="">
                <a href="{{ route('dashboard') }}" class="border-none focus:outline-none focus:ring-0 focus:border-transparent">
                    <img src="{{ asset('logo/logo1.png') }}" alt="furrhub-logo" class="h-[60px] w-[150px] lg:h-[120px] lg:w-[300px] " /></a>
            </div>
            <div class="flex flex-row items-center justify-between w-full">
                <div class="flex flex-row  items-center justify-evenly ml-1 md:ml-5">
                    <div class="bg-black md:w-[2px] md:h-[3rem] w-[1px] h-[2rem]"></div>
                    <div class="md:ml-6 ml-3 text-sm md:text-3xl font-medium">Update Profile</div>
                </div>
                <a href="{{ route('dashboard') }}" class="border-none focus:outline-none focus:ring-0 focus:border-transparent">
                    <img src="{{ asset('logo/x.svg') }}" alt="cancel" class="h-5 w-5 md:h-10 md:w-10 hover:cursor-pointer" />
                </a>
            </div>
        </div>
    </header>

    <div class="py-12 bg-sky-300">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    @include('profile.partials.address-form')
                </div>
            </div>



            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <div class="flex flex-col items-center">
                            <img src="{{ asset('logo/furrhub.png') }}" alt="logo" class="lg:w-[320px] lg:h-[260px] w-[150px] h-[100px] object-cover ">
                        
                        <h1 class="lg:text-lg text-md font-medium text-gray-600 mt-3 lg:px-32 text-wrap">
                            Ensure your account is using a long, random password to stay secure.
                        </h1>
                    </div>
                    <div class="w-full">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <div class="w-full">
                    @include('profile.partials.delete-user-form')
                </div>

            </div>
        </div>
    </div>
    <!-- Footer -->
    <x-footer bgColor=" bg-gradient-to-r from-orange-600" />
</x-app-layout>