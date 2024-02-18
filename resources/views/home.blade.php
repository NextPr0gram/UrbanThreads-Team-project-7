{{-- home page --}}
<x-app-layout>
    {{-- hero section --}}
    <div class="flex justify-between items-center lg:px-10">
        {{-- hero text --}}
        <div class="py-10 pl-4">
            <h1 class="px-2 my-5 text-3xl leading-tight text-transparent bg-clip-text bg-background-image font-formula1 sm:text-4xl lg:text-6xl">
                Welcome to <br>
                UrbanThreads
            </h1>
            <p class="px-2 mx-2 my-5 border-l-3 border-bluish-purple">Elevate Your Style. Discover the latest trends in
                fashion.</p>
            <div class="px-2 my-5">
                <a href="{{ route('all-products') }}"><x-primary-button> Shop now </x-primary-button></a></div>
        </div>

        {{-- hero image --}}
        <div>
            <img src="images/home-page/hero-image.png" alt="" class="hidden sm:block max-h-[40rem]">
        </div>
    </div>
<!-- ALL OF THE BELOW IS FOR THE FILTER -->
    <!-- <div class="grid grid-flow-col auto-cols-max items-start "> -->
    <div class="grid grid-cols-1 md:grid-cols-2 grid-rows-1 items-start "> 
        
        <div class="flex flex-nowrap"> 
        <div class="p-4 bg-white bg-opacity-40 border-solid border-neutral-30 border-2 rounded-lg inline-block mb-4 flex-col ">
        

        <div class="relative" id="dropdownButton">
        <x-input-label for="Sort" class="pb-2">Sort</x-input-label>
        <div id="button" onclick = "toggleDropdown()" class="border-solid border-neutral-60 border-[1px] px-5 py-2 rounded-sm cursor-pointer flex justify-between">Options
         <img id="upArrow" src="/images/filter icons/Chevron Down.svg" > 
        </div>

        <!-- this is the border for the dropdown options  -->
        <!-- if this doesnt work remember to add hidden back here and get rid of overflow transition stuff -->
        <div id="dropdown" class="rounded-md border-neutral-60 hidden ">
        <div class="bg-white bg-opacity-40 border-solid border-l border-r border-b border-neutral-60 rounded-bl-sm rounded-br-sm flex flex-col">
            <!-- Dropdown content -->
            <x-dropdown-link >Low to high</x-dropdown-link>
            <x-dropdown-link >High to low</x-dropdown-link>
            <x-dropdown-link >Popularity</x-dropdown-link>
            <x-dropdown-link >Relevance</x-dropdown-link>
            </div> 
        </div>
