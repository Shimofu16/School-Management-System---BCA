@extends('BCA.pages.portal.index')
@section('portal-content')
<div class="container px-5">
    <div class="row justify-content-center px-5">
        <div class="row justify-content-center align-items-center portal-img mb-3 mt-5">
            <img src="{{ asset('img/BCA-Logo.png') }}" alt="" class="img-fluid">
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <h1 class="mx-auto portal-sub-title mb-3"> Please click or tap your destination.</h1>
        </div>
        <a href="{{ route('student.portal.index') }}" class="btn btn-lg btn-primary my-3 px-5">Student</a>
        <a href="{{ route('teacher.portal.index') }}" class="btn btn-lg btn-primary px-5">Teacher</a>
    </div>
</div>
@endsection
