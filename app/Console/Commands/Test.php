<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class test extends Command
{
    protected $signature = 'app:test';
    protected $description = 'Command description';
    public function handle()
    {
        // Test database connection
        try {
            if(DB::connection()->getPdo())
                echo "tao";
        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration. error:" . $e );
        }
    }
}
