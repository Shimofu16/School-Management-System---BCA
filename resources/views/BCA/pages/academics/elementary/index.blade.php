@extends('BCA.layouts.mainLayout')
@section('page_level_css')
    <link rel="stylesheet" href="{{ asset('css/home/pages/home/carousel.css') }}">
@endsection
@section('title')
    Elementary
@endsection
@section('page-title')
    <li class="breadcrumb-item active"><a href="{{ route('academics.index') }}">Academics</a></li>
@endsection
@section('subtitle')
    <li class="breadcrumb-item" aria-current="page">Elementary</li>
@endsection
@section('contents')
    @include('BCA.pages.partials._pageTitle')
    <div class="container my-3">
        <div class="">
            <div class="col">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="first-slide"
                                src="{{ asset('img/students/Elementary/Higher Elementary/higher elem 2.jpg') }}"
                                alt="First slide">
                            <div class="container">
                                {{-- <div class="carousel-caption text-left">
                                    <h1>Example headline.</h1>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                                        gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                                </div> --}}
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="second-slide" src="{{ asset('img/students/Elementary/Lower Elementary/lower elem 3.jpg') }}"
                                alt="Second slide">
                            <div class="container">
                                {{-- <div class="carousel-caption">
                                    <h1>Another example headline.</h1>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                                        gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                                </div> --}}
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="third-slide" src="{{ asset('img/students/Elementary/Lower Elementary/lower elem 10.jpg') }}"
                                alt="Third slide">
                            <div class="container">
                                {{-- <div class="carousel-caption text-right">
                                    <h1>One more for good measure.</h1>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                                        gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="d-flex flex-column pt-3 px-2 mb-5">
                <h1>Elementary</h1>
                <h3 class="text-secondary">Description</h3>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quod quam dignissimos non, alias
                    officia obcaecati magni eaque incidunt ea consectetur iusto error. Maxime repudiandae sit ratione
                    adipisci, sed dicta. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit facere quas obcaecati!
                    Neque quam, minima voluptate possimus laborum nisi blanditiis placeat est, cupiditate doloremque saepe
                    veritatis reprehenderit libero architecto ratione!
                </p>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('enroll.index') }}" class="btn btn-bca-outline text-bca hvr-sweep-to-bottom">
                        <i class="fa-solid fa-angle-right"></i>
                        <span class="text-uppercase">
                            Enroll now
                        </span>
                    </a>
                </div>
            </div>
            <!-- Gallery -->
            <h1 class="pt-2">More Photos</h1>
            <div class="row pt-3">
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <img src="{{ asset('img/students/Elementary/Higher Elementary/higher elem 1.jpg') }}" alt=""
                        class="w-100 shadow-1-strong rounded mb-3">
                    <img src="{{ asset('img/students/Elementary/Higher Elementary/higher elem 7.jpg') }}" alt=""
                        class="w-100 shadow-1-strong rounded mb-3">
                    <img src="{{ asset('img/students/Elementary/Higher Elementary/higher elem 3.jpg') }}" alt=""
                        class="w-100 shadow-1-strong rounded mb-3">
                    <img src="{{ asset('img/students/Elementary/Lower Elementary/lower elem 6.jpg') }}" alt=""
                        class="w-100 shadow-1-strong rounded mb-3">
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img src="{{ asset('img/students/Elementary/Lower Elementary/lower elem 1.jpg') }}" alt=""
                        class="w-100 shadow-1-strong rounded mb-3">
                    <img src="{{ asset('img/students/Elementary/Lower Elementary/lower elem 2.jpg') }}" alt=""
                        class="w-100 shadow-1-strong rounded mb-3">
                    <img src="{{ asset('img/students/Elementary/Lower Elementary/lower elem 1.jpg') }}" alt=""
                        class="w-100 shadow-1-strong rounded mb-3">
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img src="{{ asset('img/students/Elementary/Lower Elementary/lower elem 4.jpg') }}" alt=""
                        class="w-100 shadow-1-strong rounded mb-3">
                    <img src="{{ asset('img/students/Elementary/Higher Elementary/higher elem 4.jpg') }}" alt=""
                        class="w-100 shadow-1-strong rounded mb-3">
                    <img src="{{ asset('img/students/Elementary/Higher Elementary/higher elem 12.jpg') }}" alt=""
                        class="w-100 shadow-1-strong rounded mb-3">
                </div>
            </div>
            <!-- Gallery -->
        </div>
    </div>
@endsection
