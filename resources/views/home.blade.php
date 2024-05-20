@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>


            </div>
            <!-- Add the Register Volunteer link here -->
            <div class="mt-3">
                <a href="{{ route('Supervisor.register_vol') }}" class="btn btn-primary">
                    {{ __('Registered Volunteer') }}
                </a>
                <a href="{{ route('volunteer.showProfile', ['id' => Auth::user()->id]) }}" class="btn btn-primary">
                    View Profile
                </a>
                <a href="{{ route('book.create')}}" class="btn btn-primary">
                    Add New Book
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
