<x-app-layout>

    <x-slot name="header">
            About us
    </x-slot>


    <div class="flex flex-col items-center">
        <!-- top section -->
        <div class="flex flex-col items-center w-fit lg:flex-row lg:my-20">
            <div class="w-96 bg-black sm:mx-10 aspect-square">
                <img src="/images/product-images/hoodies/winter-hoodie.png" alt="Image of a smart man wearing a scarf">
            </div>
            <div class="w-96 sm:mx-10  lg:w-[26rem] xl:w-[35rem]">
                <h1 class="py-5 text-xl font-formula1 text-primary-300">Who We Are</h1>
                <p>We are Urban Threads we aim to sell high quality elegant clothing pieces to Men and Women
                    at affordable prices so that you can look and feel your best!
                    Our Journey began with a passion to you get quality clothing pieces
                    from the convinience of your own home. Experience the ease of online shopping with Urban Threads-
                    Our
                    user-friendly website ensures easy navigation through the webiste as we bring the latest fashion
                    trends directly to you!
                </p>
            </div>
        </div>

        <!-- bottom section -->
        <div class="flex flex-col items-center w-fit lg:my-20 lg:flex-row">
            <div class="w-96 sm:mx-10 lg:w-[26rem] xl:w-[35rem]">
                <h1 class="py-5 text-xl font-formula1 text-primary-300">Why Choose Us</h1>
                <p class="pb-5">At UrbanThreads, we pride ourselves in offering a personalised shopping experience
                    tailored to your
                    unique preferences. Elevate your wardrobe with exclusive collections that you wont find
                    anywhere else. Enjoy the privilege of owning fashion-forward items that reflect your individuality
                    and make a bold statement in any setting. Choose UrbanThreads - where trendsetting fashion, quality
                    craftmanship, and
                    inclusive style converge to redefine your clothing experience.</p>
            </div>
            <div class="w-96 bg-black sm:mx-10 aspect-square">
                <img src="/images/product-images/accessories/baseball-cap.png" alt="Image of a man wearing a cap">
            </div>
        </div>
    </div>

</x-app-layout>
