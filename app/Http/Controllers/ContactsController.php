<?php

namespace App\Http\Controllers;

use App\DataTables\ContactsDataTable;
use App\Models\Contact;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ContactsDataTable $dataTable)
    {
        return $dataTable->render('pages.apps.contacts.list');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        $contact->update(['is_read' => 1]);
        return view('pages.apps.contacts.show', compact('contact'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
    }
}
