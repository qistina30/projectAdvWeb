@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="card bg-secondary text-white">
            <div class="card-header bg-dark text-white">
                <h2 class="mb-0">Borrowing Records</h2>
            </div>
            <div class="card-body bg-light">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" id="book_id" name="book_id" class="form-control" placeholder="Search Book ID" onkeyup="searchfunct()">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                    <div class="col-md-8 d-flex justify-content-end">
                        <a href="{{ route('records.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Add New Record</a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12 d-flex justify-content-center">
                        {{ $records->links('pagination::bootstrap-4') }}
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="recordsTable">
                        <thead class="bg-dark text-white">
                        <tr>
                            <th>Book ID</th>
                            <th>Book Title</th>
                            <th>Member Name(IC)</th>
{{--                            <th>Volunteer Name</th>--}}
                            <th>Borrowing Date</th>
                            <th>Returning Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($records as $record)
                            <tr>
                                <td>{{ $record->book->id }}</td>
                                <td>{{ $record->book->title }}</td>
                                <td>{{ $record->member->name }} ({{ $record->member->ic_number }})</td>
{{--                                <td>{{ $record->volunteer->user->name }}</td>--}}
                                <td>{{ \Carbon\Carbon::parse($record->borrowing_date)->format('d-m-Y') }}</td>
                                <td>{{ $record->returning_date ? \Carbon\Carbon::parse($record->returning_date)->format('d-m-Y') : 'Not returned yet' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="{{ route('records.edit', $record->id) }}"><i class="fas fa-edit" style="color: blue;"></i> Update Return Date</a></li>
                                            <form action="{{ route('records.destroy', $record->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fas fa-trash" style="color: red;"></i> Delete</button>
                                            </form>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



<script>
    function searchfunct() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("book_id");
        filter = input.value.toUpperCase();
        table = document.getElementById("recordsTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0]; // Changed to target the new first column (Book ID)
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
