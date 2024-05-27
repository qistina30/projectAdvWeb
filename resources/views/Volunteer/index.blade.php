@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-secondary text-white">
            <div class="card-header bg-dark text-white">
                <h2>Approved Volunteers</h2>
            </div>
            <div class="card-body bg-light text-dark">

                <div class="row mb-3">
                    <div class="col-md-12 d-flex justify-content-center">
                        {{ $volunteers->links('pagination::bootstrap-4') }}
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if($volunteers->isEmpty())
                    <p>No volunteers available.</p>
                @else
                    <div class="table-responsive">
                        <table id="recordsTable" class="table table-striped table-hover">
                            <thead class="bg-dark text-white">
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($volunteers as $index => $volunteer)
                                <tr>
                                    <td>{{ $volunteers->firstItem() + $index }}</td>
                                    <td>{{ $volunteer->user->name }}</td>
                                    <td>{{ $volunteer->user->email }}</td>
                                    <td>{{ $volunteer->user->phone }}</td>
                                    <td class="d-flex">
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" aria-haspopup="true" data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item" href="{{ route('volunteer.showProfile', ['id' => $volunteer->user->id]) }}"><i class="fas fa-eye" style="color: blue;"></i> View</a></li>
                                                <li><a class="dropdown-item" href="{{ route('volunteer.edit', $volunteer->user->id) }}"><i class="fas fa-edit" style="color: green;"></i> Edit</a></li>
                                               {{-- <form action="{{ route('volunteer.destroy', $volunteer->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this volunteer?')"><i class="fas fa-trash" style="color: red;"></i> Delete</button>
                                                </form>--}}
                                            </ul>
                                        </div>
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
