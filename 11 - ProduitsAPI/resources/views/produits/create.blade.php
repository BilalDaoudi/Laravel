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
        margin-top: 30px;
        color: #343a40;
    }

    form {
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 40px auto;
    }

    input[type="text"], input[type="number"], textarea {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
        border: 1px solid #ced4da;
        font-size: 1rem;
    }

    button[type="submit"] {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
        width: 100%;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }

    textarea {
        resize: vertical;
        height: 150px;
    }
</style>

<h1>Ajouter un Produit</h1>

<form action="{{ route('produits.store') }}" method="POST">
    @csrf
    
    <div class="mb-3">
        <label for="nom" class="form-label">Nom du produit</label>
        <input type="text" id="nom" name="nom" placeholder="Nom" required class="form-control">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea id="description" name="description" placeholder="Description" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label for="prix" class="form-label">Prix (en MAD)</label>
        <input type="number" id="prix" name="prix" step="0.01" placeholder="Prix" required class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
