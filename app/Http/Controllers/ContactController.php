<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

// resourceful controller
class ContactController extends Controller
{
    public function index(Request $request){

        $contacts =
            Contact::query()
            ->when($request->has('searchTerm'), function($query) use ($request){
                $query->where('first_name', 'like', '%'.$request->searchTerm.'%');
                $query->orWhere('last_name', 'like', '%'.$request->searchTerm.'%');
            })
            ->paginate(Contact::PER_PAGE)->withQueryString();

        return view('contacts.index', [
            "contacts" => $contacts
        ]);
    }

    public function create(){
        return view('contacts.create');
    }

    public function store(ContactRequest $request){

        Contact::query()->create([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "phone_number" => $request->phone_number,
            "email" => $request->email,
        ]);

        return redirect()->route('contacts.index');
    }

    public function show(Request $request, Contact $contact){
        return view("contacts.show", [
            "contact" => $contact
        ]);
    }

    public function edit(Request $request, Contact $contact){
        return view("contacts.edit", [
            "contact" => $contact
        ]);
    }

    public function update(ContactRequest $request, Contact $contact){
        $contact->update([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "phone_number" => $request->phone_number,
            "email" => $request->email,
        ]);

        return redirect()->route('contacts.index');
    }

    public function destroy(Request $request, Contact $contact){
        $contact->delete();
        return redirect()->route('contacts.index');
    }
}
