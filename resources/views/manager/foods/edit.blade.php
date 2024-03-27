@extends('layouts.app')

@section('content')
    <h1>Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $product->product_name }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
        </div>
        <div class="form-group">
            <label for="product_code">Product Code:</label>
            <input type="text" name="product_code" id="product_code" class="form-control" value="{{ $product->product_code }}" required>
        </div>
        <div class="form-group">
            <label for="ingredients">Ingredients:</label>
            <select name="ingredients[]" id="ingredients" class="form-control" multiple>
                @foreach($ingredients as $ingredient)
                    <option value="{{ $ingredient->id }}" {{ $product->ingredients->contains($ingredient->id) ? 'selected' : '' }}>{{ $ingredient->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
@endsection
