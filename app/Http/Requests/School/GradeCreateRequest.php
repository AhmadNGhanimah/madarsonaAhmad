<?php

namespace App\Http\Requests\School;

use App\Http\Requests\DefaultRequest;
use Illuminate\Foundation\Http\FormRequest;

class GradeCreateRequest extends FormRequest
{
    use DefaultRequest;

    public function rules(): array
    {
        return [
            'curriculum_type' => 'required|string',
            'grade_id' => 'required|exists:grades,id',
            'price' => 'required|numeric|min:0',
        ];

    }
}
