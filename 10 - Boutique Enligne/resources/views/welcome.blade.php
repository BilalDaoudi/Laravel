@extends('layouts.app')
@section('content')


<div class="row">
    <div class="col-6 p-5"><h2>Bienvenue sur notre site de vente en ligne de vêtements !</h2>
      <p>Découvrez les dernières tendances de la mode et trouvez des vêtements qui vous correspondent.</p>
            <a href="{{route('produits.acheter')}}" class="btn btn-primary">Découvrir notre collection</a>
    </div>

    <div class="col-6" style="padding-left:80px;padding-top:50px">

        <img src="logo.jpg" class="w-75">
    </div>

</div>

@endsection