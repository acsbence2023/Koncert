<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Laravel\Sanctum\HasApiTokens;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            "password" => [
                            "required",
                            "min:8",
                            "regex:/[a-z]/",
                            "regex:/[A-Z]/",
                            "regex:/[0-9]/" ],
            'phone_number' => 'required|integer',
            'admin'=>'required|integer',
        ];
    }

    public function failedValidation( Validator $validator ) {

        throw new HttpResponseException( response()->json([

            "success" => false,
            "message" => "Beviteli hiba",
            "data" => $validator->errors()
        ]));
    }
}
