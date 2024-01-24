

<footer class="sticky top-[100vh]">
    <div class="flex justify-center py-16">
        <div class="px-8"><a  href="#"><img class="p-" src="{{asset('icons/social-media/pinterest-icon-dark.svg')}}" alt=""></a></div>
        <div class="px-8"><a  href="#"><img class="p-" src="{{asset('icons/social-media/facebook-icon-dark.svg')}}" alt=""></a></div>
        <div class="px-8"><a  href="#"><img class="p-" src="{{asset('icons/social-media/instagram-icon-dark.svg')}}" alt=""></a></div>
        <div class="px-8"><a  href="#"><img class="p-" src="{{asset('icons/social-media/youtube-icon-dark.svg')}}" alt=""></a></div>
        <div class="px-8"><a  href="#"><img class="p-" src="{{asset('icons/social-media/tiktok-icon-dark.svg')}}" alt=""></a></div>
    </div>
    <div class="bg-navy-blue">
        <div class="mx-auto w-full max-w-screen-xl">
            <div class="grid grid-cols-2 gap-8 px-4 py-6 lg:py-8 md:grid-cols-4">
              <div>
                  <h2 class="mb-6 text-lg font-formula1 text-snow-white">Shop</h2>
                  <ul class="text-snow-white">
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
                  <h2 class="mb-6 text-lg font-formula1 text-snow-white">Information</h2>
                  <ul class="text-snow-white">
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
                  <h2 class="mb-6 text-lg font-formula1 text-snow-white">Social channels</h2>
                  <ul class="text-snow-white">
                      <li class="mb-4">
                          <a href="#" class="hover:underline">Twitter</a>
                      </li>
                      <li class="mb-4">
                          <a href="#" class="hover:underline">Instagram</a>
                      </li>
                      <li class="mb-4">
                          <a href="#" class="hover:underline">facebook</a>
                      </li>
                      <li class="mb-4">
                        <a href="#" class="hover:underline">LinkedIn</a>
                    </li>
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-lg font-formula1 text-snow-white">Our Apps</h2>
                  <ul class="text-snow-white">
                      <li class="mb-4">
                          <a href="#" class="hover:underline"><img class="h-9" src="{{asset('images/playstore-app.svg')}}" alt=""></a>
                      </li>
                      <li class="mb-4">
                          <a href="#" class="hover:underline"><img class="h-9" src="{{asset('images/appstore-app.svg')}}" alt=""></a>
                      </li>
                  </ul>
              </div>
          </div>
        <hr class="mx-4 my-6 border-2 border-bluish-purple lg:my-8" />
        <div class="p-4 mx-auto w-full max-w-screen-xl md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="flex justify-center items-center pb-4 sm:pb-0">
                    <x-application-logo :dark="false" class="block mx-2 h-9" />
                </div>
                <p class="flex flex-wrap justify-center mb-6 text-base text-snow-white sm:mb-0">
                    © UrbanThreads 2023 | All rights reserved
                </p>
            </div>
        </div>
    </div>
</footer>


