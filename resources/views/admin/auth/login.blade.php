@extends('admin.layouts.admin')

@section('content')
    <div class="flex items-center py-32 sm:justify-center sm:pt">
        <div class="hidden lg:block h-[40rem] -translate-x-[35rem] absolute">
            <img src="images/auth/lady-image-auth.png" alt="">
        </div>
        <div
            class="overflow-hidden px-6 py-4 mt-6 w-full bg-white bg-opacity-40 border-2 shadow-md backdrop-blur-sm sm:max-w-md b border-navy-blue">
            <div class="flex justify-center items-center py-8 shrink-0">
                <a href="{{ route('home') }}">
                    <x-application-logo class="block mx-2 w-10 h-9" />
                </a>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="appearance-none border-3 border-bluish-purple focus:ring-navy-blue checked:bg-bluish-purple"
                            name="remember">
                        <span class="text-sm text-gray-600 ms-2 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex justify-end items-center mt-4">



                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
        <div class="hidden lg:block h-[40rem] absolute translate-x-[35rem]">
            <img src="images/auth/man-image-auth.png" alt="">
        </div>
    </div>
@endsection
