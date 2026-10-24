<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
    <style>
        body {
            overflow-y: hidden;
        }

        tbody tr:hover {
            font-weight: 700;
            color: brown;
        }
    </style>
    <script>
        setTimeout(function() {
            document.querySelector('.message').style.display = 'none';
        }, 1500);


        function Recherche(ip) {
            let val = ip.value;
            var x = new XMLHttpRequest();
            if (val === "")
                x.open("GET", `/Clients/search/`, true);
            else
                x.open("GET", `/Clients/search/${val}`, true);

            x.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    T_Objects = JSON.parse(this.responseText);

                    document.getElementById("resultats").innerHTML = "";

                    // alert(this.responseText);
                    // document.getElementById("resultats").innerHTML = JSON.parse(this.responseText);
                    for (const i in T_Objects) {
                        ligne = "<tr>";
                        ligne += `<td>${T_Objects[i].CIN}</td>`;
                        ligne += `<td>${T_Objects[i].Nom}</td>`;
                        ligne += `<td>${T_Objects[i].Prenom}</td>`;
                        ligne += `<td>${T_Objects[i].DateNaissance}</td>`;
                        ligne += `<td>${T_Objects[i].Nationalite}</td>`;
                        ligne += `<td>${T_Objects[i].Telephone}</td>`;
                        ligne += `<td>${T_Objects[i].Permis}</td>`;

                        ligne += `<td>  
                                        <form method="post" action="/Clients/${T_Objects[i].CIN}">
                                            @csrf
                                            @method("DELETE")
                                            <a href="/Clients/${T_Objects[i].CIN}">
                                                    <button type="button" class="btn text-info" style="font-size: 18px;height:30px;background:none;">
                                                            <i class="ti-pencil"></i>
                                                    </button>
                                            </a>
                                            <button type="submit" class="btn" style="font-size: 18px;height:30px;background:none;"><i class="ti-trash"></i></button>
                                        </form>
                                    </td>`;
                        ligne += "</tr>";

                        document.getElementById("resultats").innerHTML += ligne;

                    }

                }
            };
            x.send();
        }
    </script>
</head>

<body>

    <div class="wrapper">


        @extends('layouts.main-header')
        @section('title','Liste Clients')

        @include('layouts.main-sidebar')

        <div class="content-wrapper" style="margin-top: 60px;background-color:antiquewhite;">

            <div class="row m-2">


                <div class="col-4">
                    <div class="message">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if(session('delete'))
                        <div class="alert alert-dark">
                            {{ session('delete') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-5">
                    <div class="input-group">
                        <input type="text" name="search" id="search" class="form-control p-3 border" onkeyup="Recherche(this)" placeholder="Rechercher Par CIN, Nom ou Prenom ......" />
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                    <!-- <input type="text" name="search" id="search"  class="form-control p-3 border" style="border-radius:10px;" placeholder="Rechercher ......" /> -->
                </div>

                <div class="col-1"></div>
                <div class="col-1">
                    <a href="{{route('client.create')}}"><button class="btn btn-dark p-3 "><i class="ti-plus"></i> &nbsp;&nbsp;<b>Nouveau Client</b></button></a>
                </div>
            </div>

            <div>
                <table class="table table-bordered table-hover table-striped table-sm text-center table-light">
                    <thead style="font-size:larger;">
                        <tr>
                            <th>CIN </th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>DateNaissance</th>
                            <th>Nationalite</th>
                            <th>Telephone</th>
                            <th>Permis</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="" id="resultats">
                        @foreach($rows as $row)
                        <tr>
                            <td>{{$row->CIN}}</td>
                            <td>{{$row->Nom}}</td>
                            <td>{{$row->Prenom}}</td>
                            <td>{{$row->DateNaissance}}</td>
                            <td>{{$row->Nationalite}}</td>
                            <td>{{$row->Telephone}}</td>
                            <td>{{$row->Permis}}</td>
                            <td>

                                <form method="post" action="{{ route('client.destroy',$row->CIN) }}">
                                    @csrf
                                    @method("DELETE")
                                    <a href="{{ route('client.edit',$row->CIN)}}"><button type="button" class="btn text-info" style="font-size: 18px;height:30px;background:none;"><i class="ti-pencil"></i></button></a>
                                    <button type="submit" class="btn" style="font-size: 18px;height:30px;background:none;"><i class="ti-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pl-30" id="pagination">
                {{$rows->links()}}
            </div>
        </div>
    </div>
    </div>
    </div>


    @include('layouts.footer-scripts')

</body>

</html>