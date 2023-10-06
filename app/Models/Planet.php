<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Planet extends Model
{
    protected $primaryKey = 'id_planet';
    public $incrementing = false;
    public $timestamps = false;
    private string $name = "";
    private string $climate = "";
    private int $diameter = 0;
    private int $rotationPeriod = 0;
    private int $orbitalPeriod = 0;
    private string $gravity = "";
    private string $terrain = "";
    private int $surfaceWater = 0;
    private int $population = 0;

    public function getRotationPeriod():int{
        return $this->rotationPeriod;
    }
    public function getOrbitalPeriod():int{
        return $this->orbitalPeriod;
    }
    public function getGravity():string{
        return $this->gravity;
    }
    public function getTerrain():string{
        return $this->terrain;
    }
    public function getSurfaceWater():int{
        return $this->surfaceWater;
    }

    public function getName():string{
        return $this->name;
    }
    public function getClimate():string{
        return $this->climate;
    }
    public function getDiameter():int{
        return $this->diameter;
    }
    public function getPopulation():int{
        return $this->population;
    }
    public function setRotationPeriod(int $rotationPeriod):void{
        $this->rotationPeriod = $rotationPeriod;
    }
    public function setOrbitalPeriod(int $orbitalPeriod):void{
        $this->orbitalPeriod = $orbitalPeriod;
    }
    public function setGravity(string $gravity):void{
        $this->gravity = $gravity;
    }
    public function setTerrain(string $terrain):void{
        $this->terrain = $terrain;
    }
    public function setSurfaceWater(int $surfaceWater):void{
        $this->surfaceWater = $surfaceWater;
    }
    public function setName(string $name):void{
        $this->name = $name;
    }
    public function setClimate(string $climate):void{
        $this->climate = $climate;
    }
    public function setDiameter(int $diameter):void{
        $this->diameter = $diameter;
    }
    public function setPopulation(int $population):void{
        $this->population = $population;
    }
    public static function insertPlanet($id):void{
        $result = file_get_contents("https://swapi.dev/api/planets/" . $id  . "/");
        $obj = json_decode($result);
        $planet = new Planet();
        foreach($obj as $key => $value)
            switch($key){
                case 'climate':
                    $planet->setClimate($value);
                    break;
                case 'name':
                    $planet->setName($value);
                    break;
                case 'diameter':
                    if(!(is_numeric($value)))
                        break;
                    $planet->setDiameter($value);
                    break;
                case 'rotation_period':
                    if(!(is_numeric($value)))
                        break;
                    $planet->setRotationPeriod($value);
                    break;
                case 'orbital_period':
                    if(!(is_numeric($value)))
                        break;
                    $planet->setOrbitalPeriod($value);
                    break;
                case 'gravity':
                    $planet->setGravity($value);
                    break;
                case 'terrain':
                    $planet->setTerrain($value);
                    break;
                case 'surface_water':
                    if(!(is_numeric($value)))
                        break;
                    $planet->setSurfaceWater($value);
                    break;
                case 'population':
                    if(!(is_numeric($value)))
                        break;
                    $planet->setPopulation($value);
                    break;
                default:
                    break;
                }

        DB::table('planets')->insert(array(
         'name' => $planet->getName(),
         'climate' => $planet->getClimate(),
         'diameter' => $planet->getDiameter(),
         'rotation_period' => $planet->getRotationPeriod(),
         'orbital_period' => $planet->getOrbitalPeriod(),
         'gravity' => $planet->getGravity(),
         'terrain' => $planet->getTerrain(),
         'surface_water' => $planet->getSurfaceWater(),
         'population' => $planet->getPopulation()
        ));
    }
}
