<?php

namespace App\Http\Controllers;

use App\Helpers\ApiHelper;
use App\Repository\UserRepositoryInterface;
use Illuminate\Http\Request;

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
    public function store(Request $request): bool
    {
        $obj = ApiHelper::toStdClass($request);
        var_dump($obj);
        $this->userRepository->insert($obj);
        return true;
    }
    public function delete(int $id): void
    {
        $this->userRepository->delete($id);
    }

    public function update(Request $request, int $id): void
    {
        $obj = ApiHelper::toStdClass($request);
        var_dump($obj);
        //$this->
    }
}
