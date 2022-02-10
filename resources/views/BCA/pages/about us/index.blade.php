@extends('BCA.layouts.mainLayout')
@section('title')
    About Us
@endsection
@section('page-title')
    <li class="breadcrumb-item" aria-current="page">About Us</li>
@endsection
@section('page_level_css')
    <link rel="stylesheet" href="{{ asset('css/home/pages/aboutUs.css') }}" />
@endsection
@section('contents')
    @include('BCA.pages.partials._pageTitle')
    <div class="container">
        <div class="row">
        </div>
        <div class="row">
            <div class="col-sm col-md  border py-4">
                <div class="row px-3">
                    <h1>History</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere eius dolorem officia
                        mollitia, hic excepturi ab beatae architecto quod cupiditate veritatis incidunt rem veniam
                        nulla sit nihil unde pariatur consequuntur deleniti consectetur?</p>
                </div>
                <div class="row px-3">
                    <h1>Mission</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere eius dolorem officia
                        mollitia, hic excepturi ab beatae architecto quod cupiditate veritatis incidunt rem veniam
                        nulla sit nihil unde pariatur consequuntur deleniti consectetur?</p>
                </div>
                <div class="row px-3">
                    <h1>Vision</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere eius dolorem officia
                        mollitia, hic excepturi ab beatae architecto quod cupiditate veritatis incidunt rem veniam
                        nulla sit nihil unde pariatur consequuntur deleniti consectetur?</p>
                </div>
                <div class="row px-3">
                    <h1>Hymn</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere eius dolorem officia
                        mollitia, hic excepturi ab beatae architecto quod cupiditate veritatis incidunt rem veniam
                        nulla sit nihil unde pariatur consequuntur deleniti consectetur?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia suscipit fuga rem atque sequi
                        mollitia odit eligendi aut sunt, aliquam ex dolorem tenetur quis, minima quidem blanditiis
                        totam officia animi
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
