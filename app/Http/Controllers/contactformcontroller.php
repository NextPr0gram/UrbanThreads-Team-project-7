<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;

class ContactFormController extends Controller
{
 
    public function store(Request $request)
    {
        //validates incoming requests data.
        $validatedData = $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'order_id' => 'nullable|string|max:255', //nullable
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        //creates new contact form instance when validation is success
        $newContactForm = ContactForm::create($validatedData);

//redirects to home - using a js implementation at front end for success message
        return redirect('/home')->with('success', 'Contact form submitted successfully!');
        //one time message at the top
}

public function updateStatus(Request $request, $enquiryId) {
    // Validate the request
    $request->validate([
        'newStatus' => 'required|in:New,In Process,Processed',
    ]);

    try {
        // Retrieve the enquiry
        $enquiry =  ContactForm::findOrFail($enquiryId);

        // Update the status
        $enquiry->status = $request->newStatus;
        $enquiry->save();

        // Redirect back or return a response as needed
        return redirect()->back()->with('success', 'Enquiry status updated successfully');
    } catch (\Exception $e) {
        // Handle the exception, perhaps log it
        return redirect()->back()->with('failed', 'Enquiry status not updated');
    }
}




}
