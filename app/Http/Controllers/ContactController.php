<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Country;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('contacts.create', [
            'countries' => Country::query()->orderBy('name', 'ASC')->get()
        ]);
    }

    public function store(ContactRequest $request){
        $newContact = Contact::query()->create($request->except(['images']));

        foreach ($request->images as $image) {
            $path = Storage::put('images', $image);
            $newContact->images()->create([
                'path' => $path,
                'order' => $newContact->images()->count() + 1
            ]);
        }

        return redirect()->route('contacts.index');
    }

    public function show(Request $request, Contact $contact){
        return view("contacts.show", [
            "contact" => $contact,
            "profileImagePath" => Storage::url($contact->profile_photo_path)
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

    public function downloadImage(Request $request, Contact $contact){
        return Storage::download($contact->profile_photo_path);
    }
}
