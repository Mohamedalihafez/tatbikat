<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandRequest extends FormRequest
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
                "ar.name" => ["required", "min:3", "max:255", Rule::unique("brand_translations", "name")],
                "en.name" => ["required", "min:3", "max:255", Rule::unique("brand_translations", "name")],
                "slug" => ["required", "min:3", "max:255", Rule::unique("brands", "slug")],
                "thumbnail" => ["required", "image", "mimes:jpg,png,jpeg,gif,svg", "max:5048"],
                "status" => ["required"],
            ];
        }elseif(request()->isMethod("PATCH")){
            return [
                "ar.name" => ["required", "min:3", "max:255", Rule::unique("brand_translations", "name")->ignore($this->brand->id, "brand_id")],
                "en.name" => ["required", "min:3", "max:255", Rule::unique("brand_translations", "name")->ignore($this->brand->id, "brand_id")],
                "slug" => ["required", "min:3", "max:255", Rule::unique("brands", "slug")->ignore($this->brand->id)],
                "thumbnail" => ["image", "mimes:jpg,png,jpeg,gif,svg", "max:5048"],
                "status" => ["required"],
            ];
        }
    }
}