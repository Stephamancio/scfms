<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    // Logic for the manager's dashboard or main page
    public function index()
    {
        return view('manager.home');
    }

    // Display a list of foods
    public function foodsIndex()
    {
        $products = Product::all();
        return view('manager.foods.index', compact('products'));
    }

    // Show the form for editing a product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('manager.edit', compact('product'));
    }

    // Update the specified product in storage
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_name' => 'required',
            'price' => 'required|numeric',
            'product_code' => 'required|unique:products,product_code,' . $id,
        ]);

        $product = Product::findOrFail($id);
        $product->update($validatedData);

        return redirect()->route('manager.home')->with('success', 'Product updated successfully.');
    }

    // Remove the specified product from storage
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('manager.home')->with('success', 'Product deleted successfully.');
    }
}
