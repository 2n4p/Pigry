<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class IntegerDigits implements ValidationRule
{
    public function __construct(
        private int $maxDigits
    ){
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $parts = explode('.', (string) $value); //整数部分と小数部分を分離する
        $integer = ltrim($parts[0], '-'); //整数部分からマイナス符号を除去する

        //strlen($integer): 桁数を数える, 桁数がmaxDigitsより大きい場合エラーを返す
        if(strlen($integer) > $this->maxDigits) {
            $fail("{$this->maxDigits}桁までの数字で入力してください");
        }
    }
}
