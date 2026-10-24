<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        margin-top: 20px;
        color: #343a40;
    }

    .add-product {
        display: block;
        text-align: center;
        margin-top: 20px;
        background-color: #007bff;
        color: white;
        padding: 10px 15px;
        border-radius: 5px;
        text-decoration: none;
    }

    .add-product:hover {
        background-color: #0056b3;
    }

    .product-item {
        background-color: white;
        padding: 15px;
        margin-bottom: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .product-item a,
    .product-item button {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .product-item a:hover,
    .product-item button:hover {
        background-color: #218838;
    }

    .product-item button[type="submit"] {
        background-color: #dc3545;
    }

    .product-item button[type="submit"]:hover {
        background-color: #c82333;
    }
</style>

<h1>Liste des Produits</h1>
<a href="{{ route('produits.create') }}" class="add-product">Ajouter un produit</a>
<ul class="list-group mt-4">
    @foreach ($produits as $produit)
    <li class="list-group-item product-item d-flex justify-content-between align-items-center">
        {{ $produit->nom }} - {{ $produit->prix }} MAD
        <div>
            <a href="{{ route('produits.edit', $produit) }}" class="btn btn-success btn-sm me-2">Modifier</a>
            <form action="{{ route('produits.destroy', $produit) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
            </form>
        </div>
    </li>
    @endforeach
</ul>

<!-- Affichage du Token -->
<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    <div class="max-w-xl">
        <h3 class="text-lg font-semibold">Votre Token d'Authentification</h3>
        <p class="text-gray-600 dark:text-gray-400">{{ $token }}</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>