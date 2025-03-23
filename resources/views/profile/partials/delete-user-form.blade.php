<section class="space-y-6">



<h1 class="lg:text-2xl text-lg font-medium text-gray-900">
            Account Deletion
        </h1>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
    <header class="col-span-2">
        
        <h2 class="text-lg font-medium text-gray-600 mt-4">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-lg text-gray-600">
            {{ __('Are you sure you want to delete your account? This action is permanent, and all your data will be lost. By continuing, you agree that this process cannot be undone. ') }}
        </p>
    </header>

    <div class="col-span-1 items-center justify-center flex">
        <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"> <i data-lucide="trash2"></i>
        {{ __('Delete Account') }}</x-danger-button>
    </div>
    

       
</div>
 <hr>
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <p class="text-xl font-bold text-gray-500">
                {{ __('Please enter your password to confirm account deletion.') }}
            </p>

            <p class="mt-2 text-sm text-red-500">
                {{ __('This action is permanent, and all your data will be lost. If you proceed, you won’t be able to recover your account later.') }}
            </p>

            <p class="mt-2 text-xs text-gray-600">
                {{ __('By continuing, you agree that this process cannot be undone.') }}
            </p>
            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>