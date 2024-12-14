<?php

namespace App\Http\Requests\Teacher;

use App\Http\Requests\DefaultRequest;
use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{
    use DefaultRequest;

    public function rules(): array
    {


        $rules = [
            'full_name_en' => "required|string|max:255|unique:teachers,full_name_en",
            'full_name_ar' => "required|string|max:255|unique:teachers,full_name_en",
            'national_number' => "nullable|sometimes|string|max:255|unique:teachers,full_name_en",
            "place_birth" => 'nullable|sometimes|string|max:255',
            "birth_date" => 'nullable|sometimes|date',
            "email" => 'nullable|email|max:255|unique:teachers,email',
            "phone" => 'required|string|max:255|unique:teachers,phone',
            "mobile" => 'nullable|sometimes|string|max:255|unique:teachers,mobile',
            "experience_years" => "nullable|sometimes|numeric",
            "address" => 'nullable|sometimes|string|max:255',
            "subscription_date" => 'required',
            "subscription_end_date" => 'required',
            "paid_type" => 'required|boolean',
            "nationality_id" => 'required|exists:nationalities,id',
            "sex_id" => "required|exists:sexes,id",
            "marital_status_id" => "required|exists:marital_statuses,id",
            "first_job_title_id" => "required|exists:job_titles,id",
            "second_job_title_id" => "nullable|sometimes|exists:job_titles,id",
            "third_job_title_id" => "nullable|sometimes|exists:job_titles,id",
            "first_desired_job_city_id" => "nullable|required|numeric",
            "second_desired_job_city_id" => "nullable|sometimes|numeric",
            "third_desired_job_city_id" => "nullable|sometimes|numeric",
            'specializations.0' => "required",
            'institutes.0' => "required",
            'cities.0' => "required",
            'graduation_dates.0' => "required",
            'degrees.0' => "required",
        ];

        if ($this->routeIs('teachers.update')) {
            $rules["full_name_en"] = "required|string|max:255|unique:teachers,full_name_en,{$this->teacher->id}";
            $rules["full_name_ar"] = "required|string|max:255|unique:teachers,full_name_en,{$this->teacher->id}";
            $rules["email"] = "nullable|email|max:255|unique:teachers,email,{$this->teacher->id}";
            $rules["phone"] = "required|string|max:255|unique:teachers,phone,{$this->teacher->id}";
            $rules["mobile"] = "nullable|sometimes|string|max:255|unique:teachers,mobile,{$this->teacher->id}";
        }

        return $rules;

    }
}
