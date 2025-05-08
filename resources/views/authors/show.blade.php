@extends('layouts.app')

@section('content')
    <h2>Author Details</h2>
    <div class="mb-3">
        <strong>Name:</strong> {{ $author->name }}
    </div>
    <div class="mb-3">
        <strong>Bio:</strong> {{ $author->bio ?? 'N/A' }}
    </div>

    <h4>Books by {{ $author->name }}:</h4>
    @if($author->books->count())
        <ul class="list-group">
            @foreach($author->books as $book)
                <li class="list-group-item">
                    <strong>{{ $book->title }}</strong> 
                    <small class="text-muted">Published: {{ $book->published_at ?? 'N/A' }}</small>
                </li>
            @endforeach
        </ul>
    @else
        <p>No books available for this author.</p>
    @endif

    <a href="{{ route('authors.index') }}" class="btn btn-secondary mt-3">Back</a>
@endsection
