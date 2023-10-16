<?php

namespace App\Http\Controllers;

use App\Helpers\ApiHelper;
use App\Repository\VehicleRepositoryInterface;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    private $vehicleRepository;
    public function __construct(VehicleRepositoryInterface $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }
    public function show(): void
    {
        $vehicles = $this->vehicleRepository->all();
        foreach($vehicles as $vehicle)
            echo $vehicle->name . "<br>";
    }
    public function get(int $id): void
    {
        $vehicle =  $this->vehicleRepository->find($id);
        echo $vehicle->name;
    }
    public function store(Request $request): bool
    {
        $obj = ApiHelper::toStdClass($request);
        $this->vehicleRepository->insert($obj);
        return true;
    }
    public function delete(int $id): void
    {
        $this->vehicleRepository->delete($id);
    }
    public function put(Request $request, int $id): void
    {
        $obj = ApiHelper::toStdClass($request);
    }
}
