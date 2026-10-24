@extends('layouts.app')

@section('content')
@section("cart")
{{count($cart)}}
@endsection
    <h1>Panier</h1>

    @if (count($cart) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $productId => $item)
                    @php
                        $product = \App\Models\Produit::find($productId);
                        $subtotal = $product->price * $item['quantity'];
                    @endphp
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td><img src="public/Image/{{$product->image}}" alt="Product Image" width="100"></td>
                        <td>{{ $product->price }} DH</td>
                        <td> {{ $item['quantity'] }}</td>
                        <td>{{ $product->categorie->name }}</td>
                        <td>
                            <form action="{{ route('panier.decrease', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-primary">-</button>
                            </form>
                           
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>Total Price: {{ $totalPrice }} DH</p>
        <form id="validateForm" action="{{ route('commandes.store') }}" method="POST" style="display: none;">
            @csrf
            <input type="hidden" name="cart" value="{{ json_encode($cart) }}">
        </form>
        <button class="btn btn-success" onclick="validateAll()">Valider All</button>
    @else
        <p>Your cart is empty.</p>
    @endif

    <script>
        function validateAll() {
            const form = document.getElementById('validateForm');
            form.submit();
        }
    </script>
@endsection
