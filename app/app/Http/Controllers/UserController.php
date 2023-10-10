<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repository\UserRepositoryInterface;

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
    public function insert(User $user): void
    {
        $this->userRepository->insert($user);
    }
    public function delete(int $id): void
    {
        $this->userRepository->delete($id);
    }
}
