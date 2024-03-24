<footer class="sticky top-[100vh]">
    <div class="flex justify-center py-16">
        <div class="px-8"><a href="https://www.pinterest.co.uk" target=”_blank”><img class="p-"
                    src="{{ asset('icons/social-media/pinterest-icon-dark.svg') }}" alt=""></a></div>
        <div class="px-8"><a href="https://www.facebook.com" target=”_blank”><img class="p-"
                    src="{{ asset('icons/social-media/facebook-icon-dark.svg') }}" alt=""></a></div>
        <div class="px-8"><a href="https://www.instagram.com" target=”_blank”><img class="p-"
                    src="{{ asset('icons/social-media/instagram-icon-dark.svg') }}" alt=""></a></div>
        <div class="px-8"><a href="https://www.youtube.com" target=”_blank”><img class="p-"
                    src="{{ asset('icons/social-media/youtube-icon-dark.svg') }}" alt=""></a></div>
        <div class="px-8"><a href="https://www.tiktok.com" target=”_blank”><img class="p-"
                    src="{{ asset('icons/social-media/tiktok-icon-dark.svg') }}" alt=""></a></div>
    </div>
    <div class="bg-neutral-700">
        <div class="mx-auto w-full max-w-screen-xl">
            <div class="grid grid-cols-2 gap-8 px-4 py-6 lg:py-8 md:grid-cols-4">
                <div>
                    <h2 class="mb-6 text-lg font-formula1 text-neutral-30">Shop</h2>
                    <ul class="text-neutral-30">
                        <li class="mb-4">
                            <a href="{{ route('tshirts') }}" class="hover:underline">T-shirts</a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('hoodies') }}" class="hover:underline">Hoodies</a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('trousers') }}" class="hover:underline">Trousers</a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('jackets') }}" class="hover:underline">Jackets</a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('accessories') }}" class="hover:underline">Accessories</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-lg font-formula1 text-neutral-30">Information</h2>
                    <ul class="text-neutral-30">
                        <li class="mb-4">
                            <a href="{{ route('contact-us') }}" class="hover:underline">Contact us</a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('about-us') }}" class="hover:underline">About us</a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('profile.orders') }}" class="hover:underline">Orders</a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('contact-us') }}" class="hover:underline">Give us feedback</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-lg font-formula1 text-neutral-30">Social channels</h2>
                    <ul class="text-neutral-30">
                        <li class="mb-4">
                            <a href="https://twitter.com" class="hover:underline" target=”_blank”>Twitter</a>
                        </li>
                        <li class="mb-4">
                            <a href="https://www.instagram.com" class="hover:underline" target=”_blank”>Instagram</a>
                        </li>
                        <li class="mb-4">
                            <a href="https://www.facebook.com" class="hover:underline" target=”_blank”>facebook</a>
                        </li>
                        <li class="mb-4">
                            <a href="https://www.linkedin.com" class="hover:underline" target=”_blank”>LinkedIn</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-lg font-formula1 text-neutral-30">Our Apps</h2>
                    <ul class="text-neutral-30">
                        <li class="mb-4">
                            <a href="https://play.google.com/store/apps?gl=GB" target=”_blank”
                                class="hover:underline"><img class="h-9"
                                    src="{{ asset('images/playstore-app.svg') }}" alt=""></a>
                        </li>
                        <li class="mb-4">
                            <a href="https://www.apple.com/uk/store" class="hover:underline" target=”_blank”><img class="h-9"
                                    src="{{ asset('images/appstore-app.svg') }}" alt=""></a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="mx-4 my-6 border-2 border-neutral-30 lg:my-8" />
            <div class="p-4 mx-auto w-full max-w-screen-xl md:py-8">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <div class="flex justify-center items-center pb-4 sm:pb-0">
                        <x-application-logo :dark="false" class="block mx-2 h-9" />
                    </div>
                    <p class="flex flex-wrap justify-center mb-6 text-base text-neutral-30 sm:mb-0">
                        © UrbanThreads 2024 | All rights reserved
                    </p>
                </div>
            </div>
        </div>
</footer>
