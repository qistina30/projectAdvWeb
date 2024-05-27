<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        /*$books = Book::all();
        return view('book.index', compact('books'));*/
        $books = Book::paginate(10); // Adjust the number 10 to the number of items per page you want
        return view('book.index', compact('books'));
    }
    public function available()
    {
        $books = Book::where('book_status', 'Available')->get();
        return view('book.available', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('book.show', compact('book'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher_name' => 'required|string|max:255',
            'published_year' => 'required|integer|min:1900|max:' . date('Y'),
            'category' => 'required|string|max:255',
        ]);

        // Create a new book instance and save to the database
        $book = Book::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'publisher_name' => $request->input('publisher_name'),
            'published_year' => $request->input('published_year'),
            'category' => $request->input('category'),
            'volunteer_id' => Auth::user()->volunteer->id, // Assuming the authenticated user is a volunteer
        ]);

        // Redirect to the index route with a success message
        return redirect()->route('book.index')
            ->with('success', 'Book added successfully.');
    }

    public function create()
    {
        return view('book.create');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);

        // Check if the logged-in user is the one who added the book
       /* if ($book->volunteer_id !==  Auth::user()->volunteer->id) {
            return redirect()->route('book.index')->with('error', 'You are not authorized to edit this book.');
        }*/

        return view('book.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher_name' => 'required|string|max:255',
            'published_year' => 'required|integer|min:1900|max:' . date('Y'),
            'category' => 'required|string|max:255',
        ]);

        $book = Book::findOrFail($id);

        // Check if the logged-in user is the one who added the book
        /*if ($book->volunteer_id !==  Auth::user()->volunteer->id) {
            return redirect()->route('book.index')->with('error', 'You are not authorized to edit this book.');
        }*/

        $book->update([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'publisher_name' => $request->input('publisher_name'),
            'published_year' => $request->input('published_year'),
            'category' => $request->input('category'),
        ]);

        return redirect()->route('book.index')->with('success', 'Book updated successfully.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('book.index')
            ->with('success', 'Book deleted successfully.');
    }



}
