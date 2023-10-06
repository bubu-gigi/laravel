<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Resident extends Model
{
    protected $primaryKey = 'id_resident';
    public $incrementing = false;
    public $timestamps = false;
    private string $name = "";
    private int $height = 0;
    private int $mass = 0;
    private string $hairColor = "";
    private string $skinColor = "";
    private string $eyeColor = "";
    private string $birthYear = "";
    private string $gender = "";
    private int $idPlanet = 0;
}
