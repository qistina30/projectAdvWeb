@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
            <h2>Add New Book</h2>
        </div>

        <form method="POST" action="{{ route('book.store') }}">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="title" name="title" placeholder="Book Title" required>
                <label for="name">Title</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="author" name="author" placeholder="Author">
                <label for="author">Author</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="publisher_name" name="publisher_name"
                       placeholder="Publisher Name">
                <label for="publisher_name">Publisher Name</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-control" id="published_year" name="published_year" required>
                    @for ($year = now()->year; $year >= 1900; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
                <label for="published_year">Publish Year</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-control" id="category" name="category" required>
                    <option value="Novel">Novel</option>
                    <option value="Religion">Religion</option>
                    <option value="Academic">Academic</option>
                    <option value="Children">Children</option>
                    <option value="General Readings">General Readings</option>
                    <!-- Add more categories as needed -->
                </select>
                <label for="category">Category</label>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Add</button>
            </div>
        </form>
    </div>
@endsection
