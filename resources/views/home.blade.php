<x-app-layout>

            <!-- Container for "Welcome to UrbanThreads" -->
            <div class="ml-32 mt-16"> <!-- sm:ml-10 -->
            <h1 class="px-2 py-6 text-bluish-purple text-xs sm:text-3xl font-formula1">
            <div class="block">Welcome to</div>
                <div class="block">UrbanThreads</div>
            </h1>
            </div>

            <!-- Container for heading 2 "Elevate Your Style" and primary button component -->
            <div class="ml-12 text-black font-medium font-lexend leading-normal relative"> <!-- text-sm -->
            
            <!-- Heading 2 "Elevate Your Style. Discover the latest trends in fashion" -->
                <h2 class="mb-4 ml-4 flex flex-wrap 2xl:hidden">
                <span class="absolute left-0 inline-block px-0.5 ml-1 w-0.5 h-8 bg-bluish-purple"></span><div style="padding-top:4px">Elevate Your Style. </div>
                <div style="padding-top: 4px">Discover the latest trends in fashion.</div>
                </h2>
    </div>

                <!-- Container for "Shop now" component -->
            <div class="mt-7 ml-1">
            <x-primary-button-dark>
                Shop now
            </x-primary-button-dark>
            </div>


            <!-- Container for the people representing UrbanThreads -->
            <div class="hidden sm:block absolute top-28 right-10" style="top: 100px;">
            <img src="icons/utility/home-page-hero-image.png" alt="Image of people representing UrbanThreads" class="float-right w-2/3 h-2/3 shrink-0"/>
            </div>

            <!-- Container for the product cards -->
            <div class="flex flex-wrap items-center justify-evenly" style="margin-top: 300px; margin-bottom: 150px"> 

                <!-- Container for first product -->
                <div class="inline-flex justify-center items-center w-64 h-96 bg-snow-white mb-9"> <!-- sm:flex-col sm:gap-7 sm:mb-0 -->
                    <a href="/product1">    
                <h1 class="text-black font-formula13xl leading-normal font-medium px-6 py-6">Product 1</h1>
                </div> 

                <!-- Container for second product -->
                <div class="inline-flex justify-center items-center gap-2.5 w-64 h-96 bg-snow-white mb-9"> <!-- sm:flex-col sm:mb-0 -->
                    <a href="/product2">   
                <h1 class="text-black font-formula13xl leading-normal font-medium px-6 py-6">Product 2</h1>
                </div>

                <!-- Container for third product -->
                <div class="inline-flex justify-center items-center gap-2.5 w-64 h-96 bg-snow-white mb-9"> <!-- sm:flex-col sm:mb-0 -->
                    <a href="/product3">    
                <h1 class="text-black font-formula13xl leading-normal font-medium px-6 py-6">Product 3</h1>
                </div>

                <!-- Container for fourth product -->
                <div class="inline-flex justify-center items-center gap-2.5 w-64 h-96 bg-snow-white mb-9"> <!-- sm:flex-col sm:mb-0 -->
                    <a href="/product4">  
                <h1 class="text-black font-formula13xl leading-normal font-medium px-6 py-6">Product 4</h1>
                </div>

            </div>

</x-app-layout>