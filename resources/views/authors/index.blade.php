@extends('layouts.app')

@section('content')
    <h2>Authors List</h2>
    <a href="{{ route('authors.create') }}" class="btn btn-primary mb-3">Add Author</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>S.No.</th> <!-- Added Serial Number column -->
                <th>Name</th>
                <th>Books Count</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <td>{{ $loop->iteration }}</td> 
                <td>{{ $author->name }}</td>
                <td>{{ $author->books_count }}</td>
                <td>
                    <a href="{{ route('authors.show', $author->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('authors.destroy', $author->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Are you sure?');">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
