@extends('layouts.app')

@section('content')
    <div class="container">
        {{--        from controller--}}
        <div class="card-header">
            <h2>Edit Profile</h2>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form method="post" action="{{ route('volunteer.update',['id' => $volunteer->id]) }}">
                @csrf
                @method ('PUT')
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                           value="{{ $volunteer->user->name  }}">
                    <label for="name">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                           value="{{ $volunteer->user->email  }}">
                    <label for="email">ID Number</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="phone"
                           value="{{ $volunteer->user->phone  }}">
                    <label for="phone">Phone Number</label>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">{{ __('Update Profile') }}</button>
                </div>
            </form>
        </div>
    </div>

@endsection
