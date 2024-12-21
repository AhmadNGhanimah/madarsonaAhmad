<?php

namespace App\Http\Requests\Teacher;

use App\Http\Requests\DefaultRequest;
use Illuminate\Foundation\Http\FormRequest;

class VacancyRequest extends FormRequest
{
    use DefaultRequest;

    public function rules(): array
    {
        $rules = [
            'school_id' => 'required|exists:schools,id',
            'job_title_id' => 'required|exists:job_titles,id',
            'experience_years' => 'nullable|numeric|min:0',
            'sex_id' => 'nullable|in:0,1,2',
            'details_en' => 'required|string',
            'details_ar' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ];

        /*  if ($this->routeIs('teachers.update')) {
              $rules["full_name_en"] = "required|string|max:255|unique:teachers,full_name_en,{$this->teacher->id}";
              $rules["full_name_ar"] = "required|string|max:255|unique:teachers,full_name_en,{$this->teacher->id}";
              $rules["email"] = "nullable|email|max:255|unique:teachers,email,{$this->teacher->id}";
              $rules["phone"] = "required|string|max:255|unique:teachers,phone,{$this->teacher->id}";
              $rules["mobile"] = "nullable|sometimes|string|max:255|unique:teachers,mobile,{$this->teacher->id}";
          }*/

        return $rules;

    }
}
