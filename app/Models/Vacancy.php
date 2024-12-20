<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = [
        'school_id',
        'job_title_id',
        'sex_id',
        'status',
        'start_date',
        'end_date',
        'details_en',
        'details_ar',
        'experience_years'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class);
    }

    public function sex()
    {
        return $this->belongsTo(Sex::class);
    }
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_vacancy');
    }
}
