<footer class="sticky top-[100vh]">
    <div class="flex justify-center py-16">
        <div class="px-8"><a href="#"><img class="p-"
                    src="{{ asset('icons/social-media/pinterest-icon-dark.svg') }}" alt=""></a></div>
        <div class="px-8"><a href="#"><img class="p-"
                    src="{{ asset('icons/social-media/facebook-icon-dark.svg') }}" alt=""></a></div>
        <div class="px-8"><a href="#"><img class="p-"
                    src="{{ asset('icons/social-media/instagram-icon-dark.svg') }}" alt=""></a></div>
        <div class="px-8"><a href="#"><img class="p-"
                    src="{{ asset('icons/social-media/youtube-icon-dark.svg') }}" alt=""></a></div>
        <div class="px-8"><a href="#"><img class="p-"
                    src="{{ asset('icons/social-media/tiktok-icon-dark.svg') }}" alt=""></a></div>
    </div>
    <div class="bg-neutral-700">
        <div class="mx-auto w-full max-w-screen-xl">
            <div class="grid grid-cols-2 gap-8 px-4 py-6 lg:py-8 md:grid-cols-4">
                <div>
                    <h2 class="mb-6 text-lg font-formula1 text-neutral-30">Shop</h2>
                    <ul class="text-neutral-30">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">T-shirts</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Hoodies</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Trousers</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Shirts</a>
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
                            <a href="#" class="hover:underline">Order status</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Shipping</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Give us feedback</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-lg font-formula1 text-neutral-30">Social channels</h2>
                    <ul class="text-neutral-30">
                        <li class="mb-4">
                            <a href="https://twitter.com" class="hover:underline">Twitter</a>
                        </li>
                        <li class="mb-4">
                            <a href="https://www.instagram.com" class="hover:underline">Instagram</a>
                        </li>
                        <li class="mb-4">
                            <a href="https://www.facebook.com" class="hover:underline">facebook</a>
                        </li>
                        <li class="mb-4">
                            <a href="https://www.linkedin.com" class="hover:underline">LinkedIn</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-lg font-formula1 text-neutral-30">Our Apps</h2>
                    <ul class="text-neutral-30">
                        <li class="mb-4">
                            <a href="https://play.google.com/store/games?gl=GB&utm_source=emea_Med&utm_medium=hasem&utm_content=May2021&utm_campaign=Evergreen&pcampaignid=MKT-EDR-emea-gb-1707522-Med-hasem-py-Evergreen-May2021-Text_Search_BKWS-test_ctrl_cta_RSA%7CONSEM_kwid_43700008794228187&gad_source=1&gclid=CjwKCAiAivGuBhBEEiwAWiFmYbp1xpnd5Pk1k-hDC6brwy7-hFW3hBfNZ8U67Xb3ZT8C9yOB7kUbXhoCDM0QAvD_BwE&gclsrc=aw.ds"
                                class="hover:underline"><img class="h-9"
                                    src="{{ asset('images/playstore-app.svg') }}" alt=""></a>
                        </li>
                        <li class="mb-4">
                            <a href="https://www.apple.com/uk/store" class="hover:underline"><img class="h-9"
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
                        © UrbanThreads 2023 | All rights reserved
                    </p>
                </div>
            </div>
        </div>
</footer>
