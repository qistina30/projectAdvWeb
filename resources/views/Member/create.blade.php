@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Add New Member</h2>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('member.store') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="ic_number" name="ic_number" placeholder="IC Number" required>
                        <label for="ic_number">IC Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                        <label for="address">Address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="phoneNo" name="phoneNo" placeholder="Phone Number" required>
                        <label for="phoneNo">Phone Number</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Add Member</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
