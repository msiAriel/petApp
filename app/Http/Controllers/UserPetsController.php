<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserPetsResource;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserPetsController extends Controller
{
    public function getPetsByPeopleId($peopleId)
    {
        try {
            $people = People::with('pets')->find($peopleId);

            if (!$people) {
                log::channel('people')->warning('Person not found', ['id' => $peopleId]);
                
                return response()->json([
                    'status' => 'error',
                    'message' => 'No records found'
                ], 404);
            }

            return new UserPetsResource($people);

        } catch (\Exception $th) {
            Log::error('Error al crear mascota', [
                'message' => $th->getMessage(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while fetching the data: ' . $th->getMessage()
            ], 500);
        }
    }
}
