<?php

namespace App\Http\Requests\School;

use App\Http\Requests\DefaultRequest;
use Illuminate\Foundation\Http\FormRequest;

class SchoolCreateRequest extends FormRequest
{
    use DefaultRequest;

    public function rules(): array
    {
        $allowed_curriculum_types = implode(',', array_keys(config('constants.curriculum_types')));
        $allowed_genders = implode(',', array_keys(config('constants.genders')));

        $rules = [
            'sort_order' => "required|int",
            "name_en" => 'required|string|max:255|unique:schools,name_en',
            "name_ar" => 'required|string|max:255|unique:schools,name_ar',
            "about_title_en" => 'string|max:255|nullable',
            "about_title_ar" => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:255',
            'curriculum_type' => "required|in:$allowed_curriculum_types",
            'discounts' => 'nullable|array|exists:discounts,id',
            'madaresona_discount' => 'nullable|int',
            'genders' => "required|array|in:$allowed_genders",
            'links.*.url' => 'required|url',
            'institution_type_id' => 'required|exists:institution_types,id',
            'city_id' => 'required|exists:cities,id',
            'region_id' => 'nullable|exists:regions,id',
            'website' => 'nullable|url',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
            // 'school_links'=> 'nullable|array|url',
        ];

        if ($this->routeIs('schools.update')) {
            $rules["name_en"] = "required|string|max:255|unique:schools,name_en,{$this->school->id}";
            $rules["name_ar"] = "required|string|max:255|unique:schools,name_ar,{$this->school->id}";
        }

        return $rules;

    }
}
