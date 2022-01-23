@extends('BCA.layouts.mainLayout')
@section('page-title')
    Academics
@endsection
@section('page_level_css')
    <link rel="stylesheet" href="{{ asset('css/home/pages/academics.css') }}" />
@endsection
@section('contents')

    @include('BCA.pages.partials._pageTitle')
    <section id="academics">
        <div class="acad-container">
            <div class="acad-con-bottom">
                <div class="acad-con-items">
                    <a href="">
                        <h2>Nursery</h2>
                        <img src="{{ asset('./img/samplePictures/nursery.jpg') }}" alt="">
                    </a>
                </div>
                <div class="acad-con-items">
                    <a href="">
                        <h2> Kindergarten</h2>
                        <img src="{{ asset('./img/samplePictures/kindergarten.jpg') }}" alt="">
                    </a>
                </div>
                <div class="acad-con-items">
                    <a href="">
                        <h2>Preparatory</h2>
                        <img src="{{ asset('./img/samplePictures/prep.jpg') }}" alt="">
                    </a>

                </div>
                <div class="acad-con-items">
                    <a href="">
                        <h2>Elementary</h2>

                        <img src="{{ asset('./img/samplePictures/elem.jpg') }}" alt="">
                    </a>

                </div>
                <div class="acad-con-items">
                    <a href="">
                        <h2>Junior High School</h2>
                        <img src="{{ asset('./img/samplePictures/JuniorHighSchool.jpg') }}" alt="">
                    </a>

                </div>
            </div>
            <div class="enroll-btn">
                <a href="{{ route('enroll.index') }}">Enroll Now!</a>
            </div>
        </div>
    </section>
@endsection
