<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('/assets/css/now-ui-dashboard.css') }}">
    <script src="{{ asset('/js/client.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body class>
    <div class="wrapper ">
        @include('layout.sidebar')
        <div class="main-panel" id="main-panel">
            @include('layout.navbar')
            <div class="panel-header panel-header-lg"></div>
            <div class="content">
                <div class="" style="margin-top: 50px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header row">
                                    <div class="col-md-3 h5 card-title text-center" style="color: blueviolet; "> Les Clients</div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" style="border:1px solid gray" placeholder="Rechercher..." onkeyup="rechercher(this)">
                                            <!-- <span class="input-group-text"  style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;background-color: white;">
                                                <i class="bi bi-search"></i>
                                            </span> -->
                                        </div>
                                    </div>
                                    <div class="col-md-3 text-center ">
                                        <a href="#addClient" data-bs-toggle="modal" class="btn btn-primary"><i class="bi bi-plus"></i> Nouveau</a>
                                        <a href="#exportClient" data-bs-toggle="modal" class="btn btn-danger"><i class="bi bi-file-earmark-arrow-down"></i> Exporter</a>
                                    </div>
                                </div>
                                <div class="row" style="margin: 0px 25px;">
                                    @if(session('success'))
                                    <div class="alert alert-info alert-dismissible fade show" role="alert" id="autoCloseAlert">

                                        {{ session('success') }}
                                        <button type="button" class="close btn btn-info" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    @endif
                                    @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="autoCloseAlert">

                                        {{ session('error') }}
                                        <button type="button" class="close btn btn-danger" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    @endif

                                </div>
                                <div class="card-body" id="table_info">

                                    <div class="table-responsive table-border">
                                        <table class="table table-bordered  text-center">
                                            <thead class="">
                                                <tr>
                                                    <th>Identifient</th>
                                                    <th>Nom</th>
                                                    <th>Localisation</th>
                                                    <th>Commentaire</th>
                                                    <th>Solde </th>
                                                    <th>Verrouiller</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id='resultats'>

                                                @if(count($clients) > 0)
                                                @foreach($clients as $client)
                                                <tr>
                                                    <td>{{ $client->username }}</td>
                                                    <td>{{ $client->nom }}</td>
                                                    <td>{{ $client->localisation }}</td>
                                                    <td>{{ $client->commentaire }}</td>
                                                    <td>-</td>
                                                    @if( $client->bloque == 'non')
                                                    <td><a href="#verrouillerClient" data-bs-toggle="modal" onclick="info_bloque('username_verrouiller','{{ $client->username }}','bloquer')"><i class="bi bi-lock"></i> bloquer</a></td>
                                                    @else
                                                    <td><a href="#verrouillerClient" data-bs-toggle="modal" onclick="info_bloque('username_verrouiller','{{ $client->username }}','débloquer')"><i class="bi bi-unlock"></i> débloquer</a></td>
                                                    @endif
                                                    <td>
                                                        <a class="btn btn-warning" href="#TypeDeviseModal" data-bs-toggle="modal" onclick="info('username_devise','{{ $client->username }}')"><i class="bi bi-eye"></i></a>
                                                        <a class="btn btn-info" href="#passwordClient" data-bs-toggle="modal" onclick="info('username_password','{{ $client->username }}')"><i class="bi bi-key"></i></a>
                                                        <a class="btn btn-danger" href="#deleteClient" data-bs-toggle="modal" onclick="info('username_delete','{{ $client->username }}')"><i class="bi bi-trash"></i></a>
                                                        <a class="btn btn-success" href="#updateClient" data-bs-toggle="modal" onclick="info_update('{{ $client->username }}','{{ $client->nom }}','{{ $client->localisation }}','{{ $client->commentaire }}')"><i class="bi bi-pencil"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @else
                                                <tr>
                                                    <td colspan="7" class="alert alert-danger text-center fw-bold p-3 text-light">N'est aucun client</td>
                                                </tr>
                                                @endif
                                            </tbody>

                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="TypeDeviseModal" tabindex="-1" aria-labelledby="TypeDeviseModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST"  action="{{ route('clients.operation') }}">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">Choisir Devise</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" class="form-control" id="username_devise" name="client">
                                    <input type="hidden" class="form-control" id="page" name="page" value="operation">
            
                                    @if(count($devises) > 0)
                                    <div class="form-group">
                                        <label>Type Devise</label>
                                        <select class="form-control" name="typedevise" id="typedevise">*
                                            @foreach($devises as $devise)
                                            <option value="{{$devise->symbol}}">{{$devise->symbol}}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-group p-2">
                                            <div id="tout"></div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-group text-center">
                                        <input type="text" class="form-control alert-danger text-danger font-weight-bol" value="Aucun type devise" />
                                    </div>
                                    @endif
                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    
                                    @if(count($devises) > 0)
                                    <button type="submit" class="btn btn-warning" >Détail</button>
                                                                                    
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="addClient" tabindex="-1" aria-labelledby="addClientLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('clients.add') }}">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addClientLabel">Ajouter Client</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="form-label">Identifient :</label>
                                        <input type="text" class="form-control" id="username_add" name="username" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nom :</label>
                                        <input type="text" class="form-control" id="nom_add" name="nom" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Localisation :</label>
                                        <input type="text" class="form-control" id="localisation_add" name="localisation" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Commentaire :</label>
                                        <input type="text" class="form-control" id="commentaire_add" name="commentaire" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="updateClient" tabindex="-1" aria-labelledby="updateClientLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('clients.update') }}">
                                @csrf
                                @method("put")
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateClientLabel">Modifier Client</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- <div class="form-group">
                                        <label class="form-label">Identifient :</label> -->
                                    <input type="hidden" class="form-control" id="username_update" name="username" />
                                    <!-- </div> -->
                                    <div class="form-group">
                                        <label class="form-label">Nom :</label>
                                        <input type="text" class="form-control" id="nom_update" name="nom" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Localisation :</label>
                                        <input type="text" class="form-control" id="localisation_update" name="localisation" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Commentaire :</label>
                                        <input type="text" class="form-control" id="commentaire_update" name="commentaire" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="deleteClient" tabindex="-1" aria-labelledby="deleteClientLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('clients.delete') }}">
                                @csrf
                                @method('delete')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteClientLabel">Supprimer Client</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" class="form-control" id="username_delete" name="username" />
                                    <p class="text-danger">Tu as sure à supprimer cette client ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="verrouillerClient" tabindex="-1" aria-labelledby="verrouillerClientLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('clients.update_verrouiller') }}">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="verrouillerClientLabel">Verrouiller Client</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" class="form-control" id="username_verrouiller" name="username" />
                                    <p class="text-warning">Tu as sure à <span id="verrouiller" class="fw-bold">bloquer</span> cette client ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-info">Sauvegarder</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="passwordClient" tabindex="-1" aria-labelledby="passwordClientLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('clients.update_password') }}">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="passwordClientLabel">Mot de passe Client</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" class="form-control" id="username_password" name="username" />
                                    <div class="form-group">
                                        <label class="form-label">Nouveau mot de passe :</label>
                                        <input type="text" class="form-control" id="password" name="password" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Confirmer mot de passe :</label>
                                        <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-info">Sauvegarder</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exportClient" tabindex="-1" aria-labelledby="exportClientLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exportClientLabel">Exporter les clients</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <button type="submit" name="pdf" id="pdf" class="btn btn-danger w-25"><i class="bi bi-file-pdf"></i> PDF</button>
                                        <button type="submit" name="excel" id="excel" class="btn btn-success w-25"><i class="bi bi-file-excel"></i> Excel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

                @include('layout.footer')
            </div>
        </div>
        <script src="{{ asset('/assets/js/core/jquery.min.js') }}" defer></script>
        <script src="{{ asset('/assets/js/core/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}" defer></script>
        <script src="{{ asset('/assets/js/now-ui-dashboard.min.js') }}" defer type="text/javascript"></script>

</body>

</html>