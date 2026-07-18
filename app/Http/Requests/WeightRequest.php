<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\IntegerDigits;
use App\Rules\DecimalDigits;

class WeightRequest extends FormRequest
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
            'date' => [
                'required',
            ],

            'weight' => [
                'required',
                'numeric',
                new IntegerDigits(4),
                new DecimalDigits(1),
            ],

            'calories' => [
                'required',
                'integer',
            ],

            'time' => [
                'required',
                'date_format:H:i',
            ],

            'content' => [
                'max:120'
            ]
        ];
    }

    public function messages() {
        return [
            'date.required' => '日付を入力してください',

            'weight.required' => '体重を入力してください',
            'weight.numeric' => '数字で入力してください',

            'calories.required' => '摂取カロリーを入力してください',
            'calories.integer' => '数字で入力してください',

            'time.required' => '運動時間を入力してください',
            'time.date' => '日付形式で入力してください',

            'content.max' => '120文字以内で入力してください',
        ];
    }
}
