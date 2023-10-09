<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if(request()->isMethod("POST")){
            return [
                "en.name" => ["required", "min:3", "max:255", Rule::unique("city_translations", "name")],
                "ar.name" => ["required", "min:3", "max:255", Rule::unique("city_translations", "name")],
                "slug" => ["required", "min:3", "max:255", Rule::unique("cities", "slug")],
                "governorate_id" => ["required", Rule::exists("governorates", "id")],
                "status" => ["required"],
            ];
        }elseif(request()->isMethod("PATCH")){
            return [
                "en.name" => ["required", "min:3", "max:255", Rule::unique("city_translations", "name")->ignore($this->city->id, "city_id")],
                "ar.name" => ["required", "min:3", "max:255", Rule::unique("city_translations", "name")->ignore($this->city->id, "city_id")],
                "slug" => ["required", "min:3", "max:255", Rule::unique("cities", "slug")->ignore($this->city->id)],
                "governorate_id" => ["required", Rule::exists("governorates", "id")],
                "status" => ["required"],
            ];
        }
    }
}