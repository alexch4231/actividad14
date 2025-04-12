<?php

namespace App\Http\Controllers;

use App\Models\Superheroe;
use App\Models\Gender;
use App\Models\Universe;
use Illuminate\Http\Request;

class SuperheroeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $superheroes = Superheroe::all();
        return response()->json($superheroes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gender_id' => 'required|exists:genders,id',
            'universe_id' => 'required|exists:universes,id',
            'name' => 'required|string|max:100',
            'realName' => 'required|string|max:150',
            'Picture' => 'nullable|string|max:200',
        ]);

        $superheroes = Superheroe::create([
            'gender_id' => $request->gender_id,
            'universe_id' => $request->universe_id,
            'name' => $request->name,
            'realName' => $request->realName,
            'Picture' => $request->Picture
        ]);

        return response()->json($superheroes, 201); // 201 para indicar que fue creado
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $superheroes = Superheroe::find($id);

        if ($superheroes) {
            return response()->json($superheroes);
        }

        return response()->json(['message' => 'Superhero not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $superheroes = Superheroe::find($id);

        if (!$superheroes) {
            return response()->json(['message' => 'Superhero not found'], 404);
        }

        $request->validate([
            'gender_id' => 'required|exists:genders,id',
            'universe_id' => 'required|exists:universes,id',
            'name' => 'required|string|max:100',
            'realName' => 'required|string|max:150',
            'Picture' => 'nullable|string|max:200',
        ]);

        $superheroes->update([
            'gender_id' => $request->gender_id,
            'universe_id' => $request->universe_id,
            'name' => $request->name,
            'realName' => $request->realName,
            'Picture' => $request->Picture
        ]);

        return response()->json($superheroes);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $superheroes = Superheroe::find($id);

        if (!$superheroes) {
            return response()->json(['message' => 'Superhero not found'], 404);
        }

        $superheroes->delete();
        return response()->json(['message' => 'Superhero deleted']);
    }
}
