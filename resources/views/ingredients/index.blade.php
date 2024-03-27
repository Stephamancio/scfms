@extends('layouts.app')

@section('content')
    <h1>All Ingredients</h1>
    
    <ul>
        @foreach($ingredients as $ingredient)
            <li>{{ $ingredient->name }}</li>
        @endforeach
    </ul>
@endsection
