<?php

namespace App\Console\Commands\Populate;

use Illuminate\Console\Command;
use App\Repository\UserRepositoryInterface;

class PopulateUser extends Command
{
    private $userRepository;
    protected $signature = 'app:populate:user';
    protected $description = '';

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
        parent::__construct();
    }

    public function handle()
    {
        $firstTime = true;
        $response = file_get_contents("https://swapi.dev/api/people");
        $results = json_decode($response);
        while(true)
        {
            if($firstTime)
            {
                foreach ($results->results as $user)
                    $this->userRepository->insert($user);
                $firstTime = false;
            }
            if(is_null($results->next))
                break;
            else
            {
                $results = json_decode(file_get_contents($results->next));
                foreach ($results->results as $user)
                    $this->userRepository->insert($user);
            }
        }
    }
}
