<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class WalletRequest extends FormRequest
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
                "user_name" => ["required", "min:3", "max:255", "string"],
                "message" => ["required", "min:3"],
                "converter_number" => ["required", "numeric", "digits:11"],
            ];
        }elseif(request()->isMethod("PATCH")){
            return [
                "wallet_balance" => ["required", "integer"],
            ];
        }
    }
}