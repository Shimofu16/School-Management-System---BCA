<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" />
     <link rel="stylesheet" href="{{ asset('css/home/custom-portal.css') }}">
    <link rel="icon" href="{{ asset('img/BCA-Logo.png') }}">
    @yield('page_level_css')
    <title>{{ config('app.name') }} | Portal</title>
</head>

<body>
    <div class="portal-bg">
        <div class="col">

        </div>
        <div class="portal-r-blur">
            <div class="container px-5">
                <div class="row justify-content-center align-items-center portal-img mb-3 mt-5 mx-auto">
                    <img src="{{ asset('img/BCA-Logo.png') }}" alt="" class="img-fluid">
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <h1 class="mx-auto portal-title mb-3">Breakthrough Christian Academy</h1>
                </div>
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissable">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif
                <!-- Logi In Form -->
                <form class="login-form" method="POST" action="{{ route('login') }}" }>
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput"><i class="fas fa-user portal-icon"></i>&nbsp; Email address </label>
                    </div>

                    <div class="form-floating mb-3" id="show_hide_password">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword"><i class="fas fa-lock portal-icon"></i>&nbsp; Password </label>
                    </div>

                    <!--  <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value=""
                            id="rememberPasswordCheck">
                        <label class="form-check-label" for="rememberPasswordCheck">
                            Remember password
                        </label>
                    </div> -->

                    <div class="d-grid">
                        <button type="submit" class="btn btn-lg btn-primary text-uppercase">Login</button>
                        <!-- <div class="text-center">
                            <a class="small" href="#">Forgot password?</a>
                        </div> -->
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/dist/alert.js') }}"></script>
    <script src="{{ asset('js/dist/util.js') }}"></script>
</body>

</html>
