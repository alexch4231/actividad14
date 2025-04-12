<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Universe;

class UniverseController extends Controller
{
    // GET /api/universes
    public function index()
    {
        $universes = Universe::all();
        return response()->json($universes);
    }

    // GET /api/universes/{id}
    public function show(string $id)
    {
        $universe = Universe::find($id);

        if ($universe) {
            return response()->json($universe);
        }

        return response()->json(['message' => 'Universe not found'], 404);
    }

    // POST /api/universes
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $universe = Universe::create([
            'name' => $request->name,
        ]);

        return response()->json($universe, 201);
    }

    // PUT /api/universes/{id}
    public function update(Request $request, string $id)
    {
        $universe = Universe::find($id);

        if (!$universe) {
            return response()->json(['message' => 'Universe not found'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $universe->update([
            'name' => $request->name,
        ]);

        return response()->json($universe);
    }

    // DELETE /api/universes/{id}
    public function destroy(string $id)
    {
        $universe = Universe::find($id);

        if (!$universe) {
            return response()->json(['message' => 'Universe not found'], 404);
        }

        $universe->delete();
        return response()->json(['message' => 'Universe deleted']);
    }
}

