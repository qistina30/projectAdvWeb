<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    public function index()
    {
        $records = Record::with(['book', 'member', 'volunteer'])->get();
        return view('records.index', compact('records'));
    }

    public function create()
    {
        $books = Book::all();
        $members = Member::all();
        return view('records.create', compact('books', 'members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'borrowing_date' => 'required|date',
        ]);

        Record::create([
            'book_id' => $request->book_id,
            'member_id' => $request->member_id,
            'volunteer_id' => Auth::user()->volunteer->id, // Assuming the currently logged-in user is the volunteer
            'borrowing_date' => $request->borrowing_date,
        ]);

        // Update the book status to 'Borrowed'
        $book = Book::find($request->book_id);
        $book->book_status = 'Borrowed';
        $book->save();

        return redirect()->route('records.index')->with('success', 'Borrowing record created successfully.');
    }

    public function edit($id)
    {
        $record = Record::findOrFail($id);
        return view('records.edit', compact('record'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'returning_date' => 'required|date',
        ]);

        $record = Record::findOrFail($id);
        $record->update([
            'returning_date' => $request->returning_date,
        ]);

        // Update the book status back to 'Available'
        $book = Book::find($record->book_id);
        $book->book_status = 'Available';
        $book->save();

        return redirect()->route('records.index')->with('success', 'Borrowing record updated successfully.');
    }

    public function destroy($id)
    {
        $record = Record::findOrFail($id);
        $record->delete();

        return redirect()->route('records.index')->with('success', 'Borrowing record deleted successfully.');
    }

    public function search(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        $record = Record::where('book_id', $request->book_id)->first();

        if (!$record) {
            return redirect()->back()->with('error', 'No borrowing record found for this book.');
        }

        return view('records.update', compact('record'));
    }


}

