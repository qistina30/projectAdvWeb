@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="card bg-secondary text-white">
            <div class="card-header bg-dark text-white">
                <h2>Available Collections</h2>
            </div>
            <div class="card-body bg-light text-dark">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" id="title" name="title" class="form-control" placeholder="Search Book Title" onkeyup="searchfunct()">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                    <div class="col-md-8 d-flex justify-content-end">
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
                                <th>No.</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Publisher Name</th>
                                <th>Published Year</th>
                                <th>Category</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $index => $book)
                                @if ($book->book_status === 'Available')
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->author }}</td>
                                        <td>{{ $book->publisher_name }}</td>
                                        <td>{{ $book->published_year }}</td>
                                        <td>{{ $book->category }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" aria-haspopup="true" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li><a class="dropdown-item" href="{{ route('book.show', ['id' => $book->id]) }}"><i class="fas fa-eye" style="color: blue;"></i> View</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('book.edit', $book->id) }}"><i class="fas fa-edit" style="color: green;"></i> Edit</a></li>
                                                    <form action="{{ route('book.destroy', $book->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this book?')"><i class="fas fa-trash" style="color: red;"></i> Delete</button>
                                                    </form>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function searchfunct() {
            console.log("Search function called."); // Debugging statement
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("title");
            filter = input.value.toUpperCase();
            table = document.getElementById("bookTable");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // Target the Title column
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
@endsection
