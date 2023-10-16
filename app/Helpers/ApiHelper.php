<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use stdClass;

class ApiHelper
{
    public static function validateApi(string $str): string
    {
        return preg_replace( '/[^0-9]/', '', $str);
    }

    public static function toStdClass(Request $request): stdClass
    {
        $json = $request->json()->all();
        $obj = json_decode(json_encode($json));
        return (object) $obj;
    }

    public static function validateInt(string $int): int
    {
        return intval(preg_replace('/[,]/', '', $int));
    }
}
