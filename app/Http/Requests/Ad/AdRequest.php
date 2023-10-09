<?php

namespace App\Http\Requests\Ad;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdRequest extends FormRequest
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
        if(request()->isMethod("POST")) {
            return [
                "name" => ["required", "min:3", "max:255",],
                "slug" => ["", "min:3", "max:255"],
                "brand_id" => ["sometimes", "nullable", Rule::exists("brands", "id")],
                "main_category_id" => ["required", Rule::exists("main_categories", "id")],
                "sub_category_id" => ["required", Rule::exists("sub_categories", "id")],
                "governorate_id" => ["required", Rule::exists("governorates", "id")],
                "city_id" => ["required", Rule::exists("cities", "id")],
                "type" => ["sometimes", "nullable"],
                "condition" => ["sometimes", "nullable"],
                "description" => ["required", "min:3"],
                "price" => ["required"],
                "thumbnail" => ['required', "mimes:jpeg,jpg,png,gif,csv,txt,pdf", 'max:100000'],
                "thumbnails" => ['required'],
                "thumbnails.*" => ["mimes:jpeg,jpg,png,gif,csv,txt,pdf", 'max:100000'],
                "user_name" => ["required", "min:3", "max:255"],
                "user_phone" => ["required", "min:3"],
                "contact" => ["required"],
            ];
        }elseif(request()->isMethod("PATCH")){
            return [
                "name" => ["required", "min:3", "max:255", Rule::unique("ads", "name")->ignore($this->ad->id)],
                "slug" => ["required", "min:3", "max:255", Rule::unique("ads", "slug")->ignore($this->ad->id)],
                "brand_id" => ["sometimes", "nullable", Rule::exists("brands", "id")],
                "governorate_id" => ["required", Rule::exists("governorates", "id")],
                "city_id" => ["required", Rule::exists("cities", "id")],
                "type" => ["sometimes", "nullable"],
                "condition" => ["sometimes", "nullable"],
                "description" => ["required", "min:3"],
                "price" => ["required"],
                "thumbnail" => ["mimes:jpeg,jpg,png,gif,csv,txt,pdf", 'max:100000'],
                "thumbnails.*" => ["mimes:jpeg,jpg,png,gif,csv,txt,pdf", 'max:100000'],
                "user_name" => ["required", "min:3", "max:255"],
                "user_phone" => ["required", "min:3"],
                "contact" => ["required"],
            ];
        }
    }
}