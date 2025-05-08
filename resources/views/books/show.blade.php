@extends('layouts.app')

@section('content')
    <h2>Book Details</h2>

    <div class="mb-3">
        <strong>Title:</strong> {{ $book->title }}
    </div>
    <div class="mb-3">
        <strong>Description:</strong> {{ $book->description ?? 'N/A' }}
    </div>
    <div class="mb-3">
        <strong>Author:</strong> {{ $book->author->name }}
    </div>
    <div class="mb-3">
        <strong>Published At:</strong> {{ $book->published_at ?? 'N/A' }}
    </div>

    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
@endsection
