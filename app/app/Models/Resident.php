<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Resident extends Model
{
    public $timestamps = false;

    public function species(): BelongsToMany
    {
        return $this->belongsToMany(Starship::class, "resident_specie", "resident_id", "specie_id");
    }
    public function starships(): BelongsToMany
    {
        return $this->belongsToMany(Starship::class, "resident_starship", "resident_id", "starship_id");
    }
    public function vehicles(): BelongsToMany
    {
        return $this->belongsToMany(Vehicle::class, "resident_vehicle", "resident_id", "vehicle_id");
    }
}
