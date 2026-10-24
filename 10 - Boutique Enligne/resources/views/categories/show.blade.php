@extends('layouts.app')

@section('content')

<div style="margin-left: 60px;margin-right: 60px;margin-top: 20px;">
    <div class="row m-2">
        <h5>Liste des produits de Categerie : <span class="text-primary ml-3"> {{ $categorie->description }}</span></h5>

    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Code Produit</th>
                <th>Description</th>
                <th>Image</th>
                <th>Prix</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produits as $produit)
            <tr>
                <td>{{ $produit->codeproduit }}</td>
                <td>{{ $produit->description }}</td>
                <td><img src="{{ asset($produit->image) }}" alt="Product Image" width="100px"></td>
                <td>{{ $produit->prix }}</td>
                <td><a href="{{ route('produits.edit', $produit ) }}" class="btn btn-sm  btn-primary"><span class="bi bi-pencil"></span></a>
                    <form action="{{ route('produits.destroy', $produit ) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm  btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette Produit ?')"><span class="bi bi-trash"></span></button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection