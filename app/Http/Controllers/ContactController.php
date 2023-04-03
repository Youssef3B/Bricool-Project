<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller
{
    public function contact()
    {
        return view('contact.contact');
    }
    public function store(Request $request)
    {
        // validate form data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);

        // create new contact instance with form data
        $contacts = new Contact();
        $contacts->name = $validatedData['name'];
        $contacts->email = $validatedData['email'];
        $contacts->subject = $validatedData['subject'];
        $contacts->message = $validatedData['message'];

        // save the contact to the database
        $contacts->save();

        // redirect back to form with success message
        return redirect()->back()->with('success', 'Thank you for your message! Your message Has been successfully Sent!');
    }
}
