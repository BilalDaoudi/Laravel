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

</head>

<body>

    <div class="wrapper">


        @extends('layouts.main-header')
        @section('title','Modifier le destinataire')

        @include('layouts.main-sidebar')

        <div class="content-wrapper" style="margin-top:45px;background-color:antiquewhite;">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="m-4">

                        <div class="h1 text-center mb-5">
                            #{{$row->id}}

                        </div>
                        <form action="{{ route('destinataire.update',$row->id)}}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label class="form-label" for="nom">Nom : </label>
                                <input type="text" name="nom" id="nom" class="form-control" value="{{old('nom',$row->nom)}}" style="background-color:white; border-radius: 10px;" />
                            </div>
                            @error('nom')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label class="form-label" for="telephone">Téléphone : </label>
                                <input type="text" name="telephone" id="telephone" class="form-control" value="{{old('telephone',$row->numerotelephone)}}" style="background-color:white; border-radius: 10px;" />
                            </div>
                            @error('telephone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group text-center">
                                <input type="submit" value="Sauvgarder" class="btn btn-dark mt-3" />
                            </div>
                        </form>
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