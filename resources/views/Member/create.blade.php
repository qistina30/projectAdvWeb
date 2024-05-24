@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-secondary text-white">
            <div class="card-header bg-dark">
                <h2 class="mb-0">Add New Member</h2>
            </div>
            <div class="card-body bg-light text-dark">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('member.store') }}" onsubmit="return validateForm()">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                <label for="name"><i class="fa fa-user"></i> Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="ic_number" name="ic_number" placeholder="IC Number" required oninput="formatICNumber()">
                                <label for="ic_number"><i class="fa fa-id-card"></i> IC Number</label>
                                <div class="invalid-feedback" id="ic_number_error">IC number must be in the format XXXXXX-XX-XXXX</div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                                <label for="address"><i class="fa fa-home"></i> Address</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="phoneNo" name="phoneNo" placeholder="Phone Number" required>
                                <label for="phoneNo"><i class="fa fa-phone"></i> Phone Number</label>
                                <div class="invalid-feedback" id="phoneNo_error">Phone number must start with 0 and be at least 9 digits long.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-md-end">
                            <button class="btn btn-primary btn-lg rounded-pill me-2" type="submit"><i class="fa fa-plus"></i> Add Member</button>
                            <button class="btn btn-secondary btn-lg rounded-pill" type="reset"><i class="fa fa-times"></i> Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function formatICNumber() {
            const icNumberField = document.getElementById('ic_number');
            let icNumber = icNumberField.value.replace(/\D/g, ''); // Remove all non-digit characters
            if (icNumber.length > 6) {
                icNumber = icNumber.slice(0, 6) + '-' + icNumber.slice(6);
            }
            if (icNumber.length > 9) {
                icNumber = icNumber.slice(0, 9) + '-' + icNumber.slice(9);
            }
            icNumberField.value = icNumber;
        }

        function validateForm() {
            return validateICNumber() && validatePhoneNo();
        }

        function validateICNumber() {
            const icNumber = document.getElementById('ic_number').value;
            const icNumberError = document.getElementById('ic_number_error');
            const icPattern = /^\d{6}-\d{2}-\d{4}$/;

            if (!icPattern.test(icNumber)) {
                icNumberError.style.display = 'block';
                return false;
            } else {
                icNumberError.style.display = 'none';
                return true;
            }
        }

        function validatePhoneNo() {
            const phoneNo = document.getElementById('phoneNo').value;
            const phoneNoError = document.getElementById('phoneNo_error');
            const phonePattern = /^0\d{8,}$/;

            if (!phonePattern.test(phoneNo)) {
                phoneNoError.style.display = 'block';
                return false;
            } else {
                phoneNoError.style.display = 'none';
                return true;
            }
        }
    </script>
@endsection
