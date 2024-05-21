@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
            <h2>Member Details</h2>
        </div>

        <div class="card-body">
            <p><strong>Name:</strong> {{ $member->name }}</p>
            <p><strong>IC Number:</strong> {{ $member->ic_number }}</p>
            <p><strong>Address:</strong> {{ $member->address }}</p>
            <p><strong>Phone Number:</strong> {{ $member->phoneNo }}</p>
        </div>
    </div>
@endsection
