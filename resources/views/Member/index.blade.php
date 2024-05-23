@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-secondary text-white">
            <div class="card-header bg-dark text-white">
                <h2>Registered Members</h2>
            </div>
            <div class="card-body bg-light text-dark">

                    {{--<div class="col-md-4">
                        <input type="text" id="name" name="name" class="form-control"
                               placeholder="Search by name" onkeyup="searchfunct()">
                    </div>--}}
                    <div class="row mb-3">
                        <div class="col-md-12 d-flex justify-content-end">
                            <a href="{{ route('member.create') }}" class="btn btn-success">
                                <i class="fas fa-plus"></i> Add New Member
                            </a>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                            {{ $members->links('pagination::bootstrap-4') }}
                        </div>
                    </div>


                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if($members->isEmpty())
                    <p>No members available.</p>
                @else
                    <div class="table-responsive">
                        <table id="recordsTable" class="table table-striped table-hover">
                            <thead class="bg-dark text-white">
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>IC Number</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($members as $index => $member)
                                <tr>
                                    <td>{{ $members->firstItem() + $index }}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->ic_number }}</td>
                                    <td>{{ $member->address }}</td>
                                    <td>{{ $member->phoneNo }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('member.show', ['id' => $member->id]) }}" class="btn btn-info btn-sm me-2">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <a href="{{ route('member.edit', $member->id) }}" class="btn btn-primary btn-sm me-2">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('member.destroy', $member->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this member?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
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
            input = document.getElementById("name");
            filter = input.value.toUpperCase();
            table = document.getElementById("recordsTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // Target the Name column
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
