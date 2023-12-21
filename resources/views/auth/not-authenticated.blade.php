<x-app-layout>
    <div class="flex justify-center py-20">
        <div
            class="flex flex-col justify-center py-16 bg-white bg-opacity-40 backdrop-blur sm:flex-row w-fit border-3 border-navy-blue">
            <div class="block self-center px-8">
                <h1 class="text-6xl font-formula1 text-bluish-purple">You are not logged in!</h1>
                <div class="flex flex-col gap-5 mt-5 sm:flex-row">
                    <div class="w-full">
                        <x-input-label class="flex justify-center">If you are an existing customer:</x-input-label>
                        <a href="{{ route('login') }}"><x-primary-button
                                class="mt-5 w-full">Login</x-primary-button></a>
                    </div>
                    <div class="w-full">
                        <x-input-label class="flex justify-center">If you are a new customer:</x-input-label>
                        <a href="{{ route('register') }}"><x-primary-button
                                class="mt-5 w-full">Register</x-primary-button></a>
                    </div>
                </div>
                <div class="flex flex-col justify-center mt-5">
                    <a href="{{ route('home') }}"><x-primary-button class="w-full">Continue
                            Shopping</x-primary-button></a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
