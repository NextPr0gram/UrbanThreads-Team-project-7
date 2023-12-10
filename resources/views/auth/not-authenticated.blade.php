<x-app-layout>
    <div class="flex justify-center py-20">
        <div
            class="flex flex-col sm:flex-row justify-center py-16 w-fit bg-white bg-opacity-40 backdrop-blur border-3 border-navy-blue">
            <div class="block self-center px-8">
                <h1 class="font-formula1 text-6xl text-bluish-purple ">You are not logged in!</h1>
                <div class="flex flex-col sm:flex-row gap-5 mt-5">
                    <div class="w-full">
                        <x-input-label class="flex justify-center">If you are an existing customer:</x-input-label>
                        <a href="{{ route('login') }}"><x-primary-button-dark
                                class="w-full mt-5">Login</x-primary-button-dark></a>
                    </div>
                    <div class="w-full">
                        <x-input-label class="flex justify-center">If you are a new customer:</x-input-label>
                        <a href="{{ route('register') }}"><x-primary-button-dark
                                class="w-full mt-5">Register</x-primary-button-dark></a>
                    </div>
                </div>
                <div class="flex flex-col justify-center mt-5">
                    <a href="{{ route('home') }}"><x-primary-button-dark class="w-full">Continue
                            Shopping</x-primary-button-dark></a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
