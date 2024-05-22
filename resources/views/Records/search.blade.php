@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Search for Borrowing Record by Book ID</h2>

        <form action="{{ route('records.search') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="book_id">Book ID</label>
                <input type="text" class="form-control" id="book_id" name="book_id" required>
            </div>

            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
@endsection
