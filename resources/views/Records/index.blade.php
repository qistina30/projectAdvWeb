@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Borrowing Records</h2>

        <div class="col-md-4">
            <input type="text" id="book_id" name="book_id" class="form-control"
                   placeholder="Search Book ID" onkeyup="searchfunct()">
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
            <a href="{{ route('records.create') }}" class="btn btn-success me-md-2">Add New Record</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered" id="recordsTable">
            <thead>
            <tr>
                <th>Book ID</th>
                <th>Book Title</th>
                <th>Member Name</th>
                <th>Volunteer Name</th>
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
                    <td>{{ $record->member->name }}</td>
                    <td>{{ $record->volunteer->user->name }}</td>
                    <td>{{ $record->borrowing_date }}</td>
                    <td>{{ $record->returning_date ?? 'Not returned yet' }}</td>
                    <td>
                        <a href="{{ route('records.edit', $record->id) }}" class="btn btn-primary">Update</a>

                        <form action="{{ route('records.destroy', $record->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
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
