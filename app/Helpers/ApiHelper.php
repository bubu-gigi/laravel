<?php

namespace App\Helpers;

use stdClass;

class ApiHelper
{
    public static function validateApi(string $str): string
    {
        return preg_replace( '/[^0-9]/', '', $str);
    }
}
