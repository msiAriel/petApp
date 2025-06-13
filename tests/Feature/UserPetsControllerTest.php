<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\People;
use App\Models\Pet;


class UserPetsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function it_returns_pets_for_existing_people()
    {
        $people = People::factory()->create();
        Pet::factory()->count(2)->create(['people_id' => $people->id]);

        $response = $this->getJson("/api/getPetsByPeople/{$people->id}");

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'message',
                     'data' => [
                         'name',
                         'email',
                         'pets' => [
                             '*' => ['name', 'species', 'breed', 'age']
                         ]
                     ]
                 ]);
    }

    /** @test */
    public function it_returns_404_if_people_not_found()
    {
        $response = $this->getJson('/api/getPetsByPeople/9999');

        $response->assertStatus(404)
                 ->assertJson([
                     'status' => 'error',
                     'message' => 'No records found'
                 ]);
    }

    /** @test */
    public function it_handles_exceptions_gracefully()
    {
        // Simula error forzando una excepción
        $this->mock(People::class, function ($mock) {
            $mock->shouldReceive('with')->andThrow(new \Exception('Test error'));
        });

        $response = $this->getJson('/api/getPetsByPeople/1');

        $response->assertStatus(500)
                 ->assertJson([
                     'status' => 'error',
                 ]);
    }
}

