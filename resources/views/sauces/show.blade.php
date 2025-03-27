@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h1>{{ $sauce->name }}</h1>
        </div>
        <div class="card-body">
            <p><strong>Fabricant :</strong> {{ $sauce->manufacturer }}</p>
            <p><strong>Description :</strong> {{ $sauce->description }}</p>
            <p><strong>Ingrédient principal :</strong> {{ $sauce->mainPepper }}</p>
            <div class="text-center my-3">
                <img src="{{ $sauce->imageUrl }}" alt="{{ $sauce->name }}" class="img-fluid rounded" style="max-width: 200px;">
            </div>
            <p><strong>Force :</strong> {{ $sauce->heat }}/10</p>
            <p>
                <span class="text-success">👍 {{ $sauce->likes }}</span> | 
                <span class="text-danger">👎 {{ $sauce->dislikes }}</span>
            </p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('sauces.edit', $sauce->id) }}" class="btn btn-primary">Modifier</a>
            <form action="{{ route('sauces.destroy', $sauce->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette sauce ?');">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection