<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Show list of books
    public function index()
    {
        $books = Book::with('author')->latest()->get();
        return view('books.index', compact('books'));
    }

    // Show create book form
    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    // Store new book
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'author_id' => 'required|exists:authors,id',
            'published_at' => 'nullable|date',
        ]);

        Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'author_id' => $request->author_id,
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    // Show book details
    public function show(Book $book)
    {
        $book->load('author');
        return view('books.show', compact('book'));
    }

    // Show edit form
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    // Update book
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'author_id' => 'required|exists:authors,id',
            'published_at' => 'nullable|date',
        ]);

        $book->update([
            'title' => $request->title,
            'description' => $request->description,
            'author_id' => $request->author_id,
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    // Delete book
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
