<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        
    dd(
        $this->user()->id,
        $this->route('posts'),
        $this->user()->roles
    );
    return $this->user()->can('update',$this->route('posts'));
}
    
        
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       
        return [
            'title' =>'between:3,100',
            'body' => 'min:3',  
            'poststatus_id'=>'integer|exists:PostStatuses,id'
        ];
    }
}
