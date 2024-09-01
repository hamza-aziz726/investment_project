<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>OTP Verification</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset("backend-assets/images/favicon.png") }}">
    <link href="{{ asset("backend-assets/css/style.css") }}" rel="stylesheet">

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
									{{-- <div class="text-center mb-3">
										<a href="index.html"><img src="{{ asset('backend-assets/images/logo-full.png') }}" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4">Sign in your account</h4> --}}
                                    <form method="POST" action="{{ route('otp.verify') }}">
                                        <input type="hidden" name="email" value="{{ $email }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>{{ __('Enter OTP') }}</strong></label>
                                                <input id="otp" type="text" class="form-control" name="otp" required placeholder="------">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Verify OTP</button>
                                        </div>
                                    </form>
                                    {{-- <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="{{ route('register') }}">Sign up</a></p>
                                    </div> --}}
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
    <script src="{{ asset("backend-assets/vendor/global/global.min.js") }}"></script>
    <script src="{{ asset("backend-assets/js/custom.min.js") }}"></script>
    <script src="{{ asset("backend-assets/js/dlabnav-init.js") }}"></script>
	<script src="{{ asset("backend-assets/js/styleSwitcher.js") }}"></script>
</body>
</html>