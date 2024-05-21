@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Registered Members</h2>
            </div>

            <div class="card-body">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{route('member.create')}}" class="btn btn-success me-md-2" >Add New Member</a>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>IC Number</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->ic_number }}</td>
                            <td>{{ $member->address }}</td>
                            <td>{{ $member->phoneNo }}</td>
                            <td>

                                <a href="{{ route('member.show', ['id' => $member->id]) }}" class="btn btn-primary">Details</a>

                                <a href="{{ route('member.edit', $member->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('member.destroy', $member->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

