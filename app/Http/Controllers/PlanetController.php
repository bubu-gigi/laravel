<?php

namespace App\Http\Controllers;

use App\Helpers\ApiHelper;
use App\Repository\PlanetRepositoryInterface;
use Illuminate\Http\Request;

class PlanetController extends Controller
{
    private $planetRepository;
    public function __construct(PlanetRepositoryInterface $planetRepository)
    {
        $this->planetRepository = $planetRepository;
    }
    public function show(): void
    {
        $planets = $this->planetRepository->all();
        foreach($planets as $planet)
            echo $planet->name . "<br>";
    }
    public function get(int $id): void
    {
        $planet =  $this->planetRepository->find($id);
        echo $planet->name;
    }
    public function store(Request $request): bool
    {
        $obj = ApiHelper::toStdClass($request);
        $this->planetRepository->insert($obj);
        return true;
    }
    public function delete(int $id): void
    {
        $this->planetRepository->delete($id);
    }

    public function put(Request $request, int $id): void
    {
        $obj = ApiHelper::toStdClass($request);
    }
}