<!-- this is the ending div for the dropdown  -->
        </div>
           

        <!-- this is the javascript for the dropdown to allow the options to be shown when the arrow is pressed and an up arrow is shown when the options are shown-->
        <script>
            function toggleDropdown(){

                let dropdownButton = document.querySelector('#dropdownButton, #dropdown');
                let upArrow = document.querySelector('#upArrow');
                dropdown.classList.toggle("hidden");
                if(dropdown.classList.contains("hidden")){
                    upArrow.src = "/images/filter icons/Chevron Down.svg";
                    
                }else{
                    upArrow.src =  "/images/filter icons/Vector.svg";
                }
            }

        </script>
       
        
    <!-- these are the checkboxes -->
        <x-input-label for="Man" class="py-3">
        <span class=" flex-grow mr-60">Man</span>
        <x-checkbox></x-checkbox>
        </x-input-label>


        <x-input-label for="Women" class="pb-3 flex items-center">
        <span class="flex-grow mr-52">Women</span>
        <x-checkbox ></x-checkbox>
        </x-input-label> 
       

        <x-input-label for="Unisex" class="pb-3 flex items-center">
        <span class="flex-grow mr-52">Unisex</span>
        <x-checkbox></x-checkbox>
        </x-input-label>

        <div class="flex space-x-4 ml-24 pt-3">
        <x-secondary-button>Reset</x-secondary-button>
        <x-primary-button>Apply</x-primary-button>
        </div>
    
    <!-- this is the ending div for the border  -->
    </div>
      <!-- this the ending div for the flex no wrap  -->
    </div> 
    
    <!-- ALL OF THE ABOVE IS FOR THE FILTER -->

    <!-- Container for the product category cards -->
    <div class="flex flex-wrap justify-center mt-3 mb-12 sm:mb-24 min-h-[30rem]">
        <!-- Container for first product category -->
        <a class="text-2xl hover:text-5xl bg-[url('/images/home-page/hoodie-category-image.png')] bg-cover bg-center inline-flex justify-center items-center md:mx-5 w-full  md:w-64 h-[25rem] bg-snow-white mb-9 md:hover:w-80 md:hover:h-[27rem] transition- ease-in-out duration-300 border-3 border-light-gray hover:border-bluish-purple hover:outline hover:outline-4 hover:outline-light-gray"
            href="{{ route('hoodies') }}">
            <h2 class="text-white mix-blend-difference font-formula1">
                Hoodies
            </h2>
        </a>


        <!-- Container for second product category -->
        <a class="text-2xl hover:text-5xl bg-[url('/images/home-page/tshirt-category-image.png')] bg-cover bg-center inline-flex justify-center items-center md:mx-5 w-full  md:w-64 h-[25rem] bg-snow-white mb-9 md:hover:w-80 md:hover:h-[27rem] transition- ease-in-out duration-300 border-3 border-light-gray hover:border-bluish-purple hover:outline hover:outline-4 hover:outline-light-gray"
            href="{{ route('tshirts') }}">
            <h3 class="text-white mix-blend-difference font-formula1">
                T-Shirts
            </h3>
        </a>

        <!-- Container for third product category -->
        <a class="text-2xl hover:text-5xl bg-[url('/images/home-page/trousers-category-image.png')] bg-cover bg-center inline-flex justify-center items-center md:mx-5 w-full  md:w-64 h-[25rem] bg-snow-white mb-9 md:hover:w-80 md:hover:h-[27rem] transition- ease-in-out duration-300 border-3 border-light-gray hover:border-bluish-purple hover:outline hover:outline-4 hover:outline-light-gray"
            href="{{ route('trousers') }}">
            <h3 class="text-white mix-blend-difference font-formula1">
                Trousers
            </h3>
        </a>

        <!-- Container for fourth product category -->
        <a class="text-2xl hover:text-5xl bg-[url('/images/home-page/jacket-category-image.png')] bg-cover bg-center inline-flex justify-center items-center md:mx-5 w-full  md:w-64 h-[25rem] bg-snow-white mb-9 md:hover:w-80 md:hover:h-[27rem] transition- ease-in-out duration-300 border-3 border-light-gray hover:border-bluish-purple hover:outline hover:outline-4 hover:outline-light-gray"
            href="{{ route('jackets') }}">
            {{-- TODO: soon to be changed to hats --}}
            <h3 class="text-white mix-blend-difference font-formula1">
                jackets
            </h3>
        </a>

        <!-- Container for fifth product category-->
        <a class="text-2xl hover:text-5xl bg-[url('/images/home-page/accessories-category-image.png')] bg-cover bg-center inline-flex justify-center items-center md:mx-5 w-full  md:w-64 h-[25rem] bg-snow-white mb-9 md:hover:w-80 md:hover:h-[27rem] transition- ease-in-out duration-300 border-3 border-light-gray hover:border-bluish-purple hover:outline hover:outline-4 hover:outline-light-gray"
            href="{{ route('accessories') }}">
            {{-- soon to be changed to hats --}}
            <h3 class="text-white mix-blend-difference font-formula1">
                Accessories
            </h3>
        </a>
    </div>
    <!-- this is the end of the div for the grid i added  -->
    </div> 
</x-app-layout>
