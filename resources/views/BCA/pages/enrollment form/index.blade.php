@extends('BCA.layouts.mainLayout')
@section('page_level_css')
    <style>
        .custom-alert {
            position: absolute;
            top: 30px;
            width: 300px;
            right: 10px;
            z-index: 10000;
        }

        .alert {
            opacity: 1;
            transition: opacity 0.6s;
            /* 600ms to fade out */
        }

    </style>
@endsection
@section('contents')
    @if (Session::has('success'))
        <div class="custom-alert">
            <div class="col-12">
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <hr class="mt-4">
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
    @endif
    @if ($errors->any())

        <div class="custom-alert">
            <div class="col-12">
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <hr class="mt-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="container px-5">
        <form action="{{ route('enroll.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1 class="h3 mb-4 text-gray-800 text-center text-light bg-bca py-3">Student’s Info </h1>
            <div class="container mb-3">
                <div class="form-row">
                    <div class="col-md-4">
                        <label for="student_lrn" class="text-dark text-black font-weight-bold">Learner Reference Number
                            (LRN) <span class="text-danger">(Required)</span>:</label>
                        <input class="form-control w-50" type="text" name="student_lrn" id="student_lrn"
                            placeholder="Student LRN" value="{{ old('student_lrn') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3 mr-3">
                        <label for="first_name" class="text-dark text-black font-weight-bold">First name <span
                                class="text-danger">(Required)</span>:</label>
                        <input class="form-control" type="text" name="first_name" id="first_name" placeholder="First name"
                            value="{{ old('first_name') }}">
                    </div>
                    <div class="col-md-4 mb-3 mr-3">
                        <label for="middle_name" class="text-dark text-black font-weight-bold">Middle name <span
                                class="text-danger">(Required)</span>:</label>
                        <input class="form-control " type="text" name="middle_name" id="middle_name"
                            placeholder="Middle name" value="{{ old('middle_name') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3 mr-3">
                        <label for="last_name" class="text-dark text-black font-weight-bold">Last name <span
                                class="text-danger">(Required)</span>:</label>
                        <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Last name"
                            value="{{ old('last_name') }}">
                    </div>
                    <div class="col-md-4 mb-3 mr-3">
                        <label for="ext_name" class="text-dark text-black font-weight-bold">Ext. name:</label>
                        <input class="form-control" type="text" name="ext_name" id="ext_name"
                            placeholder="Jr. Ma. | write none if you dont have Ext name" value="{{ old('ext_name') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-2 mb-3 mr-3">

                        <label for="Male" class="text-dark text-black font-weight-bold">Gender <span
                                class="text-danger">(Required)</span>:</label>
                        <div>
                            @if (old('gender') == 'Male')
                                <label for="male" class="radio-inline py-2 mr-1"><input type="radio" name="gender" id="male"
                                        value="Male" value="{{ old('gender') }}" checked>
                                    Male</label>
                            @else
                                <label for="male" class="radio-inline py-2 mr-1"><input type="radio" name="gender" id="male"
                                        value="Male" value="{{ old('gender') }}">
                                    Male</label>
                            @endif

                            @if (old('gender') == 'Female')
                                <label for="female" class="radio-inline"><input type="radio" name="gender" id="female"
                                        value="Female" value="{{ old('gender') }}" checked>
                                    Female</label>
                            @else
                                <label for="female" class="radio-inline"><input type="radio" name="gender" id="female"
                                        value="Female" value="{{ old('gender') }}">
                                    Female</label>
                            @endif

                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mr-3">
                        <label for="age" class="text-dark text-black font-weight-bold">Age <span
                                class="text-danger">(Required)</span>:</label>
                        <input class="form-control w-50" type="number" name="age" id="age" placeholder="Age"
                            value="{{ old('age') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3 mr-3">
                        <label for="email" class="text-dark text-black font-weight-bold">Email <span
                                class="text-danger">(Required)</span>:</label>
                        <input class="form-control" type="email" name="email" id="email"
                            placeholder="Ex. student@email.com" value="{{ old('email') }}">
                    </div>
                    <div class="col-md-4 mb-3 mr-3">
                        <label for="birthdate" class="text-dark text-black font-weight-bold">Birthdate <span
                                class="text-danger">(Required)</span>:</label>
                        <input class="form-control " type="date" name="birthdate" id="birthdate" placeholder="birthdate"
                            value="{{ old('birthdate') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3 mr-3">
                        <label for="birthplace" class="text-dark text-black font-weight-bold">Birthplace:</label>
                        <input class="form-control" type="text" name="birthplace" id="birthplace"
                            placeholder="Ex. Quezon City" value="{{ old('birthplace') }}">
                    </div>
                    <div class="col-md-4 mb-3 mr-3">
                        <label for="address" class="text-dark text-black font-weight-bold">Address <span
                                class="text-danger">(Required)</span>:</label>
                        <input class="form-control" type="text" name="address" id="address"
                            placeholder="Ex. Brgy Lamot 2, Calauan Laguna" value="{{ old('address') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4">
                        <label for="grade_level_id " class="text-dark text-black font-weight-bold">Year Level <span
                                class="text-danger">(Required)</span>:</label>
                        <select name="grade_level_id" id="grade_level_id " class="form-control w-75">
                            <option selected>--- Select grade level ---</option>
                            @foreach ($gradelevels as $gradelevel)
                                <option value="{{ $gradelevel->grade_level }}">{{ $gradelevel->grade_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <h1 class="h3 mb-4 text-gray-800 text-center text-light bg-bca py-3">Father’s Information</h1>
            <div class="container mb-3">
                <div class="form-row">
                    <div class="col-md-4 mb-3 mr-3">
                        <label for="father_name" class="text-dark text-black font-weight-bold">Full name:</label>
                        <input class="form-control" type="text" name="father_name" id="father_name"
                            placeholder="Ex. Juan G. Dela Cruz" value="{{ old('father_name') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mr-3 mb-3">
                        <label for="father_birthdate" class="text-dark text-black font-weight-bold">Birthdate:</label>
                        <input class="form-control" type="date" name="father_birthdate" id="father_birthdate"
                            value="{{ old('father_birthdate') }}">
                    </div>
                    <div class="col-md-4 mr-3 mb-3">
                        <label for="father_email" class="text-dark text-black font-weight-bold">Email:</label>
                        <input class="form-control" type="text" name="father_email" id="father_email" placeholder=""
                            value="{{ old('father_email') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mr-3 mb-3">
                        <label for="father_landline" class="text-dark text-black font-weight-bold">Landline:</label>
                        <input class="form-control" type="text" name="father_landline" id="father_landline" placeholder=""
                            value="{{ old('father_landline') }}">
                    </div>
                    <div class="col-md-4 mr-3 mb-3">
                        <label for="father_contact_no" class="text-dark text-black font-weight-bold">Office Contact
                            no.:</label>
                        <input class="form-control" type="text" name="father_contact_no" id="father_contact_no"
                            placeholder="" value="{{ old('father_contact_no') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mr-3 mb-3">
                        <label for="father_occupation" class="text-dark text-black font-weight-bold">Occupation:</label>
                        <input class="form-control" type="text" name="father_occupation" id="father_occupation"
                            value="{{ old('father_occupation') }}">
                    </div>
                    <div class="col-md-4 mr-3 mb-3">
                        <label for="father_office_address" class="text-dark text-black font-weight-bold">Office
                            address:</label>
                        <input class="form-control" type="text" name="father_office_address" id="father_office_address"
                            placeholder="" value="{{ old('father_office_address') }}">
                    </div>

                    <div class="col-md-4 mr-3 mb-3">
                        <label for="father_office_contact" class="text-dark text-black font-weight-bold">Office Contact
                            no.:</label>
                        <input class="form-control" type="text" name="father_office_contact" id="father_office_contact"
                            placeholder="" value="{{ old('father_office_contact') }}">
                    </div>
                </div>
            </div>
            <h1 class="h3 mb-4 text-gray-800 text-center text-light bg-bca py-3">Mother’s Information</h1>
            <div class="container mb-3">
                <div class="form-row">
                    <div class="col-md-4 mb-3 mr-3">
                        <label for="mother_name" class="text-dark text-black font-weight-bold">Full name:</label>
                        <input class="form-control" type="text" name="mother_name" id="mother_name"
                            placeholder="Ex. Juan G. Dela Cruz" value="{{ old('mother_name') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mr-3 mb-3">
                        <label for="mother_birthdate" class="text-dark text-black font-weight-bold">Birthdate:</label>
                        <input class="form-control" type="date" name="mother_birthdate" id="mother_birthdate"
                            value="{{ old('mother_birthdate') }}">
                    </div>
                    <div class="col-md-4 mr-3 mb-3">
                        <label for="mother_email" class="text-dark text-black font-weight-bold">Email:</label>
                        <input class="form-control" type="text" name="mother_email" id="mother_email" placeholder=""
                            value="{{ old('mother_email') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mr-3 mb-3">
                        <label for="mother_landline" class="text-dark text-black font-weight-bold">Landline:</label>
                        <input class="form-control" type="text" name="mother_landline" id="mother_landline"
                            placeholder="" value="{{ old('mother_landline') }}">
                    </div>
                    <div class="col-md-4 mr-3 mb-3">
                        <label for="mother_contact_no" class="text-dark text-black font-weight-bold">Office Contact
                            no.:</label>
                        <input class="form-control" type="text" name="mother_contact_no" id="mother_contact_no"
                            placeholder="" value="{{ old('mother_contact_no') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mr-3 mb-3">
                        <label for="mother_occupation" class="text-dark text-black font-weight-bold">Occupation:</label>
                        <input class="form-control" type="text" name="mother_occupation" id="mother_occupation"
                            value="{{ old('mother_occupation') }}">
                    </div>
                    <div class="col-md-4 mr-3 mb-3">
                        <label for="mother_office_address" class="text-dark text-black font-weight-bold">Office
                            address:</label>
                        <input class="form-control" type="text" name="mother_office_address" id="mother_office_address"
                            placeholder="" value="{{ old('mother_office_address') }}">
                    </div>

                    <div class="col-md-4 mr-3 mb-3">
                        <label for="mother_office_contact" class="text-dark text-black font-weight-bold">Office Contact
                            no.:</label>
                        <input class="form-control" type="text" name="mother_office_contact" id="mother_office_contact"
                            placeholder="" value="{{ old('mother_office_contact') }}">
                    </div>
                </div>
            </div>
            <h1 class="h3 mb-4 text-gray-800 text-center text-light bg-bca py-3">Guardian’s Information</h1>
            <div class="container mb-3">
                <div class="form-row">
                    <div class="col-md-4 mr-3 mb-3">
                        <label for="guardian_name" class="text-dark text-black font-weight-bold">Full name:</label>
                        <input class="form-control" type="text" name="guardian_name" id="guardian_name"
                            placeholder="Ex. Maria S. Dela Cruz" value="{{ old('guardian_name') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mr-3 mb-3">
                        <label for="guardian_birthdate" class="text-dark text-black font-weight-bold">Birthdate:</label>
                        <input class="form-control" type="date" name="guardian_birthdate" id="guardian_birthdate"
                            value="{{ old('guardian_birthdate') }}">
                    </div>
                    <div class="col-md-4 mr-3 mb-3">
                        <label for="guardian_email" class="text-dark text-black font-weight-bold">Email:</label>
                        <input class="form-control" type="text" name="guardian_email" id="guardian_email" placeholder=""
                            value="{{ old('guardian_email') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mr-3 mb-3">
                        <label for="guardian_landline" class="text-dark text-black font-weight-bold">Landline:</label>
                        <input class="form-control" type="text" name="guardian_landline" id="guardian_landline"
                            placeholder="" value="{{ old('guardian_landline') }}">
                    </div>
                    <div class="col-md-4 mr-3 mb-3">
                        <label for="guardian_contact" class="text-dark text-black font-weight-bold">Contact No.:</label>
                        <input class="form-control" type="text" name="guardian_contact" id="guardian_contact"
                            value="{{ old('guardian_contact') }}">
                    </div>
                </div>
            </div>
            <div class="row justify-content-end align-content-end my-4">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-bca btn-lg text-light" type="submit">Enroll</button>
                </div>
            </div>
        </form>
    </div>
@endsection
