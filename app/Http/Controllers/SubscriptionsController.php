<?php

namespace App\Http\Controllers;

use App\DataTables\SubscriptionsDataTable;
use App\Models\Subscription;

class SubscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubscriptionsDataTable $dataTable)
    {
        return $dataTable->render('pages.apps.subscriptions.list');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscription $subscription)
    {
        $subscription->update(['is_read' => 1]);
        return view('pages.apps.subscriptions.show', compact('subscription'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscription $contact)
    {
        $contact->delete();
    }
}
