@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-secondary text-white">
            <div class="card-header bg-dark text-white">
                <h2>Registered Volunteers</h2>
            </div>
            <div class="card-body bg-light text-dark">


                <div class="row mb-3">
                    <div class="col-md-12 d-flex justify-content-center">
                        {{ $users->links('pagination::bootstrap-4') }}
                    </div>
                </div>


                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if($users->isEmpty())
                    <p>No volunteer available.</p>
                @else
                    <div class="table-responsive">
                        <table id="recordsTable" class="table table-striped table-hover">
                            <thead class="bg-dark text-white">
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>

                                <th>Phone Number</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $index => $user)
                                @if ($user->userLevel != 0)
                                <tr>
                                    <td>{{ $index + 0 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ ucfirst($user->approval_status) }}</td>
                                    <td class="d-flex">
                                        @if ($user->approval_status === 'pending')
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton{{ $user->id }}" aria-haspopup="true" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $user->id }}">
                                                    <li>
                                                        <form method="POST" action="{{ route('Supervisor.updateStatus', $user->id) }}">
                                                            @csrf
                                                            <button type="submit" name="approval_status" value="approved" class="dropdown-item"><i class="fas fa-check-circle text-success me-2"></i>Approve</button>
                                                            <button type="submit" name="approval_status" value="rejected" class="dropdown-item"><i class="fas fa-times-circle text-danger me-2"></i>Reject</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                            @else
                                            <span class="text-muted">Approval status: {{ ucfirst($user->approval_status) }}</span>
                                        @endif
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
