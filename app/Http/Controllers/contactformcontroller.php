<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactFormController extends Controller
{
 
    public function store(Request $request)
    {
        //validates incoming requests data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'Email' => 'required|email|max:255',
            'OrderID' => 'nullable|string|max:255',
            'Subject' => 'required|string|max:255',
            'Message' => 'required|string',
        ]);

        //creates new contact form instance when validation is success
        ContactForm::create($validatedData);
//redirects to home - using a js implementation at front end for success message
        return redirect('/home'); //->with('success', 'Contact form submitted successfully!');
        //one time message - could get a Javascript box to support thius
}
}
