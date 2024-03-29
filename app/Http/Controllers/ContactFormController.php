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

        //create a new enquiry
        $enquiry = new ContactForm();
        $enquiry->FirstName = $validatedData['FirstName'];
        $enquiry->LastName = $validatedData['LastName'];
        $enquiry->email = $validatedData['email'];
        $enquiry->order_id = $validatedData['order_id'];
        $enquiry->subject = $validatedData['subject'];
        $enquiry->message = $validatedData['message'];
        $enquiry->status = 'New';
        $enquiry->save();

        // Redirect back or return a response as needed
        return redirect()->back()->with('success', 'Enquiry submitted successfully');
    }

    public function updateStatus(Request $request, $enquiryId)
    {
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

    public function deleteEnquiry($enquiryId)
    {
        try {
            // Retrieve the enquiry
            $enquiry = ContactForm::findOrFail($enquiryId);

            // Delete the enquiry
            $enquiry->delete();

            // Redirect back or return a response as needed
            return redirect()->back()->with('success', 'Enquiry deleted successfully');
        } catch (\Exception $e) {
            // Handle the exception, perhaps log it
            return redirect()->back()->with('failed', 'Failed to delete enquiry');
        }
    }
}
