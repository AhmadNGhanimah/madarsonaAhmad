<?php

namespace App\Http\Controllers\Job;

use App\DataTables\Teacher\VacanciesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\TeacherRequest;
use App\Models\City;
use App\Models\Degree;
use App\Models\JobTitle;
use App\Models\MaritalStatus;
use App\Models\Nationality;
use App\Models\Region;
use App\Models\School;
use App\Models\Sex;
use App\Models\Specialization;
use App\Models\Teacher;
use App\Models\TeacherEducationalQualification;
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

    public function store(Request $request)
    {

        $validated = $request->validate([
            'school_id' => 'required|exists:schools,id',
            'job_title_id' => 'required|exists:job_titles,id',
            'experience_years' => 'required|numeric|min:0',
            'sex_id' => 'nullable|exists:sexes,id',
            'details_en' => 'required|string',
            'details_ar' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $vacancy = isset($request->vacancy_id) ? Vacancy::findOrFail($request->vacancy_id) : new Vacancy;
        if (isset($request->vacancy_id)) {
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
        } else {
            $vacancy = Vacancy::create([
                'school_id' => $request->school_id,
                'job_title_id' => $request->job_title_id,
                'experience_years' => $request->experience_years,
                'sex_id' => $request->sex_id,
                'details_en' => $request->details_en,
                'details_ar' => $request->details_ar,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
        }
        return response()->json(['message' => 'Vacancy saved successfully', 'status' => 200]);
    }

    public function edit(Vacancy $vacancy)
    {
        $schools = School::get(['id', 'name_ar']);
        $job_titles = JobTitle::get(['id', 'name_ar']);
        $sexes = Sex::get(['id', 'name_ar']);
        $details_en = $vacancy->details_en;
        $details_ar = $vacancy->details_ar;
        $start_date = $vacancy->start_date;
        $end_date = $vacancy->end_date;
        $experience_years = $vacancy->experience_years;

        return view('pages.apps.vacancies.create', compact(
            'vacancy',
            'schools',
            'job_titles',
            'sexes',
            'details_en',
            'details_ar',
            'start_date',
            'end_date',
            'experience_years'
        ));
    }

    public function update(Request $request, Vacancy $vacancy)
    {
        $validatedData = $request->validate([
            'school_id' => 'required|exists:schools,id',
            'job_title_id' => 'required|exists:job_titles,id',
            'experience_years' => 'required|integer|min:0',
            'sex_id' => 'required|exists:sexes,id',
            'details_en' => 'required|string',
            'details_ar' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        $vacancy->update([
            'school_id' => $validatedData['school_id'],
            'job_title_id' => $validatedData['job_title_id'],
            'experience_years' => $validatedData['experience_years'],
            'sex_id' => $validatedData['sex_id'],
            'details_en' => $validatedData['details_en'],
            'details_ar' => $validatedData['details_ar'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
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
