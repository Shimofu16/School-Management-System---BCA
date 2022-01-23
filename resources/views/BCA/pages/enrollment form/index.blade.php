@extends('BCA.layouts.mainLayout')
@section('page_level_css')
    <link rel="stylesheet" href="{{ asset('css/home/pages/customform.css') }}">
@endsection

@section('contents')
    <section id="enroll">
        <div class="w-100 pt-home px-5">
            <h1 class="h3 mb-4 text-gray-800 text-align-center">Enrollment Form</h1>
            <div class="col-12 form-overflow">
                <form action="{{ route('enroll.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="student_lrn" class="text-dark text-black font-weight-bold">Student LRN:</label>
                        <input class="form-control w-25" type="text" name="student_lrn" id="student_lrn"
                            placeholder="Student LRN" value="{{ old('student_lrn') }}">
                    </div>
                    <div class="form-group">
                        <label for="Lastname" class="text-dark text-black font-weight-bold">Last name:</label>
                        <input class="form-control w-75" type="text" name="last_name" id="Lastname" placeholder="Last name"
                            value="{{ old('last_name') }}">
                    </div>
                    <div class="form-group">
                        <label for="Firstname" class="text-dark text-black font-weight-bold">First name:</label>
                        <input class="form-control w-75" type="text" name="first_name" id="Firstname"
                            placeholder="First name" value="{{ old('first_name') }}">
                    </div>
                    <div class="form-group">
                        <label for="Middlename" class="text-dark text-black font-weight-bold">Middle name:</label>
                        <input class="form-control w-75" type="text" name="middle_name" id="Middlename"
                            placeholder="Middle name" value="{{ old('middle_name') }}">
                    </div>
                    <div class="form-group">
                        <label for="Extname" class="text-dark text-black font-weight-bold">Ext. name:</label>
                        <input class="form-control w-75" type="text" name="ext_name" id="Extname"
                            placeholder="Jr. Ma. | write none if you dont have Ext name" value="{{ old('ext_name') }}">
                    </div>
                    <div class="form-group">
                        <label for="Extname" class="text-dark text-black font-weight-bold">Gender:</label>
                        <div>
                            <label for="male" class="radio-inline"><input type="radio" name="gender" id="male"
                                    value="Male" value="{{ old('gender') }}">
                                Male</label>
                            <label for="female" class="radio-inline"><input type="radio" name="gender" id="female"
                                    value="Female" value="{{ old('gender') }}">
                                Female</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Age" class="text-dark text-black font-weight-bold">Age:</label>
                        <input class="form-control w-25" type="number" name="age" id="Age" placeholder="Age"
                            value="{{ old('age') }}">
                    </div>
                    <div class="form-group">
                        <label for="Email" class="text-dark text-black font-weight-bold">Email:</label>
                        <input class="form-control w-25" type="email" name="email" id="Email" placeholder="email@email.com"
                            value="{{ old('age') }}">
                    </div>
                    <div class="form-group">
                        <label for="bdate" class="text-dark text-black font-weight-bold">Birthdate:</label>
                        <input class="form-control w-25" type="date" name="birthdate" id="bdate" placeholder="Birthdate"
                            value="{{ old('birthdate') }}">
                    </div>
                    <div class="form-group">
                        <label for="birthplace" class="text-dark text-black font-weight-bold">Birthplace:</label>
                        <input class="form-control w-75" type="text" name="birthplace" id="birthplace"
                            placeholder="Birthplace" value="{{ old('birthplace') }}">
                    </div>
                    <div class="form-group">
                        <label for="address" class="text-dark text-black font-weight-bold">Address:</label>
                        <input class="form-control w-75" type="text" name="address" id="address" placeholder="Address"
                            value="{{ old('address') }}">
                    </div>
                    <div class="form-group">
                        <label for="year_level" class="text-dark text-black font-weight-bold">Year Level:</label>
                        <select name="yearlevel_id" id="year_level" class="form-control w-50">
                            @foreach ($yl as $ylevel)
                                <option value="{{ $ylevel->id }}">{{ $ylevel->yearlevel_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="enrollmentpay" class="text-dark text-black font-weight-bold">Payment:</label>
                        <input class="form-control w-25" type="file" name="payment" id="enrollmentpay" placeholder="Payment"
                            value="{{ old('payment') }}">
                    </div>
                    <button class="btn btn-bca shadow" type="submit">Add Student</button>
                </form>
            </div>
        </div>
    </section>
@endsection
