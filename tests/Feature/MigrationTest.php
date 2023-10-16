<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MigrationTest extends TestCase
{
    use RefreshDatabase;
    public function test_migration(): void
    {
        $this->artisan('migrate')->assertExitCode(0);
    }
}
