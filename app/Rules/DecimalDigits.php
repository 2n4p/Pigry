<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DecimalDigits implements ValidationRule
{
    public function __construct(
        private int $maxDigits
    ){
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $parts = explode('.', (string)$value); //整数部分と小数部分を分離する
        $decimal = $parts[1] ?? ''; //小数部分を取り出す。ない場合は空白。

        //小数部分の桁数がmaxDigitsより大きい場合は$failを返す
        if(strlen($decimal) > $this->maxDigits) {
            $fail("小数点は{$this->maxDigits}桁で入力してください");
        }
    }
}
