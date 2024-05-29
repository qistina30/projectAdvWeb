
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card bg-secondary text-white">
            <div class="card-header bg-dark text-white">
                <h2>Update Return Date</h2>
            </div>
            <div class="card-body bg-light text-dark">
                <form action="{{ route('records.update', ['id' => $record->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="returning_date" name="returning_date" required>
                                    <label for="returning_date"><i class="fa fa-calendar"></i> Return Date</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-md-end">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill"><i class="fa fa-save"></i> Update</button>
                            <button class="btn btn-secondary btn-lg rounded-pill" type="reset"><i class="fa fa-times"></i> Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

