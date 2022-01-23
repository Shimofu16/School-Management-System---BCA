@extends('BCA.pages.studentPortal')
@section('page_level_css')
    <link rel="stylesheet" href="{{ asset('./css/plainAdmin/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/plainAdmin/main.css') }}">
@endsection
@section('login-content')
    <div class="login col-md-9 col-lg-8 mx-auto">
        <div class="login-heading">
            <a href="{{ route('admin.login.index') }}" class="rad">
                <img src="{{ asset('./img/BCA-Logo.png') }}" alt="">
            </a>
            <h3 class="login-heading mb-4">Breakthrough Christian Academy</h3>
            <h3 class="text-dark mb-4">Teachers Login form</h3>
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
                <i class="fas fa-user"></i>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3" id="show_hide_password">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <i class="fas fa-lock"></i>
                <label for="floatingPassword">Password</label>
            </div>

            <!--  <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value=""
                    id="rememberPasswordCheck">
                <label class="form-check-label" for="rememberPasswordCheck">
                    Remember password
                </label>
            </div> -->

            <div class="d-grid">
              {{--   <input type="submit" name="login" class="btn btn-sm btn-primary text-uppercase" value="login"> --}}
                <button type="submit" class="btn btn-sm btn-primary text-uppercase">Login</button>
                <!-- <div class="text-center">
                    <a class="small" href="#">Forgot password?</a>
                </div> -->
            </div>

        </form>
    </div>
@endsection
