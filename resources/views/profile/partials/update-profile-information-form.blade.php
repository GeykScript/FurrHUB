<section>


    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>


    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="flex lg:flex-row justify-evenly flex-col ">
        @csrf
        @method('patch')


        <div class="grid grid-cols-2 ">

            <!-- Profile Picture -->
            <div class="col-span-2 flex flex-col items-center">
                <!-- Existing Profile Image -->
                <div class="lg:w-[260px] lg:h-[260px] w-[200px] h-[200px] bg-orange-300 rounded-full flex items-center justify-center text-center">

                    <img id="preview" src="{{ asset('storage/profile_picture/' . $user->profile_img) }}" class="{{ $user->profile_img ? 'block' : 'hidden' }} lg:w-[260px] lg:h-[260px] w-[200px] h-[200px] rounded-full object-cover">
                    @if (!$user->profile_img)
                    <i data-lucide="user" class="lg:w-[200px] lg:h-[150px] w-[150px] h-[150px] text-orange-100 text-center items-center"></i>
                    @endif
                </div>

                <!-- File Input for Editing Profile Picture -->
                <label for="profile_img" class="mt-3 inline-flex items-center p-2 gap-2 border border-orange-500 text-orange-500 text-sm rounded-lg hover:bg-orange-100 cursor-pointer">
                    <input type="file" id="profile_img" name="profile_img" class="hidden" accept="image/*" onchange="previewImage(event)">
                    <span class="ml-2">Edit Profile </span><i data-lucide="upload" class="h-4 w-4"></i>
                </label>
            </div>
            <script>
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
            </script>
        </div>


        <div class="grid grid-cols-2 gap-2 mt-5">

            <div class="col-span-2 ">
                <header class="mb-5">
                    <h1 class="lg:text-2xl text-lg font-medium text-gray-900">
                        {{ __('Profile Information') }}
                    </h1>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Update your account's profile information and email address.") }}
                    </p>
                </header>
            </div>
            <!-- status show -->
            <!-- Success Message for Profile Updated -->
            @if (session('status') === 'profile-updated')
            <div class="col-span-2">
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    class="text-lg text-white bg-green-500 text-gray-900 p-4 px-5 rounded-md">
                    {{ __('Profile Updated Successfully!') }}
                </p>
            </div>
            @endif

            <!-- Message for No Changes -->
            @if (session('status') === 'no-change')
            <div class="col-span-2">
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    class="text-lg text-white bg-sky-500 text-gray-900 p-4 px-5 rounded-md">
                    {{ __('No changes were made to your profile.') }}
                </p>
            </div>
            @endif

            <!-- First Name -->
            <div>
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $user->first_name)" required autocomplete="first_name" />
                <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
            </div>
            <!-- last Name -->
            <div>
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $user->last_name)" required autocomplete="last_name" />
                <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
            </div>

            <!-- Email Address -->
            <div class="col-span-2">
                <x-input-label for="email" :value="__('Email Address')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                    @endif
                </div>
                @endif
            </div>

            <!-- Phone Number -->
            <div class="col-span-2">
                <x-input-label for="phone" :value="__('Phone Number')" />
                <x-text-input id="phone" name="phone" type="text" class="mt-1 block
            w-full" :value="old('phone', $user->phone)" required autocomplete="phone" />
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>

            <div class="items-center  col-span-2 flex justify-end">
                <button class="w-50 bg-orange-500 hover:bg-orange-600 text-white text-center font-bold py-2 px-4 rounded-lg text-sm lg:text-lg">{{ __('Save Changes') }}</button>
            </div>
        </div>




    </form>
</section>