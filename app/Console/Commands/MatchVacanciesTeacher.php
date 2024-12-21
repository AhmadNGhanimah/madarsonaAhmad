<?php

namespace App\Console\Commands;

use App\Models\Teacher;
use App\Models\TeacherVacancy;
use App\Models\Vacancy;
use Illuminate\Console\Command;

class MatchVacanciesTeacher extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:match-vacancies-teacher';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Vacancy::whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())
            ->get()->each(function ($vacancy) {
                $teacher_ids = TeacherVacancy::where('vacancy_id', $vacancy->id)->pluck('teacher_id')->toArray();
                $teachers = Teacher::where('is_active', 1)->where('city_id', $vacancy->school->city_id)
                    ->whereNotIn('id', $teacher_ids)
                    ->when($vacancy->sex_id, function ($query) use ($vacancy) {
                        return $query->where('sex_id', $vacancy->sex_id);
                    })->when($vacancy->sex_id, function ($query) use ($vacancy) {
                        return $query->where('sex_id', $vacancy->sex_id);
                    })->where(function ($query) use ($vacancy) {
                        $query->where('first_job_title_id', $vacancy->job_title_id)
                            ->orWhere('second_job_title_id', $vacancy->job_title_id)
                            ->orWhere('third_job_title_id', $vacancy->job_title_id);
                    })->get()->each(function ($teacher) use ($vacancy) {
                        TeacherVacancy::create([
                            'teacher_id' => $teacher->id,
                            'vacancy_id' => $vacancy->id,
                        ]);
                    });
                dd($teachers);
            });
    }
}
