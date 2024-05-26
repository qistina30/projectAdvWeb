@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-secondary text-white">
            <div class="card-header bg-dark">
                <h2 class="mb-0">Edit Profile</h2>
            </div>
            <div class="card-body bg-light text-dark">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('volunteer.update', ['id' => $volunteer->id]) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" value="{{ $volunteer->user->name }}" placeholder="Name" required>
                        <label for="name"><i class="fa fa-user"></i> Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" value="{{ $volunteer->user->email }}" placeholder="Email" required>
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $volunteer->user->phone }}" placeholder="Phone Number" required>
                        <label for="phone"><i class="fa fa-phone"></i> Phone Number</label>
                        <div class="invalid-feedback" id="phone_error">Phone number must start with 0 and be at least 9 digits long.</div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-md-end">
                            <button class="btn btn-primary btn-lg rounded-pill me-2" type="submit"><i class="fa fa-save"></i> Update Profile</button>
                            <button class="btn btn-secondary btn-lg rounded-pill" type="reset"><i class="fa fa-times"></i> Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
