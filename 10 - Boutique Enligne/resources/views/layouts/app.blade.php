<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daoudi Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

    <style>
        /* body {
            background: linear-gradient(to right, aqua, #fff);
        } */

        .logo {
            border-radius: 50%;
        }

        .navbar {
            box-shadow: 2px 2px 6px gray;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light fixed-top">
        <div class="container-fluid">
            @auth
            @if(Auth::user()->id == 1)
            <a class="navbar-brand" href="/categories">Daoudi Shop</a>
            @else
            <a class="navbar-brand" href="/">Daoudi Shop</a>
            @endif
            @endauth
            @guest

            <a class="navbar-brand" href="/">Daoudi Shop</a>
            @endguest
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @guest
                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('login.show')}}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('users.create')}}">Inscription</a>
                        </li>
                    </ul>
                </div>
                @endguest
                @auth
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if(Auth::user()->id == 1)
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('categories.index') }}">Catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produits.index') }}">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('commandes.index') }}">Commandes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">Utilisateurs</a>
                    </li>

                    @else

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produits.acheter') }}">Acheter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('LigneCommandeDemo.index') }}">Panier <span id="nb_produits">{{Auth::user()->produits->count()}}</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('commandes.mescommandes') }}">Mes Commandes</a>
                    </li>


                    @endif


                </ul>
                <div class="d-flex text-light">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{Auth::user()->name}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li ><a class="dropdown-item" href="{{ route('login.logout') }}" style="font-size: 12px;">Déconnexion</a></li>
                            </ul>
                        </li>
                    </ul>


                </div>
                @endauth
            </div>
        </div>
    </nav>


    <div style="margin-left: 0px;margin-right:20px;margin-top:10px;">
        <br>
        <br>
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>


</body>

</html>