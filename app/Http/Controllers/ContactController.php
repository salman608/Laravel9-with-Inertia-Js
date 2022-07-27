<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use inertia\inertia;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
       
        return Inertia::render('Contact/Index',[
          'contactInfo' => Contact::all(),
          'title' => 'All Contact Message'
        ]);
    }

    public function create()
    {
        return Inertia::render('Contact/Create');
    }

    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts',
            'subject' => 'required',
            'message' => 'required'
        ]);
      

      Contact::create([
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
      ]);
      
        return redirect()->to('/contacts');
    }

    public function edit($id)
    {
      
        return Inertia::render('Contact/Edit',[
            'contactInfo' => Contact::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
  
      
      $contactInfo = Contact::findOrFail($id);

      $contactInfo->update([
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
      ]);
      
        return redirect()->to('/contacts');

    }
}
