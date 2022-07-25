<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use inertia\inertia;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return Inertia::render('Contact');
    }

    public function store(Request $request)
    {
       

      Contact::create([
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
      ]);
      
        return redirect()->back();
    }
}
