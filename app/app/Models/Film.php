<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Film extends Model
{
    public $timestamps = false;
    
    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(Resident::class, "film_resident", "film_id", "resident_id");
    }

    public function planets(): BelongsToMany
    {
        return $this->belongsToMany(Planet::class, "film_planet", "film_id", "planet_id");
    }

    public function starships(): BelongsToMany
    {
        return $this->belongsToMany(Starship::class, "film_starship", "film_id", "starship_id");
    }

    public function species(): BelongsToMany
    {
        return $this->belongsToMany(Specie::class, "film_specie", "film_id", "specie_id");
    }

    public function vehicles(): BelongsToMany
    {
        return $this->belongsToMany(Vehicle::class, "film_vehicle", "film_id", "vehicle_id");
    }
}
