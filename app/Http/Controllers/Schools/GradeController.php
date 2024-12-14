<?php

namespace App\Http\Controllers\Schools;

use App\DataTables\Schools\GradesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\School\GradeCreateRequest;
use App\Models\Grade;
use App\Models\School;
use App\Models\SchoolGrade;
use App\Models\SchoolTransportation;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($school_id, GradesDataTable $dataTable)
    {
        $school = School::where('id', $school_id)->select('id', 'name_en')->firstOrFail();
        return $dataTable->with('school_id', $school_id)
            ->render('pages.apps.schools.grades.list', compact('school'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($school_id)
    {
        $grades = Grade::get();
        return view('pages/apps.schools.grades.create', compact('school_id', 'grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($school_id, GradeCreateRequest $request)
    {
        $data = $request->only(['curriculum_type', 'grade_id', 'price']);
        $data['school_id'] = $school_id;
        SchoolGrade::create($data);

        return response()->json(['message' => 'Added Successfully', 'status' => 200]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($school_id, SchoolGrade $grade)
    {
        $grades = Grade::get();
        return view('pages/apps.schools.grades.create', compact('school_id', 'grade', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($school_id, SchoolGrade $grade, GradeCreateRequest $request)
    {
        $data = $request->only(['curriculum_type', 'grade_id', 'price']);
        $data['school_id'] = $school_id;
        $grade->update($data);

        return response()->json(['message' => 'Updated Successfully', 'status' => 200]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($school_id, $school_grade_id)
    {

        SchoolGrade::destroy($school_grade_id);
    }
}
