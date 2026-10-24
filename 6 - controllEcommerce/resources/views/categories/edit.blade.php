@extends('layouts.app')
@section('content')
    <form action="{{route('categories.update',$Categorie->id)}}" method="post">
        @csrf
        @method('PUT')
    name: <input type="text" name="name" id="name" value={{$Categorie->name}}>
    <button type="submit">update</button>
    </form>
@endsection