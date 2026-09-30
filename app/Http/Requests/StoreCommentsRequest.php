<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class StoreCommentsRequest extends FormRequest
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
            'comment'=>'required|max:500',
            'user_id'=>'required|exists:Users,id',
             'post_id'=>'required|exists:Posts,id',

        ];
    }

    #[Override]
  public function messages(): array
{
    return
     [
        'comment.required' => 'لابد من كتابه تعليقك هنا',
        'user_id.required'=>'فين id يا نجم',
        'post_id.required'=>'حدد اى بوست فيهم'
             ];
}

}
