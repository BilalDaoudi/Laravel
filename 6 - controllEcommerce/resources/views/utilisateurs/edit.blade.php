@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>

    <form action="{{ route('utilisateurs.update', $utilisateur->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $utilisateur->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $utilisateur->email }}" required>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control" required>
                <option value="client" @if($utilisateur->role == 'client') selected @endif>Client</option>
                <option value="admin" @if($utilisateur->role == 'admin') selected @endif>Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
