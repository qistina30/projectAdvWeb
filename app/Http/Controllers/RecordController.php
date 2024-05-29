<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    public function index(Request $request)
    {
        $bookId = $request->input('book_id');
        $memberIc = $request->input('member_ic');
        $query = Record::query();

        if ($bookId) {
            $query->whereHas('book', function($q) use ($bookId) {
                $q->where('id', $bookId);
            });
        }

        if ($memberIc) {
            $query->whereHas('member', function($q) use ($memberIc) {
                $q->where('ic_number', 'like', '%' . $memberIc . '%');
            });
        }

        $records = $query->paginate(10);

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

        return redirect()->route('records.index')->with('success', 'Returning date updated successfully.');
    }

    public function destroy($id)
    {
        $record = Record::findOrFail($id);
        $record->delete();

        return redirect()->route('records.index')->with('success', 'Borrowing record deleted successfully.');
    }

    public function editDetails($id)
    {
        $record = Record::with(['book', 'member'])->findOrFail($id);
        $books = Book::all();
        $members = Member::all();
        return view('records.editDetails', compact('record', 'books', 'members'));
    }

    public function updateDetails(Request $request, $id)
    {
        $record = Record::findOrFail($id);

        // Validate the request
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'borrowing_date' => 'required|date',
        ]);

        // Update the record
        $record->book_id = $request->input('book_id');
        $record->member_id = $request->input('member_id');
        $record->borrowing_date = $request->input('borrowing_date');
        $record->save();

        return redirect()->route('records.index')->with('success', 'Borrowing record updated successfully.');
    }



}

