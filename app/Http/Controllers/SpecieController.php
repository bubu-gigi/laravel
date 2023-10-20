<?php

namespace App\Http\Controllers;

use App\Helpers\ApiHelper;
use App\Repository\SpecieRepositoryInterface;
use Illuminate\Http\Request;

class SpecieController extends Controller
{
    private $specieRepository;
    public function __construct(SpecieRepositoryInterface $specieRepository)
    {
        $this->specieRepository = $specieRepository;
    }
    public function show(): void
    {
        $species = $this->specieRepository->all();
        foreach($species as $specie)
            echo $specie->name . "<br>";
    }
    public function get(int $id): void
    {
        $specie =  $this->specieRepository->find($id);
        echo $specie->name;
    }
    public function store(Request $request): bool
    {
        $obj = ApiHelper::toStdClass($request);
        $this->specieRepository->insert($obj);
        return true;
    }
    public function delete(int $id): void
    {
        $this->specieRepository->delete($id);
    }

    public function put(Request $request, int $id): void
    {
        $obj = ApiHelper::toStdClass($request);
    }
}
