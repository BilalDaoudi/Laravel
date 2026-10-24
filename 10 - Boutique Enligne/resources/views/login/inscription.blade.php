@extends('layouts.app')
@section('content')

<div style="margin-left: 60px;margin-right: 60px;margin-top: 20px;">

<div class="row">
    <div class="col-6">

        <form action="" method="post">
            @csrf
            <div class="form-group text-center">
                
                <h2>Créer un Compte</h2>

            </div>
            <div class="form-group m-3">
                <label class="form-label">Name : </label>
                <input type="text" class="form-control" name="name" />
                <p class="text-danger">
                    @error('name')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="form-group m-3">
                <label class="form-label">Email : </label>
                <input type="text" class="form-control" name="email" />
                <p class="text-danger">
                    @error('email')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="form-group m-3">
                <label class="form-label">Password : </label>
                <input type="password" class="form-control" name="password" />
                <p class="text-danger">
                    @error('password')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="form-group m-3">
                <label class="form-label">Confirmer Password : </label>
                <input type="password" class="form-control" name="password_confirmation" />
                <p class="text-danger">
                    @error('password_confirmation')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="form-group m-3">
                <button class="btn btn-primary w-100">Créer</button>

            </div>


        </form>
    </div>

    <div class="col-6" style="padding-left:80px;padding-top:50px">

        <img src="logo.jpg" class="w-75 logo">
    </div>

</div>

</div>


@endsection