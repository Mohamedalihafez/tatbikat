<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OfferRequest extends FormRequest
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
                "en.name" => ["required", "min:3", "max:255", Rule::unique("offer_translations", "name")],
                "ar.name" => ["required", "min:3", "max:255", Rule::unique("offer_translations", "name")],
                "en.description" => ["required"],
                "ar.description" => ["required"],
                "status" => ["required"],
                "price" => ["required", "integer"],
            ];
        }elseif(request()->isMethod("PATCH")) {
            return [
                "en.name" => ["required", "min:3", "max:255", Rule::unique("offer_translations", "name")->ignore($this->offer->id, "offer_id")],
                "ar.name" => ["required", "min:3", "max:255", Rule::unique("offer_translations", "name")->ignore($this->offer->id, "offer_id")],
                "en.description" => ["required"],
                "ar.description" => ["required"],
                "price" => ["required", "integer"],
                "status" => ["required"],
            ];
        }
    }
}