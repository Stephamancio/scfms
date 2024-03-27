@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>List of Products</h1>

        <!-- Button to add a new product -->
        <a href="" class="btn btn-primary mb-3">Add New Product</a>

        <!-- Check if there are products to display -->
        @if($products->isEmpty())
            <p>No products found.</p>
        @else
            <!-- Display list of products in a table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Ingredients</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <ul>
                                    @foreach($product->ingredients as $ingredient)
                                        <li>{{ $ingredient->name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <!-- Edit button -->
                                <a href="{{ route('manager.foods.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                
                                <!-- Delete form -->
                                <form action="{{ route('manager.foods.destroy', $product->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
