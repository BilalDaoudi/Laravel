@extends('layouts.app')

@section('content')
<div style="margin-left: 60px;margin-right: 60px;margin-top: 20px;">

<div class="row m-2">
    <div class="col-3">
        <h4>Liste des produits</h4>
    </div>

    <div class="col-6">
        @if(session('success'))
        <div class="alert alert-info">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div class="col-3 text-end">
        <a href="{{ route('produits.create') }}" class="btn btn-primary"><span class="bi bi-plus"></span> Ajouter un produit</a>
    </div>
</div>

@if(count($produits) > 0)

<div class="row">

    @foreach ($produits as $produit)

    <div class="col-md-3 mt-4 " style="background: none;">
        <div class="card shadow" style="height: 500px;">
            <div class="card-title text-center">
                <img src="{{ asset($produit->image) }}" class="card-img-top w-75 p-3" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $produit->prix }} DH</h5>
                <p class="card-text">{{ $produit->codeproduit }}</p>
                <p class="card-text">{{ $produit->description }}</p>
            </div>
            <div class="card-footer flex-container text-end">
                <a href="{{ route('produits.edit', $produit ) }}" class="btn btn-sm  btn-primary"><span class="bi bi-pencil"></span></a>
                <form action="{{ route('produits.destroy', $produit ) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm  btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette Produit ?')"><span class="bi bi-trash"></span></button>
                </form>
            </div>
        </div>

    </div>
    @endforeach


</div>

<div class="m-4">
    {{$produits->links()}}
</div>
@else
<div class="alert alert-danger text-center fw-bold">
    N'est aucun produit
</div>
@endif
</div>
@endsection