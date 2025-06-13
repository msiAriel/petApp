<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('peoples')->insert([
            [
                'name' => 'Juan Pérez',
                'email' => 'juan.perez@example.com',
                'address' => 'Calle Falsa 123, Ciudad',
                'date' => '1990-05-15',
            ],
            [
                'name' => 'María López',
                'email' => 'maria.lopez@example.com',
                'address' => 'Avenida Siempre Viva 742, Ciudad',
                'date' => '1985-08-22',
            ],
            [
                'name' => 'Carlos Gómez',
                'email' => 'carlos.gomez@example.com',
                'address' => 'Boulevard Central 456, Ciudad',
                'date' => '1992-11-03',
            ],
            [
                'name' => 'Ana Torres',
                'email' => 'ana.torres@example.com',
                'address' => 'Plaza Mayor 789, Ciudad',
                'date' => '1988-02-17',
            ],
        ]);
    }
}
