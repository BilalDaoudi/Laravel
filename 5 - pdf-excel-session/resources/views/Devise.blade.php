<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('/assets/css/now-ui-dashboard.css') }}">
    <script src="{{ asset('/js/Devise.js') }}"></script>
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
                                    <div class="col-md-3 h5 card-title text-center" style="color: blueviolet; "> Les
                                        Devise</div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" style="border:1px solid gray"
                                                placeholder="Rechercher..." onkeyup="rechercher(this)">
                                            <!-- <span class="input-group-text"  style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;background-color: white;">
                                                <i class="bi bi-search"></i>
                                            </span> -->
                                        </div>
                                    </div>
                                    <div class="col-md-3 text-center ">
                                        <a href="#addDevise" data-bs-toggle="modal" class="btn btn-primary"><i
                                                class="bi bi-plus"></i> Nouveau</a>
                                        <!-- <a href="#exportDevise" data-bs-toggle="modal" class="btn btn-danger"><i
                                                class="bi bi-file-earmark-arrow-down"></i> Exporter</a> -->
                                    </div>
                                </div>
                                <div class="row" style="margin: 0px 25px;">
                                    @if (session('success'))
                                        <div class="alert alert-info alert-dismissible fade show" role="alert"
                                            id="autoCloseAlert">

                                            {{ session('success') }}
                                            <button type="button" class="close btn btn-info" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    @if (session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                            id="autoCloseAlert">

                                            {{ session('error') }}
                                            <button type="button" class="close btn btn-danger" data-dismiss="alert"
                                                aria-label="Close">
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
                                                    <th>Symbole</th>
                                                    <th>Description</th>
                                                    <th>Base</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id='resultats'>

                                                @if (count($Devise) > 0)
                                                    @foreach ($Devise as $Devise)
                                                        <tr>
                                                            <td>{{ $Devise->Symbole }}</td>
                                                            <td>{{ $Devise->Description }}</td>

                                                            <td>-</td>
                                                            <td>

                                                                <a class="btn btn-danger" href="#deleteDevise"
                                                                    data-bs-toggle="modal"
                                                                    onclick="info('Symbole_delete','{{ $Devise->Symbole }}')"><i
                                                                        class="bi bi-trash"></i></a>
                                                                <a class="btn btn-warning" href="#updateDevise"
                                                                    data-bs-toggle="modal"
                                                                    onclick="info_update('{{ $Devise->Symbole }}','{{ $Devise->Description }}')"><i
                                                                        class="bi bi-pencil"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="7"
                                                            class="alert alert-danger text-center fw-bold p-3 text-light">
                                                            N'est aucun Devise</td>
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
                <div class="modal fade" id="addDevise" tabindex="-1" aria-labelledby="addDeviseLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('Devise.add') }}">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addDeviseLabel">Ajouter Devise</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="form-label">Symbole :</label>
                                        <input type="text" class="form-control" id="Symbole_add" name="Symbole"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Description :</label>
                                        <textarea name="Description" class="form-control" id="Description_add" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="updateDevise" tabindex="-1" aria-labelledby="updateDeviseLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('Devise.update') }}">
                                @csrf
                                @method('put')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateDeviseLabel">Modifier Devise</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- <div class="form-group">
                                        <label class="form-label">Symbole :</label> -->
                                    <input type="hidden" class="form-control" id="Symbole_update" name="Symbole" />
                                    <!-- </div> -->
                                    <div class="form-group">
                                        <label class="form-label">Description :</label>
                                        <textarea name="Description" class="form-control" id="Description_update" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="deleteDevise" tabindex="-1" aria-labelledby="deleteDeviseLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('Devise.delete') }}">
                                @csrf
                                @method('delete')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteDeviseLabel">Supprimer Devise</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" class="form-control" id="Symbole_delete" name="Symbole" />
                                    <p class="text-danger">Tu as sure à supprimer cette Devise ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="verrouillerDevise" tabindex="-1"
                    aria-labelledby="verrouillerDeviseLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('Devise.update_verrouiller') }}">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="verrouillerDeviseLabel">Verrouiller Devise</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" class="form-control" id="Symbole_verrouiller"
                                        name="Symbole" />
                                    <p class="text-warning">Tu as sure à <span id="verrouiller"
                                            class="fw-bold">bloquer</span> cette Devise ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-info">Sauvegarder</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="passwordDevise" tabindex="-1" aria-labelledby="passwordDeviseLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        
                        <div class="modal fade" id="exportDevise" tabindex="-1" aria-labelledby="exportDeviseLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST" action="">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exportDeviseLabel">Exporter les Devise</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <button type="submit" name="pdf" id="pdf"
                                                    class="btn btn-danger w-25"><i class="bi bi-file-pdf"></i>
                                                    PDF</button>
                                                <button type="submit" name="excel" id="excel"
                                                    class="btn btn-success w-25"><i class="bi bi-file-excel"></i>
                                                    Excel</button>
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
