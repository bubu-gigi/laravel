<?php

namespace App\Console\Commands\Populate;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Starship;

class PopulateStarship extends Command
{
    protected $signature = 'app:populate:starship';
    protected $description = 'Command description';
    public function handle()
    {
        $i = 2;
        while(true)
        {
            $response = Http::get("https://swapi.dev/api/starships/".$i."/");
            if($response->status() != 200)
            {
                echo "La chiamata al api: https://swapi.dev/api/starships/".$i."/ non è andata a buon fine.";
                break;
            }
            Starship::insertStarship($i);
            $i++;
        }
    }
}
