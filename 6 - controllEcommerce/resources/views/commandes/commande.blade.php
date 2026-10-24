@extends('layouts.app')

@section('content')
@foreach ($commands as $item_id => $group)
    <div class="commande-group">
        <h2>Commande ID: {{ $item_id }}</h2>
        <h3>Client Name: {{ $group[0]->client_name }}</h3>
        @php
        $total = 0;
        @endphp
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($group as $commande)
                    <tr>
                        <td>{{ $commande->name }}</td>
                        <td>{{ $commande->quantity }}</td>
                        <td>{{ $commande->price }} DH</td>
                        @php
                        $total += $commande->price;
                        @endphp
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        <h4>Total: {{ $total }} DH</h4>
    </div>
@endforeach
@endsection
