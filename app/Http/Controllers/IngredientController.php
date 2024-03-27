<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('ingredients.index', compact('ingredients'));
    }

    public function create()
    {
        return view('ingredients.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:ingredients',
        ]);

        $ingredient = Ingredient::create($validatedData);

        return redirect()->route('ingredients.index')->with('success', 'Ingredient ' . $ingredient->name . ' created successfully.');
    }

    public function edit(Ingredient $ingredient)
    {
        return view('ingredients.edit', compact('ingredient'));
    }

    public function update(Request $request, Ingredient $ingredient)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:ingredients,name,' . $ingredient->id,
        ]);

        $ingredient->update($validatedData);

        return redirect()->route('ingredients.index')->with('success', 'Ingredient ' . $ingredient->name . ' updated successfully.');
    }

    public function destroy(Ingredient $ingredient)
    {
        $ingredientName = $ingredient->name;
        $ingredient->delete();

        return redirect()->route('ingredients.index')->with('success', 'Ingredient ' . $ingredientName . ' deleted successfully.');
    }
}
