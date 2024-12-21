<?php

namespace App\Http\Controllers\Job;

use App\DataTables\Teacher\VacanciesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\VacancyRequest;
use App\Models\JobTitle;
use App\Models\School;
use App\Models\Sex;
use App\Models\Vacancy;
use Arr;
use Illuminate\Http\Request;

class VacancyController extends Controller
{

    public function index(VacanciesDataTable $dataTable)
    {
        return $dataTable->render('pages.apps.vacancies.list');
    }

    public function create()
    {
        $schools = School::get(['id', 'name_ar']);
        $sexes = Sex::get(['id', 'name_ar']);
        $job_titles = JobTitle::get(['id', 'name_ar']);

        return view('pages.apps.vacancies.create', compact('schools', 'sexes', 'job_titles'));
    }

    public function store(VacancyRequest $request)
    {
        Vacancy::create([
            'school_id' => $request->school_id,
            'job_title_id' => $request->job_title_id,
            'experience_years' => $request->experience_years,
            'sex_id' => $request->sex_id,
            'details_en' => $request->details_en,
            'details_ar' => $request->details_ar,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response()->json(['message' => 'Vacancy saved successfully', 'status' => 200]);
    }

    public function edit(Vacancy $vacancy)
    {
        $schools = School::get(['id', 'name_ar']);
        $sexes = Sex::get(['id', 'name_ar']);
        $job_titles = JobTitle::get(['id', 'name_ar']);

        return view('pages.apps.vacancies.create', compact('schools', 'sexes', 'job_titles', 'vacancy'));
    }

    public function update(Request $request, Vacancy $vacancy)
    {
        $vacancy->update([
            'school_id' => $request->school_id,
            'job_title_id' => $request->job_title_id,
            'experience_years' => $request->experience_years,
            'sex_id' => $request->sex_id,
            'details_en' => $request->details_en,
            'details_ar' => $request->details_ar,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('vacancies.index')->with('success', 'Vacancy updated successfully.');
    }


    public function destroy($vacancy_id)
    {
        $vacancy = Vacancy::findOrFail($vacancy_id);
        Vacancy::where('id', $vacancy->id)->delete();
        $vacancy->delete();
        return response()->json(['message' => 'Vacancy deleted successfully', 'status' => 200]);
    }
}
