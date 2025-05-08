<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use DB;

class ChatbotController extends Controller
{
    public function handle(Request $request)
    {
        $question = strtolower($request->input('question'));
        $response = "Sorry, I don't understand the question.";

        if (str_contains($question, 'how many authors')) {
            $count = Author::count();
            $response = "There are $count authors.";
        } elseif (str_contains($question, 'how many books')) {
            $count = Book::count();
            $response = "There are $count books available.";
        } elseif (str_contains($question, 'top 5 authors')) {
            $authors = Author::withCount('books')
                ->orderBy('books_count', 'desc')
                ->take(5)
                ->get();
            $response = "Top 5 authors:\n";
            foreach ($authors as $author) {
                $response .= "- {$author->name} ({$author->books_count} books)\n";
            }
        }

        return response()->json(['answer' => nl2br($response)]);
    }
}
