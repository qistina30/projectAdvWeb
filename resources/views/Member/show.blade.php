@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-secondary text-white">
            <div class="card-header bg-dark">
                <h2>Member Details</h2>
            </div>

            <div class="card-body bg-light text-dark">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-user me-2"></i>
                            <strong>Name:</strong>
                            <span class="ms-2">{{ $member->name }}</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-id-card me-2"></i>
                            <strong>IC Number:</strong>
                            <span class="ms-2">{{ $member->ic_number }}</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-home me-2"></i>
                            <strong>Address:</strong>
                            <span class="ms-2">{{ $member->address }}</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-phone me-2"></i>
                            <strong>Phone Number:</strong>
                            <span class="ms-2">{{ $member->phoneNo }}</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-user-plus me-2"></i>
                            <strong>Added By:</strong>
                            <span class="ms-2">{{ $member->volunteer->user->name }}</span>
                        </div>
                    </div>
                </div>

                <div class="card bg-secondary text-white mt-4">
                    <div class="card-header bg-dark">
                        <h2>Borrowing History</h2>
                    </div>
                    <div class="card-body bg-light text-dark">
                        @if($member->records->isEmpty())
                            <p>No borrowing history available.</p>
                        @else
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Book Title</th>
                                    <th>Borrowing Date</th>
                                    <th>Returning Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($member->records as $index => $record)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $record->book->title }}</td>
                                        <td>{{ $record->borrowing_date }}</td>
                                        <td>{{ $record->returning_date ?? 'Not returned yet' }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
