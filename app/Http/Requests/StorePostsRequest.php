<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePostsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
    
     // throw new \Exception('Test TEST',422);
        
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
    
     return [
            'title' =>'required|between:3,100',
            'body' => ['required','min:3'],
            'poststatus_id'=>'required|integer|exists:poststatuses,id'
        ];
            
           
    }
}

            
        