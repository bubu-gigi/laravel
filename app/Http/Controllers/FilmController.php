<?php

namespace App\Http\Controllers;

use App\Helpers\ApiHelper;
use App\Repository\FilmRepositoryInterface;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    private $filmRepository;
    public function __construct(FilmRepositoryInterface $filmRepository)
    {
        $this->filmRepository = $filmRepository;
    }
    public function show(): void
    {
        $films = $this->filmRepository->all();
        foreach($films as $film)
            echo $film->title . "<br>";
    }
    public function get(int $id): void
    {
        $film =  $this->filmRepository->find($id);
        echo $film->title;
    }
    public function store(Request $request): bool
    {
        $obj = ApiHelper::toStdClass($request);
        $this->filmRepository->insert($obj);
        return true;
    }
    public function delete(int $id): void
    {
        $this->filmRepository->delete($id);
    }

    public function put(Request $request, int $id): void
    {
        $obj = ApiHelper::toStdClass($request);
    }
}
