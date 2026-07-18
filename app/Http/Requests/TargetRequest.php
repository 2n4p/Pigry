<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\IntegerDigits;
use App\Rules\DecimalDigits;

class TargetRequest extends FormRequest
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
            'target_weight' => [
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
            'weight_target.required' => '体重を入力してください',
            'weight_target.numeric' => '数字で入力してください',
        ];
    }
}
