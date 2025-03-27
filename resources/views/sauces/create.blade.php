@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Ajouter une sauce</h1>
        <form action="{{ route('sauces.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nom" required>
            </div>
            <div class="mb-3">
                <label for="manufacturer" class="form-label">Fabricant</label>
                <input type="text" class="form-control" id="manufacturer" name="manufacturer" placeholder="Fabricant" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="mainPepper" class="form-label">Ingrédient principal</label>
                <input type="text" class="form-control" id="mainPepper" name="mainPepper" placeholder="Ingrédient principal" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <div class="mb-3">
                <label for="heat" class="form-label">Force (1-10)</label>
                <input type="number" class="form-control" id="heat" name="heat" placeholder="Force (1-10)" min="1" max="10" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
