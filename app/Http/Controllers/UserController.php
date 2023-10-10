<?php

namespace App\Http\Controllers;

use App\Helpers\ApiHelper;
use App\Models\User;
use App\Repository\UserRepositoryInterface;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use stdClass;

class UserController extends Controller
{
    private $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function show(): void
    {
        $users = $this->userRepository->all();
        foreach($users as $user)
            echo $user->name . "<br>";
    }
    public function get(int $id): void
    {
        $user =  $this->userRepository->find($id);
        echo $user->name;
    }
    public function create(): void
    {
        $arr = (object) array(
            "name" => "guglielmo",
            "height" => 185,
            "mass" => 79,
            "hair_color" => "brown",
            "skin_color" => "white",
            "eye_color" => "brown-green",
            "birth_year" => "10/05/2002",
            "gender" => "male",
            "homeworld" => "http:://jwiiwjd/2/"
        );
        $this->store($arr);
    }
    public function store(stdClass $attributes): RedirectResponse
    {
        $user = new User();
        $user->name       =  $attributes->name;
        $user->height     =  $attributes->height;
        if(is_numeric($attributes->mass))
            $user->mass       =  $attributes->mass;
        $user->hair_color =  $attributes->hair_color;
        $user->skin_color =  $attributes->skin_color;
        $user->eye_color  =  $attributes->eye_color;
        $user->birth_year =  $attributes->birth_year;
        $user->gender     =  $attributes->gender;
        $user->planet_id  =  ApiHelper::validateApi($attributes->homeworld);
        $user->save();

        return redirect('/users');
    }
    public function delete(int $id): void
    {
        $this->userRepository->delete($id);
    }
}
