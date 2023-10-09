<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GovernorateRequest extends FormRequest
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
                "en.name" => ["required", "min:3", "max:255", Rule::unique("governorate_translations", "name")],
                "ar.name" => ["required", "min:3", "max:255", Rule::unique("governorate_translations", "name")],
                "slug" => ["required", "min:3", "max:255", Rule::unique("governorates", "slug")],
                "status" => ["required"],

            ];
        }elseif(request()->isMethod("PATCH")){
            return [
                "en.name" => ["required", "min:3", "max:255", Rule::unique("governorate_translations", "name")->ignore($this->governorate->id, "governorate_id")],
                "ar.name" => ["required", "min:3", "max:255", Rule::unique("governorate_translations", "name")->ignore($this->governorate->id, "governorate_id")],
                "slug" => ["required", "min:3", "max:255", Rule::unique("governorates", "slug")->ignore($this->governorate->id)],
                "status" => ["required"],
            ];
        }
    }
}