<?php

namespace App\Http\Requests\School;

use App\Http\Requests\DefaultRequest;
use Illuminate\Foundation\Http\FormRequest;

class TransportationCreateRequest extends FormRequest
{
    use DefaultRequest;

    public function rules(): array
    {
        return [
            'region_name_en' => 'required|string',
            'region_name_ar' => 'required|string',
            'one_way_price' => 'required|numeric|min:0',
            'two_way_price' => 'required|numeric|min:0',
        ];

    }
}
