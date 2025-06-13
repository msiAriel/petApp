<?php

namespace App\Http\Controllers;

use App\Http\Resources\PetResource;
use App\Models\Pet;
use Illuminate\Http\Request;
use App\Services\BreedInfoService;
use Illuminate\Support\Facades\Log;

class PetsController extends Controller
{

    public function all(Request $request)
    {
        $pets = Pet::paginate(5);
        Log::channel('pets')->info('Fetching all pets', [
            'request' => $request->all(),
            'pagination' => $pets->toArray(),
        ]);
        return response()->json(['data' => $pets], 200);
    }
    public function create(Request $request, BreedInfoService $breedService)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'species' => 'required|string|max:255',
                'breed' => 'required|string|max:255',
                'age' => 'required|integer',
                'people_id' => 'required|integer|exists:peoples,id',
            ]);

            $breedData = $breedService->fetchBreedData($validated['species'], $validated['breed']);

            if ($breedData) {
                $validated = array_merge($validated, array_filter($breedData));
            }

            $pet = Pet::create($validated);

            return new PetResource($pet);
        } catch (\Exception $e) {
            Log::channel('pets')->error('Error al crear mascota', [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while creating the pet: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $pet = Pet::findOrFail($id);
        if (!$pet) {
            Log::channel('pets')->warning('Pet not found', ['id' => $id]);
            return response()->json([
                'status' => 'error',
                'message' => 'Pet not found'
            ], 404);
        }

        return new PetResource($pet);
    }

    public function update(Request $request, $id)
    {
        try {
            $pet = Pet::findOrFail($id); // Lanza 404 si no existe

            $validated = $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'species' => 'sometimes|required|string|max:255',
                'breed' => 'sometimes|required|string|max:255',
                'age' => 'sometimes|required|integer',
                'people_id' => 'sometimes|required|integer|exists:peoples,id',
            ]);

            $pet->update($validated);

            return new PetResource($pet);
        } catch (\Exception $e) {
            Log::channel('pets')->error('Error al actualizar mascota', [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while updating the pet: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $pet = Pet::findOrFail($id);
            $pet->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Pet deleted successfully'
            ]);
        } catch (\Exception $e) {
            Log::channel('pets')->error('Error al eliminar mascota', [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while deleting the pet.'
            ], 500);
        }
    }
}
