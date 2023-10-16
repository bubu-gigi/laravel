<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\DB;

use Illuminate\Console\Command;

class testDb extends Command
{
    protected $signature = 'app:test-db';
    protected $description = 'Command description';

    public function handle()
    {
        try {
            if(DB::connection()->getPdo());
                echo "tao";
        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration. error:" . $e );
        }
    }
}
