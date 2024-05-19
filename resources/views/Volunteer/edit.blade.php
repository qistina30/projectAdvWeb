@extends('layouts.app')

@section('content')
    <div class="container">
        {{--        from controller--}}
        <div class="card-header">
            <h2>Edit Student : {{ $user->name }}</h2>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form method="post" action="{{ route('supervisor.update',$user->id) }}">
                @csrf
                @method ('PUT')
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                           value="{{ $user->name }}">
                    <label for="name">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                           value="{{ $user->email }}">
                    <label for="email">ID Number</label>
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection
