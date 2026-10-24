<!-- resources/views/categories/index.blade.php -->
@extends('layouts.app')

@section('content')

<div style="margin-left: 60px;margin-right: 60px;margin-top: 20px;">
    <div class="row m-2">
        <div class="col-3">
            <h4>Liste des catégories</h4>
        </div>
        <div class="col-6">
            @if(session('success'))
            <div class="alert alert-info">
                {{ session('success') }}
            </div>
            @endif
        </div>
        <div class="col-3 text-end">
            <a href="{{ route('categories.create') }}" class="btn btn-primary mb-2">Ajouter une catégorie</a>
        </div>
    </div>

    @if(count($categories) > 0)
    <table class="table  table-striped table-bordered table-hover table-responsive">
        <thead>
            <tr>
                <th>#</th>
                <th>Description</th>
                <th>Produits</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $categorie)
            <tr>
                <td>{{ $categorie->id }}</td>
                <td>{{ $categorie->description }}</td>
                <td>{{ $categorie->produits->count() }}</td>
                <td>
                    <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-sm btn-primary"><span class="bi bi-pencil"></span></a>
                    <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')"><span class="bi bi-trash"></span></button>
                    </form>

                    @if($categorie->produits->count() > 0)
                    <a href="{{ route('categories.show', $categorie->id) }}" class="btn btn-sm btn-warning"><span class="bi bi-eye"></span></a>
                    @endif
                </td>   
            </tr>
            @endforeach

        </tbody>
    </table>
    <div>
        {{$categories->links()}}
    </div>
    @else
    <div class="alert alert-danger text-center fw-bold">
        N'est aucun catégorie
    </div>
    @endif
</div>
@endsection