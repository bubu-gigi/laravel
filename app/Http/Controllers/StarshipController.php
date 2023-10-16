<?php

namespace App\Http\Controllers;

use App\Helpers\ApiHelper;
use App\Repository\StarshipRepositoryInterface;
use Illuminate\Http\Request;

class StarshipController extends Controller
{
    private $starshipRepository;
    public function __construct(StarshipRepositoryInterface $starshipRepository)
    {
        $this->starshipRepository = $starshipRepository;
    }
    public function show(): void
    {
        $starships = $this->starshipRepository->all();
        foreach($starships as $starship)
            echo $starship->name . "<br>";
    }
    public function get(int $id): void
    {
        $starship =  $this->starshipRepository->find($id);
        echo $starship->name;
    }
    public function store(Request $request): bool
    {
        $obj = ApiHelper::toStdClass($request);
        $this->starshipRepository->insert($obj);
        return true;
    }
    public function delete(int $id): void
    {
        $this->starshipRepository->delete($id);
    }
    public function put(Request $request, int $id): void
    {
        $obj = ApiHelper::toStdClass($request);
    }
}
