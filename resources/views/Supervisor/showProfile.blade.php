@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-secondary text-white">
            <div class="card-header bg-dark">
                <h2>Admin Profile</h2>
            </div>

            <div class="card-body bg-light text-dark">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-user me-2"></i>
                            <strong>Name:</strong>
                            <span class="ms-2">{{ $volunteer->user->name }}</span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-envelope me-2"></i>
                            <strong>Email:</strong>
                            <span class="ms-2">{{ $volunteer->user->email }}</span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-phone me-2"></i>
                            <strong>Phone Number:</strong>
                            <span class="ms-2">{{ $volunteer->user->phone }}</span>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('volunteer.edit', $volunteer->id) }}" class="btn btn-primary">
                        <i class="fa fa-edit"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
