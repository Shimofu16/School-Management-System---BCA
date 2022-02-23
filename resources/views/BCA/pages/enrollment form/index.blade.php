<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- font awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free-6.0.0-web/css/all.css') }}">
    {{-- bootstrap --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('css/home/custom.css') }}" />
    {{-- hover effects --}}
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" />
    {{-- school logo --}}
    <link rel="icon" href="{{ asset('./img/BCA-Logo.png') }}">
    {{-- Livewire CSS --}}
    @livewireStyles
    <title>{{ config('app.name') }} | Enrollment Form</title>
</head>

<body style="background-color: #E9EBFC;">
    <div class="container">
        <div class="row flex-nowrap" style="margin-top:50px">
            <div class="col-md-7 col-lg-8 col-xl-7 offset-lg-2">
                <h1 class="text-center text-white bg-bca py-4 rounded-top">BCA Online Enrollment Registration</h1>
                @livewire('multi-part-form')
            </div>
            <div class="col-md-3 offset-lg-1 dd-sm-none">
                <div class="card">
                    <div class="card-header h5 bg-bca text-white text-center rounded-top">Tips <i
                            class="fa-solid fa-circle-info"></i></div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Livewire JS --}}
    @livewireScripts
</body>

</html>
