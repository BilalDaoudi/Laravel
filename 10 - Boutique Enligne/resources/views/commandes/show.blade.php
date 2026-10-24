<!-- resources/views/categories/index.blade.php -->
@extends('layouts.app')

@section('content')
<div style="margin-left: 60px;margin-right: 60px;margin-top: 20px;">
    <div class="row">
        @if(Auth::user()->id == 1)
        <div class="col-4">
            Client : <b>{{$commande->user->name}}</b>
        </div>
        @endif
        <div class="col-4">
            Date Commande : <b>{{$commande->datecommande}}</b>
        </div>
        <div class="col-4">
            Etat Facture : <b>{{$commande->etat}}</b>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-4">
            <h4>Liste des Produits</h4>
        </div>
    </div>

    <table class="table" border="1">
        <thead>
            <tr>
                <th>Code Produit</th>
                <th>description</th>
                <th>image</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Prix * Quantité</th>
            </tr>
        </thead>
        <tbody>
            @php
            $som = 0
            @endphp
            @for( $i = 0 ; $i < count($produits) ; $i++) <tr>

                @php
                $som += $produits[$i]->prix * $lignecommandes[$i]->quantite
                @endphp
                <td>{{ $produits[$i]->codeproduit }}</td>
                <td>{{ $produits[$i]->description }}</td>
                <td><img src="{{asset($produits[$i]->image)}}" width="100px"></td>
                <td>{{ $produits[$i]->prix }} DH</td>
                <td>{{ $lignecommandes[$i]->quantite }}</td>
                <td>{{ $produits[$i]->prix * $lignecommandes[$i]->quantite }} DH</td>
                </tr>
                @endfor
                <tr>
                    <th colspan="5"></th>
                    <th>{{$som}} DH</th>
                </tr>
        </tbody>

    </table>
</div>
@endsection