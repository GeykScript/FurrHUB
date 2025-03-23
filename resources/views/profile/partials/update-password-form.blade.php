<section>
    <header>
        <h1 class="lg:text-2xl text-lg font-medium text-center text-gray-900">
            {{ __('Update Password') }}
        </h1>

    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            @if (session('status') === 'password-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                class="text-sm bg-green-200 text-gray-900  p-4 px-5 rounded-md">
                {{ __('Password Updated Successfully!') }}
            </p>
            @endif
        </div>

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end gap-4">
            <button class="w-50 bg-orange-500 hover:bg-orange-600 text-white text-center font-bold py-2 px-4 rounded-lg text-sm lg:text-lg">{{ __('Save Changes') }}</button>
        </div>

    </form>
</section>