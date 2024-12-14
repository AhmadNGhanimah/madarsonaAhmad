<?php

namespace App\Http\Controllers\Job;

use App\DataTables\Teacher\TeachersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\TeacherRequest;
use App\Models\City;
use App\Models\Degree;
use App\Models\JobTitle;
use App\Models\MaritalStatus;
use App\Models\Nationality;
use App\Models\Region;
use App\Models\Sex;
use App\Models\Specialization;
use App\Models\Teacher;
use App\Models\TeacherEducationalQualification;
use Arr;

class TeacherController extends Controller
{

    public function index(TeachersDataTable $dataTable)
    {
        return $dataTable->render('pages.apps.teachers.list');
    }

    public function create()
    {
        $cities = City::get(['id', 'name_ar']);
        $regions = Region::where('city_id', 1)->get(['id', 'name_ar']);
        $nationalities = Nationality::get(['id', 'name_ar']);
        $sexes = Sex::get(['id', 'name_ar']);
        $marital_statuses = MaritalStatus::get(['id', 'name_ar']);
        $specializations = Specialization::get(['id', 'name_ar']);
        $degrees = Degree::get(['id', 'name_ar']);
        $job_titles = JobTitle::get(['id', 'name_ar']);

        return view('pages.apps.teachers.create',
            compact('cities', 'regions', 'nationalities', 'sexes',
                'marital_statuses', 'specializations', 'degrees', 'job_titles'));
    }

    public function store(TeacherRequest $request)
    {
        $data = $request->only('full_name_en', 'full_name_ar', 'national_number', 'place_birth', 'birth_date', 'email', 'phone',
            'mobile', 'experience_years', 'address', 'subscription_date', 'subscription_end_date', 'paid_type',
            'nationality_id', 'sex_id', 'marital_status_id', 'first_job_title_id', 'second_job_title_id', 'third_job_title_id',
            'first_desired_job_city_id', 'second_desired_job_city_id', 'third_desired_job_city_id', 'practical_experiences_en',
            'practical_experiences_ar', 'skills_abilities_en', 'skills_abilities_ar', 'region_id', 'city_id');

        $teacher = Teacher::create($data);

        foreach ($request->specializations as $index => $specialization) {
            TeacherEducationalQualification::create([
                'specialization_id' => $specialization,
                'institute' => Arr::get($request->institutes, $index),
                'city' => Arr::get($request->cities, $index),
                'graduation_date' => Arr::get($request->graduation_dates, $index),
                'degree_id' => Arr::get($request->degrees, $index),
                'teacher_id' => $teacher->id,
            ]);
        }

        return response()->json(['message' => 'Added Successfully', 'status' => 200]);
    }


    public function edit(Teacher $teacher)
    {
        $cities = City::get(['id', 'name_ar']);
        $regions = Region::where('city_id', 1)->get(['id', 'name_ar']);
        $nationalities = Nationality::get(['id', 'name_ar']);
        $sexes = Sex::get(['id', 'name_ar']);
        $marital_statuses = MaritalStatus::get(['id', 'name_ar']);
        $specializations = Specialization::get(['id', 'name_ar']);
        $degrees = Degree::get(['id', 'name_ar']);
        $job_titles = JobTitle::get(['id', 'name_ar']);

        return view('pages.apps.teachers.create',
            compact('teacher', 'cities', 'regions', 'nationalities', 'sexes',
                'marital_statuses', 'specializations', 'degrees', 'job_titles'));
    }

    public function update(TeacherRequest $request, Teacher $teacher)
    {
        $data = $request->only('full_name_en', 'full_name_ar', 'national_number', 'place_birth', 'birth_date', 'email', 'phone',
            'mobile', 'experience_years', 'address', 'subscription_date', 'subscription_end_date', 'paid_type',
            'nationality_id', 'sex_id', 'marital_status_id', 'first_job_title_id', 'second_job_title_id', 'third_job_title_id',
            'first_desired_job_city_id', 'second_desired_job_city_id', 'third_desired_job_city_id', 'practical_experiences_en',
            'practical_experiences_ar', 'skills_abilities_en', 'skills_abilities_ar', 'region_id', 'city_id');

        $teacher->update($data);

        TeacherEducationalQualification::where('teacher_id', $teacher->id)->delete();

        foreach ($request->specializations as $index => $specialization) {
            TeacherEducationalQualification::create([
                'specialization_id' => $specialization,
                'institute' => Arr::get($request->institutes, $index),
                'city' => Arr::get($request->cities, $index),
                'graduation_date' => Arr::get($request->graduation_dates, $index),
                'degree_id' => Arr::get($request->degrees, $index),
                'teacher_id' => $teacher->id,
            ]);
        }

        return response()->json(['message' => 'Update Successfully', 'status' => 200]);
    }

    public function destroy(Teacher $teacher)
    {
        TeacherEducationalQualification::where('teacher_id', $teacher->id)->delete();

        $teacher->delete();
    }
}
