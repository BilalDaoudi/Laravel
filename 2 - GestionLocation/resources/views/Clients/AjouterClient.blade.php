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
    </style>
</head>

<body>

    <div class="wrapper">


        @extends('layouts.main-header')
        @section('title','Ajouter Client')

        @include('layouts.main-sidebar')

        <div class="content-wrapper" style="margin-top: 50px;background-color:antiquewhite;">

            <form method="post" action="{{ route('client.store') }}">
                @csrf
                <div class="row p-40">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="CIN" class="pl-10"><b>CIN :</b></label>
                            <input type="text" class="form-control" id="CIN" name="CIN" value="{{ old('CIN') }}" style="border:1px solid aqua; border-radius:5px;">
                            <p class="text-danger">
                                @error('CIN')
                                {{$message}}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="Nom" class="pl-10"><b>Nom :</b></label>
                            <input type="text" class="form-control" id="Nom" name="Nom" value="{{ old('Nom') }}" style="border:1px solid aqua; border-radius:5px;">
                            <p class="text-danger">
                                @error('Nom')
                                {{$message}}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="Prenom" class="pl-10"><b>Prénom :</b></label>
                            <input type="text" class="form-control" id="Prenom" name="Prenom" value="{{ old('Prenom') }}" style="border:1px solid aqua; border-radius:5px;">
                            <p class="text-danger">
                                @error('Prenom')
                                {{$message}}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="DateNaissance" class="pl-10"><b>Date de naissance :</b></label>
                            <input type="date" class="form-control" id="DateNaissance" name="DateNaissance" value="{{ old('DateNaissance') }}" style="border:1px solid aqua; border-radius:5px;">
                            <p class="text-danger">
                                @error('DateNaissance')
                                {{$message}}
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Nationalite" class="pl-10"><b>Nationalité :</b></label>
                            <input type="text" class="form-control" id="Nationalite" name="Nationalite" value="{{ old('Nationalite') }}" style="border:1px solid aqua; border-radius:5px;">
                            <p class="text-danger">
                                @error('Nationalite')
                                {{$message}}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="Telephone" class="pl-10"><b>Téléphone :</b></label>
                            <input type="tel" class="form-control" id="Telephone" name="Telephone" value="{{ old('Telephone') }}" style="border:1px solid aqua; border-radius:5px;">
                            <p class="text-danger">
                                @error('Telephone')
                                {{$message}}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="Permis" class="pl-10"><b>Permis :</b></label>
                            <input type="text" class="form-control" id="Permis" name="Permis" value="{{ old('Permis') }}" style="border:1px solid aqua; border-radius:5px;">
                            <p class="text-danger">
                                @error('Permis')
                                {{$message}}
                                @enderror
                            </p>
                        </div>
                        <div style="padding:32px 140px">
                            <input type="submit" class="btn btn-primary" value='Enregitre' style="width:100px;height:48px">
                            <input type="reset" class="btn btn-primary" value='Vider' style="width:80px;height:48px">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>


    @include('layouts.footer-scripts')

</body>

</html>