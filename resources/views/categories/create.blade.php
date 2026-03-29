@extends('layouts.admin-layout')
@section('title', 'Create Category')
@section('content')
    <h2><b>Add Category</b></h2>
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div class="mb-3 my-3">
            @error('name')
                <div class="alert alert-danger m-3">{{ $message }}</div>
            @enderror
            <label class="my-2">Name:</label>
            <input type="text" name="name" class="form-control @error('title') is-invalid @enderror">
        </div>
        <button class="btn btn-success" type="submit"> Save </button>
    </form>
@endsection
