<?php

namespace App\Console\Commands;

use App\Helpers\ApiHelper;
use App\Models\Film;
use App\Models\User;
use Illuminate\Console\Command;
use App\Repository\BookingRepositoryInterface;

class booking extends Command
{
    private $bookingRepository;
    protected $signature = 'app:booking {id}';
    protected $description = 'make your booking';

    public function  __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
        parent::__construct();
    }
    public function handle()
    {
        $flag = true;
        $idFilm = null;
        $user = (User::where('remote_id',$this->argument('id'))->first());
        echo ("Benvenuto " . $user->name . "! Questa sera per lei abbiamo questi film: " . PHP_EOL .
                Film::where('remote_id', 'like', 2)->first()->title . ": numero -> 2" . PHP_EOL .
                Film::where('remote_id', 'like', 4)->first()->title . ": numero -> 4" . PHP_EOL .
                Film::where('remote_id', 'like', 6)->first()->title . ": numero -> 6" . PHP_EOL);
        do
        {
            $idFilm = readline('inserisci il numero di quale film vuoi vedere: ');
            if($idFilm == 'e')
                break;
            if($idFilm != 2 and $idFilm != 4 and $idFilm != 6)
            {
                echo "Per favore inserisci un numero valido, oppure 'e' per uscire" . PHP_EOL;
                $flag = false;
            }else{
                break;
            }
        }while(!($flag));

        echo $this->bookingRepository->makeBooking($user, $idFilm);

    }
}
