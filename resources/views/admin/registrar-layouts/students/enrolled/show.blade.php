@extends('admin.registrar-layouts.index')
@section('page-title')
    Student’s Information
@endsection
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
                    <h5 class="fw-bolder text-dark">{{ $student->first_name }} {{ $student->middle_name }},
                        {{ $student->last_name }}</h5>
                    <h6>{{ $student->email }}</h6>
                </div>
                <div class="text-center mb-3">
                    <h5 class="text-primary">Grade</h5>
                    <h6>{{ $student->gradeLevel->grade_name }}</h6>
                </div>
                <div class="text-center mb-3">
                    <h5 class="text-primary">Section</h5>
                    <h6>{{ $student->section->section_name }}</h6>
                </div>
                <div class="text-center mb-3">
                    <h5 class="text-primary">School Year</h5>
                    <h6>{{ $student->sy->school_year }}</h6>
                </div>
            </div>
            <div class="container mt-4 d-flex flex-column justify-content-center align-items-center shadow-lg">
                <div class="text-center mt-3 mb-3">
                    <h3 class="text-primary">Action</h3>
                </div>
                <div class="text-center mb-3">
                    <a href="#" class="btn btn-bca" data-toggle="modal" data-target="#requirements">Requirements</a>
                </div>
                @include('admin.registrar-layouts.students.enrolled.modal._requirements')
            </div>
        </div>
        <div class="col-7 shadow-lg mb-5">
            <div class="row px-3 pb-3 flex-column">
                <h3 class="text-light bg-bca text-center py-2 my-3">Student</h3>
                <div class="px-3" id="student">
                    <div class="d-flex text-dark">
                        <h4 class="fw-bolder  mr-2">Name : </h4>
                        <h4> {{ ucfirst($student->first_name) }} {{ ucfirst($student->middle_name) }},
                            {{ ucfirst($student->last_name) }}@if ($student->ext_name !== null)
                                {{ ucfirst($student->ext_name) }}
                            @endif
                            </h5>
                    </div>
                    <div class="d-flex">
                        <div class="d-flex text-dark mr-4">
                            <h4 class="fw-bolder  mr-2">Gender : </h4>
                            <h4> {{ $student->gender }} </h5>
                        </div>
                        <div class="d-flex text-dark">
                            <h4 class="fw-bolder  mr-2">Age : </h4>
                            <h4> {{ $student->age }}</h5>
                        </div>
                    </div>
                    <div class="d-flex text-dark mr-4">
                        <h4 class="fw-bolder  mr-2">Email : </h4>
                        <h4> {{ $student->email }}</h5>
                    </div>
                    <div class="d-flex">
                        <div class="d-flex text-dark mr-4">
                            <h4 class="fw-bolder  mr-2">Birthdate : </h4>
                            <h4> {{ date('m/d/Y', strtotime($student->birthdate)) }} </h5>
                        </div>
                        <div class="d-flex text-dark">
                            <h4 class="fw-bolder  mr-2">Birthplace : </h4>
                            <h4> {{ ucfirst($student->birthplace) }}</h5>
                        </div>
                    </div>
                    <div class="d-flex text-dark mr-4">
                        <h4 class="fw-bolder  mr-2">Address : </h4>
                        <h4> {{ ucfirst($student->address) }}</h5>
                    </div>
                    <div class="d-flex text-dark mr-4">
                        <h4 class="fw-bolder  mr-2">Grade Level : </h4>
                        <h4> {{ $student->gradeLevel->grade_name }}</h5>
                    </div>
                    {{-- <div class="d-flex">
                            <div class="d-flex text-dark mr-4">
                                <h4 class="fw-bolder  mr-2">Section : </h4>
                                <h4> {{ $student->section->section_name}}</h5>
                            </div>
                            <div class="d-flex text-dark">
                                <h4 class="fw-bolder  mr-2">Grade Level : </h4>
                                <h4> {{ $student->gradeLevel->grade_name }} </h5>
                            </div>
                        </div> --}}
                </div>
                @if ($father !== null)
                    <h3 class="text-light bg-bca text-center py-2 my-3">Father</h3>
                    <div class="px-3" id="father">
                        <div class="d-flex text-dark mr-4">
                            <h4 class="fw-bolder  mr-2">Name : </h4>
                            <h4> {{ ucfirst($father->name) }}</h5>
                        </div>
                        <div class="d-flex text-dark mr-4">
                            <h4 class="fw-bolder  mr-2">Birthdate : </h4>
                            <h4> {{ date('m/d/Y', strtotime($father->birthdate)) }}</h5>
                        </div>
                        <div class="d-flex text-dark mr-4">
                            <h4 class="fw-bolder  mr-2">Landline : </h4>
                            @if ($father->landline !== null)
                                <h4> {{ $father->landline }}</h5>
                                @else
                                    <h4> None</h5>
                            @endif
                        </div>
                        <div class="d-flex text-dark mr-4">
                            <h4 class="fw-bolder  mr-2">Contact No. : </h4>
                            <h4> {{ $father->contact_no }}</h5>
                        </div>
                        <div class="d-flex text-dark mr-4">
                            <h4 class="fw-bolder  mr-2">Email : </h4>
                            @if ($father->email !== null)
                                <h4> {{ $father->email }}</h5>
                                @else
                                    <h4> None</h5>
                            @endif
                        </div>
                        <div class="d-flex text-dark mr-4">
                            <h4 class="fw-bolder  mr-2">Occupation : </h4>
                            @if ($father->occupation !== null)
                                <h4> {{ $father->occupation }}</h5>
                                @else
                                    <h4> None</h5>
                            @endif
                        </div>
                        <div class="d-flex text-dark mr-4">
                            <h4 class="fw-bolder  mr-2">Office Address : </h4>
                            @if ($father->office_address !== null)
                                <h4> {{ $father->office_address }}</h5>
                                @else
                                    <h4> None</h5>
                            @endif
                        </div>
                        <div class="d-flex text-dark mr-4">
                            <h4 class="fw-bolder  mr-2">Office Contact No. : </h4>
                            @if ($father->office_contact_no !== null)
                                <h4> {{ $father->office_contact_no }}</h5>
                                @else
                                    <h4> None</h5>
                            @endif
                        </div>
                    </div>
                @endif
                @if ($mother !== null)
                    <h3 class="text-light bg-bca text-center py-2 my-3">Mother</h3>
                    <div class="px-3" id="father">
                        <div class="d-flex text-dark mr-4">
                            <h4 class="fw-bolder  mr-2">Name : </h4>
                            <h4> {{ ucfirst($mother->name) }}</h5>
                        </div>
                        <div class="d-flex text-dark mr-4">
                            <h4 class="fw-bolder  mr-2">Birthdate : </h4>
                            <h4> {{ date('m/d/Y', strtotime($mother->birthdate)) }}</h5>
                        </div>
                        <div class="d-flex text-dark mr-4">
                            <h4 class="fw-bolder  mr-2">Landline : </h4>
                            @if ($mother->landline !== null)
                                <h4> {{ $mother->landline }}</h5>
                                @else
                                    <h4> None</h5>
                            @endif
                        </div>
                        <div class="d-flex text-dark mr-4">
                            <h4 class="fw-bolder  mr-2">Contact No. : </h4>
                            <h4> {{ $mother->contact_no }}</h5>
                        </div>
                        <div class="d-flex text-dark mr-4">
                            <h4 class="fw-bolder  mr-2">Email : </h4>
                            @if ($mother->email !== null)
                                <h4> {{ $mother->email }}</h5>
                                @else
                                    <h4> None</h5>
                            @endif
                        </div>
                        <div class="d-flex text-dark mr-4">
                            <h4 class="fw-bolder  mr-2">Occupation : </h4>
                            @if ($mother->occupation !== null)
                                <h4> {{ $mother->occupation }}</h5>
                                @else
                                    <h4> None</h5>
                            @endif
                        </div>
                        <div class="d-flex text-dark mr-4">
                            <h4 class="fw-bolder  mr-2">Office Address : </h4>
                            @if ($mother->office_address !== null)
                                <h4> {{ $mother->office_address }}</h5>
                                @else
                                    <h4> None</h5>
                            @endif
                        </div>
                        <div class="d-flex text-dark mr-4">
                            <h4 class="fw-bolder  mr-2">Office Contact No. : </h4>
                            @if ($mother->office_contact_no !== null)
                                <h4> {{ $mother->office_contact_no }}</h5>
                                @else
                                    <h4> None</h5>
                            @endif
                        </div>
                    </div>
                @endif
                @if ($guardian !== null)
                    <h3 class="text-light bg-bca text-center py-2 my-3">Guardian</h3>
                    <div class="px-3">
                        <div class="d-flex text-dark mr-4">
                            <h4 class="fw-bolder  mr-2">Name : </h4>
                            <h4> {{ ucfirst($mother->name) }}</h5>
                        </div>
                        <div class="d-flex text-dark mr-4">
                            <h4 class="fw-bolder  mr-2">Contact No. : </h4>
                            <h4> {{ $guardian->contact_no }}</h5>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
