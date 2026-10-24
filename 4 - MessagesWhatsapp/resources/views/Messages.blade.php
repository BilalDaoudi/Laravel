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
        tbody tr:hover {
            font-weight: 700;
            color: brown;
        }
    </style>
    <script>
        setTimeout(function() {
            document.querySelector('.message').style.display = 'none';
        }, 5000);



        function Recherche(ip) {
            let val = ip.value;
            var x = new XMLHttpRequest();
            if (val === "")
                x.open("GET", `/Messages/search/`, true);
            else
                x.open("GET", `/Messages/search/${val}`, true);
            x.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    T_Objects = JSON.parse(this.responseText);
                    document.getElementById("resultats").innerHTML = "";
                    for (const i in T_Objects) {
                        ligne = "<tr>";
                        ligne += `<td>${T_Objects[i].id}</td>`;
                        ligne += `<td>${T_Objects[i].description}</td>`;
                        ligne += `<td>  
                                        <form method="post" action="/Messages/${T_Objects[i].id}">
                                            @csrf
                                            @method("DELETE")
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
        @section('title','Les Messages')

        @include('layouts.main-sidebar')

        <div class="content-wrapper" style="margin-top:45px;background-color:antiquewhite;">

            <div class="row">
                <div class="col-4">
                    <div style="height: 60px;" class="m-1">
                        <div class="message">
                            @if(session('success'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                {{ session('success') }}
                            </div>

                            @endif
                            @if(session('delete'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                {{ session('delete') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div>
                        <form action="{{ route('message.add')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="description">Description de Message : </label>
                                <textarea rows="8" cols="45" name="description" id="description" class="form-control" style="background-color:white; border-radius: 10px;"></textarea>
                            </div>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group text-right">
                                <input type="submit" value="Ajouter" class="btn btn-dark" />
                            </div>
                        </form>

                    </div>

                </div>
                <div class="col-8">
                    <div class="input-group mb-3">
                        <input type="text" name="search" id="search" class="form-control p-3 border" onkeyup="Recherche(this)" placeholder="Rechercher ..." />
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                    </div>

                    <div style="height: 450px;">
                        <table class="table table-bordered table-hover table-striped table-sm text-center table-light">
                            <thead style="font-size:larger;">
                                <tr>
                                    <th># </th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="" id="resultats">
                                @foreach($rows as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->description}}</td>
                                    <td>

                                        <form method="post" action="{{route('message.delete',$row->id)}}">
                                            @csrf
                                            @method("DELETE")
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
    </div>
    </div>


    @include('layouts.footer-scripts')

</body>

</html>