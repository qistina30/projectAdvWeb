@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-secondary text-white">
            <div class="card-header bg-dark">
                <h2 class="mb-0">Add New Book</h2>
            </div>
            <div class="card-body bg-light text-dark">
                <form method="POST" action="{{ route('book.store') }}">
                    @csrf
                    <div class="row gx-3">
                        <div class="col-md-6 mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Book Title" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control" id="author" name="author" placeholder="Enter Author Name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="publisher_name" class="form-label">Publisher Name</label>
                            <input type="text" class="form-control" id="publisher_name" name="publisher_name" placeholder="Enter Publisher Name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="published_year" class="form-label">Publish Year</label>
                            <select class="form-select" id="published_year" name="published_year" required>
                                @for ($year = now()->year; $year >= 1900; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="Novel">Novel</option>
                                <option value="Religion">Religion</option>
                                <option value="Academic">Academic</option>
                                <option value="Children">Children</option>
                                <option value="General Readings">General Readings</option>
                                <option value="Fiction">Fiction</option>
                                <option value="Non-Fiction">Non-Fiction</option>
                                <!-- Add more categories as needed -->
                            </select>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-lg rounded-pill" type="submit">Add Book</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
