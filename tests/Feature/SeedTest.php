<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeedTest extends TestCase
{
    public function test_seed(): void
    {
        $this->artisan('db:seed')->assertExitCode(0);
    }
}
