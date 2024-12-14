<?php

namespace App\Http\Controllers\resume;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResumeController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $teacher = DB::table('teachers')
            ->leftJoin('nationalities', 'teachers.nationality_id', '=', 'nationalities.id')
            ->leftJoin('sex', 'teachers.sex_id', '=', 'sex.id')
            ->leftJoin('marital_statuses', 'teachers.marital_status_id', '=', 'marital_statuses.id')
            ->leftJoin('cities as city', 'teachers.city_id', '=', 'city.id')
            ->leftJoin('regions', 'teachers.region_id', '=', 'regions.id')
            ->leftJoin('job_titles as first_job_title', 'teachers.first_job_title_id', '=', 'first_job_title.id')
            ->leftJoin('job_titles as second_job_title', 'teachers.second_job_title_id', '=', 'second_job_title.id')
            ->leftJoin('job_titles as third_job_title', 'teachers.third_job_title_id', '=', 'third_job_title.id')
            ->leftJoin('cities as first_desired_job_city', 'teachers.first_desired_job_city_id', '=', 'first_desired_job_city.id')
            ->leftJoin('cities as second_desired_job_city', 'teachers.second_desired_job_city_id', '=', 'second_desired_job_city.id')
            ->leftJoin('cities as third_desired_job_city', 'teachers.third_desired_job_city_id', '=', 'third_desired_job_city.id')
            ->leftJoin('users', 'teachers.user_id', '=', 'users.id')
            ->select(
                'teachers.*',
                'nationalities.name as nationality_name',
                'sex.name as sex_name',
                'marital_statuses.name as marital_status_name',
                'city.name as city_name',
                'regions.name as region_name',
                'first_job_title.name as first_job_title_name',
                'second_job_title.name as second_job_title_name',
                'third_job_title.name as third_job_title_name',
                'first_desired_job_city.name as first_desired_job_city_name',
                'second_desired_job_city.name as second_desired_job_city_name',
                'third_desired_job_city.name as third_desired_job_city_name',
                'users.name as user_name'
            )
            ->where('teachers.user_id', $userId)
            ->first();

        if (!$teacher) {
            return redirect()->back()->with('error', 'Resume not found for this Teacher.');
        }
        return view('pages.apps.resume.template1', compact('teacher'));
    }
}
