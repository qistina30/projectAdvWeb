@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <div class="col">
                        <a href="{{ route('book.index') }}" class="text-decoration-none">
                            <div class="card bg-info text-white">
                                <div class="card-body text-center">
                                    <i class="fas fa-book fa-2x mb-3"></i>
                                    <h5 class="card-title">Total Books</h5>
                                    <p class="card-text fs-5">{{ $totalBooks }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ route('member.index') }}" class="text-decoration-none">
                            <div class="card bg-success text-white">
                                <div class="card-body text-center">
                                    <i class="fas fa-users fa-2x mb-3"></i>
                                    <h5 class="card-title">Total Memberships</h5>
                                    <p class="card-text fs-5">{{ $totalMemberships }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ route('records.index') }}" class="text-decoration-none">
                            <div class="card bg-warning text-white">
                                <div class="card-body text-center">
                                    <i class="fas fa-book-reader fa-2x mb-3"></i>
                                    <h5 class="card-title">Total Borrowed Books</h5>
                                    <p class="card-text fs-5">{{ $totalBorrowedBooks }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ route('book.available') }}" class="text-decoration-none">
                            <div class="card bg-info text-white">
                                <div class="card-body text-center">
                                    <i class="fas fa-book-open fa-2x mb-3"></i>
                                    <h5 class="card-title">Total Available Books</h5>
                                    <p class="card-text fs-5">{{ $totalAvailableBooks }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
