@extends('layouts.app')

@section('content')
    <h2>Add New Author</h2>
    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Bio:</label>
            <textarea name="bio" class="form-control">{{ old('bio') }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
