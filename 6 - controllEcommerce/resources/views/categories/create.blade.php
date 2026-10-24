@extends('layouts.app')
@section('content')
<h1>Add Product</h1>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

   
    

    <button type="submit" class="btn btn-primary">Add</button>
</form>
@endsection