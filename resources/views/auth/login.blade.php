<!DOCTYPE html>
<html lang="{{ config('app.locale', 'en') }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RESU-SDI | Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">

</head>

<body class="bg-dark">

<div class="container">
    <div class="card card-login mx-auto mt-5 border-0 shadow-sm">
        <div class="card-header bg-danger border-0 text-light">Login</div>
        <div class="card-body">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email address" required="required" autofocus="autofocus" name="email" value="{{ old('email') }}">
                        <label for="inputEmail">Email address</label>
                        @if($errors->has('email'))
                            <span class="has-error">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" required="required" name="password">
                        <label for="inputPassword">Password</label>
                        @if($errors->has('password'))
                            <span class="has-error">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me">
                            Remember Me
                        </label>
                    </div>
                </div>
                <button class="btn btn-danger btn-block" type="submit">Login</button>
            </form>
            <div class="text-center">
                <a class="d-block small text-danger" href="{{ route('password.request') }}">Forgot Password?</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
