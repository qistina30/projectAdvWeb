@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>All Books</h2>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if($books->isEmpty())
                    <p>No books available.</p>
                @else
                    <table class="table">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publisher Name</th>
                            <th>Published Year</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                        @foreach($books as $book)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->publisher_name }}</td>
                                <td>{{ $book->published_year }}</td>
                                <td>{{ $book->category }}</td>
                                <td>{{ $book->book_status }}</td>

                                <td>
                                    <a href="{{ route('book.show', ['id' => $book->id]) }}" class="btn btn-info">View</a>


                                    @if ($book->volunteer_id ===  Auth::user()->volunteer->id)
                                        <a href="{{ route('book.edit', $book->id) }}" class="btn btn-primary">Edit</a>
                                    @else
                                        <span class="text-muted">Not authorized to edit</span>
                                    @endif
                                <form action="{{ route('book.destroy', $book->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
