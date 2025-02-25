@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Menu</h1>
    <form action="{{ route('menus.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input type="text" class="form-control" id="url" name="url" required>
        </div>
        <div class="mb-3">
            <label for="icon" class="form-label">Icon</label>
            <input type="text" class="form-control" id="icon" name="icon">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
