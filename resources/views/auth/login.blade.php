{{--  @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection  --}}

<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from ventic.dexignzone.com/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Jul 2023 13:34:23 GMT -->
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Ventic : Ticketing Admin Template" />
	<meta property="og:title" content="Ventic : Ticketing Admin Template" />
	<meta property="og:description" content="Ventic : Ticketing Admin Template" />
	<meta property="og:image" content="social-image.png" />
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>Ventic : Ticketing Admin Template</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="vh-100">

<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <div class="text-center mb-3">
                                    <a href=""><img src="{{ url('white-force-logo2.png') }}" alt="" width="50%"></a>
                                </div>
                                <h4 class="text-center mb-4">Sign in your account</h4>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>Email</strong></label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>Password</strong></label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row d-flex justify-content-between mt-4 mb-2">
                                        <div class="mb-3">
                                           <div class="form-check custom-checkbox ms-1">
                                                <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                                                <label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                           
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                    </div>
                                </form>
                                <div class="new-account mt-3">
                                    <p>Don't have an account? <a class="text-primary" href="page-register.html">Sign up</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="vendor/global/global.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/deznav-init.js"></script>
<script src="js/styleSwitcher.js"></script>
</body>

<!-- Mirrored from ventic.dexignzone.com/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Jul 2023 13:34:24 GMT -->
</html>
