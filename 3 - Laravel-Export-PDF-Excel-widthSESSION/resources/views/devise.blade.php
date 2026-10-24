<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('/assets/css/now-ui-dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{ asset('/js/devise.js') }}"></script>
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
                                    <div class="col-md-4">

                                    </div>
                                    <div class="col-md-5 text-center ">
                                        <a href="#adddevise" data-bs-toggle="modal" class="btn btn-primary"><i class="bi bi-plus"></i> Nouveau</a>
                                        <a href="#exportdevise" data-bs-toggle="modal" class="btn btn-danger"><i class="bi bi-file-earmark-arrow-down"></i> Exporter</a>

                                        <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#myModal">
                                            Choisir une devise de base
                                        </button>

                                    </div>
                                </div>
                                <div class="row" style="margin: 0px 25px;">
                                    @if (session('success'))
                                    <div class="alert alert-info alert-dismissible fade show" role="alert" id="autoCloseAlert">

                                        {{ session('success') }}
                                        <button type="button" class="close btn btn-info" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="autoCloseAlert">

                                        {{ session('error') }}
                                        <button type="button" class="close btn btn-danger" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div>
                                        @endif



                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Select Symbol</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <select name="symbol" id="symbolSelect" class="form-select">
                                                            @foreach($symbols as $symbol)
                                                            <option value="{{ $symbol }}">{{ $symbol }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary" id="saveChangesBtn">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>










                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body" id="table_info">

                            <div class="table-responsive table-border">
                                <table class="table table-bordered  text-center">
                                    <thead class="">
                                        <tr>
                                            <th>Symbol</th>
                                            <th>Description</th>
                                            <th>Base ({{ $entreprise->base_devise }})</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id='resultats'>

                                        @if (count($devise) > 0)
                                        @foreach ($devise as $devise)
                                        <tr>
                                            <td>{{ $devise->symbol }}</td>
                                            <td>{{ $devise->description }}</td>
                                            <td>{{ $devise->base }} {{ $entreprise->base_devise }}</td>
                                            <td>
                                                <a class="btn btn-danger" href="#deletedevise" data-bs-toggle="modal" onclick="info('symbol_delete','{{ $devise->symbol }}')"><i class="bi bi-trash"></i></a>
                                                <a class="btn btn-warning" href="#updatedevise" data-bs-toggle="modal" onclick="info_update('{{ $devise->symbol }}','{{ $devise->description }}','{{ $devise->base }}')"><i class="bi bi-pencil"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="7" class="alert alert-danger text-center fw-bold p-3 text-light">
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
        <div class="modal fade" id="adddevise" tabindex="-1" aria-labelledby="adddeviseLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="{{ route('devise.add') }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="adddeviseLabel">Ajouter Devise</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Symbol :</label>
                                <input type="text" class="form-control" id="symbol_add" name="symbol" required />
                            </div>
                            <div class="form-group">
                                <label class="form-label">Description :</label>
                                <textarea name="description" id="description_add" cols="30" rows="10"></textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Base :</label>
                                <input type="text" class="form-control" id="base_add" name="base" />
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
        <div class="modal fade" id="updatedevise" tabindex="-1" aria-labelledby="updatedeviseLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form method="post" action="{{ route('devise.update') }}">


                        @csrf
                        @method('put')
                        <div class="modal-header">
                            <h5 class="modal-title" id="updatedeviseLabel">Modifier Devise</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- <div class="form-group">
                                        <label class="form-label">Symbol :</label> -->
                            <input type="text" class="form-control" id="symbol_update" name="symbol" />
                            <!-- </div> -->
                            <div class="form-group">
                                <label class="form-label">description :</label>
                                <textarea name="description" id="description_update" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Base :</label>
                                <input type="text" class="form-control" id="base_update" name="base" />
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
        <div class="modal fade" id="deletedevise" tabindex="-1" aria-labelledby="deletedeviseLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="{{ route('devise.delete') }}">
                        @csrf
                        @method('delete')
                        <div class="modal-header">
                            <h5 class="modal-title" id="deletedeviseLabel">Supprimer Devise</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="symbol_delete" name="symbol" />
                            <p class="text-danger">Tu as sure à supprimer cette Devise ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="exportdevise" tabindex="-1" aria-labelledby="exportdeviseLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exportdeviseLabel">Exporter les Devise</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <button type="submit" name="pdf" id="pdf" class="btn btn-danger w-25"><i class="bi bi-file-pdf"></i> PDF</button>
                                <button type="submit" name="excel" id="excel" class="btn btn-success w-25"><i class="bi bi-file-excel"></i>
                                    Excel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('symbolSelect').addEventListener('change', function() {
                var symbol = this.value;
                fetch('/update-base-devise', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            symbol: symbol
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        // Handle success or display a success message
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
            document.getElementById('saveChangesBtn').addEventListener('click', function() {
                location.reload();
            });
        </script>
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