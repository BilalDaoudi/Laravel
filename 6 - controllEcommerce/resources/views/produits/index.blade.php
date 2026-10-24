@extends('layouts.app')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('form#addToPanierForm').submit(function(e) {
                e.preventDefault(); // Prevent form submission

                var form = $(this);
                var url = form.attr('action');
                var formData = form.serialize();

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    success: function(response) {
                        // Update the cart count element with the new count
                        $('#cart-count').text(response.cartCount);
                    },
                    error: function(xhr) {
                        // Handle error if needed
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>

    @section("cart")
        @if(session()->has("cart"))
            {{ count(session()->get("cart")) }}
        @endif
    @endsection

    <h1>Products</h1>
    <h2>Filter by Category:</h2>
    <form action="{{ route('produits.index') }}" method="GET">
        <select name="category" onchange="this.form.submit()">
            <option value="">All Categories</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </form>
    
    @if(session()->has('admin'))
        <a href="{{ route('produits.create') }}" class="btn btn-primary mb-3">Add Product</a>
    @endif

    <div class="row">
        @foreach ($produits as $produit)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="public/Image/{{$produit->image}}" class="card-img-top" alt="produit image" width="auto" height="300">

                    <div class="card-body">
                        <h5 class="card-title">{{ $produit->name }}</h5>
                        <p class="card-text">{{ $produit->description }}</p>
                        <p class="card-text">Price: {{ $produit->price }} DH</p>
                        <p class="card-text">Category: {{ $produit->categorie->name }}</p>
                        <p class="card-text">Quantity: {{ $produit->quantite }}</p>
                        @if(session()->has('client'))
                            @if($produit->quantite > 0)
                                <form action="{{ route('panier.add', $produit->id) }}" method="POST" class="d-inline" id="addToPanierForm">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Add to Panier</button>
                                </form>
                            @else
                                <div class="alert alert-danger">Stock empty</div>
                            @endif
                        @endif
                    </div>
                    @if(session()->has('admin'))
                        <div class="card-footer">
                            <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
