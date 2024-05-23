@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-secondary text-white">
            <div class="card-header bg-dark">
                <h2 class="mb-0">Book Details</h2>
            </div>
            <div class="card-body bg-light text-dark">
                <div class="row">
                    <div class="col-md-6">
                        <p class="fw-bold">Title:</p>
                        <p>{{ $book->title }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="fw-bold">Author:</p>
                        <p>{{ $book->author }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="fw-bold">Publisher Name:</p>
                        <p>{{ $book->publisher_name }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="fw-bold">Published Year:</p>
                        <p>{{ $book->published_year }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="fw-bold">Category:</p>
                        <p>{{ $book->category }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="fw-bold">Status:</p>
                        <p>{{ $book->book_status }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <p class="fw-bold">Added By:</p>
                    <p>{{ $book->volunteer->user->name }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection


