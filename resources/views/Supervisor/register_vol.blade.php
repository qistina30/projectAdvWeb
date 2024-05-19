@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('Users Register') }}</div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if ($users->isEmpty())
                    <p>No users found.</p>
                @else
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->approval_status }}</td>
                                <td>
                                    @if ($user->approval_status === 'pending')
                                        <form method="POST" action="{{ route('Supervisor.updateStatus', $user->id) }}">
                                            @csrf
                                            <button type="submit" name="approval_status" value="approved" class="btn btn-success">Approve</button>
                                            <button type="submit" name="approval_status" value="rejected" class="btn btn-danger">Reject</button>
                                        </form>

                                    @endif

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
