<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;



class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $contacts = Contact::paginate(10);

        Log::info("contacts received all when opened");
        return view('contacts.index')->with('contacts', $contacts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Log::info("contacts create form opened");
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:contacts,email',
            'phone_1' => 'required|digits:11|unique:contacts,phone_1',
            'phone_2' => 'nullable|digits:11|unique:contacts,phone_2',
            'address' => 'nullable|string',
        ]);

        Contact::create($validated);

        Log::info('Contact created: ' . $validated['name']);



        // Code to store the contact



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Log::info("contacts show form opened");

        $contact = Contact::find($id);

        return view('contacts.show')->with('contact', $contact);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('contacts.edit')->with('contact', Contact::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $contact = Contact::find($id);

        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:contacts,email,' . ($contact->id),
            'phone_1' => 'required|digits:11|unique:contacts,phone_1,' . ($contact->id),
            'phone_2' => 'nullable|digits:11|unique:contacts,phone_2,' . ($contact->id),
            'address' => 'nullable|string',
        ]);
        Contact::find($id)->update($validated);

        Log::info("contacts update form opened");
        Log::debug("contacts update form opened", ['id' => $id]);


        // Code to update the contact


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $contact = Contact::find($id);
        $contact->delete();
        Log::info("contacts deleted", ['id' => $id]);


        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully!');
    }
}
