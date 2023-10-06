<?php

namespace App\Console\Commands\Populate;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Planet;

class PopulatePlanet extends Command
{
    protected $signature = 'app:populate:planet';
    protected $description = 'Command description';
    public function handle()
    {
        $i = 1;
        while(true)
        {
            $response = Http::get("https://swapi.dev/api/planets/".$i."/");
            if($response->status() != 200)
            {
                echo "La chiamata al api: https://swapi.dev/api/planets/".$i."/ non è andata a buon fine.";
                break;
            }
            Planet::insertPlanet($i);
            $i++;
        }
    }
}
