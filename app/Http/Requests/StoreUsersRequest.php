<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUsersRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => 'required|between:3,10',

            'roles' => 'required|array',

            'mobile' => [ 'required', 'unique:users,mobile','regex:/^01[0125]\d{8}$/',],

            'email' => 'required|email|unique:users,email',

            'password' => ['required','confirmed','regex:/^(?=.*[A-Z])(?=.*\d).{8,}$/',],
        ];
    }
}