@extends('layouts.app')
<meta name="csrf-token" content="{{csrf_token()}}">
<style>
    .flex-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .sidebar {
        padding: 5px;
    }

    .sidebar ul {
        margin: 0;
        list-style-type: none;
        padding: 0;
    }

    .sidebar ul a {
        text-decoration: none;
        color: #000;
        font-weight: 500;
    }

    .sidebar ul a li {
        padding: 5px;
        padding-left: 15px;
        /* margin-bottom: 10px; */
        font-size: 18px;
        /* background-color: cornflowerblue */
        border-bottom: 1px solid cornflowerblue;
    }

    .sidebar li button {
        color: #333;
        text-decoration: none;
    }

    .sidebar li:hover {
        color: #000;
        background-color: aquamarine;
        color: blueviolet;
        /* text-decoration: underline; */
    }
</style>
<script>
    function AddToPanier(id) {
        const qt = document.getElementById(id).value;
        var request = new XMLHttpRequest();
        request.open('POST', "{{route('LigneCommandeDemo.store')}}", true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        request.onload = function() {
            if (this.status == 200) {
                document.getElementById('nb_produits').innerHTML = this.response;
            }

        };
        request.send(`codeproduit=${id}&quantite=${qt}`);
        document.getElementById(id).value = 1;
    }
</script>
@section('content')


<div class="row h-100">
    <div class="col-md-2 d-md-block bg-info sidebar">
        <div class="h4 p-2 fw-bold text-dark text-center">Categories</div>
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('produits.acheter')}}">
                        ☼ Tout
                    </a>
                </li>
                @foreach ($categories as $categorie)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('produits.acheter',$categorie->id)}}">
                        ☼ {{$categorie->description}}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row">

            <div class="col h4 p-3 fw-bold">
                Liste des produits
            </div>
            <div class="col">
                @if(session('success'))
                <div class="alert alert-info">
                    {{ session('success') }}
                </div>
                @endif
            </div>
        </div>

        @if(count($produits) > 0)
        <div class="row">

            @foreach ($produits as $produit)

            <div class="col-md-3 p-2">
                <div class="card">
                    <div class="p-3">
                        <img src="{{ asset($produit->image) }}" class="card-img-top" alt="..." width="200px" height="250px">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $produit->prix }} DH</h5>
                        <p class="card-text">{{ $produit->description }}</p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                    <div class="card-footer flex-container">
                        <!-- <form action="{{route('LigneCommandeDemo.store',$produit->codeproduit)}}" method="post" class="flex-container"> -->
                        <input type="number" value='1' id="{{ $produit->codeproduit }}" class="form-control" />
                        <button class="btn btn-primary" onclick="AddToPanier('{{ $produit->codeproduit }}')">+</button>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
            @endforeach


        </div>
        @else
        <div class="alert alert-danger text-center fw-bold">
            N'est aucun produit
        </div>
        @endif
    </div>
</div>


@endsection