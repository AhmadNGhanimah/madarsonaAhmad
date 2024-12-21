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
use App\Models\Vacancy;
use Arr;
use Illuminate\Support\Facades\DB;

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

        return view(
            'pages.apps.teachers.create',
            compact(
                'cities',
                'regions',
                'nationalities',
                'sexes',
                'marital_statuses',
                'specializations',
                'degrees',
                'job_titles'
            )
        );
    }

    public function store(TeacherRequest $request)
    {
        $data = $request->only(
            'full_name_en',
            'full_name_ar',
            'national_number',
            'place_birth',
            'birth_date',
            'email',
            'phone',
            'mobile',
            'experience_years',
            'address',
            'subscription_date',
            'subscription_end_date',
            'paid_type',
            'nationality_id',
            'sex_id',
            'marital_status_id',
            'first_job_title_id',
            'second_job_title_id',
            'third_job_title_id',
            'first_desired_job_city_id',
            'second_desired_job_city_id',
            'third_desired_job_city_id',
            'practical_experiences_en',
            'practical_experiences_ar',
            'skills_abilities_en',
            'skills_abilities_ar',
            'region_id',
            'city_id'
        );

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

        return view(
            'pages.apps.teachers.create',
            compact(
                'teacher',
                'cities',
                'regions',
                'nationalities',
                'sexes',
                'marital_statuses',
                'specializations',
                'degrees',
                'job_titles'
            )
        );
    }

    public function update(TeacherRequest $request, Teacher $teacher)
    {
        $data = $request->only(
            'full_name_en',
            'full_name_ar',
            'national_number',
            'place_birth',
            'birth_date',
            'email',
            'phone',
            'mobile',
            'experience_years',
            'address',
            'subscription_date',
            'subscription_end_date',
            'paid_type',
            'nationality_id',
            'sex_id',
            'marital_status_id',
            'first_job_title_id',
            'second_job_title_id',
            'third_job_title_id',
            'first_desired_job_city_id',
            'second_desired_job_city_id',
            'third_desired_job_city_id',
            'practical_experiences_en',
            'practical_experiences_ar',
            'skills_abilities_en',
            'skills_abilities_ar',
            'region_id',
            'city_id'
        );

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
    public function showResume($id)
    {
        $edutcation = TeacherEducationalQualification::where('teacher_id', $id)->first();


        $teacher = DB::table('teachers')
            ->leftJoin('nationalities', 'teachers.nationality_id', '=', 'nationalities.id')
            ->leftJoin('sexes', 'teachers.sex_id', '=', 'sexes.id')
            ->leftJoin('marital_statuses', 'teachers.marital_status_id', '=', 'marital_statuses.id')
            ->leftJoin('cities as city', 'teachers.city_id', '=', 'city.id')
            ->leftJoin('regions', 'teachers.region_id', '=', 'regions.id')
            ->leftJoin('job_titles as first_job', 'teachers.first_job_title_id', '=', 'first_job.id')
            ->leftJoin('job_titles as second_job', 'teachers.second_job_title_id', '=', 'second_job.id')
            ->leftJoin('job_titles as third_job', 'teachers.third_job_title_id', '=', 'third_job.id')
            ->leftJoin('cities as first_desired_city', 'teachers.first_desired_job_city_id', '=', 'first_desired_city.id')
            ->leftJoin('cities as second_desired_city', 'teachers.second_desired_job_city_id', '=', 'second_desired_city.id')
            ->leftJoin('cities as third_desired_city', 'teachers.third_desired_job_city_id', '=', 'third_desired_city.id')
            ->leftJoin('users', 'teachers.user_id', '=', 'users.id')
            ->select(
                'teachers.*',
                'nationalities.name_en as nationality_name',
                'sexes.name_en as sex_name',
                'marital_statuses.name_en as marital_status_name',
                'city.name_en as city_name',
                'regions.name_en as region_name',
                'first_job.name_en as first_job_name',
                'second_job.name_en as second_job_name',
                'third_job.name_en as third_job_name',
                'first_desired_city.name_en as first_desired_city_name',
                'second_desired_city.name_en as second_desired_city_name',
                'third_desired_city.name_en as third_desired_city_name',
                'users.name as user_name'
            )
            ->where('teachers.id', $id)
            ->first();


        return view('pages.apps.resume.template1', compact('teacher', 'edutcation'));
    }
    public function showVacancies($id)
    {
        $vacancies = Vacancy::findOrFail($id);

        $teachers = Teacher::where('experience_years', '>=', $vacancies->experience_years)
            ->where('sex_id', $vacancies->sex_id)
            ->where(function ($query) use ($vacancies) {
                $query->where('first_job_title_id', $vacancies->job_title_id)
                    ->orWhere('second_job_title_id', $vacancies->job_title_id)
                    ->orWhere('third_job_title_id', $vacancies->job_title_id);
            })
            ->get();

        dd($teachers, $vacancies);

        return view('teachers.vacancies', compact('teacher', 'vacancies'));
    }
}
