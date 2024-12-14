<?php

namespace App\Http\Requests\School;

use App\Http\Requests\DefaultRequest;
use Illuminate\Foundation\Http\FormRequest;

class NewsCreateRequest extends FormRequest
{
    use DefaultRequest;

    public function rules(): array
    {
        return [
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'description_en' => 'required',
            'description_ar' => 'required',
            'active_days' => 'required|numeric|min:0',
            'is_active' => 'required',
        ];

    }
}
