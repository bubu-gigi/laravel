<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Planet extends Model
{
    public $timestamps = false;

    public function residents(): BelongsToMany
    {
        return $this->belongsToMany(Resident::class, "planet_resident", "planet_id", "resident_id");
    }
}
