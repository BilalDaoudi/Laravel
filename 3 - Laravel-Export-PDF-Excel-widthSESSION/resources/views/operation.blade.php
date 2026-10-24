<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Opération</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/now-ui-dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.css" rel="stylesheet">
    <script src="{{ asset('/assets/js/chart.min.js') }}"></script>
    <script>
        

        // function checkDates() {
        //     var date1 = document.getElementById('date1').value;
        //     var date2 = document.getElementById('date2').value;

        //     if (date1 && date2) {
        //         if (date1 > date2) {
        //             document.getElementById('date1').value = date2;
        //         }
        //     }
        // }

        // function ChangeRecharche(select, client, devise) {
        //     let val = select.value;
        //     let periode_rechereche = document.getElementById("periode_rechereche");
        //     let normale_rechereche = document.getElementById("normale_rechereche");
        //     let type_rechereche = document.getElementById("type_rechereche");
        //     let input = document.getElementById("input_recherche");
        //     input.value = "";
        //     normale_rechereche.style.display = "block";
        //     periode_rechereche.style.display = "none";
        //     type_rechereche.style.display = "none";
        //     find(client, devise)
        //     if (val !== "choisir") {
        //         input.readonly = false
        //         switch (val) {
        //             case "date":
        //                 normale_rechereche.style.display = "none";
        //                 periode_rechereche.style.display = "flex";
        //                 break;
        //             case "commentaire":
        //                 input.type = "text";
        //                 input.placeholder = "Tapez le commentaire à rechercher";
        //                 break;
        //             case "type":
        //                 normale_rechereche.style.display = "none";
        //                 type_rechereche.style.display = "flex";
        //                 break;
        //             case "prix":
        //                 input.type = "number";
        //                 input.placeholder = "Tapez le prix à rechercher";
        //                 break;
        //             case "quantite":
        //                 input.type = "number";
        //                 input.placeholder = "Tapez le quantité à rechercher";
        //                 break;
        //             case "ville":
        //                 input.type = "text";
        //                 input.placeholder = "Tapez la ville à rechercher";
        //                 break;
        //         }
        //         input.disabled = false
        //     } else {
        //         input.placeholder = "Rechercher";
        //         input.value = "";
        //         input.disabled = true
        //         find(client, devise)
        //     }
        // }

        // function find(client, devise) {
        //     const collone_recherche = document.getElementById('collone_recherche');
        //     var x = new XMLHttpRequest()
        //     let url = `../controller/operationclient.php?client=${client}&typedevise=${devise}&`;
        //     if (collone_recherche.value == "date") {
        //         checkDates()
        //         const datedebut = document.getElementById("date1").value;
        //         const datefin = document.getElementById("date2").value;
        //         x.open('GET', url + `{devise}&datedebut=${datedebut}&datefin=${datefin}`, true);
        //         x.onreadystatechange = function() {
        //             if (this.readyState == 4 && this.status == 200) {
        //                 data = JSON.parse(this.responseText)
        //                 document.getElementById("informations").innerHTML = data.data
        //                 document.getElementById("statistique_toi").innerHTML = data.toi
        //                 document.getElementById("statistique_moi").innerHTML = data.moi
        //                 document.getElementById("statistique_total").innerHTML = data.total
        //                 myPieChart.data.labels = [data.graphique[0][0] + " moi (" + data.graphique[0][1] + ")",
        //                         data.graphique[1][0] + " toi (" + data.graphique[1][1] + ")"
        //                     ],
        //                     myPieChart.data.datasets = [{
        //                         data: [data.graphique[0][0], data.graphique[1][0]],
        //                         backgroundColor: ['green', 'red']
        //                     }];
        //                 myPieChart.update();
        //             }
        //         }

        //     } else {
        //         let val = "";
        //         if (collone_recherche.value == "type") {
        //             if (document.getElementById("toi_find").checked == true)
        //                 val = "toi";
        //             else if (document.getElementById("moi_find").checked == true)
        //                 val = "moi";
        //             else
        //                 val = "";
        //         } else
        //             val = document.getElementById("input_recherche").value;

        //         x.open('GET', url + `{devise}&col=${collone_recherche.value}&find=${val}`, true);
        //         x.onreadystatechange = function() {
        //             if (this.readyState == 4 && this.status == 200) {
        //                 data = JSON.parse(this.responseText)
        //                 document.getElementById("informations").innerHTML = data.data
        //                 document.getElementById("statistique_toi").innerHTML = data.toi
        //                 document.getElementById("statistique_moi").innerHTML = data.moi
        //                 document.getElementById("statistique_total").innerHTML = data.total
        //                 myPieChart.data.labels = [data.graphique[0][0] + " moi",
        //                         data.graphique[1][0] + " toi"
        //                     ],
        //                     myPieChart.data.datasets = [{
        //                         data: [data.graphique[0][0], data.graphique[1][0]],
        //                         backgroundColor: ['green', 'red'],
        //                         borderColor: 'black',
        //                         borderWidth: 1
        //                     }];
        //                 myPieChart.update();
        //             }
        //         }
        //     }
        //     x.send();
        // }


        function Informations_Update(id, date, ville, quantite, prix, type, commentaire, total, porcentage) {
            // alert(type);
            let inputs = document.getElementsByClassName("update");
            inputs[0].value = id;
            inputs[1].value = date;
            inputs[2].value = ville;
            inputs[3].value = quantite;
            inputs[4].value = prix;
            inputs[5].value = total;
            inputs[6].value = porcentage.slice(0, 1);
            inputs[7].value = porcentage.slice(1);
            inputs[8].value = commentaire;
            document.getElementById(type + "_update").checked = true;
        }

        function Information_Delete(id) {
            document.getElementById("id_delete").value = id;
        }
        setTimeout(function() {
            document.querySelector('.message').style.display = 'none';
        }, 5000);


        function appendValue(value, idinput) {
            document.getElementById(idinput).value += value;
        }

        function clearDisplay(idinput) {
            document.getElementById(idinput).value = "";
        }

        function CalculePrixQuantite(Quantite, Prix, Operation1, Operation2, Porcentage, Total) {
            let quantite = document.getElementById(Quantite);
            let prix = document.getElementById(Prix);
            let operation1 = document.getElementById(Operation1);
            let operation2 = document.getElementById(Operation2);
            let porcentage = document.getElementById(Porcentage);
            let total = document.getElementById(Total);

            let som = 0;
            if (quantite.value != "" && prix.value != "")
                som = eval(quantite.value + operation1.value + prix.value);
            else
                som = 0;

            total.value = eval(som + operation2.value + som + "*" + porcentage.value + "/100")
        }
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
            background-color:aliceblue;
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
                                <option value="date">Date d'opération</option>
                                <option value="commentaire">Commentaire</option>
                                <option value="type">Type Opération</option>
                                <option value="prix">Prix</option>
                                <option value="quantite">Quantité</option>
                                <option value="ville">Ville</option>
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
                            <a href="#addOperationModal" data-bs-toggle="modal" class="btn btn-primary btn-circle" title="Ajouter" style="background: linear-gradient(to right, #001F3F, #0099FF);">
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
                                    <a href="{{ route('transfert.index',[$client->username,$devise->symbol]) }}" class="nav-link m-1 nav-button text-info text-decoration-underline  fw-bold " type="button">Transfert entre les clients</a>
                                    <a href="{{ route('converts.index',[$client->username,$devise->symbol]) }}" class="nav-link m-1 nav-button text-danger text-decoration-underline  fw-bold " type="button">Convertir entre les devises</a>
                                    <a href="{{ route('deposes.index',[$client->username,$devise->symbol]) }}" class="nav-link m-1 nav-button text-primary text-decoration-underline  fw-bold " type="button">Déposer en Stock</a>
                                </div>
                            </div>
                        </nav>
                        <div class=" container-fluid">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="text-dark" id="clientTable">
                                        <thead>
                                            <tr>
                                                <th colspan="2">toi</th>
                                                <th colspan="3">- <span id="statistique_toi">0</th>
                                                <th rowspan="3" colspan="3" width="25%" id="graphique">
                                                    <canvas id="pieChart"></canvas>
                                                    <script>
                                                        var data = {
                                                            labels: [
                                                                20 + " moi",
                                                                50 + " toi"
                                                            ],
                                                            datasets: [{
                                                                data: [20, 50],
                                                                backgroundColor: ['green', 'red'],
                                                                borderColor: 'black',
                                                                borderWidth: 1
                                                            }]
                                                        };
                                                        var options = {
                                                            responsive: true
                                                        };
                                                        var ctx = document.getElementById('pieChart').getContext('2d');
                                                        var myPieChart = new Chart(ctx, {
                                                            type: 'pie',
                                                            data: data,
                                                            options: options
                                                        });
                                                    </script>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="2">moi</th>
                                                <th colspan="3">+ <span id="statistique_moi">0</th>
                                            </tr>
                                            <tr>
                                                <th colspan="2">Total</th>
                                                <th colspan="3"><span id="statistique_total">0</th>

                                            </tr>
                                            <tr>
                                                <th>Date</th>
                                                <th>Ville</th>
                                                <th>Quantité</th>
                                                <th>Prix</th>
                                                <th>Commentaire</th>
                                                <th>%</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="informations">
                                            @if (count($operations) > 0)
                                            @foreach ($operations as $op)
                                            @if ($op->type_operation == 'moi' )
                                            <tr style="background-color: rgba(0, 128, 0, 0.7);">
                                                @else
                                            <tr style="background-color: rgba(255, 0, 0, 0.8);">
                                                @endif
                                                <td>{{$op->date}}</td>
                                                <td>{{$op->ville}}</td>
                                                <td>{{$op->quantity}}</td>
                                                <td>{{$op->prix}}</td>
                                                <td>{{$op->comments}}</td>
                                                <td>{{$op->percentage}}</td>
                                                <td>{{number_format($op->total, 2)}}</td>
                                                <td>
                                                    <a class="btn btn-danger" href="#deleteOperationModal" data-bs-toggle="modal" onclick="Information_Delete('{{$op->id}}')"><i class="bi bi-trash"></i></a>
                                                    <a class="btn btn-warning" href="#updateOperationModal" data-bs-toggle="modal" onclick="Informations_Update('{{$op->id}}','{{$op->date}}','{{$op->ville}}','{{$op->quantity}}','{{$op->prix}}','{{$op->type_operation}}','{{$op->comments}}','{{$op->total}}','{{$op->percentage}}')"><i class="bi bi-pencil"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="8">
                                                    <div class="alert fw-bold text-danger">Aucun Opération a cette client avec cette devise !</div>
                                                </td>
                                            </tr>

                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="addOperationModal" tabindex="-1" aria-labelledby="addOperationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('operation.add') }}">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addOperationModalLabel">Ajouter Opération</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="client" value="{{ $client->username }}" />
                                        <input type="hidden" name="devise" value="{{ $devise->symbol }}" />
                                        <div class="form-group">
                                            <label class="label">Date d'opération :</label>
                                            <input type="date" name="date" id="date" class="form-control" value="{{ date('Y-m-d') }}" />
                                        </div>
                                        <div class="form-group">
                                            <label class="label">Localisation :</label>
                                            <input type="text" name="ville" id="ville" class="form-control" list="data_ville" />
                                            <datalist id="data_ville">
                                                <!-- ville de database -->
                                            </datalist>
                                        </div>
                                        <div class="form-group">
                                            <label class="label">Quantité :</label>
                                            <input type="text" pattern="\d+(\.\d+)?" title="Entrez un nombre entier ou un nombre flottant (utilisez '.' comme séparateur décimal)" name="quantite" value="0" id="quantite" class="form-control" onchange="CalculePrixQuantite('quantite','prix','operation1add','operation2add','porcentage','total')" />
                                        </div>

                                        <div class="form-group">
                                            <label class="label">Prix :</label>
                                            <div class="d-flex">
                                                <select class="form-control w-25" id="operation1add" onchange="CalculePrixQuantite('quantite','prix','operation1add','operation2add','porcentage','total')">
                                                    <option value="+">+</option>
                                                    <option value="-">-</option>
                                                    <option value="*">x</option>
                                                    <option value="/">/</option>
                                                </select>
                                                <input type="text" pattern="\d+(\.\d+)?" title="Entrez un nombre entier ou un nombre flottant (utilisez '.' comme séparateur décimal)" name="prix" id="prix" value="0" class="form-control" onchange="CalculePrixQuantite('quantite','prix','operation1add','operation2add','porcentage','total')" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="label">Total :</label>
                                            <div class="d-flex">
                                                <input type="number" name="total" readonly value="0" id="total" class="form-control" style="width:60%" />
                                                <select class="form-control" style="width:15%" id="operation2add" name="operation2add" onchange="CalculePrixQuantite('quantite','prix','operation1add','operation2add','porcentage','total')">
                                                    <option value="+">+</option>
                                                    <option value="-">-</option>
                                                    <option value="*">x</option>
                                                    <option value="/">/</option>
                                                </select>
                                                <input type="text" pattern="\d+(\.\d+)?" title="Entrez un nombre entier ou un nombre flottant (utilisez '.' comme séparateur décimal)" name="porcentage" value="0" id="porcentage" class="form-control" style="width:15%" onchange="CalculePrixQuantite('quantite','prix','operation1add','operation2add','porcentage','total')" />
                                                <span style="width:10%;padding:5px">%</span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="label">Type d'opération :</label>
                                            <span class="d-flex pl-5">
                                                <input type="radio" class="form-control-sm" name="type" value="moi" id="moi" checked />&nbsp;&nbsp;
                                                <label for="moi" class="mt-1">moi</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" class="form-control-sm" name="type" value="toi" id="toi" />&nbsp;&nbsp;
                                                <label for="toi" class="mt-1">toi</label>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label class="label">Commentaire :</label>
                                            <textarea name="commentaire" id="commentaire" cols="3" class="form-control"></textarea>
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

                    <div id="updateOperationModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('operation.update') }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h4 class="modal-title">Modifier Opération :</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class=" modal-body">
                                        <input type="hidden" name="client" value="{{ $client->username }}" />
                                        <input type="hidden" name="devise" value="{{ $devise->symbol }}" />
                                        <input type="hidden" name="id" id="id_update" class="form-control update" />
                                        <div class="form-group">
                                            <label class="label">Date d'opération :</label>
                                            <input type="date" name="date" id="date_update" class="form-control update" />
                                        </div>
                                        <div class="form-group">
                                            <label class="label">Localisation :</label>
                                            <input type="text" name="ville" id="ville_update" class="form-control update" list="data_ville" />
                                        </div>
                                        <div class="form-group">
                                            <label class="label">Quantité :</label>
                                            <input type="text" pattern="\d+(\.\d+)?" title="Entrez un nombre entier ou un nombre flottant (utilisez '.' comme séparateur décimal)" name="quantite" id="quantite_update" class="form-control update" onchange="CalculePrixQuantite('quantite_update','prix_update','operation1update','operation2update','porcentage_update','total_update')" />
                                        </div>


                                        <div class="form-group">
                                            <label class="label">Prix :</label>
                                            <div class="d-flex">
                                                <select class="form-control w-25" id="operation1update" onchange="CalculePrixQuantite('quantite_update','prix_update','operation1update','operation2update','porcentage_update','total_update')">
                                                    <option value="+">+</option>
                                                    <option value="-">-</option>
                                                    <option value="*">x</option>
                                                    <option value="/">/</option>
                                                </select>
                                                <input type="text" pattern="\d+(\.\d+)?" title="Entrez un nombre entier ou un nombre flottant (utilisez '.' comme séparateur décimal)" name="prix" id="prix_update" class="form-control w-75 update" onchange="CalculePrixQuantite('quantite_update','prix_update','operation1update','operation2update','porcentage_update','total_update')" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="label">Total :</label>

                                            <div class="d-flex">
                                                <input type="number" name="total" id="total_update" style="width:60%" readonly class="form-control update" pattern="\d+(\.\d+)?" title="Entrez un nombre entier ou un nombre flottant (utilisez '.' comme séparateur décimal)" />
                                                <select class="form-control update" style="width:15%" id="operation2update" name="operation2update" onchange="CalculePrixQuantite('quantite_update','prix_update','operation1update','operation2update','porcentage_update','total_update')">
                                                    <option value="+">+</option>
                                                    <option value="-">-</option>
                                                    <option value="*">x</option>
                                                    <option value="/">/</option>
                                                </select>
                                                <input type="text" pattern="\d+(\.\d+)?" title="Entrez un nombre entier ou un nombre flottant (utilisez '.' comme séparateur décimal)" name="porcentage" value="0" id="porcentage_update" class="form-control update" style="width:15%" onchange="CalculePrixQuantite('quantite_update','prix_update','operation1update','operation2update','porcentage_update','total_update')" />
                                                <span style="width:10%;padding:5px">%</span>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <label class="label">Type d'opération :</label>
                                            <span class="d-flex pl-5">
                                                <input type="radio" class="form-control-sm" name="type" value="toi" id="toi_update" />&nbsp;&nbsp;
                                                <label for="toi_update" class="mt-1">toi</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" class="form-control-sm" name="type" value="moi" id="moi_update" />&nbsp;&nbsp;
                                                <label for="moi_update" class="mt-1">moi</label>
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label class="label">Commentaire :</label>
                                            <textarea name="commentaire" id="commentaire_update" cols="3" class="form-control update"></textarea>
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
                    <div class="modal fade" id="deleteOperationModal" tabindex="-1" aria-labelledby="deleteOperationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('operation.delete') }}">
                                    @csrf
                                    @method('delete')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteOperationModalLabel">Supprimer Opération</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="client" value="{{ $client->username }}" />
                                        <input type="hidden" name="devise" value="{{ $devise->symbol }}" />
                                        <input type="hidden" class="form-control" id="id_delete" name="operation">
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
                                        <input type="hidden" class="form-control" id="page" name="page" value="operation">

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