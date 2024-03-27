@extends('layouts.app')

@section('content')
    <h1>Create New Ingredient</h1>
    
    <form action="{{ route('ingredients.store') }}" method="post">
        @csrf
        <label for="name">Ingredient Name:</label>
        <input type="text" name="name" id="name" required>
        <button type="submit">Create Ingredient</button>
    </form>
@endsection
