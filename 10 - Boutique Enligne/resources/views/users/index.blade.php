@extends('layouts.app')

@section('content')
<div style="margin-left: 60px;margin-right: 60px;margin-top: 20px;">

    <div class="row m-2">
        <div class="col">
            <h4>Liste des Utilisateurs</h4>
        </div>

        <div class="col">
            @if(session('success'))
            <div class="alert alert-info">
                {{ session('success') }}
            </div>
            @endif
        </div>
    </div>

    @if(count($users) > 0)
    <table class="table table-striped table-bordered table-hover table-responsive">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Nombre Commandes</th>
                <th>Créer</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->commandes->count() }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <form action="{{ route('users.destroy', $user->id ) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm  btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette utilisateur ?')"><span class="bi bi-trash"></span></button>
                    </form>
                    <a class="btn btn-sm btn-success"> bloqué</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{$users->links()}}
    </div>
    @else
    <div class="alert alert-danger text-center fw-bold">
        N'est aucun Utilisateur
    </div>
    @endif
</div>
@endsection