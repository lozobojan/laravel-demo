<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('contacts.index', [
            "contacts" => $contacts
        ]);
    }

    public function create(){
        return view('contacts.create');
    }

    public function save(Request $request){

//        $contact = new Contact();
//        $contact->first_name = $request->first_name;
//        $contact->last_name = $request->last_name;
//        $contact->email = $request->email;
//        $contact->phone_number = $request->phone_number;
//        $contact->save();

        Contact::query()->create([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "phone_number" => $request->phone_number,
            "email" => $request->email,
        ]);

        return redirect('/contacts');
    }

    public function show(Request $request){
        $contactId = $request->id;
        $contact = Contact::query()->findOrFail($contactId);
        return view("contacts.show", [
            "contact" => $contact
        ]);
    }

    public function edit(Request $request){
        $contactId = $request->id;
        $contact = Contact::query()->findOrFail($contactId);
        return view("contacts.edit", [
            "contact" => $contact
        ]);
    }

    public function update(Request $request){
        $contactId = $request->id;
        $contact = Contact::query()->findOrFail($contactId);
        $contact->update([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "phone_number" => $request->phone_number,
            "email" => $request->email,
        ]);

        return redirect('/contacts');
    }

    public function destroy(Request $request){
        $contactId = $request->id;
        $contact = Contact::query()->findOrFail($contactId);
        $contact->delete();
        return redirect('/contacts');
    }
}
