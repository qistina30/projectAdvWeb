@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Update Borrowing Record</h2>

        <form action="{{ route('records.update', $record->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="returning_date">Returning Date</label>
                <input type="date" class="form-control" id="returning_date" name="returning_date" value="{{ $record->returning_date }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
