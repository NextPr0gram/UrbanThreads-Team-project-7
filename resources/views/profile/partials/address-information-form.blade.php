<section>
    <header>
        <!-- Title of form -->
        <h2 class="text-lg font-medium text-primary-500">
            {{ __('Address Information') }}
        </h2>

        <!-- Description of form -->
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Save your address here for placing orders quickly.') }}
        </p>
    </header>

    <!-- Form -->
    <form method="post" action="{{ route('profile.address') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <!-- Form fields -->
        <!-- The old values are set to the current values of the user's address if they exist (optional function) -->
        <div>
            <x-input-label for="address_line_1" :value="__('Address Line 1')" />
            <x-text-input id="address_line_1" name="address_line_1" type="text" class="block mt-1 w-full" :value="old('address_line_1', optional($user->address)->address_line_1)" autocomplete="address_line_1" />
            <x-input-error class="mt-2" :messages="$errors->updateAddress->get('address_line_1')" />
        </div>
        <div>
            <x-input-label for="address_line_2" :value="__('Address Line 2')" />
            <x-text-input id="address_line_2" name="address_line_2" type="text" class="block mt-1 w-full" :value="old('address_line_2', optional($user->address)->address_line_2)" autocomplete="address_line_2" />
            <x-input-error class="mt-2" :messages="$errors->updateAddress->get('address_line_2')" />
        </div>
        <div>
            <x-input-label for="city" :value="__('City')" />
            <x-text-input id="city" name="city" type="text" class="block mt-1 w-full" :value="old('city', optional($user->address)->city)" autocomplete="city" />
            <x-input-error class="mt-2" :messages="$errors->updateAddress->get('city')" />
        </div>
        <div>
            <x-input-label for="county" :value="__('County')" />
            <x-text-input id="county" name="county" type="text" class="block mt-1 w-full" :value="old('county', optional($user->address)->county)" autocomplete="county" />
            <x-input-error class="mt-2" :messages="$errors->updateAddress->get('county')" />
        </div>
        <div>
            <x-input-label for="postcode" :value="__('Postcode')" />
            <x-text-input id="postcode" name="postcode" type="text" class="block mt-1 w-full" :value="old('postcode', optional($user->address)->postcode)" autocomplete="postcode" />
            <x-input-error class="mt-2" :messages="$errors->updateAddress->get('postcode')" />
        </div>

        <div class="flex gap-4 items-center">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'address-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
