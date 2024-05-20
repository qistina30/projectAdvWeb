@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
            <h2>Edit Book</h2>
        </div>

        <form method="POST" action="{{ route('book.update', $book->id) }}">
            @csrf
            @method('PUT') <!-- Use PUT method for updating a resource -->

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="title" name="title" placeholder="Book Title" value="{{ $book->title }}" required>
                <label for="title">Title</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="author" name="author" placeholder="Author" value="{{ $book->author }}">
                <label for="author">Author</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="publisher_name" name="publisher_name"
                       placeholder="Publisher Name" value="{{ $book->publisher_name }}">
                <label for="publisher_name">Publisher Name</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-control" id="published_year" name="published_year" required>
                    @for ($year = now()->year; $year >= 1900; $year--)
                        <option value="{{ $year }}" {{ $book->published_year == $year ? 'selected' : '' }}>{{ $year }}</option>
                    @endfor
                </select>
                <label for="published_year">Publish Year</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-control" id="category" name="category" required>
                    <option value="Novel" {{ $book->category == 'Novel' ? 'selected' : '' }}>Novel</option>
                    <option value="Religion" {{ $book->category == 'Religion' ? 'selected' : '' }}>Religion</option>
                    <option value="Academic" {{ $book->category == 'Academic' ? 'selected' : '' }}>Academic</option>
                    <option value="Children" {{ $book->category == 'Children' ? 'selected' : '' }}>Children</option>
                    <option value="General Readings" {{ $book->category == 'General Readings' ? 'selected' : '' }}>General Readings</option>
                    <!-- Add more categories as needed -->
                </select>
                <label for="category">Category</label>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection
