<?php

namespace App\Http\Requests\Supplier;

use App\Http\Requests\DefaultRequest;
use Illuminate\Foundation\Http\FormRequest;

class SupplierCreateRequest extends FormRequest
{
    use DefaultRequest;

    public function rules(): array
    {


        $rules = [
            'sort_order' => "required|int",
            "name_en" => 'required|string|max:255|unique:suppliers,name_en',
            "name_ar" => 'required|string|max:255|unique:suppliers,name_ar',
            "about_title_en" => 'string|max:255|nullable',
            "about_title_ar" => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:255',
            'links.*.url' => 'required|url',
            'supplier_type_id' => 'required|exists:supplier_types,id',
            'city_id' => 'required|exists:cities,id',
            'region_id' => 'nullable|exists:regions,id',
            'website' => 'nullable|url',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
        ];

        if ($this->routeIs('suppliers.update')) {
            $rules["name_en"] = "required|string|max:255|unique:suppliers,name_en,{$this->supplier->id}";
            $rules["name_ar"] = "required|string|max:255|unique:suppliers,name_ar,{$this->supplier->id}";
        }

        return $rules;

    }
}
