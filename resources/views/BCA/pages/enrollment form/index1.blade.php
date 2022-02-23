@extends('BCA.layouts.mainLayout')
@section('contents')
    <div class="container px-5">
        @if (Request::is('enroll'))
            <div id="first">
                <form action="{{ route('enroll.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h1 class="h3 mb-4 text-gray-800 text-center text-light bg-bca py-3">Student’s Information </h1>
                    <div class="container mb-3">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="student_lrn" class="text-dark h5 font-weight-bold">Learner Reference Number
                                    (LRN)</label>
                                <input class="form-control w-50 @error('student_lrn') is-invalid @enderror" type="text"
                                    name="student_lrn" id="student_lrn" placeholder="Student LRN"
                                    value="{{ old('student_lrn') }}">
                                @error('student_lrn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3 mr-3">
                                <label for="first_name" class="text-dark h5 font-weight-bold">First name </label>
                                <input class="form-control @error('first_name') is-invalid @enderror" type="text"
                                    name="first_name" id="first_name" placeholder="First name"
                                    value="{{ old('first_name') }}">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3 mr-3">
                                <label for="middle_name" class="text-dark h5 font-weight-bold">Middle name </label>
                                <input class="form-control @error('middle_name') is-invalid @enderror" type="text"
                                    name="middle_name" id="middle_name" placeholder="Middle name"
                                    value="{{ old('middle_name') }}">
                                @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3 mr-3">
                                <label for="last_name" class="text-dark h5 font-weight-bold">Last name </label>
                                <input class="form-control @error('last_name') is-invalid @enderror" type="text"
                                    name="last_name" id="last_name" placeholder="Last name"
                                    value="{{ old('last_name') }}">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3 mr-3">
                                <label for="ext_name" class="text-dark h5 font-weight-bold">Ext. name</label>
                                <input class="form-control @error('ext_name') is-invalid @enderror" type="text"
                                    name="ext_name" id="ext_name" placeholder="Jr." value="{{ old('ext_name') }}">
                                @error('ext_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2 mb-3 mr-3">

                                <label for="Male" class="text-dark h5 font-weight-bold">Gender </label>
                                <div>
                                    @if (old('gender') == 'Male')
                                        <label for="male"
                                            class="radio-inline py-2 mr-1 gender @error('gender') is-invalid @enderror"><input
                                                type="radio" name="gender" id="male" value="Male"
                                                value="{{ old('gender') }}" checked>
                                            Male</label>
                                    @else
                                        <label for="male"
                                            class="radio-inline py-2 mr-1 gender @error('gender') is-invalid @enderror"><input
                                                type="radio" name="gender" id="male" value="Male"
                                                value="{{ old('gender') }}">
                                            Male</label>
                                    @endif

                                    @if (old('gender') == 'Female')
                                        <label for="female"
                                            class="radio-inline py-2 mr-1 gender @error('gender') is-invalid @enderror"><input
                                                type="radio" name="gender" id="female" value="Female"
                                                value="{{ old('gender') }}" checked>
                                            Female</label>
                                    @else
                                        <label for="female"
                                            class="radio-inline py-2 mr-1 gender @error('gender') is-invalid @enderror"><input
                                                type="radio" name="gender" id="female" value="Female"
                                                value="{{ old('gender') }}">
                                            Female</label>
                                    @endif

                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-3 mr-3">
                                <label for="age" class="text-dark h5 font-weight-bold">Age </label>
                                <input class="form-control w-50         @error('age') is-invalid @enderror" type="number"
                                    name="age" id="age" placeholder="Age" value="{{ old('age') }}">
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3 mr-3">
                                <label for="email" class="text-dark h5 font-weight-bold">Email </label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                                    id="email" placeholder="Ex. student@email.com" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3 mr-3">
                                <label for="birthdate" class="text-dark h5 font-weight-bold">Birthdate </label>
                                <input class="form-control @error('birthdate') is-invalid @enderror" type="date"
                                    name="birthdate" id="birthdate" placeholder="birthdate"
                                    value="{{ old('birthdate') }}">
                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3 mr-3">
                                <label for="birthplace" class="text-dark h5 font-weight-bold">Birthplace</label>
                                <input class="form-control @error('birthplace') is-invalid @enderror" type="text"
                                    name="birthplace" id="birthplace" placeholder="Ex. Quezon City"
                                    value="{{ old('birthplace') }}">
                                @error('birthplace')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3 mr-3">
                                <label for="address" class="text-dark h5 font-weight-bold">Address </label>
                                <input class="form-control @error('address') is-invalid @enderror" type="text"
                                    name="address" id="address" placeholder="Ex. Brgy Lamot 2, Calauan Laguna"
                                    value="{{ old('address') }}">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="grade_level_id " class="text-dark h5 font-weight-bold">Grade Level </label>
                                <select name="grade_level_id" id="grade_level_id "
                                    class="form-control w-75 @error('grade_level_id') is-invalid @enderror" required>
                                    <option selected disabled>--- Select grade level ---</option>
                                    @foreach ($gradelevels as $gradelevel)
                                        <option value="{{ $gradelevel->grade_level }}">{{ $gradelevel->grade_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('grade_level_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <h1 class="h3 mb-4 text-gray-800 text-center text-light bg-bca py-3">Father’s Information</h1>
                    <div class="container mb-3">
                        <div class="form-row">
                            <div class="col-md-4 mb-3 mr-3">
                                <label for="father_name" class="text-dark h5 font-weight-bold">Full name</label>
                                <input class="form-control @error('father_name') is-invalid @enderror" type="text"
                                    name="father_name" id="father_name" placeholder="Ex. Juan G. Dela Cruz"
                                    value="{{ old('father_name') }}">
                                @error('father_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mr-3 mb-3">
                                <label for="father_birthdate" class="text-dark h5 font-weight-bold">Birthdate</label>
                                <input class="form-control @error('father_birthdate') is-invalid @enderror" type="date"
                                    name="father_birthdate" id="father_birthdate" value="{{ old('father_birthdate') }}">
                                @error('father_birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mr-3 mb-3">
                                <label for="father_email" class="text-dark h5 font-weight-bold">Email</label>
                                <input class="form-control @error('father_email') is-invalid @enderror" type="text"
                                    name="father_email" id="father_email" placeholder=""
                                    value="{{ old('father_email') }}">
                                @error('father_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mr-3 mb-3">
                                <label for="father_landline" class="text-dark h5 font-weight-bold">Landline</label>
                                <input class="form-control @error('father_landline') is-invalid @enderror" type="text"
                                    name="father_landline" id="father_landline" placeholder=""
                                    value="{{ old('father_landline') }}">
                                @error('father_landline')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mr-3 mb-3">
                                <label for="father_contact_no" class="text-dark h5 font-weight-bold">Contact
                                    no.</label>
                                <input class="form-control @error('father_contact_no') is-invalid @enderror" type="text"
                                    name="father_contact_no" id="father_contact_no" placeholder=""
                                    value="{{ old('father_contact_no') }}">
                                @error('father_contact_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mr-3 mb-3">
                                <label for="father_occupation" class="text-dark h5 font-weight-bold">Occupation</label>
                                <input class="form-control @error('father_occupation') is-invalid @enderror" type="text"
                                    name="father_occupation" id="father_occupation"
                                    value="{{ old('father_occupation') }}">
                                @error('father_occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mr-3 mb-3">
                                <label for="father_office_address" class="text-dark h5 font-weight-bold">Office
                                    address</label>
                                <input class="form-control @error('father_office_address') is-invalid @enderror"
                                    type="text" name="father_office_address" id="father_office_address" placeholder=""
                                    value="{{ old('father_office_address') }}">
                                @error('father_office_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4 mr-3 mb-3">
                                <label for="father_office_contact" class="text-dark h5 font-weight-bold">Office Contact
                                    no.</label>
                                <input class="form-control @error('father_office_contact') is-invalid @enderror"
                                    type="text" name="father_office_contact" id="father_office_contact" placeholder=""
                                    value="{{ old('father_office_contact') }}">
                                @error('father_office_contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <h1 class="h3 mb-4 text-gray-800 text-center text-light bg-bca py-3">Mother’s Information</h1>
                    <div class="container mb-3">
                        <div class="form-row">
                            <div class="col-md-4 mb-3 mr-3">
                                <label for="mother_name" class="text-dark h5 font-weight-bold">Full name</label>
                                <input class="form-control @error('mother_name') is-invalid @enderror" type="text"
                                    name="mother_name" id="mother_name" placeholder="Ex. Juan G. Dela Cruz"
                                    value="{{ old('mother_name') }}">
                                @error('mother_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mr-3 mb-3">
                                <label for="mother_birthdate" class="text-dark h5 font-weight-bold">Birthdate</label>
                                <input class="form-control @error('mother_birthdate') is-invalid @enderror" type="date"
                                    name="mother_birthdate" id="mother_birthdate" value="{{ old('mother_birthdate') }}">
                                @error('mother_birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mr-3 mb-3">
                                <label for="mother_email" class="text-dark h5 font-weight-bold">Email</label>
                                <input class="form-control @error('mother_email') is-invalid @enderror" type="text"
                                    name="mother_email" id="mother_email" placeholder=""
                                    value="{{ old('mother_email') }}">
                                @error('mother_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mr-3 mb-3">
                                <label for="mother_landline" class="text-dark h5 font-weight-bold">Landline
                                </label>
                                <input class="form-control @error('mother_landline') is-invalid @enderror" type="text"
                                    name="mother_landline" id="mother_landline" placeholder=""
                                    value="{{ old('mother_landline') }}">
                                @error('mother_landline')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mr-3 mb-3">
                                <label for="mother_contact_no" class="text-dark h5 font-weight-bold">Contact
                                    no.</label>
                                <input class="form-control @error('mother_occupation') is-invalid @enderror" type="text"
                                    name="mother_contact_no" id="mother_contact_no" placeholder=""
                                    value="{{ old('mother_contact_no') }}">
                                @error('mother_occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mr-3 mb-3">
                                <label for="mother_occupation" class="text-dark h5 font-weight-bold">Occupation</label>
                                <input class="form-control @error('mother_occupation') is-invalid @enderror" type="text"
                                    name="mother_occupation" id="mother_occupation"
                                    value="{{ old('mother_occupation') }}">
                                @error('mother_occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mr-3 mb-3">
                                <label for="mother_office_address" class="text-dark h5 font-weight-bold">Office
                                    address</label>
                                <input class="form-control @error('mother_office_address') is-invalid @enderror"
                                    type="text" name="mother_office_address" id="mother_office_address" placeholder=""
                                    value="{{ old('mother_office_address') }}">
                                @error('mother_office_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4 mr-3 mb-3">
                                <label for="mother_office_contact" class="text-dark h5 font-weight-bold">Office Contact
                                    no.</label>
                                <input class="form-control @error('mother_office_contact') is-invalid @enderror"
                                    type="text" name="mother_office_contact" id="mother_office_contact" placeholder=""
                                    value="{{ old('mother_office_contact') }}">
                                @error('mother_office_contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <h1 class="h3 mb-4 text-gray-800 text-center text-light bg-bca py-3">Guardian’s Information</h1>
                    <div class="container mb-3">
                        <div class="form-row">
                            <div class="col-md-4 mr-3 mb-3">
                                <label for="guardian_name" class="text-dark h5 font-weight-bold">Full name </label>
                                <input class="form-control @error('guardian_name') is-invalid @enderror" type="text"
                                    name="guardian_name" id="guardian_name" placeholder="Ex. Maria S. Dela Cruz"
                                    value="{{ old('guardian_name') }}">
                                @error('guardian_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mr-3 mb-3">
                                <label for="guardian_contact" class="text-dark h5 font-weight-bold">Contact No. </label>
                                <input class="form-control @error('guardian_contact') is-invalid @enderror" type="text"
                                    name="guardian_contact" id="guardian_contact" value="{{ old('guardian_contact') }}">
                                @error('guardian_contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mr-3 mb-3">
                                <label for="guardian_relationship" class="text-dark h5 font-weight-bold">Relationship to learner
                                </label>
                                <input class="form-control @error('guardian_relationship') is-invalid @enderror"
                                    type="text" name="guardian_relationship" id="guardian_relationship"
                                    value="{{ old('guardian_relationship') }}">
                                @error('guardian_relationship')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end px-4 mt-3 mb-4">
                        {{-- <button type="button" onclick="back()" class="btn btn-bca mr-2">Back</button> --}}
                        <button type="submit" onclick="next()"
                            class="btn btn-bca-outline text-bca hvr-sweep-to-bottom">Next</button>
                    </div>
                </form>
            </div>
        @endif
        @if (Request::is('enroll/requirements'))
            <div id="second">
                <h1 class="h3 mb-4 text-gray-800 text-center text-light bg-bca py-3">Requirements</h1>
                <div class="container mb-3">
                    <form action="#" method="post">
                        @csrf
                        <div class="col-5 my-3">
                            <h5>NSO / PSA</h5>
                            <div class="input-group ">
                                <div class="custom-file">
                                    <input type="file" name="psa"
                                        class="custom-file-input @error('student_lrn') is-invalid @enderror" id="psa"
                                        required>
                                    <label class="custom-file-label " for="psa">Choose file...</label>
                                    @error('student_lrn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-bca" type="button">Button</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="#" method="post">
                        @csrf
                        <div class="col-5 my-3">
                            <h5>Form 137 / Report Card</h5>
                            <div class="input-group ">
                                <div class="custom-file">
                                    <input type="file" name="psa"
                                        class="custom-file-input @error('student_lrn') is-invalid @enderror" id="psa"
                                        required>
                                    <label class="custom-file-label " for="psa">Choose file...</label>
                                    @error('student_lrn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-bca" type="button">Button</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="#" method="post">
                        @csrf
                        <div class="col-5 my-3">
                            <h5>Good Moral Certification</h5>
                            <div class="input-group ">
                                <div class="custom-file">
                                    <input type="file" name="psa"
                                        class="custom-file-input @error('student_lrn') is-invalid @enderror" id="psa"
                                        required>
                                    <label class="custom-file-label " for="psa">Choose file...</label>
                                    @error('student_lrn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-bca" type="button">Button</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="#" method="post">
                        @csrf
                        <div class="col-5 my-3">
                            <h5>1x1 Photo</h5>
                            <div class="input-group ">
                                <div class="custom-file">
                                    <input type="file" name="psa"
                                        class="custom-file-input @error('student_lrn') is-invalid @enderror" id="psa"
                                        required>
                                    <label class="custom-file-label " for="psa">Choose file...</label>
                                    @error('student_lrn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-bca" type="button">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <h1 class="h3 mb-4 text-gray-800 text-center text-light bg-bca py-3">Mode of Payment</h1>
                <div class="container mb-3">
                    <fieldset class="form-group row">
                        <legend class="col-form-label col-sm-2 float-sm-left pt-0">Radios</legend>
                        <div class="col-sm-10">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                            <label class="form-check-label" for="gridRadios1">
                              First radio
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                            <label class="form-check-label" for="gridRadios2">
                              Second radio
                            </label>
                          </div>
                          <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
                            <label class="form-check-label" for="gridRadios3">
                              Third disabled radio
                            </label>
                          </div>
                        </div>
                      </fieldset>
                </div>
            </div>
        @endif
    </div>
@endsection
@section('page_level_js')
    {{-- <script>
        const student = document.getElementById('student'); //1
        const father = document.getElementById('parent-father'); //2
        function next() {
            if (student.style.display == "block") {
                student.style.animation = "slide-out-top 0.5s ease";
                student.style.display = "none";
                setTimeout(() => {
                    father.style.display = "block";
                }, 0.6);
                father.style.animation = "slide-in-bottom 0.5s ease";
                console.log('student');
            }
            if (father.style.display == "block") {

                console.log('parents');
            }


            /*  first.style.animation = "slide-out-top 0.5s ease";
             first.style.display = "none";

             setTimeout(() => {
                 old.style.display = "block";
             }, 0.6);
             old.style.animation = "slide-in-bottom 0.5s ease";
             console.log('old student'); */
        }

        function back() {
            if (father.style.display == "block") {
                father.style.animation = "slide-out-top 0.5s ease";
                father.style.display = "none";
                setTimeout(() => {
                    student.style.display = "block";
                }, 0.6);
                student.style.animation = "slide-in-bottom 0.5s ease";
                console.log('parents');
            }
        }
    </script> --}}
@endsection
