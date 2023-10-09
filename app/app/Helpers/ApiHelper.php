<?php

namespace App\Helpers;

class ApiHelper
{
    public static function validateApi(string $str): string
    {
        return preg_replace( '/[^0-9]/', '', $str);
    }
}
