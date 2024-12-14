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
