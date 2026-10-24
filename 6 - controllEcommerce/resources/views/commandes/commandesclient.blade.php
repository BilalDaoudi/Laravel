@extends('layouts.app')

@section('content')

<div class="container">
    @foreach ($commands as $item_id => $group)
        <div class="commande-group">
            <h2>Commande ID: {{ $item_id }}</h2>
            @php
                $tot = 0;
            @endphp
            <table class="table table-bordered">
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
                                $tot += $commande->price;
                            @endphp
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h3>Total: {{ $tot }} DH</h3>
        </div>
    @endforeach
</div>

@endsection
