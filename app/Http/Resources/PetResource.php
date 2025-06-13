<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PetResource extends JsonResource
{
    
    public function toArray(Request $request): array
    {
        return [
            'status' => 'success',
            'message' => 'request completed successfully',
            'data' => [
            'name' => $this->name,
            'species' => $this->species,
            'breed' => $this->breed,
            'age' => $this->age,
            'people_id' => $this->people_id,
            'image_url' => $this->image_url,
            'temperament' => $this->temperament,
            'origin' => $this->origin,
            ],
        ];
    }
}
