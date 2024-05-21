@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
            <h2>Edit Member</h2>
        </div>

        <form method="POST" action="{{ route('member.update', $member->id) }}">
            @csrf
            @method('PUT')
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" value="{{ $member->name }}" placeholder="Name" required>
                <label for="name">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="ic_number" name="ic_number" value="{{ $member->ic_number }}" placeholder="IC Number" required>
                <label for="ic_number">IC Number</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="address" name="address" value="{{ $member->address }}" placeholder="Address" required>
                <label for="address">Address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="phoneNo" name="phoneNo" value="{{ $member->phoneNo }}" placeholder="Phone Number" required>
                <label for="phoneNo">Phone Number</label>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection
