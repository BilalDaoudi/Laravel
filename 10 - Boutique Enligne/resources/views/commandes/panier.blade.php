<!-- resources/views/categories/index.blade.php -->
@extends('layouts.app')

@section('content')
<div style="margin-left: 60px;margin-right: 60px;margin-top: 20px;">
<div class="row m-2">
    <div class="col-5">
        <h4>Ton Panier</h4>
    </div>

    <div class="col-4">
        @if(session('success'))
        <div class="alert alert-info">
            {{ session('success') }}
        </div>
        @endif
    </div>

    @if(count($produits) > 0)
    <div class="col-3 text-end">
        <form action=" {{route('commandes.store')}}" method="post">
            @csrf
            <button class="btn btn-primary w-50"> ✔  Valider</span></button>
        </form>

    </div>
    @endif
</div>

@if(count($produits) > 0)
<table class="table">
    <thead>
        <tr>
            <th>Code produit</th>
            <th>description</th>
            <th>image</th>
            <th>Prix unitaire</th>
            <th>Quantité</th>
            <th>Prix * Quantité</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
        $som = 0
        @endphp

        @foreach($produits as $p)
        @php
        $som += $p->produit->prix * $p->quantite
        @endphp
        <tr>

            <td>{{ $p->produit->codeproduit }}</td>
            <td>{{ $p->produit->description }}</td>
            <td><img src="{{asset($p->produit->image)}}" width="100px"></td>
            <td>{{ $p->produit->prix }} DH</td>
            <td>{{ $p->quantite }}</td>
            <td>{{ $p->produit->prix * $p->quantite }} DH</td>

            <td>
                <form action="{{route('LigneCommandeDemo.destroy',$p->id )}}" method="post">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger">Supprimer</button>

                </form>
            </td>
        </tr>
        @endforeach
        <tr>
                <th colspan="5"></th>
            <th colspan="2">{{$som}} DH</th>
        </tr>
    </tbody>

</table>
@else
<div class="alert alert-danger text-center fw-bold">
    N'est aucun produit
</div>
@endif
</div>
@endsection