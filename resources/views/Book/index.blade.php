@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-secondary text-white">
            <div class="card-header bg-dark text-white">
                <h2>Collections</h2>
            </div>
            <div class="card-body bg-light text-dark">
                {{--<div class="col-md-4">
                    <input type="text" id="book_id" name="book_id" class="form-control"
                           placeholder="Search Book ID" onkeyup="searchfunct()">
                </div>--}}
                <div class="row mb-3">
                    <div class="col-md-12 d-flex justify-content-center">
                        {{ $books->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12 d-flex justify-content-end">
                        <a href="{{ route('book.create') }}" class="btn btn-success me-md-2">
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
                        <table class="table table-striped table-hover">
                            <thead class="bg-dark text-white">
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Publisher Name</th>
                                <th>Published Year</th>
                                <th>Category</th>
                                <th>Added By</th>
                                <th>Status</th>
                                <th>Actions</th>
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
                                    <td>{{ $book->volunteer->user->name }}</td>
                                    <td>{{ $book->book_status }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('book.show', ['id' => $book->id]) }}" class="btn btn-info btn-sm me-2">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <a href="{{ route('book.edit', $book->id) }}" class="btn btn-primary btn-sm me-2">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        @if ($book->book_status === 'Available')
                                            <form action="{{ route('book.destroy', $book->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?')">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                @endif
            </div>
        </div>
    </div>
@endsection
{{--@section('scripts')
    <script>
        function searchfunct() {
            var input, filter, table, tr, td, i, txtValue;

            input = document.getElementById("book_id");
            filter = input.value.toUpperCase();
            table = document.getElementById("table");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection--}}
