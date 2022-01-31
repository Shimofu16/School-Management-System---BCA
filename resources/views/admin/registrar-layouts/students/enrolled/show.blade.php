@extends('admin.registrar-layouts.index')
@section('page-title') Student’s Information @endsection
@section('contents')
    <h1 class="h3 mb-4 text-white text-center py-3 bg-bca">
        @yield('page-title')
    </h1>
    <div class="row">
        <div class="col-3 border mr-3">
            <div class="container d-flex flex-column justify-content-center align-content-center">
                <div class="mb-3 mt-5 d-flex justify-content-center">
                    <img class="student-picture" src="{{ asset('/img/icons/user-male.png') }}" alt="" />
                </div>
                <div class="text-center">
                    <h4>FULL NAME HERE</h4>
                    <h5>EMAIL HERE</h5>
                </div>
                <div class="text-center border py-3 mb-3">
                    <h5 class="text-primary">Grade</h5>
                    <h6>Grade 6</h6>
                </div>
                <div class="text-center border py-3 mb-3">
                    <h5 class="text-primary">Grade</h5>
                    <h6>Grade 6</h6>
                </div>
            </div>
        </div>
        <div class="col-7 border">
            <div class="row">
                <div class="col bg-primary d-flex justify-content-center py-1">
                    <a href="{{ route('enrolled.show',$student->id) }}" class="btn text-white">Student</a>
                </div>
                <div class="col bg-black d-flex justify-content-center py-1">
                    <a href="#" class="btn text-white">Parents & Guardian</a>
                </div>
                <div class="col bg-primary d-flex justify-content-center py-1">
                    <a href="#" class="btn text-white">Requirements</a>
                </div>
            </div>
            <div class="row" id="student">Student</div>
            <div class="row" id="parent">Parents & Guardian</div>
            <div class="row" id="req">Requirements</div>
        </div>
    </div>
@endsection
