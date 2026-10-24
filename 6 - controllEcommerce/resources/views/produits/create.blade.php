@extends('layouts.app')

@section('content')
    <h1>Add Product</h1>

    <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
        <input type="file" name="image" id="image">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="quantite">quantite</label>
            <input type="number" name="quantite" id="quantite" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="categorie">Category</label>
            <select name="categorie" id="categorie" class="form-control" required>
                @foreach ($categorie as $cat)
                <option value="------">----------</option>
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection
