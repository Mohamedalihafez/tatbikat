<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubCategoriesRequest extends FormRequest
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
                "en.name" => ["required", "min:3", "max:255", Rule::unique("sub_category_translations", "name")],
                "ar.name" => ["required", "min:3", "max:255", Rule::unique("sub_category_translations", "name")],
                "slug" => ["required", "min:3", "max:255", Rule::unique("sub_categories", "slug")],
                "main_category_id" => ["required", Rule::exists("main_categories", "id")],
                "status" => ["required"],
            ];
            
        }elseif(request()->isMethod("PATCH")){
            return [
                "en.name" => ["required", "min:3", "max:255", Rule::unique("sub_category_translations", "name")->ignore($this->subCategory->id, "sub_category_id")],
                "ar.name" => ["required", "min:3", "max:255", Rule::unique("sub_category_translations", "name")->ignore($this->subCategory->id, "sub_category_id")],
                "slug" => ["required", "min:3", "max:255", Rule::unique("sub_categories", "slug")->ignore($this->subCategory->id)],
                "main_category_id" => ["required", Rule::exists("main_categories", "id")],
                "status" => ["required"],
            ];
        }
    }
}