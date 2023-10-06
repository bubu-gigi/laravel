<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vehicle extends Model
{
    protected $primaryKey = 'id_vehicle';
    public $incrementing = false;
    public $timestamps = false;
    private string $name = "";
    private string $model = "";
    private string $manufacturer = "";
    private int $costInCredits = 0;
    private float $length = 0;
    private int $maxAtmospheringSpeed = 0;
    private int $crew = 0;
    private int $passengers = 0;
    private int $cargoCapacity = 0;
    private string $consumables = "";
    private string $vehicleClass = "";

}
