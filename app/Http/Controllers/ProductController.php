<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('manager.foods.index', compact('products'));
    }

    public function create()
    {
        $ingredients = Ingredient::all(); // Get all ingredients
        return view('manager.foods.create', compact('ingredients')); // Adjust the view name
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            // Add more validation rules as needed
        ]);

        Product::create($validatedData);

        return redirect()->route('manager.foods.index')->with('success', 'Product created successfully.');
    }

    // Edit method to show form for editing a product
    public function edit(Product $product)
    {
        return view('manager.foods.edit', compact('product'));
    }

    // Update method to update the specified product in the database
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            // Add more validation rules as needed
        ]);

        $product->update($validatedData);

        return redirect()->route('manager.foods.index')->with('success', 'Product updated successfully.');
    }

    // Destroy method to remove the specified product from the database
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('manager.foods.index')->with('success', 'Product deleted successfully.');
    }
}
