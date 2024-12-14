<?php

namespace App\Http\Controllers\Schools;

use App\DataTables\Schools\TransportationsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\School\TransportationCreateRequest;
use App\Models\School;
use App\Models\SchoolTransportation;

class TransportationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($school_id, TransportationsDataTable $dataTable)
    {
        $school = School::where('id', $school_id)->select('id', 'name_en')->firstOrFail();
        return $dataTable->with('school_id', $school_id)
            ->render('pages/apps.schools.transportations.list', compact('school'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($school_id)
    {

        return view('pages/apps.schools.transportations.create', compact('school_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($school_id, TransportationCreateRequest $request)
    {
        $data = $request->only(['region_name_en', 'region_name_ar', 'one_way_price', 'two_way_price']);
        $data['school_id'] = $school_id;
        SchoolTransportation::create($data);

        return response()->json(['message' => 'Added Successfully', 'status' => 200]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($school_id, SchoolTransportation $transportation)
    {
        return view('pages/apps.schools.transportations.create', compact('school_id', 'transportation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($school_id, SchoolTransportation $transportation, TransportationCreateRequest $request)
    {
        $data = $request->only(['region_name_en', 'region_name_ar', 'one_way_price', 'two_way_price']);
        $data['school_id'] = $school_id;
        $transportation->update($data);

        return response()->json(['message' => 'Updated Successfully', 'status' => 200]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($school_id, SchoolTransportation $transportation)
    {
        $transportation->delete();
    }
}
