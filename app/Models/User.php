<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Model
{
    public $timestamps = false;

    public function species(): BelongsToMany
    {
        return $this->belongsToMany(Starship::class, "user_specie", "user_id", "specie_id");
    }
    public function starships(): BelongsToMany
    {
        return $this->belongsToMany(Starship::class, "user_starship", "user_id", "starship_id");
    }
    public function vehicles(): BelongsToMany
    {
        return $this->belongsToMany(Vehicle::class, "user_vehicle", "user_id", "vehicle_id");
    }
}
