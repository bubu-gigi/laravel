<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    public function test_get_users(): void
    {
        $response = $this->get('/api/users');
        $response->assertStatus(200);
    }

    public function test_get_user(): void
    {
        $response = $this->get('/api/users/3');
        $response->assertStatus(200);
    }

    public function test_post_user(): void
    {
        $response = $this->postJson('api/users', [
            "name" => "guglielmo",
            "height" => 185,
            "mass" => 79,
            "hair_color" => "brown",
            "skin_color" => "white",
            "eye_color" => "brown-green",
            "birth_year" => "10/05/2002",
            "gender" => "male",
            "homeworld" => 2,
            "species" => [
                "https://ehdheidhe/34/"
            ],
            "starships" => [
                "https://ehdheidhe/34/"
            ],
            "vehicles" => []
        ]);
        $response->assertStatus(200);
    }

    public function test_delete_user(): void
    {
        $response = $this->delete('api/users/1');
        $response->assertStatus(200);
    }

    public function test_put_user(): void
    {
        $response = $this->putJson('api/users/90', [
            "name" => "iryna"
        ]);
        $response->assertStatus(200);
    }

    public function test_get_films(): void
    {
        $response = $this->get('/api/users');
        $response->assertStatus(200);
    }

    public function test_get_film(): void
    {
        $response = $this->get('/api/films/3');
        $response->assertStatus(200);
    }

    public function test_post_film(): void
    {
        $response = $this->postJson('/api/films', [
            "title" => "Bonny e Clyde",
            "episode_id" => 5,
            "opening_crawl" => "si amano tanto",
            "director" => "bubugigi",
            "producer" => "mixerT",
            "release_date" => "3/3/2020",
            "characters" => [
            "https://ehdheidhe/34/",
            "https://ehdheidhe/8/"
            ],
            "planets" => [
            "https://ehdheidhe/8/"
            ],
            "starships" => [
            "https://ehdheidhe/21/"
            ],
            "species" => [],
            "vehicles" => []
        ]);
        $response->assertStatus(200);
    }

    public function test_delete_film(): void
    {
        $reponse = $this->delete('/api/films/1');
        $reponse->assertStatus(200);
    }

    public function test_get_planets(): void
    {
        $response = $this->get('/api/planets');
        $response->assertStatus(200);
    }

    public function test_get_planet(): void
    {
        $response = $this->get('/api/planets/3');
        $response->assertStatus(200);
    }
    public function test_post_planet(): void
    {
        $response = $this->postJson('/api/planets', [
            "name" => "Terra",
            "rotation_period" => 365,
            "orbital_period" => 1,
            "diameter" => 7200,
            "climate" => "mixed",
            "gravity" => "standard",
            "terrain" => "mixed",
            "surface_water" => 80,
            "population" => 9000000000
        ]);
        $response->assertStatus(200);
    }
    public function test_delete_planet(): void
    {
        $reponse = $this->delete('/api/planets/1');
        $reponse->assertStatus(200);
    }
    public function test_get_species(): void
    {
        $response = $this->get('/api/species');
        $response->assertStatus(200);
    }

    public function test_get_specie(): void
    {
        $response = $this->get('/api/films/3');
        $response->assertStatus(200);
    }
    public function test_post_specie(): void
    {
        $response = $this->postJson('/api/species', [
            "name" => "umani",
            "classification" => "mammal",
            "designation" => "what?",
            "average_height" => 172,
            "skin_colors" => "white, black, yellow",
            "hair_colors" => "brown, blonde, red, black, white",
            "eye_colors" => "brown, grey, black, green, yellow",
            "average_lifespan" => 80,
            "homeworld" => "https://swapi.dev/api/planets/61/",
            "language" => "troppe"
        ]);
        $response->assertStatus(200);
    }
    public function test_delete_specie(): void
    {
        $reponse = $this->delete('/api/specie/1');
        $reponse->assertStatus(200);
    }
    public function test_get_starships(): void
    {
        $response = $this->get('/api/starships');
        $response->assertStatus(200);
    }

    public function test_get_starship(): void
    {
        $response = $this->get('/api/starships/3');
        $response->assertStatus(200);
    }
    public function test_post_starship(): void
    {
        $response = $this->postJson('/api/starships', [
            "name" => "aereo",
            "model" => "boing763",
            "manufacturer" => "ryanair",
            "cost_in_credits" => 1000000,
            "length" => 200,
            "max_atmosphering_speed" => 400,
            "crew" => 4,
            "passengers" => 200,
            "cargo_capacity" => 30000,
            "consumables" => "1 day",
            "hyperdrive_rating" => 3.0,
            "MGLT" => 8,
            "starship_class" => "bo",
        ]);
        $response->assertStatus(200);
    }
    public function test_delete_starship(): void
    {
        $reponse = $this->delete('/api/starships/1');
        $reponse->assertStatus(200);
    }

    public function test_get_vehicles(): void
    {
        $response = $this->get('/api/vehicles');
        $response->assertStatus(200);
    }

    public function test_get_vehicle(): void
    {
        $response = $this->get('/api/vehicles/3');
        $response->assertStatus(200);
    }
    public function test_post_vehicle(): void
    {
        $response = $this->postJson('/api/vehicles', [
            "name" => "auto",
            "model" => "panda",
            "manufacturer" => "fiat",
            "cost_in_credits" => 1000000,
            "length" => 5.8,
            "max_atmosphering_speed" => 160,
            "crew" => 4,
            "passengers" => 4,
            "cargo_capacity" => 30000,
            "consumables" => "1 day",
            "vehicle_class" => "1",
        ]);
        $response->assertStatus(200);
    }
    public function test_delete_vehicle(): void
    {
        $reponse = $this->delete('/api/vehicles/1');
        $reponse->assertStatus(200);
    }
}
