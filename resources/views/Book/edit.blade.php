@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-secondary text-white">
            <div class="card-header bg-dark">
                <h2 class="mb-0">Edit Book</h2>
            </div>
            <div class="card-body bg-light text-dark">
                <form method="POST" action="{{ route('book.update', $book->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="row gx-3">
                        <div class="col-md-6 mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="publisher_name" class="form-label">Publisher Name</label>
                            <input type="text" class="form-control" id="publisher_name" name="publisher_name" value="{{ $book->publisher_name }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="published_year" class="form-label">Publish Year</label>
                            <input type="text" class="form-control" id="published_year" name="published_year" value="{{ $book->published_year }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="Novel" {{ $book->category == 'Novel' ? 'selected' : '' }}>Novel</option>
                                <option value="Religion" {{ $book->category == 'Religion' ? 'selected' : '' }}>Religion</option>
                                <option value="Academic" {{ $book->category == 'Academic' ? 'selected' : '' }}>Academic</option>
                                <option value="Children" {{ $book->category == 'Children' ? 'selected' : '' }}>Children</option>
                                <option value="General Readings" {{ $book->category == 'General Readings' ? 'selected' : '' }}>General Readings</option>
                                <option value="Fiction" {{ $book->category == 'Fiction' ? 'selected' : '' }}>Fiction</option>
                                <option value="Non-Fiction" {{ $book->category == 'Non-Fiction' ? 'selected' : '' }}>Non-Fiction</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-lg rounded-pill" type="submit">Update Book</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
