@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-secondary text-white">
            <div class="card-header bg-dark text-white">
                <h2>Edit Borrowing Record</h2>
            </div>
            <div class="card-body bg-light text-dark">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('records.updateDetails', $record->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <select class="form-select" id="book_id" name="book_id" required>
                                    @foreach($books->sortBy('title') as $book)
                                        @if($book->book_status === 'Available' || $book->id == $record->book_id)
                                            <option value="{{ $book->id }}" {{ $book->id == $record->book_id ? 'selected' : '' }}>
                                                {{ $book->title }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="book_id"><i class="fa fa-book"></i> Book Title</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <select class="form-select" id="member_id" name="member_id" required>
                                    @foreach($members->sortBy('name') as $member)
                                        <option value="{{ $member->id }}" {{ $member->id == $record->member_id ? 'selected' : '' }}>
                                            {{ $member->name }} ({{ $member->ic_number }})
                                        </option>
                                    @endforeach
                                </select>
                                <label for="member_id"><i class="fa fa-user"></i> Member Name (IC Number)</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="borrowing_date" name="borrowing_date" value="{{ $record->borrowing_date->format('Y-m-d') }}" required>
                                <label for="borrowing_date"><i class="fa fa-calendar"></i> Borrowing Date</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-md-end">
                            <button class="btn btn-primary btn-lg rounded-pill me-2" type="submit"><i class="fa fa-save"></i> Update Record</button>
                            <a class="btn btn-secondary btn-lg rounded-pill" href="{{ route('records.index') }}"><i class="fa fa-times"></i> Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
