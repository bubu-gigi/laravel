<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Specie extends Model
{
    protected $primaryKey = 'id_specie';
    public $incrementing = false;
    public $timestamps = false;
    private string $name = "";
    private string $classification = "";
    private string $designation = "";
    private int $averageHeight = 0;
    private string $skinColors = "";
    private string $hairColors = "";
    private string $eyeColors = "";
    private int $averageLifespan = 0;
    private int $idPianeta = 0;
    private string $language = "";

    public function getName():string{
        return $this->name;
    }
    public function getClassification():string{
        return $this->classification;
    }
    public function getDesignation():string{
        return $this->designation;
    }
    public function getAverageHeight():int{
        return $this->averageHeight;
    }
    public function getSkinColors():string{
        return $this->skinColors;
    }
    public function getHairColors():string{
        return $this->hairColors;
    }
    public function getEyeColors():string{
        return $this->eyeColors;
    }
    public function getAverageLifespan():int{
        return $this->averageLifespan;
    }
    public function getIdPianeta():int{
        return $this->idPianeta;
    }
    public function getLanguage():string{
        return $this->language;
    }
    public function setName(string $name):void{
        $this->name = $name;
    }
    public function setClassification(string $classification):void{
        $this->classification = $classification;
    }
    public function setDesignation(string $designation):void{
        $this->designation = $designation;
    }
    public function setAverageHeight(int $averageHeight):void{
        $this->averageHeight = $averageHeight;
    }
    public function setSkinColors(string $skinColors):void{
        $this->skinColors = $skinColors;
    }
    public function setHairColors(string $hairColors):void{
        $this->hairColors = $hairColors;
    }
    public function setEyeColors(string $eyeColors):void{
        $this->eyeColors = $eyeColors;
    }
    public function setAverageLifespan(int $averageLifespan):void{
        $this->averageLifespan = $averageLifespan;
    }
    public function setIdPianeta(int $idPianeta):void{
        $this->idPianeta = $idPianeta;
    }
    public function setLanguage(string $language):void{
        $this->language = $language;
    }
    public static function insertSpecie($id){
        $result = file_get_contents("https://swapi.dev/api/species/" . $id  . "/");
        $obj = json_decode($result);
        $specie = new Specie();
        foreach($obj as $key => $value)
            switch($key){
                case 'name':
                    $specie->setName($value);
                    break;
                case 'classification':
                    $specie->setClassification($value);
                    break;
                case 'designation':
                    $specie->setDesignation($value);
                    break;
                case 'average_height':
                    if(!(is_numeric($value)))
                        break;
                    $specie->setAverageHeight($value);
                    break;
                case 'skin_colors':
                    $specie->setSkinColors($value);
                    break;
                case 'hair_colors':
                    $specie->setHairColors($value);
                    break;
                case 'eye_colors':
                    $specie->setEyeColors($value);
                    break;
                case 'average_lifespan':
                    if(!(is_numeric($value)))
                        break;
                    $specie->setAverageLifespan($value);
                    break;
                case 'language':
                    $specie->setLanguage($value);
                    break;
                case 'homeworld':
                    if(!(is_numeric($value)))
                        break;
                    $tmp = substr("https://swapi.dev/api/planets/" . $id  . "/", 30, -1);
                    $specie->setIdPianeta($tmp);
                    break;
                default:
                    break;
            }
        DB::table('species')->insert(array(
         'name' => $specie->getName(),
         'classification' => $specie->getClassification(),
         'designation' => $specie->getDesignation(),
         'average_height' => $specie->getAverageHeight(),
         'skin_colors' => $specie->getSkinColors(),
         'hair_colors' => $specie->getHairColors(),
         'eye_colors' => $specie->getEyeColors(),
         'average_lifespan' => $specie->getAverageLifespan(),
         'language' => $specie->getLanguage(),
         'id_pianeta' => $specie->getIdPianeta()
        ));
    }
}
