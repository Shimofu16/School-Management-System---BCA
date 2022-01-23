@extends('BCA.layouts.mainLayout')
@section('page_level_css')
    <link rel="stylesheet" href="{{ asset('css/home/pages/home/carousel.css') }}">
@endsection
@section('contents')
    @include('BCA.pages.Home.partials._carousel')
    @include('BCA.pages.Home.partials._bottom')
    @include('BCA.pages.Home.partials._announcement')
    @include('BCA.pages.Home.partials._featuredVideo')
    @include('BCA.pages.Home.partials._photoGallery')
@endsection
