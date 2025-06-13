<?php

namespace App\Http\Controllers;

use App\Http\Resources\PeopleResource;
use App\Models\People;
use Illuminate\Http\Request;
use App\Http\Resources\PetResource;
use Illuminate\Support\Facades\Log;

class PeoplesController extends Controller
{

    public function all(Request $request)
    {
        $pets = People::paginate(5);
        Log::channel('people')->info('Fetching all people', [
            'request' => $request->all(),
            'pagination' => $pets->toArray(),
        ]);
        return response()->json(['data'=>$pets], 200);
    }
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:peoples,email',
                'address' => 'required|string|max:255',
                'date' => 'nullable|date',
            ]);

            $people = new People();
            $people->name = $validated['name'];
            $people->email = $validated['email'];
            $people->address = $validated['address'];
            $people->date = $validated['date'] ?? null;
            $people->save();

            return new PeopleResource($people);
        } catch (\Exception $e) {
            Log::channel('people')->error('Error creating person: ', [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while creating the person.'
            ], 500);
        }
    }


    public function show(string $id)
    {
        $people = People::find($id);

        if (!$people) {
            log::channel('people')->warning('Person not found', ['id' => $id]);
            return response()->json([
                'status' => 'error',
                'message' => 'Person not found'
            ], 404);
        }

        return new PeopleResource($people);
    }


    public function update(Request $request, string $id)
    {
        try {
            $people = People::find($id);

            if (!$people) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Person not found'
                ], 404);
            }

            $validated = $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|required|email|unique:peoples,email,' . $id,
                'address' => 'sometimes|required|string|max:255',
                'date' => 'sometimes|nullable|date',
            ]);

            $people->update($validated);

            return new PeopleResource($people);
        } catch (\Exception $e) {
            Log::channel('people')->error('Error updating person: ', [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while updating the person.'
            ], 500);
        }
    }



    public function destroy(string $id)
    {
        try {
            $people = People::find($id);

            if (!$people) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Person not found'
                ], 404);
            }

            $people->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Person deleted successfully'
            ]);
        } catch (\Exception $e) {
            Log::channel('people')->error('Error al eliminar persona', [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while deleting the people.'
            ], 500);
        }
    }
}
