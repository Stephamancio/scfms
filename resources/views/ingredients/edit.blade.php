@extends('layouts.app')

@section('content')
    <h1>Edit Ingredient</h1>
    
    <form action="{{ route('ingredients.update', $ingredient->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Ingredient Name:</label>
        <input type="text" name="name" id="name" value="{{ $ingredient->name }}" required>
        <button type="submit">Update Ingredient</button>
    </form>
@endsection
