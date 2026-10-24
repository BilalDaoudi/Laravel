<!-- resources/views/categories/edit.blade.php -->
@extends('layouts.app')

@section('content')

<div style="margin-left: 60px;margin-right: 60px;margin-top: 20px;">
    <h1>Modifier la catégorie</h1>

    <form action="{{ route('categories.update', $categorie) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" id="description" name="description" class="form-control" value="{{ $categorie->description }}">
            @error('description')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
@endsection