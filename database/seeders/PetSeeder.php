<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $peopleIds = DB::table('peoples')->pluck('id')->toArray();

        $pets = [
            [
                'name' => 'Max',
                'species' => 'Dog',
                'breed' => 'Labrador Retriever',
                'age' => 3,
                'image_url' => 'https://cdn2.thedogapi.com/images/lNnWNU4qU.jpg',
                'origin' => 'Canada',
                'temperament' => 'Friendly',
            ],
            [
                'name' => 'Luna',
                'species' => 'Cat',
                'breed' => 'Siamese',
                'age' => 2,
                'image_url' => 'https://cdn2.thedogapi.com/images/lNnWNU4qU.jpg',
                'origin' => 'Thailand',
                'temperament' => 'Affectionate',
            ],
            [
                'name' => 'Charlie',
                'species' => 'Dog',
                'breed' => 'Beagle',
                'age' => 4,
                'image_url' => 'https://cdn2.thedogapi.com/images/lNnWNU4qU.jpg',
                'origin' => 'England',
                'temperament' => 'Curious',
            ],
            [
                'name' => 'Bella',
                'species' => 'Cat',
                'breed' => 'Persian',
                'age' => 1,
                'image_url' => 'https://cdn2.thedogapi.com/images/lNnWNU4qU.jpg',
                'origin' => 'Iran',
                'temperament' => 'Calm',
            ],
            [
                'name' => 'Rocky',
                'species' => 'Dog',
                'breed' => 'Bulldog',
                'age' => 5,
                'image_url' => 'https://cdn2.thedogapi.com/images/lNnWNU4qU.jpg',
                'origin' => 'England',
                'temperament' => 'Docile',
            ],
        ];

        foreach ($pets as &$pet) {
            $pet['people_id'] = $peopleIds[array_rand($peopleIds)];
        }
        unset($pet);

        DB::table('pets')->insert($pets);
    }
}
