<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PeopleResource extends JsonResource
{
    
    public function toArray(Request $request): array
    {
        return [
            'status' => 'success',
            'message' => 'request completed successfully',
            'data' => [
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'date' => $this->date,
            ],
        ];
    }
}
