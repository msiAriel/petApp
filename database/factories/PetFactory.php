<?php

namespace Database\Factories;

use App\Models\People;
use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    protected $model = Pet::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'species' => $this->faker->randomElement(['dog', 'cat']),
            'breed' => $this->faker->word(),
            'age' => $this->faker->numberBetween(1, 15),
            'people_id' => People::factory(), 
        ];
    }
}
