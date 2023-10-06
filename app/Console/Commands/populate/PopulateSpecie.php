<?php

namespace App\Console\Commands\Populate;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Specie;

class PopulateSpecie extends Command
{
    protected $signature = 'app:populate:specie';
    protected $description = 'Command description';
    public function handle()
    {
        $i = 1;
        while(true)
        {
            $response = Http::get("https://swapi.dev/api/species/".$i."/");
            if($response->status() != 200)
            {
                echo "La chiamata al api: https://swapi.dev/api/species/".$i."/ non è andata a buon fine.";
                break;
            }
            Specie::insertSpecie($i);
            $i++;
        }
    }
}
