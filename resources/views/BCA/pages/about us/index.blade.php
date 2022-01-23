@extends('BCA.layouts.mainLayout')
@section('page-title')
    About us
@endsection
@section('page_level_css')
    <link rel="stylesheet" href="{{ asset('css/home/pages/aboutUs.css') }}" />
@endsection
@section('contents')
    @include('BCA.pages.partials._pageTitle')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm col-md border">
                    a
                </div>
            </div>
            <div class="row">
                <div class="col-sm col-md  border">
                    <div class="row">
                        <h1>History</h1>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere eius dolorem officia
                            mollitia, hic excepturi ab beatae architecto quod cupiditate veritatis incidunt rem veniam
                            nulla sit nihil unde pariatur consequuntur deleniti consectetur?</p>
                    </div>
                    <div class="row">
                        <h1>Mission</h1>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere eius dolorem officia
                            mollitia, hic excepturi ab beatae architecto quod cupiditate veritatis incidunt rem veniam
                            nulla sit nihil unde pariatur consequuntur deleniti consectetur?</p>
                    </div>
                    <div class="row">
                        <h1>Vision</h1>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere eius dolorem officia
                            mollitia, hic excepturi ab beatae architecto quod cupiditate veritatis incidunt rem veniam
                            nulla sit nihil unde pariatur consequuntur deleniti consectetur?</p>
                    </div>
                    <div class="row">
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
                <div class="col-sm col-md  border fad">
                    2 of 2
                </div>
            </div>
        </div>
    </section>
@endsection
