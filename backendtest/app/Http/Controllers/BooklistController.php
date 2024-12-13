<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Booklist;
use App\Models\Rating;
use Illuminate\Http\Request;

class BooklistController extends Controller
{
    public function index(Request $request)
    {
        ini_set('max_execution_time', 120); 
        $title = "Library Book List";
        $keyword = $request->query('keyword');
        $perPage = $request->query('perPage', 10); 
        $perPage = in_array($perPage, [10, 25, 50, 100]) ? $perPage : 10;

        // $books = Book::query()
        //     ->join('categories', 'books.category_id', '=', 'categories.id')
        //     ->join('authors', 'books.author_id', '=', 'authors.id')
        //     ->select([
        //         'books.id',
        //         'books.book_name',
        //         'categories.category_name',
        //         'authors.author_name'
        //     ])
        //     ->withCount('ratings as total_voters')
        //     ->withAvg('ratings as average_rating', 'rating')
        //     ->orderByDesc('average_rating')
        //     ->paginate(100);

        // dd($books);

        $books = Book::with(['category', 'author', 'ratings'])
            ->select('id', 'book_name', 'category_id', 'author_id')
            ->where('book_name','like','%'. $keyword . '%')
            ->withCount('ratings')
            ->withAvg('ratings as average_rating', 'rating')
            // ->orderBy('author_id')
            ->orderByDesc('average_rating')
            ->paginate($perPage);

        $books->getCollection()->transform(function ($book) {
            return [
                'id' => $book->id,
                'book_name' => $book->book_name,
                'category_name' => $book->category->category_name,
                'author_name' => $book->author->author_name,
                'total_voters' => $book->ratings_count,
                'average_rating' => number_format($book->average_rating, 4),
            ];
        });

        return view('index', compact('title', 'books', 'keyword', 'perPage'));
    }

    public function author(Request $request)
    {
        $title = "Library Author List";

        $authors = Author::withCount([
            'books as total_voters' => function ($query) {
                $query->join('ratings', 'books.id', '=', 'ratings.book_id');
            }
        ])
        ->orderByDesc('total_voters')
        ->paginate(10);

        return view('author', compact('title', 'authors'));
    }

    public function rate(Request $request)
    {
        $title = "Insert Rating";
        $authors = Author::orderBy('author_name')->limit(1000)->get(); 
        $authorId = $request->input('author_id');
        $books = [];
        if ($authorId) {
            $books = Book::where('author_id', $authorId)->orderBy('book_name')->get();
        }

        return view('rating', compact('title', 'authors', 'books', 'authorId'));
    }

    
    public function storeRate(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:10',
        ]);
    
        Rating::create([
            'book_id' => $request->book_id,
            'rating' => $request->rating,
        ]);
    
        return redirect()->route('index')->with(['message' => 'Rating submitted successfully!']);
    }
    
}
