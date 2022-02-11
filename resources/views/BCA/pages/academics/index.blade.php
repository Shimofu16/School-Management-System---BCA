@extends('BCA.layouts.mainLayout')
@section('title')
    Academics
@endsection
@section('page-title')
    <li class="breadcrumb-item" aria-current="page">Academics</li>
@endsection
@section('contents')
    @include('BCA.pages.partials._pageTitle')
    <div class="container my-3">
        <div class="d-flex">
            <div class="col-md-4">
                <div class="card border text-left ">
                    <div class=" d-flex flex-column justify-content-center align-items-center mt-3">
                        <img class="acad-img" src="{{ asset('img/students/Pre-School/nursery.jpg') }}" alt="primary">
                    </div>
                    <div class="card-body text-center ">
                        <h4 class="card-title">Primary</h4>
                        <p class="card-text text-justify">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                            Necessitatibus
                            quo
                            similique consequatur dicta sunt eius ex repudiandae quae, sint velit rem vitae accusamus.
                            Dolorem, quis magni natus esse minus voluptate!</p>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center mb-5">
                        <a href="{{ route('primary.index') }}" class="btn btn-bca-outline text-bca hvr-sweep-to-bottom">
                            <i class="fa-solid fa-angle-right"></i>
                            <span class="text-uppercase">
                                See more
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border text-left ">
                    <div class=" d-flex flex-column justify-content-center align-items-center mt-3">
                        <img class="acad-img" src="{{ asset('img/students/Elementary/Higher Elementary/higher elem 3.jpg') }}" alt="primary">
                    </div>
                    <div class="card-body text-center ">
                        <h4 class="card-title">Elementary</h4>
                        <p class="card-text text-justify">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                            Necessitatibus
                            quo
                            similique consequatur dicta sunt eius ex repudiandae quae, sint velit rem vitae accusamus.
                            Dolorem, quis magni natus esse minus voluptate!</p>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center mb-5">
                        <a href="{{ route('elementary.index') }}" class="btn btn-bca-outline text-bca hvr-sweep-to-bottom">
                            <i class="fa-solid fa-angle-right"></i>
                            <span class="text-uppercase">
                                See more
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border text-left ">
                    <div class=" d-flex flex-column justify-content-center align-items-center mt-3">
                        <img class="acad-img" src="{{ asset('img/students/Junior high School/jhs.jpg') }}" alt="primary">
                    </div>
                    <div class="card-body text-center ">
                        <h4 class="card-title">Junior Highschool</h4>
                        <p class="card-text text-justify">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                            Necessitatibus
                            quo
                            similique consequatur dicta sunt eius ex repudiandae quae, sint velit rem vitae accusamus.
                            Dolorem, quis magni natus esse minus voluptate!</p>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center mb-5">
                        <a href="{{ route('juniorhighschool.index') }}" class="btn btn-bca-outline text-bca hvr-sweep-to-bottom">
                            <i class="fa-solid fa-angle-right"></i>
                            <span class="text-uppercase">
                                See more
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
