@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Delete Food</h1>

        <p>Are you sure you want to delete this food?</p>

        <!-- Delete form -->
        <form action="{{ route('manager.foods.destroy', $food->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
