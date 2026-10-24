<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Depose</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/now-ui-dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.css" rel="stylesheet">
    <script src="{{ asset('/assets/js/chart.min.js') }}"></script>
    <script>
        function Informations_Update(id, date, client, amount, commentaire) {
            // alert(type);
            let type = client;
            let inputs = document.getElementsByClassName("update");
            inputs[0].value = id;
            inputs[1].value = date;
            inputs[2].value = +amount;
            inputs[3].value = commentaire;
        }

        function Information_Delete(id) {
            document.getElementById("id_delete").value = id;
        }
        setTimeout(function() {
            document.querySelector('.message').style.display = 'none';
        }, 5000);

       
    </script>
    <style>
        .btn-calculatrice {
            width: 40px
        }

        /* Additional Styles for Responsive Table */
        @media (max-width: 576px) {
            .table-responsive {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                -ms-overflow-style: -ms-autohiding-scrollbar;
            }
        }

        input,
        select,
        textarea {
            background-color: white !important;
            border: 1px solid darkcyan !important;
        }

        .label {
            padding: 5px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight: bold;
        }

        th,
        td {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .nav-button {
            width: 33%;
            text-align: center;
            background-color: aliceblue;
            font-size: 17px !important;
            border-radius: 10px;
            /* box-shadow: 2px 2px 1px gray; */
            /* border-bottom: 3px solid black; */
        }

        @media (max-width: 576px) {
            .nav-button {
                width: 100%;
            }
        }
    </style>
</head>

<body class="user-profile">
    <div class="wrapper">
        @include('layout.sidebar')
        <div class="main-panel" id="main-panel">

            @include('layout.navbar')

            <div class="panel-header panel-header-sm"></div>
            <div class="content">
                <div style="margin-top: 50px;">
                    <div class="row">
                        <div class="col-md-8 text-center">
                            <h5 class="font-weight-bold">Gestion Opérations Avec M.{{$client->nom}}</h5>
                        </div>
                        <div class="col-md-4 message">
                            @if(session('success'))
                            <div class="alert alert-info text-light fw-bold">
                                {{ session('success') }}
                            </div>
                            @endif
                            @if(session('error'))
                            <div class="alert alert-danger text-light fw-bold">
                                {{ session('error') }}
                            </div>

                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 p-1">
                            <select class="form-control w-100 mr-2" onchange="ChangeRecharche(this)" id="collone_recherche">
                                <option value="choisir">Choisir Recherche</option>
                                <option value="date">Date Transfert</option>
                                <option value="expediteur">Expéditeur</option>
                                <option value="recepteur">Recepteur</option>
                                <option value="solde">Solde</option>
                            </select>
                        </div>
                        <div class="col-md-6 p-1">
                            <div id="normale_rechereche">
                                <input type="text" class="form-control" placeholder="Rechercher client" disabled id="input_recherche" onkeyup="find()" />
                            </div>
                            <div id="periode_rechereche" style="display:none;">
                                <input type="date" class="form-control w-50" placeholder="Rechercher client" id="date1" onchange="find()" />
                                <input type="date" class="form-control w-50" placeholder="Rechercher client" id="date2" onchange="find()" />
                            </div>
                            <div id="type_rechereche" style="display:none;" class="text-center pl-3">
                                <input type="radio" class="form-control-sm" name="type" value="toi" id="toi_find" onchange="find()" />&nbsp;&nbsp;
                                <label for="toi_find" class="mt-1">toi</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" class="form-control-sm" name="type" value="moi" id="moi_find" onchange="find()" />&nbsp;&nbsp;
                                <label for="moi_find" class="mt-1">moi</label>
                            </div>
                        </div>
                        <div class="col-md-4 p-1 text-center ">
                            <a href="#changeTypeDeviseModal" data-bs-toggle="modal"  class="btn btn-warning btn-circle" title="Modifier type" style="background: linear-gradient(to right, #FFA500, #FFD700);">
                                <i class="bi bi-arrow-clockwise"></i>
                                Devise ( {{$devise->symbol}} )
                            </a>
                            <a href="#addTransfertModal" data-bs-toggle="modal" class="btn btn-primary btn-circle" title="Ajouter" style="background: linear-gradient(to right, #001F3F, #0099FF);">
                                <i class="bi bi-moi"></i>
                                Nouvelle
                            </a>
                            <a href="#exportModal" data-bs-toggle="modal" class="btn btn-danger btn-circle" title="exporter">
                                <i class="bi bi-box-arrow-up"></i>
                                Exporter
                            </a>

                        </div>

                        <!-- Add this modal at the end of the body -->
                        <div id="exportModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Export Options</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Choose export format:</p>

                                        <div class="d-flex">

                                            <form action="../export/PDF/pdf/operation.php" method="get" class="w-50 text-center ">
                                                <button name="operation" class="btn btn-danger" value="1"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z" />
                                                    </svg> Export PDF</button>
                                            </form>

                                            <form action="../controller/excel.php" method="POST" class="w-50 text-center">
                                                <button name="export_operation" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-xlsx" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M14 4.5V11h-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM7.86 14.841a1.13 1.13 0 0 0 .401.823c.13.108.29.192.479.252.19.061.411.091.665.091.338 0 .624-.053.858-.158.237-.105.416-.252.54-.44a1.17 1.17 0 0 0 .187-.656c0-.224-.045-.41-.135-.56a1.002 1.002 0 0 0-.375-.357 2.028 2.028 0 0 0-.565-.21l-.621-.144a.97.97 0 0 1-.405-.176.37.37 0 0 1-.143-.299c0-.156.061-.284.184-.384.125-.101.296-.152.513-.152.143 0 .266.023.37.068a.624.624 0 0 1 .245.181.56.56 0 0 1 .12.258h.75a1.093 1.093 0 0 0-.199-.566 1.21 1.21 0 0 0-.5-.41 1.813 1.813 0 0 0-.78-.152c-.293 0-.552.05-.777.15-.224.099-.4.24-.527.421-.127.182-.19.395-.19.639 0 .201.04.376.123.524.082.149.199.27.351.367.153.095.332.167.54.213l.618.144c.207.049.36.113.462.193a.387.387 0 0 1 .153.326.512.512 0 0 1-.085.29.558.558 0 0 1-.255.193c-.111.047-.25.07-.413.07-.117 0-.224-.013-.32-.04a.837.837 0 0 1-.249-.115.578.578 0 0 1-.255-.384h-.764Zm-3.726-2.909h.893l-1.274 2.007 1.254 1.992h-.908l-.85-1.415h-.035l-.853 1.415H1.5l1.24-2.016-1.228-1.983h.931l.832 1.438h.036l.823-1.438Zm1.923 3.325h1.697v.674H5.266v-3.999h.791v3.325m7.636-3.325h.893l-1.274 2.007 1.254 1.992h-.908l-.85-1.415h-.035l-.853 1.415h-.861l1.24-2.016-1.228-1.983h.931l.832 1.438h.036l.823-1.438Z" />
                                                    </svg> Export Excel</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <nav class="navbar navbar-expand-lg  mt-2">
                            <div class="container-fluid">
                                <div class="navbar-nav" style="width: 100%;">
                                    <a href="{{ route('operation.index',[$client->username,$devise->symbol]) }}" class="nav-link m-1 nav-button text-info text-decoration-underline  fw-bold " type="button">Opérations avec client</a>
                                    <a href="{{ route('transfert.index',[$client->username,$devise->symbol]) }}" class="nav-link m-1 nav-button text-danger text-decoration-underline  fw-bold " type="button">Transfert entre les clients</a>
                                    <a href="{{ route('converts.index',[$client->username,$devise->symbol]) }}" class="nav-link m-1 nav-button text-primary text-decoration-underline  fw-bold " type="button">Convertir entre les devises</a>
                                </div>
                            </div>
                        </nav>
                        <div class=" container-fluid">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="text-dark" id="clientTable">
                                        <thead>
                                            <tr>
                                                <th colspan="2" class="text-center p-3 border-none"></th>
                                                <th colspan="1"><span id="statistique_total"></th>
                                                <th colspan="2"><span id="statistique_total p-3 border-none"></th>
                                            </tr>
                                            <tr>
                                                <th colspan="1" class="text-center">total depose : </th>
                                                <th colspan="1"><span id="statistique_total">-1000$</th>
                                                <th colspan="1"><span id="statistique_total"></th>
                                                <th colspan="1"><span id="statistique_total">total depose en bas :</th>
                                                <th colspan="1"><span id="statistique_total">+5000$</th>
                                            </tr>
                                            <tr>
                                              <th colspan="2" class="text-center p-3 border-none"></th>
                                              <th colspan="1"><span id="statistique_total"></th>
                                              <th colspan="2"><span id="statistique_total p-3 border-none"></th>
                                            </tr>
                                            <tr>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Sold</th>
                                                <th>Commentaire</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="informations">
                                            @if (count($deposes) > 0)
                                            @foreach ($deposes as $tr)
                                            <tr>
                                                <td>{{$tr->date_depose}}</td>
                                                <td>{{$tr->amount}}</td>
                                                <td>0</td>
                                                <td>{{$tr->commentaire}}</td>
                                                <td>
                                                    <a class="btn btn-danger" href="#deleteTransfertModal" data-bs-toggle="modal" onclick="Information_Delete('{{$tr->id}}')"><i class="bi bi-trash"></i></a>
                                                    <a class="btn btn-warning" href="#updateTransfertModal" data-bs-toggle="modal" onclick="Informations_Update('{{$tr->id}}','{{$tr->date_depose}}','{{$tr->client}}','{{$tr->amount}}','{{$tr->commentaire}}' )"><i class="bi bi-pencil"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="5">
                                                    <div class="alert fw-bold text-danger">Aucun Convertir a cette client avec cette devise !</div>
                                                </td>
                                            </tr>

                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="addTransfertModal" tabindex="-1" aria-labelledby="addTransfertModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('deposes.add') }}">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addTransfertModalLabel">Ajouter Depose</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="devise" value="{{ $devise->symbol }}" />
                                        <input type="hidden" name="client" id="client" value="{{$client->username}}">
                                        <div class="form-group">
                                            <label class="label">Date de Depose :</label>
                                            <input type="date" name="date_depose" id="date_depose" class="form-control" value="{{ date('Y-m-d') }}" />
                                        </div>
                                        <div class="form-group">
                                            <label class="label">Amount :</label>
                                            <input type="text" pattern="\d+(\.\d+)?" title="Entrez un nombre entier ou un nombre flottant (utilisez '.' comme séparateur décimal)" name="amount" value="0" id="amount" class="form-control" />
                                        </div>
                                         <div class="form-group">
                                            <label class="label">Commentaire :</label>
                                            <textarea name="commentaire" id="commentaire" rows="3" class="form-control"></textarea>
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

                    <div id="updateTransfertModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('deposes.update') }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h4 class="modal-title">Modifier Depose :</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class=" modal-body">
                                        <input type="hidden" name="client" value="{{ $client->username }}" />
                                        <input type="hidden" name="devise" value="{{ $devise->symbol }}" />
                                        <input type="hidden" name="id" id="id_update" class="form-control update" />
                                        <div class="form-group">
                                            <label class="label">Date d'Depose :</label>
                                            <input type="date" name="date_depose" id="date_update" class="form-control update" />
                                        </div>
                                      
                                    <div class="form-group">
                                        <label class="label">Amount :</label>
                                        <input type="text" pattern="\d+(\.\d+)?" min="1" class="form-control update" title="Entrez un nombre entier ou un nombre flottant (utilisez '.' comme séparateur décimal)" name="amount" id="amount" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="label">Commentaire :</label>
                                        <textarea name="commentaire" id="commentaire" class="form-control update" rows="3" class="form-control"></textarea>
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
                <div class="modal fade" id="deleteTransfertModal" tabindex="-1" aria-labelledby="deleteTransfertModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('deposes.delete') }}">
                                @csrf
                                @method('delete')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteTransfertModalLabel">Supprimer Opération</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="client_principale" value="{{ $client->username }}" />
                                    <input type="hidden" name="devise" value="{{ $devise->symbol }}" />
                                    <input type="hidden" class="form-control" id="id_delete" name="transfert">
                                    <p>Êtes-vous sûr de vouloir supprimer cette opération?</p>
                                    <p class="text-warning"><small>Cette action ne peut pas être annulée.</small></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="changeTypeDeviseModal" tabindex="-1" aria-labelledby="changeTypeDeviseModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('clients.operation') }}">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">Choisir Devise</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" class="form-control" id="client" name="client" value="{{$client->username}}">
                                    <input type="hidden" class="form-control" id="page" name="page" value="deposes">

                                    @if(count($devises) > 1)
                                    <div class="form-group">
                                        <label>Type Devise</label>
                                        <select class="form-control" name="typedevise" id="typedevise">
                                            @foreach($devises as $dv)
                                            @if($dv->symbol != $devise->symbol)
                                            <option value="{{$dv->symbol}}">{{$dv->symbol}}</option>
                                            @endif
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
                                    @if(count($devises) > 1)
                                    <button type="submit" class="btn btn-warning">Change</button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    @include('layout.footer')

    <script src="{{ asset('/assets/js/core/jquery.min.js') }}" defer></script>
    <script src="{{ asset('/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}" defer></script>
    <script src="{{ asset('/assets/js/now-ui-dashboard.min.js') }}" defer></script>

</body>

</html>