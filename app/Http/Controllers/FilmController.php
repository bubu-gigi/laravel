<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Repository\FilmRepositoryInterface;

class FilmController extends Controller
{
    private $filmRepository;
    public function __construct(FilmRepositoryInterface $filmRepository)
    {
        $this->filmRepository = $filmRepository;
    }
    public static function store($i):void{

    }
}
