<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            {{ __('My Account') }}
        </h2>
        <p class="font-lexend text-lg">
            {{ __('Update your account information.') }}
        </p>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white bg-opacity-40 shadow-md backdrop-blur-sm sm:p-8 border-2 border-neutral-50 rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 bg-white bg-opacity-40 shadow-md sm:p-8 border-2 border-neutral-50 rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.address-information-form')
                </div>
            </div>

            <div class="p-4 bg-white bg-opacity-40 shadow-md backdrop-blur-sm sm:p-8 border-2 border-neutral-50 rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 bg-white bg-opacity-40 shadow-md sm:p-8 border-2 border-neutral-50 rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
