<x-app-layout>

    <x-slot name="header">
        <h1 class="">
            Contact us
        </h1>
    </x-slot>

 
 <!-- need to fix this to make it responsive -->
     <!-- <div class= "md:flex lg:flex-1 ">   -->
     <div class="sm:grid md:flex lg:grid-cols-2">  
     <div class="w-full md:w-[700px] mx-4">
                <p>Welcome to UrbanThreads, where your satisfaction is our top priority. Whether you have a question, need assistance, or simply want to share your thoughts, our dedicated support team is here for you. </p>
                <p class="mt-4">Reach out through the contact form below. Your feedback is invaluable, and at UrbanThreads, we're committed to weaving a seamless shopping experience for you. Happy shopping!</p>

                <div class="md:flex-shrink-0 lg:flex-shrink-0">
                    <h2 class="py-5 text-lg font-formula1">Contact Details</h2>

                    <!-- this is the border around the contact details -->
                    <div class="w-full md:w-[700px] p-4 bg-white bg-opacity-40 border-solid border-neutral-30 border-3 rounded-lg "> 

                <!-- this is the icon for the location  -->
                    <div class="items-center">
                        <div class="flex items-center mb-4">
                            <div class= "bg-neutral-30 p-3 rounded-md inline-block">
                                <img class="w-6 h-6" src="/images/contact-us images/Location.jpg" alt="location">
                            </div>

                <!-- this is the text for the location -->
                        <div class="ml-3 flex flex-col">
                            <p class="text-sm ">Location</p>
                            <p class="text-xs text-neutral-400">Aston University, Birmingham</p>
                    </div> 
                 </div> 

                 <!-- this is the icon for the phone  -->
                 <div class="flex items-center mb-4">
                 <div class= "bg-neutral-30 p-3 rounded-md inline-block">
                <img class="w-6 h-6" src="/images/contact-us images/Phone.jpg" alt="phone icon">
                </div>

                <!-- this is the text for the Phone number -->
                <div class="ml-3 flex flex-col">
                    <p class="text-sm ">Phone Number</p>
                    <p class="text-xs text-neutral-400">+44 09390 908 098</p>
                </div>
                </div>


                <!-- this is the icon for the mail  -->
                <div class="flex items-center ">
                <div class= "bg-neutral-30 p-3 rounded-md inline-block">
                <img class ="w-6 h-6" src="/images/contact-us images/Mail-2.jpg" alt="emai icon">
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
            </div>

                   <!-- </div>  -->
     <!-- this is the image of people working -->
     <div class="mt-6 mb-6 mx-6 md:w-96 lg:w-96">
                <img class="w-96" src="/images/contact-us images/people working in a team.png" alt="picture of people working in a team">
                </div> 
                
               
           
                </div>

                
                <!-- this is the contact form which will be submitted by the customer -->
            <h2 class="py-5 text-lg font-formula1">Contact Form</h2>

             <div class="pt-6 w-full sm:pt-0"> 
                <div class="w-full md:w-[700px] p-4 bg-white bg-opacity-40 border-solid border-neutral-30 border-3 rounded-lg ">
                        <div class="mt-4 ">
                            <x-input-label for="first_name">First Name</x-input-label>
                            <x-text-input type="text" id="first_name" name="first_name" class="mt-1 w-full border-neutral-50 rounded-md" placeholder="First name" required/>
                            </div>

                            <div class="mt-4">
                            <x-input-label for="last_name">Last Name</x-input-label>
                            <x-text-input type="text" id="last_name" name="last_name" class="mt-1 w-full border-neutral-50 rounded-md" placeholder="Last name" required />
                            </div>

                            <div class="mt-4">
                            <x-input-label for="Email">Email</x-input-label>
                            <x-text-input type="Email" id="Email" name="Email" class="mt-1 w-full border-neutral-50 rounded-md" placeholder="Email" required/>
                            </div>

                            <div class="mt-4">
                            <x-input-label for="OrderID">Order ID</x-input-label>
                            <x-text-input type="text" id="OrderID" name="OrderID" class="mt-1 w-full border-neutral-50 rounded-md" placeholder="Order ID" required />
                            </div>

                            <div class="mt-4">
                            <x-input-label for="Subject">Subject</x-input-label>
                            <x-text-input type="text" id="Subject" name="Subject" class="mt-1 w-full border-neutral-50 rounded-md" placeholder="Subject" required />
                            </div>

                            <div class="mt-4">
                            <x-input-label for="Message">Message</x-input-label>
                            <x-text-area type="text" id="Message" name="Message" class="mt-1 w-full border-neutral-50 rounded-md" placeholder="Write your message here" required/>
                            </div>

                            <div class="justify-center self-stretch mt-4">
                            <x-primary-button class="mt-5 w-full rounded-lg rows-6 cols-60">Submit</x-primary-button>
                            </div>

                         </div> 
                         </div>

                         
</x-app-layout>