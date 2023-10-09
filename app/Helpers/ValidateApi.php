<?php

namespace App\Helpers;

use Illuminate\Contracts\Validation\ValidationRule;

class ValidateApi
{
    public static function findId(string $str): string
    {
        return preg_replace( '/[^0-9]/', '', $str);
    }
}
