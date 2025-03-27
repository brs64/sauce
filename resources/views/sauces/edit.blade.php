@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h1>Modifier la sauce : {{ $sauce->name }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('sauces.update', $sauce->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $sauce->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="manufacturer">Fabricant</label>
                    <input type="text" name="manufacturer" id="manufacturer" class="form-control" value="{{ old('manufacturer', $sauce->manufacturer) }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description', $sauce->description) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="mainPepper">Ingrédient principal</label>
                    <input type="text" name="mainPepper" id="mainPepper" class="form-control" value="{{ old('mainPepper', $sauce->mainPepper) }}" required>
                </div>
                <div class="form-group">
                    <label for="heat">Force (1-10)</label>
                    <input type="number" name="heat" id="heat" class="form-control" value="{{ old('heat', $sauce->heat) }}" min="1" max="10" required>
                </div>
                <div class="form-group">
                    <label for="image">Image (optionnel)</label>
                    <input type="file" name="image" id="image" class="form-control-file">
                    @if($sauce->imageUrl)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $sauce->imageUrl) }}" alt="{{ $sauce->name }}" class="img-fluid rounded" style="max-width: 200px;">
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
                <a href="{{ route('sauces.index') }}" class="btn btn-secondary mt-3">Annuler</a>
            </form>
        </div>
    </div>
</div>
@endsection
