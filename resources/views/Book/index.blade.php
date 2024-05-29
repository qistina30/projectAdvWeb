@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card bg-secondary text-white">
            <div class="card-header bg-dark text-white">
                <h2>Collections</h2>
            </div>
            <div class="card-body bg-light text-dark">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <form action="{{ route('book.index') }}" method="GET" class="input-group">
                            <input type="text" id="title" name="title" class="form-control" placeholder="Search Book Title" value="{{ request()->input('title') }}">
                            <button type="submit" class="btn btn-primary ms-2"><i class="fas fa-search"></i> Search</button>
                        </form>
                    </div>
                    <div class="col-md-12 d-flex justify-content-end">
                        <a href="{{ route('book.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> Add New Book
                        </a>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if($books->isEmpty())
                    <p>No books available.</p>
                @else
                    <div class="table-responsive">
                        <table id="bookTable" class="table table-striped table-hover">
                            <thead class="bg-dark text-white">
                            <tr>
                                <th class="col">No.</th>
                                <th class="col">Title</th>
                                <th class="col">Author</th>
                                <th class="col">Publisher Name</th>
                                <th class="col">Published Year</th>
                                <th class="col">Category</th>
                                <th class="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $index => $book)
                                <tr>
                                    <td>{{ $books->firstItem() + $index }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->publisher_name }}</td>
                                    <td>{{ $book->published_year }}</td>
                                    <td>{{ $book->category }}</td>
                                    <td>
                                        @if($book->book_status === 'Available')
                                            <span class="badge bg-success">{{ $book->book_status }}</span>
                                        @elseif($book->book_status === 'Borrowed')
                                            <span class="badge bg-warning">{{ $book->book_status }}</span>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" aria-haspopup="true" data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item" href="{{ route('book.show', ['id' => $book->id]) }}"><i class="fas fa-eye" style="color: blue;"></i> View</a></li>
                                                <li><a class="dropdown-item" href="{{ route('book.edit', $book->id) }}"><i class="fas fa-edit" style="color: green;"></i> Edit</a></li>
                                                @if ($book->book_status === 'Available')
                                                    <form action="{{ route('book.destroy', $book->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this book?')"><i class="fas fa-trash" style="color: red;"></i> Delete</button>
                                                    </form>
                                                @endif
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                <div class="row mb-3">
                    <div class="col-md-12 d-flex justify-content-center">
                        {{ $books->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



