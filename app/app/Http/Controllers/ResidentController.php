<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident;
use Illuminate\Support\Facades\DB;

class ResidentController extends Controller
{
    public function show(){
        $residents = Resident::get('name');
        echo $residents;
    }
    public function get($id){
        echo Resident::findOrFail($id);
    }
}
