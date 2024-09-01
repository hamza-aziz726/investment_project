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

    <title>Register</title>

    <!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset("backend-assets/images/favicon.png") }}">
    <link href="{{ asset("backend-assets/vendor/jquery-nice-select/css/nice-select.css") }}" rel="stylesheet">
    <link href="{{ asset("backend-assets/css/style.css") }}" rel="stylesheet">

</head>
<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-12">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-2">
                                        <a href="#"><img src="{{ asset('backend-assets/images/logo-full.png') }}" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="row">
                                            <!-- Username -->
                                            <div class="col-md-3 mb-3">
                                                <label class="mb-1"><strong>Name</strong></label>
                                                <input type="text" name="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Father Name -->
                                            <div class="col-md-3 mb-3">
                                                <label class="mb-1"><strong>Father Name</strong></label>
                                                <input type="text" name="father_name" placeholder="Father Name" class="form-control @error('father_name') is-invalid @enderror" value="{{ old('father_name') }}" required>
                                                @error('father_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Nominee Name -->
                                            <div class="col-md-3 mb-3">
                                                <label class="mb-1"><strong>Nominee Name</strong></label>
                                                <input type="text" name="nominee_name" placeholder="Nominee Name" class="form-control @error('nominee_name') is-invalid @enderror" value="{{ old('nominee_name') }}" required>
                                                @error('nominee_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Relation with Nominee -->
                                            <div class="col-md-3 mb-3">
                                                <label class="mb-1"><strong>Relation with Nominee</strong></label>
                                                <select id="relation" name="relation_with_nominee" class="default-select form-control wide mb-3">
                                                    <option value="" disabled selected hidden>Select Relation</option>
                                                    <option value="Father">Father</option>
                                                    <option value="Mother">Mother</option>
                                                    <option value="Brother">Brother</option>
                                                    <option value="Sister">Sister</option>
                                                    <option value="Wife">Wife</option>
                                                    <option value="Friend">Friend</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                                @error('relation_with_nominee')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Other Relation -->
                                            <div class="col-md-3 mb-3" id="otherRelationDiv" style="display: none;">
                                                <label class="mb-1"><strong>Other</strong></label>
                                                <input id="otherRelation" type="text" name="other_relation" placeholder="Other" class="form-control @error('other_relation') is-invalid @enderror" value="{{ old('other_relation') }}">
                                                @error('other_relation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Address -->
                                            <div class="col-md-3 mb-3">
                                                <label class="mb-1"><strong>Address</strong></label>
                                                <input type="text" name="address" placeholder="Address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" required>
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Block/Tahsil -->
                                            <div class="col-md-3 mb-3">
                                                <label class="mb-1"><strong>Block/tahsil</strong></label>
                                                <input type="text" name="block_tahsil" placeholder="Block/tahsil" class="form-control @error('block_tahsil') is-invalid @enderror" value="{{ old('block_tahsil') }}" required>
                                                @error('block_tahsil')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Police Station -->
                                            <div class="col-md-3 mb-3">
                                                <label class="mb-1"><strong>Police station</strong></label>
                                                <input type="text" name="police_station" placeholder="Police station" class="form-control @error('police_station') is-invalid @enderror" value="{{ old('police_station') }}" required>
                                                @error('police_station')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Post Office -->
                                            <div class="col-md-3 mb-3">
                                                <label class="mb-1"><strong>Post office</strong></label>
                                                <input type="text" name="post_office" placeholder="Post office" class="form-control @error('post_office') is-invalid @enderror" value="{{ old('post_office') }}" required>
                                                @error('post_office')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- District -->
                                            <div class="col-md-3 mb-3">
                                                <label class="mb-1"><strong>District</strong></label>
                                                <input type="text" name="district" placeholder="District" class="form-control @error('district') is-invalid @enderror" value="{{ old('district') }}" required>
                                                @error('district')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- State -->
                                            <div class="col-md-3 mb-3">
                                                <label class="mb-1"><strong>State</strong></label>
                                                <input type="text" name="state" placeholder="State" class="form-control @error('state') is-invalid @enderror" value="{{ old('state') }}" required>
                                                @error('state')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Pincode -->
                                            <div class="col-md-3 mb-3">
                                                <label class="mb-1"><strong>Pincode</strong></label>
                                                <input type="number" name="pincode" placeholder="Pincode" class="form-control @error('pincode') is-invalid @enderror" value="{{ old('pincode') }}" required>
                                                @error('pincode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Referral Code -->
                                            <div class="col-md-3 mb-3">
                                                <label class="mb-1"><strong>Referral Code</strong></label>
                                                <input type="text" name="referral_code" placeholder="Referral Code" class="form-control @error('referral_code') is-invalid @enderror" value="{{ old('referral_code') }}" required>
                                                @error('referral_code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Phone -->
                                            <div class="col-md-3 mb-3">
                                                <label class="mb-1"><strong>Phone</strong></label>
                                                <input type="tel" name="phone" placeholder="912345678900" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required pattern="^(92|91)\d{10}$" required>
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>                                           

                                            <!-- Email -->
                                            <div class="col-md-3 mb-3">
                                                <label class="mb-1"><strong>Email</strong></label>
                                                <input type="email" name="email" placeholder="hello@example.com" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Password -->
                                            <div class="col-md-3 mb-3">
                                                <label class="mb-1"><strong>Password</strong></label>
                                                <input type="password" name="password" placeholder="********" class="form-control @error('password') is-invalid @enderror" required>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Confirm Password -->
                                            <div class="col-md-3 mb-3">
                                                <label class="mb-1"><strong>Confirm Password</strong></label>
                                                <input type="password" name="password_confirmation" placeholder="********" class="form-control" required>
                                            </div>

                                            <div class="text-center mt-2">
                                                <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="new-account mt-2">
                                        <p>Already have an account? <a class="text-primary" href="{{ route("login") }}">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Required vendors -->
    <script src="{{ asset("backend-assets/vendor/global/global.min.js") }}"></script>
    <script src="{{ asset("backend-assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js") }}"></script>
    <script>
        $(document).ready(function() {
            $('#relation').on('change', function() {
                if ($(this).val() === 'Other') {
                    $('#otherRelationDiv').show();
                    $('#otherRelation').prop('disabled', false);
                } else {
                    $('#otherRelationDiv').hide();
                    $('#otherRelation').prop('disabled', true).val('');
                }
            });

            // Trigger change event to ensure initial state is correct
            $('#relation').trigger('change');
        });
    </script>
    <script src="{{ asset("backend-assets/js/custom.min.js") }}"></script>
    <script src="{{ asset("backend-assets/js/dlabnav-init.js") }}"></script>
    <script src="{{ asset("backend-assets/js/styleSwitcher.js") }}"></script>
</body>
</html>
