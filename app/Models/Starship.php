<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Starship extends Model
{
    protected $primaryKey = 'id_starship';
    public $incrementing = false;
    public $timestamps = false;
    private string $name = "";
    private string $model = "";
    private string $manufacturer = "";
    private int $costInCredits = 0;
    private int $length = 0;
    private int $maxAtmospheringSpeed = 0;
    private int $crew = 0;
    private int $passengers = 0;
    private int $cargoCapacity = 0;
    private int $consumables = 0;
    private string $hyperdriveRating = "";
    private int $MGLT = 0;
    private string $starshipClass = "";

    public function getName():string{
        return $this->name;
    }
    public function getModel():string{
        return $this->model;
    }
    public function getManufacturer():string{
        return $this->manufacturer;
    }
    public function getCostInCredits():int{
        return $this->costInCredits;
    }
    public function getLength():int{
        return $this->length;
    }
    public function getMaxAtmospheringSpeed():int{
        return $this->maxAtmospheringSpeed;
    }
    public function getCrew():int{
        return $this->crew;
    }
    public function getPassengers():int{
        return $this->passengers;
    }
    public function getCargoCapacity():int{
        return $this->cargoCapacity;
    }
    public function getConsumables():int{
        return $this->consumables;
    }
    public function getHyperdriveRating():string{
        return $this->hyperdriveRating;
    }
    public function getMGLT():int{
        return $this->MGLT;
    }
    public function getStarshipClass():string{
        return $this->starshipClass;
    }

    public function setName(string $name):void{
        $this->name = $name;
    }
    public function setModel(string $model):void{
        $this->model = $model;
    }
    public function setManufacturer(string $manufacturer):void{
        $this->manufacturer = $manufacturer;
    }
    public function setCostInCredits(int $costInCredits):void{
        $this->costInCredits = $costInCredits;
    }
    public function setLength(int $length):void{
        $this->length = $length;
    }
    public function setMaxAtmospheringSpeed(int $maxAtmospheringSpeed):void{
        $this->maxAtmospheringSpeed = $maxAtmospheringSpeed;
    }
    public function setCrew(int $crew):void{
        $this->crew = $crew;
    }
    public function setPassengers(int $passengers):void{
        $this->passengers = $passengers;
    }
    public function setCargoCapacity(int $cargoCapacity):void{
        $this->cargoCapacity = $cargoCapacity;
    }
    public function setConsumables(int $consumables):void{
        $this->consumables = $consumables;
    }
    public function setHyperdriveRating(string $hyperdriveRating):void{
        $this->hyperdriveRating = $hyperdriveRating;
    }
    public function setMGLT(int $MGLT):void{
        $this->MGLT = $MGLT;
    }
    public function setStarshipClass(string $starshipClass):void{
        $this->starshipClass = $starshipClass;
    }
    public static function insertStarship($id):void{
        $result = file_get_contents("https://swapi.dev/api/species/" . $id  . "/");
        $obj = json_decode($result);
        $starship = new Starship();
        foreach($obj as $key => $value)
            switch($key){
                case 'name':
                    $starship->setName($value);
                    break;
                case 'model':
                    $starship->setModel($value);
                    break;
                case 'manufacturer':
                    $starship->setManufacturer($value);
                    break;
                case 'cost_in_credits':
                    if(!(is_numeric($value)))
                        break;
                    $starship->setCostInCredits($value);
                    break;
                case 'length':
                    if(!(is_numeric($value)))
                        break;
                    $starship->setLength($value);
                    break;
                case 'max_atmosphering_speed':
                    if(!(is_numeric($value)))
                        break;
                    $starship->setMaxAtmospheringSpeed($value);
                    break;
                case 'crew':
                    if(!(is_numeric($value)))
                        break;
                    $starship->setCrew($value);
                    break;
                case 'passengers':
                    if(!(is_numeric($value)))
                        break;
                    $starship->setPassengers($value);
                    break;
                case 'cargo_capacity':
                    if(!(is_numeric($value)))
                        break;
                    $starship->setCargoCapacity($value);
                    break;
                case 'consumables':
                    if(!(is_numeric($value)))
                        break;
                    $starship->setConsumables($value);
                    break;
                case 'hyperdrive_rating':
                    $starship->setHyperdriveRating($value);
                    break;
                case 'MGLT"':
                    if(!(is_numeric($value)))
                        break;
                    $starship->setMGLT($value);
                    break;
                case 'starship_class':
                    $starship->setStarshipClass($value);
                default:
                    break;
            }
        DB::table('starships')->insert(array(
         'name' => $starship->getName(),
         'model' => $starship->getModel(),
         'manufacturer' => $starship->getManufacturer(),
         'cost_in_credits' => $starship->getCostInCredits(),
         'length' => $starship->getLength(),
         'max_atmosphering_speed' => $starship->getMaxAtmospheringSpeed(),
         'crew' => $starship->getCrew(),
         'passengers"' => $starship->getPassengers(),
         'cargo_capacity' => $starship->getCargoCapacity(),
         'consumables' => $starship->getConsumables(),
         'hyperdrive_rating' => $starship->getHyperdriveRating(),
         'MGLT' => $starship->getMGLT(),
         'starship_class' => $starship->getStarshipClass()
        ));
    }
}
