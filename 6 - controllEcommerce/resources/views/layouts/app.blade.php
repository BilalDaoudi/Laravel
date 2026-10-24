<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/produits">Ecommerce ISTA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @if(Request::session()->has('client'))
                <li class="nav-item">
                    <a href="/produits" class="nav-link">Produits</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('commandes.show', 1) }}" class="nav-link">my commandes</a>
                </li>
                
                    <li class="nav-item">
                        <a href="/panier" class="nav-link">
                            <i class="bi bi-cart" id="cart-icon"></i>
                            <span id="cart-count">@yield('cart')</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link">Logout</button>
                        </form>
                    </li>
                @elseif(Request::session()->has('admin'))
                    <li class="nav-item"><a href="/produits/create" class="nav-link">Ajouter Produit</a></li>
                    <li class="nav-item"><a href="/produits" class="nav-link">Produits</a></li>
                    <li class="nav-item"><a href="/categories/create" class="nav-link">Ajouter Catégorie</a></li>
                    <li class="nav-item"><a href="/categories" class="nav-link">Catégories</a></li>
                    <li class="nav-item"><a href="/utilisateurs" class="nav-link">Liste Clients</a></li>
                    <li class="nav-item"><a href="/commandes" class="nav-link">Liste commandes</a></li>

                    <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="/register" class="nav-link">Register</a></li>
                @endif
            </ul>
        </div>
    </nav>
    

    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
