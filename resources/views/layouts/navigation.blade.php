{{-- Secondary nav bar on top of the header --}}
{{-- <nav class="flex justify-end h-9 items-center max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 text-base">
    <a class="pr-2 " href="">Store locator</a>
    <div class="w-1 h-5 bg-bluish-purple"></div>
    <a class="pl-2" href="">Help</a>
</nav> --}}

{{-- Main header --}}
<nav x-data="{ open: false, showMenu: false, showCart: false}" class="max-h bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 text-base">
    <!-- Primary Navigation Menu -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 mx-2" />
                    </a>
                </div>



                {{-- <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                        {{ __('Dashboard') }}
                                    </x-nav-
                                    .0> --}}
            </div>

            {{-- right side nav-items account, wishlist, cart buttons...--}}
            <div class="flex flex-grow justify-end {{-- md:justify-between --}} items-center">

                {{-- Searchbar --}}
                {{-- <form class="flex my-auto px-0 md:px-8" method="POST" action="">
                    <x-text-input class="hidden md:block w-full "></x-text-input>
                    <button title="Search" class="px-2 flex-none">
                        <img src="{{asset('icons/search-icon-dark.svg')}}" alt="">
                    </button>

                </form> --}}



                {{-- account dropdown button with icon and text --}}
                <div class="flex items-center">
                    {{-- Account button --}}
                    <button @click="open = ! open" title="Account" class="px-2 flex items-center flex-shrink-0">
                        <div class="pr-2 hidden md:block">{{ Auth::user()->name }}</div>
                        <img src="{{asset('icons/account-icon-dark.svg')}}" alt="">
                    </button>

                    {{-- Wishlist button --}}
                    {{-- <button @click="showMenu = !showMenu" title="Wishlist" class="px-2 flex-none">
                        <img src="{{asset('icons/wishlist-icon-dark.svg')}}" alt="">
                    </button> --}}


                    {{-- Shopping cart button --}}
                    <button @click="showCart = !showCart" title="Cart" class="px-2 flex-none">
                        <img src="{{asset('icons/shopping-cart-dark.svg')}}" alt="">
                    </button>

                    {{-- Checkout button --}}
                    <x-primary-button title="Checkout" class="flex-shrink-0 mx-2 hidden md:block">
                        Checkout
                    </x-primary-button>
                </div>


            </div>


            <!-- Hamburger -->
            {{-- <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div> --}}
        </div>
    </div>
    <div x-show="showMenu" @click.away="showMenu = false" class="md:hidden mt-2">
        <a href="#" class="block text-white hover:bg-gray-700 py-2 px-4">Home</a>
        <a href="#" class="block text-white hover:bg-gray-700 py-2 px-4">About</a>
        <a href="#" class="block text-white hover:bg-gray-700 py-2 px-4">Services</a>
        <a href="#" class="block text-white hover:bg-gray-700 py-2 px-4">Contact</a>
    </div>
    <div x-show="showCart" @click.away="showCart = false" class="md:hidden mt-2">
        <a href="#" class="block text-white hover:bg-gray-700 py-2 px-4">1</a>
        <a href="#" class="block text-white hover:bg-gray-700 py-2 px-4">2</a>
        <a href="#" class="block text-white hover:bg-gray-700 py-2 px-4">3</a>
        <a href="#" class="block text-white hover:bg-gray-700 py-2 px-4">4</a>
    </div>


    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

{{-- Secondary nav bar at the bottom of the header --}}
<div class="bg-navy-blue">
    <nav class=" flex justify-center h-9 items-center text-base ">
        <a class="h-full flex items-center px-10 text-snow-white hover:border-b-4 transition-all duration-100 ease-in-out" href="">Women</a>
        <a class="h-full flex items-center px-10 text-snow-white hover:border-b-4 transition-all duration-100 ease-in-out" href="">Men</a>
        <a class="h-full flex items-center px-10 text-snow-white hover:border-b-4 transition-all duration-100 ease-in-out" href="">Kids</a>
        <a class="h-full flex items-center px-10 text-snow-white hover:border-b-4 transition-all duration-100 ease-in-out" href="">Limited</a>
    </nav>
</div>

