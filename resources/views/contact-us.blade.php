<x-app-layout>
<!-- this is the padding for the whole contact us page  -->
    <div class="p-25">
        <h1 class="text-3xl font-formula1 pt-10">Contact Us</h1>


        <div class="grid grid-cols-1 md:grid-cols-2 grid-rows-1 gap-4">
        <div class="flex flex-nowrap">

            <!-- this is the welcome paragraph at the top -->
            <div class="w-full md:w-[700px] pt-4 pb-4">
                <p>Welcome to UrbanThreads, where your satisfaction is our top priority. Whether you have a question, need assistance, or simply want to share your thoughts, our dedicated support team is here for you. </p>
                <p class="mt-4">Reach out through the contact form below. Your feedback is invaluable, and at UrbanThreads, we're committed to weaving a seamless shopping experience for you. Happy shopping!</p>
            </div>
             <!-- this is for the flex wrap thing -->
        </div>

            <!-- this is the image of people working -->
            <div class=" md:hidden w-full md:w-[700px]  aspect-square">
                <img class="w-full h-auto " src="/images/contact-us images/teamwork 1.svg" alt="picture of people working in a team">
            </div>

            <!-- this is the contact details with icons and description -->
            <h2 class=" text-lg font-formula1"></h2>
            <!-- this is the border around the contact details -->
            <div class="w-full sm:pt-0">
                <h2 class="py-5 text-lg font-formula1 md:w-[700px]">Contact Details</h2>
                <div class="w-full p-4 bg-white bg-opacity-40 border-solid border-neutral-30 border-2 rounded-lg">

                    <!-- this is the icon for the location  -->
                    <div class="items-center">
                        <div class="flex items-center mb-4">
                            <div class="bg-neutral-30 p-3 rounded-md inline-block">
                                <img class="w-6 h-6" src="/images/contact-us images/Location (1).svg" alt="location">
                            </div>

                            <!-- this is the text for the location -->
                            <div class="ml-3 flex flex-col">
                                <p class="text-sm ">Location</p>
                                <p class="text-xs text-neutral-400">Aston University, Birmingham</p>
                            </div>
                        </div>

                        <!-- this is the icon for the phone  -->
                        <div class="flex items-center mb-4">
                            <div class="bg-neutral-30 p-3 rounded-md inline-block">
                                <img class="w-6 h-6" src="/images/contact-us images/Phone (1).svg" alt="phone icon">
                            </div>

                            <!-- this is the text for the Phone number -->
                            <div class="ml-3 flex flex-col">
                                <p class="text-sm ">Phone Number</p>
                                <p class="text-xs text-neutral-400">+44 09390 908 098</p>
                            </div>
                        </div>


                        <!-- this is the icon for the mail  -->
                        <div class="flex items-center ">
                            <div class="bg-neutral-30 p-3 rounded-md inline-block">
                                <img class="w-6 h-6" src="/images/contact-us images/Mail-2.svg" alt="emai icon">
                            </div>

                            <!-- this is the text for the email address -->
                            <div class="ml-3 flex flex-col">
                                <p class="text-sm ">Email</p>
                                <p class="text-xs text-neutral-400">urbanthreads@aston.ac.uk</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            


            <!-- this is the contact form which will be submitted by the customer -->
            <div class="py-5 "> </div>
            <div class="w-full sm:pt-0 ">
                <!--Begin outline of form to be submitted-->
<form action="/contact-us" method = "POST">
    @csrf    
                <h2 class="py-5 text-lg font-formula1 md:w-[700px] pt-8">Contact Form</h2>
                <div class="w-full  p-4 bg-white bg-opacity-40 border-solid border-neutral-30 border-2 rounded-lg ">

                    <x-input-label for="first_name">First Name</x-input-label>
                    <x-text-input type="text" id="first_name" name="FirstName" class="mt-1 w-full " placeholder="First name" required />
<!--NAME attributes need to match column names-->

                    <div class="mt-4">
                        <x-input-label for="last_name">Last Name</x-input-label>
                        <x-text-input type="text" id="last_name" name="LastName" class="mt-1 w-full " placeholder="Last name" required />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="Email">Email</x-input-label>
                        <x-text-input type="Email" id="Email" name="email" class="mt-1 w-full  " placeholder="Email" required />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="OrderID">Order ID</x-input-label>
                        <x-text-input type="text" id="OrderID" name="order_id" class="mt-1 w-full  " placeholder="Order ID" /><!--required removed so can be nullable-->
                    </div>

                    <div class="mt-4">
                        <x-input-label for="Subject">Subject</x-input-label>
                        <x-text-input type="text" id="Subject" name="subject" class="mt-1 w-full  " placeholder="Subject" required />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="Message">Message</x-input-label>
                        <x-text-area type="text" id="Message" name="message" class="mt-1 w-full " placeholder="Write your message here" required />
                    </div>

                    <div class="justify-center self-stretch mt-4">
                        <x-primary-button class="mt-5 w-full rows-6 cols-60">Submit</x-primary-button>
                       </div>
                </div> 
            </div>  
         </form> <!--Note: Location of form tag effects layout of page -->

             <!-- this is the second image which is hidden in the mobile setting  -->
             <div class="hidden md:block w-full md:mt-[-310px] md:mr-[-310px]">
                 <img class="w-full h-auto" src="/images/contact-us images/teamwork 1.svg" alt="picture of people working in a team">
             </div>

             <!-- this is the ending div for the padding -->
         </div>
     </div>

</x-app-layout>