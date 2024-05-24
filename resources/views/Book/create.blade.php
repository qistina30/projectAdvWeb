@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-secondary text-white">
            <div class="card-header bg-dark">
                <h2 class="mb-0">Add New Book</h2>
            </div>
            <div class="card-body bg-light text-dark"><form method="POST" action="{{ route('book.store') }}" onsubmit="return validateForm()">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                                <label for="title"><i class="fa fa-book"></i> Title</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="author" name="author" placeholder="Author" required>
                                <label for="author"><i class="fa fa-user"></i> Author</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="publisher_name" name="publisher_name" placeholder="Publisher Name" required>
                                <label for="publisher_name"><i class="fa fa-building"></i> Publisher Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" id="published_year" name="published_year" required>
                                    @for ($year = now()->year; $year >= 1900; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                                <label for="published_year"><i class="fa fa-calendar"></i> Publish Year</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" id="category" name="category" required>
                                    <option value="Novel">Novel</option>
                                    <option value="Religion">Religion</option>
                                    <option value="Academic">Academic</option>
                                    <option value="Children">Children</option>
                                    <option value="General Readings">General Readings</option>
                                    <option value="Fiction">Fiction</option>
                                    <option value="Non-Fiction">Non-Fiction</option>
                                    <!-- Add more categories as needed -->
                                </select>
                                <label for="category"><i class="fa fa-tags"></i> Category</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Empty column for spacing -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-md-end">
                            <button class="btn btn-primary btn-lg rounded-pill me-2" type="submit"><i class="fa fa-plus"></i> Add Book</button>
                            <button class="btn btn-secondary btn-lg rounded-pill" type="reset"><i class="fa fa-times"></i> Reset</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
