<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\IntegerDigits;
use App\Rules\DecimalDigits;

class Register2Request extends FormRequest
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
            'current' => [
                'required',
                'numeric',
                new IntegerDigits(4),
                new DecimalDigits(1),
            ],

            'target' => [
                'required',
                'numeric',
                new IntegerDigits(4),
                new DecimalDigits(1),
            ],
        ];
    }

    public function messages()
    {
        return [
            'current.required' => '現在の体重を入力してください',
            'current.numeric' => '数字で入力してください',
        
            'target.required' => '目標の体重を入力してください',
            'target.numeric' => '数字で入力してください',
        ];
    }
}
