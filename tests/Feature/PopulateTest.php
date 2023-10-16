<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PopulateTest extends TestCase
{
    public function test_check_populate(): void
    {
        $this->artisan('app:populate:user')->assertExitCode(0);
        $this->artisan('app:populate:planet')->assertExitCode(0);
        $this->artisan('app:populate:film')->assertExitCode(0);
        $this->artisan('app:populate:specie')->assertExitCode(0);
        $this->artisan('app:populate:starship')->assertExitCode(0);
        $this->artisan('app:populate:vehicle')->assertExitCode(0);
    }
}
