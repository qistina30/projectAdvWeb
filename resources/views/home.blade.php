@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-dark text-white">
{{--                    <div class="card-header">{{ __('Dashboard') }}</div>--}}

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-4">
                                <div class="card text-white bg-primary mb-3">
                                    <div class="card-body text-center">
                                        <i class="fas fa-book fa-3x"></i>
                                        <h5 class="card-title mt-2">Total Books</h5>
                                        <p class="card-text">{{ $totalBooks }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-white bg-success mb-3">
                                    <div class="card-body text-center">
                                        <i class="fas fa-users fa-3x"></i>
                                        <h5 class="card-title mt-2">Total Memberships</h5>
                                        <p class="card-text">{{ $totalMemberships }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-white bg-warning mb-3">
                                    <div class="card-body text-center">
                                        <i class="fas fa-book-reader fa-3x"></i>
                                        <h5 class="card-title mt-2">Total Borrowed Books</h5>
                                        <p class="card-text">{{ $totalBorrowedBooks }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
