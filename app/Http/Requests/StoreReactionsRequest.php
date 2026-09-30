<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreReactionsRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'user_id'=>'required|exists:Users,id',
           'reaction_type_id'=>'required|exists:Reaction_types,id',
           'reactble_id'=>'required|integer',
           'reactble_type'=>['required',Rule::in(['post','Commentss','Reblies'])],
        ];
    }
}
