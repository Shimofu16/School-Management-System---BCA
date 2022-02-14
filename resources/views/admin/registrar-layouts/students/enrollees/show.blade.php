@extends('admin.registrar-layouts.index')
@section('page-title') Student’s Information @endsection
@section('contents')
    @include('admin.alert-msgs._success')
    <h1 class="h3 mb-4 text-white text-center py-3 bg-bca">
        @yield('page-title')
    </h1>
    <div class="row">
        <div class="col-3 mr-3">
            <div class="container d-flex flex-column justify-content-center align-content-center shadow-lg">
                <div class="mb-3 mt-3 d-flex justify-content-center">
                    @if ($student->gender == 'Male')
                        <img class="student-picture" src="{{ asset('/img/icons/user-male.png') }}" alt="" />
                    @elseif ($student->gender == 'Female')
                        <img class="student-picture" src="{{ asset('/img/icons/user-female.png') }}" alt="" />
                    @endif
                </div>
                <div class="text-center mb-3">
                    <h5 class="fw-bolder text-dark">{{ ucfirst($student->first_name) }}
                        {{ substr(ucfirst($student->middle_name), 0, 1) }} ,
                        {{ ucfirst($student->last_name) }} @if ($student->ext_name !== null){{ ucfirst($student->ext_name) }}@endif</h5>
                    <h6>{{ $student->email }}</h6>
                </div>
                <div class="text-center mb-3">
                    <h5 class="text-primary">Grade</h5>
                    <h6>{{ $student->gradeLevel->grade_name }}</h6>
                </div>
            </div>
        </div>
        <div class="col-7 shadow-lg mb-5">
            <div class="row header-bg">
                @if (Request::is('registrar/students/enrollee/*/show'))
                    <div class="col d-flex justify-content-center py-1 bg-bca">
                        <a href="{{ route('enrollees.show', $student->id) }}" class="btn text-white">Student</a>
                    </div>
                    <div class="col d-flex justify-content-center py-1">
                        <a href="{{ route('enrollees.show.requirements', $student->id) }}"
                            class="btn text-white">Requirements</a>
                    </div>
                @endif
                @if (Request::is('registrar/students/enrollee/*/requirements'))
                    <div class="col d-flex justify-content-center py-1">
                        <a href="{{ route('enrollees.show', $student->id) }}" class="btn text-white">Student</a>
                    </div>
                    <div class="col d-flex justify-content-center py-1 bg-bca">
                        <a href="{{ route('enrollees.show.requirements', $student->id) }}"
                            class="btn text-white">Requirements</a>
                    </div>
                @endif


            </div>
            @if (Request::is('registrar/students/enrollee/*/show'))
                <div class="row px-3 pt-4 flex-column" id="student">
                    <div class="px-3">
                        <div class="form-row">
                            <div class="col-12">
                                <div class="form-check form-check-inline w-100">
                                    <label class="fw-bolder h5 text-dark" for="name">Name:</label>
                                    <input class="w-75 border-0 bg-transparent h5" type="text" id="name"
                                        value=" {{ ucfirst($student->first_name) }} {{ ucfirst($student->middle_name) }}, {{ ucfirst($student->last_name) }}@if ($student->ext_name !== null) {{ ucfirst($student->ext_name) }}@endif"
                                        disabled>
                                </div>

                            </div>
                        </div>
                        <div class="form-row mb-1">
                            <div class="col-4">
                                <div class="form-check form-check-inline">
                                    <label class="fw-bolder h5 text-dark" for="gender">Gender:</label>
                                    <input class="form-check-input border-0 bg-transparent h5" type="text" id="gender"
                                        value=" {{ $student->gender }}" disabled>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-check form-check-inline">
                                    <label class="fw-bolder h5 text-dark" for="age">Age:</label>
                                    <input class="form-check-input border-0 bg-transparent h5" type="text" id="age"
                                        value=" {{ $student->age }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-1">
                            <div class="col-3">
                                <div class="form-check form-check-inline">
                                    <label class="fw-bolder h5 text-dark" for="email">Email:</label>
                                    <input class="form-check-input border-0 bg-transparent h5" type="text" id="email"
                                        value=" {{ $student->email }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-1">
                            <div class="col-4 mb-1">
                                <div class="form-check form-check-inline">
                                    <label class="fw-bolder h5 text-dark" for="birthdate">Birthdate:</label>
                                    <input class="form-check-input border-0 bg-transparent h5" type="text" id="birthdate"
                                        value=" {{ date('m/d/Y', strtotime($student->birthdate)) }}" disabled>
                                </div>
                            </div>
                            <div class="col-4 mb-1">
                                <div class="form-check form-check-inline">
                                    <label class="fw-bolder h5 text-dark" for="birthplace">Birthplace:</label>
                                    <input class="form-check-input border-0 bg-transparent h5" type="text" id="birthplace"
                                        value=" {{ ucfirst($student->birthplace) }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-1">
                            <div class="col-4">
                                <div class="form-check form-check-inline">
                                    <label class="fw-bolder h5 text-dark" for="address">Address:</label>
                                    <input class="form-check-input border-0 bg-transparent h5" type="text" id="address"
                                        value=" {{ ucfirst($student->address) }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-1">
                            <div class="col-6 mb-1">
                                <div class="form-check form-check-inline">
                                    <label class="fw-bolder h5 text-dark" for="grade_level">Grade:</label>
                                    <input class="form-check-input border-0 bg-transparent h5" type="text" id="grade_level"
                                        value=" {{ $student->gradeLevel->grade_name }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($families as $family)
                        @if ($family->student_id == $student->id)
                            <hr class="border w-100 h-50">
                            @if ($family->relationship == 'Father')
                                <h3 class="text-center fw-bolder text-dark">Father</h3>
                                <div class="px-3">
                                    <div class="form-row mb-1">
                                        <div class="col-4">
                                            <div class="form-check form-check-inline">
                                                <label class="fw-bolder h5 text-dark" for="name">Name:</label>
                                                <input class="form-check-input border-0 bg-transparent h5" type="text"
                                                    id="name" value=" {{ $family->name }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-1">
                                        <div class="col-4">
                                            <div class="form-check form-check-inline">
                                                <label class="fw-bolder h5 text-dark" for="birthdate">Birthdate:</label>
                                                <input class="form-check-input border-0 bg-transparent h5" type="text"
                                                    id="birthdate"
                                                    value=" {{ date('m/d/Y', strtotime($family->birthdate)) }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($family->landline !== null)
                                        <div class="form-row mb-1">
                                            <div class="col-4">
                                                <div class="form-check form-check-inline">
                                                    <label class="fw-bolder h5 text-dark" for="landline">Landline:</label>
                                                    <input class="form-check-input border-0 bg-transparent h5" type="text"
                                                        id="landline" value=" {{ $family->landline }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-row mb-1">
                                        <div class="col-7">
                                            <div class="form-check form-check-inline">
                                                <label class="fw-bolder h5 text-dark" for="contact_no">Contact No.:</label>
                                                <input class="form-check-input border-0 bg-transparent h5" type="text"
                                                    id="contact_no" value=" {{ $family->contact_no }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($family->email !== null)
                                        <div class="form-row mb-1">
                                            <div class="col-4">
                                                <div class="form-check form-check-inline">
                                                    <label class="fw-bolder h5 text-dark" for="email">Email:</label>
                                                    <input class="form-check-input border-0 bg-transparent h5" type="text"
                                                        id="email" value=" {{ $family->email }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($family->occupation !== null)
                                        <div class="form-row mb-1">
                                            <div class="col-4">
                                                <div class="form-check form-check-inline">
                                                    <label class="fw-bolder h5 text-dark"
                                                        for="occupation">Occupation:</label>
                                                    <input class="form-check-input border-0 bg-transparent h5" type="text"
                                                        id="occupation" value=" {{ $family->occupation }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($family->office_address !== null)
                                        <div class="form-row mb-1">
                                            <div class="col-4">
                                                <div class="form-check form-check-inline">
                                                    <label class="fw-bolder h5 text-dark" for="office_address">Office
                                                        Address:</label>
                                                    <input class="form-check-input border-0 bg-transparent h5" type="text"
                                                        id="office_address" value=" {{ $family->office_address }}"
                                                        disabled>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($family->office_contact_no !== null)
                                        <div class="form-row mb-1">
                                            <div class="col-9">
                                                <div class="form-check form-check-inline">
                                                    <label class="fw-bolder h5 text-dark" for="office_contact_no">Office
                                                        Address No.:</label>
                                                    <input class="form-check-input border-0 bg-transparent h5" type="text"
                                                        id="office_contact_no" value=" {{ $family->office_contact_no }}"
                                                        disabled>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @break
                        @endif
                    @endif
            @endforeach
            @foreach ($families as $family)
                @if ($family->student_id == $student->id)
                    @if ($family->relationship == 'Mother')
                        <h3 class="text-center fw-bolder text-dark">Mother</h3>
                        <div class="px-3">
                            <div class="form-row mb-1">
                                <div class="col-4">
                                    <div class="form-check form-check-inline">
                                        <label class="fw-bolder h5 text-dark" for="name">Name:</label>
                                        <input class="form-check-input border-0 bg-transparent h5" type="text" id="name"
                                            value=" {{ $family->name }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row mb-1">
                                <div class="col-4">
                                    <div class="form-check form-check-inline">
                                        <label class="fw-bolder h5 text-dark" for="birthdate">Birthdate:</label>
                                        <input class="form-check-input border-0 bg-transparent h5" type="text"
                                            id="birthdate" value=" {{ date('m/d/Y', strtotime($family->birthdate)) }}"
                                            disabled>
                                    </div>
                                </div>
                            </div>
                            @if ($family->landline !== null)
                                <div class="form-row mb-1">
                                    <div class="col-4">
                                        <div class="form-check form-check-inline">
                                            <label class="fw-bolder h5 text-dark" for="landline">Landline:</label>
                                            <input class="form-check-input border-0 bg-transparent h5" type="text"
                                                id="landline" value=" {{ $family->landline }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="form-row mb-1">
                                <div class="col-7">
                                    <div class="form-check form-check-inline">
                                        <label class="fw-bolder h5 text-dark" for="contact_no">Contact No.:</label>
                                        <input class="form-check-input border-0 bg-transparent h5" type="text"
                                            id="contact_no" value=" {{ $family->contact_no }}" disabled>
                                    </div>
                                </div>
                            </div>
                            @if ($family->email !== null)
                                <div class="form-row mb-1">
                                    <div class="col-4">
                                        <div class="form-check form-check-inline">
                                            <label class="fw-bolder h5 text-dark" for="email">Email:</label>
                                            <input class="form-check-input border-0 bg-transparent h5" type="text"
                                                id="email" value=" {{ $family->email }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($family->occupation !== null)
                                <div class="form-row mb-1">
                                    <div class="col-4">
                                        <div class="form-check form-check-inline">
                                            <label class="fw-bolder h5 text-dark" for="occupation">Occupation:</label>
                                            <input class="form-check-input border-0 bg-transparent h5" type="text"
                                                id="occupation" value=" {{ $family->occupation }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($family->office_address !== null)
                                <div class="form-row mb-1">
                                    <div class="col-4">
                                        <div class="form-check form-check-inline">
                                            <label class="fw-bolder h5 text-dark" for="office_address">Office
                                                Address:</label>
                                            <input class="form-check-input border-0 bg-transparent h5" type="text"
                                                id="office_address" value=" {{ $family->office_address }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($family->office_contact_no !== null)
                                <div class="form-row mb-1">
                                    <div class="col-9">
                                        <div class="form-check form-check-inline">
                                            <label class="fw-bolder h5 text-dark" for="office_contact_no">Office
                                                Address No.:</label>
                                            <input class="form-check-input border-0 bg-transparent h5" type="text"
                                                id="office_contact_no" value=" {{ $family->office_contact_no }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @break
                @endif
            @endif
            @endforeach
            @foreach ($families as $family)
                @if ($family->student_id == $student->id)
                    @if ($family->relationship == 'Guardian')
                        <h3 class="text-center fw-bolder text-dark">Guardian</h3>
                        <div class="px-3">
                            <div class="form-row mb-1">
                                <div class="col-4">
                                    <div class="form-check form-check-inline">
                                        <label class="fw-bolder h5 text-dark" for="name">Name:</label>
                                        <input class="form-check-input border-0 bg-transparent h5" type="text" id="name"
                                            value=" {{ $family->name }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row mb-1">
                                <div class="col-4">
                                    <div class="form-check form-check-inline">
                                        <label class="fw-bolder h5 text-dark" for="birthdate">Birthdate:</label>
                                        <input class="form-check-input border-0 bg-transparent h5" type="text"
                                            id="birthdate" value=" {{ date('m/d/Y', strtotime($family->birthdate)) }}"
                                            disabled>
                                    </div>
                                </div>
                            </div>
                            @if ($family->landline !== null)
                                <div class="form-row mb-1">
                                    <div class="col-4">
                                        <div class="form-check form-check-inline">
                                            <label class="fw-bolder h5 text-dark" for="landline">Landline:</label>
                                            <input class="form-check-input border-0 bg-transparent h5" type="text"
                                                id="landline" value=" {{ $family->landline }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="form-row mb-1">
                                <div class="col-7">
                                    <div class="form-check form-check-inline">
                                        <label class="fw-bolder h5 text-dark" for="contact_no">Contact No.:</label>
                                        <input class="form-check-input border-0 bg-transparent h5" type="text"
                                            id="contact_no" value=" {{ $family->contact_no }}" disabled>
                                    </div>
                                </div>
                            </div>
                            @if ($family->email !== null)
                                <div class="form-row mb-1">
                                    <div class="col-4">
                                        <div class="form-check form-check-inline">
                                            <label class="fw-bolder h5 text-dark" for="email">Email:</label>
                                            <input class="form-check-input border-0 bg-transparent h5" type="text"
                                                id="email" value=" {{ $family->email }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($family->occupation !== null)
                                <div class="form-row mb-1">
                                    <div class="col-4">
                                        <div class="form-check form-check-inline">
                                            <label class="fw-bolder h5 text-dark" for="occupation">Occupation:</label>
                                            <input class="form-check-input border-0 bg-transparent h5" type="text"
                                                id="occupation" value=" {{ $family->occupation }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($family->office_address !== null)
                                <div class="form-row mb-1">
                                    <div class="col-4">
                                        <div class="form-check form-check-inline">
                                            <label class="fw-bolder h5 text-dark" for="office_address">Office
                                                Address:</label>
                                            <input class="form-check-input border-0 bg-transparent h5" type="text"
                                                id="office_address" value=" {{ $family->office_address }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($family->office_contact_no !== null)
                                <div class="form-row mb-1">
                                    <div class="col-9">
                                        <div class="form-check form-check-inline">
                                            <label class="fw-bolder h5 text-dark" for="office_contact_no">Office
                                                Address No.:</label>
                                            <input class="form-check-input border-0 bg-transparent h5" type="text"
                                                id="office_contact_no" value=" {{ $family->office_contact_no }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @break
                @endif
            @endif
            @endforeach
        </div>
        @endif
        @if (Request::is('registrar/students/enrollee/*/requirements'))
            <div class="row px-3 pt-4 flex-column" id="student">
                <div class="form-row mb-2">
                    <div class="col-12">
                        @if ($hasFilePsa == true)
                            <h5><span class="text-dark text-black font-weight-bold">Philippine Statistics Authority
                                    (PSA):</span> Submitted</h5>
                        @else
                            <form action="{{ route('enrollees.store.requirements') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="custom-file d-flex justify-content center align-items-center mb-3">
                                    <h5 span class="text-dark text-black font-weight-bold py-3 mr-2">PSA</h5>
                                    <input type="file" name="psa">
                                    <input type="hidden" name="id" value="{{ $student->id }}">
                                    <div>
                                        <button type="submit" name="submit" class="btn btn-primary btn-block">Upload
                                            File</button>
                                    </div>
                                </div>
                            </form>
                        @endif

                    </div>
                </div>
                <div class="form-row mb-2">
                    <div class="col-12">
                        @if ($hasFileForm137 == true)
                            <h5><span class="text-dark text-black font-weight-bold">Form 137:</span> Submitted</h5>
                        @else
                            <form action="{{ route('enrollees.store.requirements') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="custom-file d-flex justify-content center align-items-center mb-3">
                                    <h5 span class="text-dark text-black font-weight-bold py-3 mr-2">Form 137</h5>
                                    <input type="file" name="form_137">
                                    <input type="hidden" name="id" value="{{ $student->id }}">
                                    <div>
                                        <button type="submit" name="submit" class="btn btn-primary btn-block">Upload
                                            File</button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>
    </div>
@endsection
