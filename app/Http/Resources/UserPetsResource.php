<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserPetsResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'status' => 'success',
            'message' => 'User and pets retrieved successfully',
            'data' => [
                'people' => [
                    'name' => $this->name,
                    'email' => $this->email,
                    'address' => $this->address,
                    'date' => $this->date,
                    'pets' => $this->pets, // Asegúrate de que $this->pets sea una colección o arreglo de mascotas
                ],
            ],
        ];
    }
}
