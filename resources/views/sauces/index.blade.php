@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Liste des sauces</h1>
        <a href="{{ route('sauces.create') }}" class="btn btn-primary mb-3">Ajouter une sauce</a>
        <ul class="list-group">
            @foreach ($sauces as $sauce)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ $sauce->imageUrl }}" alt="{{ $sauce->name }}" class="img-thumbnail me-3" style="width: 100px; height: auto;">
                        <a href="{{ route('sauces.show', $sauce->id) }}" class="text-decoration-none">{{ $sauce->name }}</a>
                    </div>
                    <div>
                        <a href="{{ route('sauces.edit', $sauce->id) }}" class="btn btn-warning btn-sm me-2">✏️</a>
                        <form action="{{ route('sauces.destroy', $sauce->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">🗑️</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection