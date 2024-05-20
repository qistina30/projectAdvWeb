@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Book Details</h2>
            </div>
            <div class="card-body">
                <p><strong>Title:</strong> {{ $book->title }}</p>
                <p><strong>Author:</strong> {{ $book->author }}</p>
                <p><strong>Publisher Name:</strong> {{ $book->publisher_name }}</p>
                <p><strong>Published Year:</strong> {{ $book->published_year }}</p>
                <p><strong>Category:</strong> {{ $book->category }}</p>
                <p><strong>Status:</strong> {{ $book->book_status }}</p>
            </div>
        </div>
    </div>
@endsection

