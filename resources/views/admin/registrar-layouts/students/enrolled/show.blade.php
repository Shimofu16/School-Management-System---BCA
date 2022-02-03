@extends('admin.registrar-layouts.index')
@section('page-title') Student’s Information @endsection
@section('contents')
    <h1 class="h3 mb-4 text-white text-center py-3 bg-bca">
        @yield('page-title')
    </h1>
    <div class="row">
        <div class="col-3 mr-3">
            <div class="container d-flex flex-column justify-content-center align-content-center shadow-lg">
                <div class="mb-3 mt-3 d-flex justify-content-center">
                    <img class="student-picture" src="{{ asset('/img/icons/user-male.png') }}" alt="" />
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
            </div>
            <div class="container d-flex flex-column justify-content-center align-content-center shadow-lg mt-4 mb-3">
                <h4 class="text-primary text-center mb-3 mt-3">Action</h4>
                <div class="px-5 pb-3 d-flex flex-column justify-content-center align-content-center">
                    <a href="#" class="btn btn-bca text-white mb-1">a</a>
                    <a href="#" class="btn btn-bca text-white mb-1">a</a>
                    <a href="#" class="btn btn-bca text-white">a</a>
                </div>
            </div>
        </div>
        <div class="col-7 shadow-lg mb-5">
            <div class="row header-bg">
                @if (Request::is('registrar/students/enrolled/1'))
                    <div class="col d-flex justify-content-center py-1 bg-bca">
                        <a href="{{ route('enrolled.show', $student->id) }}" class="btn text-white">Student</a>
                    </div>
                @else
                    <div class="col d-flex justify-content-center py-1 bg-bca">
                        <a href="{{ route('enrolled.show', $student->id) }}" class="btn text-white">Student</a>
                    </div>
                @endif
                @if (Request::is('registrar/students/enrolled/1/requirements'))
                    <div class="col d-flex justify-content-center py-1 bg-bca">
                        <a href="#" class="btn text-white">Requirements</a>
                    </div>
                @else
                    <div class="col d-flex justify-content-center py-1">
                        <a href="#" class="btn text-white">Requirements</a>
                    </div>
                @endif

            </div>
            @if (Request::is('registrar/students/enrolled/1'))
                <div class="row px-3 pt-4 flex-column" id="student">
                    <div class="col-6 mb-1">
                        <h5 class="text-dark"><span class="fw-bolder">Name:</span> {{ $student->first_name }}
                            {{ $student->middle_name }},
                            {{ $student->last_name }}
                            @if ($student->ext_name !== null)
                                {{ $student->ext_name }}
                            @endif
                        </h5>
                    </div>
                    <div class="col d-flex flex-row mb-1">
                        <h5 class="text-dark mr-5"><span class="fw-bolder">Gender:</span> {{ $student->gender }}
                        </h5>
                        <h5 class="text-dark"><span class="fw-bolder">Age:</span> {{ $student->age }}</h5>
                    </div>
                    <div class="col d-flex flex-row mb-1">
                        <h5 class="text-dark mr-5"><span class="fw-bolder">Email:</span> {{ $student->email }}
                        </h5>
                        <h5 class="text-dark"><span class="fw-bolder">Contact no.:</span>
                            {{ $student->contact }}</h5>
                    </div>
                    <div class="col mb-1">
                        <h5 class="text-dark"><span class="fw-bolder">Birthdate:</span>
                            {{ date('m/d/Y', strtotime($student->birthdate)) }}</h5>
                    </div>
                    <div class="col mb-1">
                        <h5 class="text-dark"><span class="fw-bolder">Birthplace:</span>
                            {{ $student->birthplace }}</h5>
                    </div>
                    <div class="col mb-1">
                        <h5 class="text-dark"><span class="fw-bolder">Address:</span> {{ $student->address }}
                        </h5>
                    </div>
                    <div class="col mb-1">
                        <h5 class="text-dark"><span class="fw-bolder">Section:</span>
                            {{ $student->section->section_name }}</h5>
                    </div>
                    <div class="col mb-1">
                        <h5 class="text-dark"><span class="fw-bolder">Grade:</span>
                            {{ $student->gradeLevel->grade_name }}</h5>
                    </div>
                    <hr class="border w-100 h-50">
                    <div class="col mb-1">
                        <h5 class="text-dark"><span class="fw-bolder">Grade:</span>
                            {{ $student->gradeLevel->grade_name }}</h5>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
