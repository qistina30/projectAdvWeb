<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Record;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

        public function index()
    {
        $totalBooks = Book::count();
        $totalMemberships = Member::count();
        $totalBorrowedBooks = Record::count();

        $totalAvailableBooks = Book::where('book_status', 'Available')->count();

        return view('home', compact('totalBooks', 'totalMemberships', 'totalBorrowedBooks', 'totalAvailableBooks'));
    }

}
