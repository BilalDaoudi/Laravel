@extends('layouts.app')

@section('content')
    <h1>Edit Product</h1>

    <form action="{{ route('produits.update', $produit->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $produit->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $produit->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $produit->price }}" required>
        </div>

        <div class="form-group">
            <label for="categorie">Category</label>
            <select name="categorie" id="categorie" class="form-control" required>
                @foreach ($namecat as $cat)
                    <option value="{{ $cat->name }}" @if ($cat->name === $produit->categorie->name) selected @endif>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
