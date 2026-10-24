@extends('layouts.app')
@section('content')

<div style="margin-left: 60px;margin-right: 60px;margin-top: 20px;">

<div class="row">
    <div class="col-6 p-3">
        <form action="" method="post">
            @csrf
            <div class="form-group text-center">
                <h2>Bienvenue</h2>
            </div>
            <div class="form-group mt-5 m-3">
                <label class="form-label text-secondary fw-bold">Email</label>
                <input type="text" class="form-control" name="login" value="{{old('login')}}" />
            </div>
            <div class="form-group m-3">
                <label class="form-label text-secondary fw-bold">Password</label>
                <input type="password" class="form-control" name="password" value="{{old('password')}}" />

            </div>
            <div class="text-danger fw-bold m-3">
            @if(session('erreur'))
                {{ session('erreur') }}
            @endif
            </div>
            <div class="form-group m-5 text-center">
            <button class="btn btn-primary w-50">Se connecter</button>

            </div>
            
        </form>
    </div>

    <div class="col-6" style="padding-left:80px;padding-top:50px">

        <img src="logo.jpg" class="w-75 logo" >
    </div>

</div>
</div>



@endsection