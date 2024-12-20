<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function educationalQualifications()
    {
        return $this->hasMany(TeacherEducationalQualification::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function sex()
    {
        return $this->belongsTo(Sex::class);
    }
    public function marital_statuses()
    {
        return $this->belongsTo(MaritalStatus::class);
    }
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    public function vacancies()
    {
        return $this->belongsToMany(Vacancy::class, 'teacher_vacancy');
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $year = now()->format('y');
            $model->subscription_number = "MJ-JOB$year-$model->id";
            $model->saveQuietly();
        });
    }
}
