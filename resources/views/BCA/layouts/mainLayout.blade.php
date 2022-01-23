<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- font awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    {{-- bootstrap --}}
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('css/home/custom.css') }}" />
    {{-- hover effects --}}
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" />
    {{--  school logo  --}}
    <link rel="icon" href="{{ asset('./img/BCA-Logo.png') }}">
    {{-- page level css --}}
    @yield('page_level_css')
    <title>{{ config('app.name') }}</title>
</head>

<body>
    <!-- navigation bar -->
    @include('BCA.layouts._header')

    <div class="container pt-home border">
        @yield('contents')
    </div>
    <!-- footer -->
    @include('BCA.layouts._footer')
    <!-- JS Libraies -->
    <script src="{{ asset('vendor/bootstrap/js/dist/popover.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @yield('page_level_js')
</body>

</html>
