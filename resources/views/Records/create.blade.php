@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Borrowing Record</h2>

        <form action="{{ route('records.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="book_id">Book</label>
                <select class="form-control" id="book_id" name="book_id" required>
                    @foreach($books as $book)
                        @if($book->book_status === 'Available')
                            <option value="{{ $book->id }}">{{ $book->title }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="member_id">Member</label>
                <select class="form-control" id="member_id" name="member_id" required>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="borrowing_date">Borrowing Date</label>
                <input type="date" class="form-control" id="borrowing_date" name="borrowing_date" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection

