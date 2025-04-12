<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gender;

class GenderController extends Controller
{
    // GET /api/genders
    public function index()
    {
        $genders = Gender::all();
        return response()->json($genders);
    }

    // GET /api/genders/{id}
    public function show(string $id)
    {
        $genders = Gender::find($id);

        if ($genders) {
            return response()->json($genders);
        }

        return response()->json(['message' => 'Gender not found'], 404);
    }

    // POST /api/genders
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $gender = Gender::create([
            'name' => $request->name,
        ]);

        return response()->json($gender, 201);
    }

    // PUT /api/genders/{id}
    public function update(Request $request, string $id)
    {
        $genders = Gender::find($id);

        if (!$genders) {
            return response()->json(['message' => 'Gender not found'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $gender->update([
            'name' => $request->name,
        ]);

        return response()->json($genders);
    }

    // DELETE /api/genders/{id}
    public function destroy(string $id)
    {
        $genders = Gender::find($id);

        if (!$genders) {
            return response()->json(['message' => 'Gender not found'], 404);
        }

        $genders->delete();
        return response()->json(['message' => 'Gender deleted']);
    }
}

