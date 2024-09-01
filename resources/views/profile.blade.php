@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<div class="row page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a href="javascript:void(0)">App</a></li>
				<li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
			</ol>
		</div>
		<!-- row -->
		{{-- <div class="row">
			<div class="col-lg-12">
				<div class="profile card card-body px-3 pt-3 pb-0">
					<div class="profile-head">
						<div class="photo-content">
							<div class="cover-photo rounded"></div>
						</div>
						<div class="profile-info">
							<div class="profile-photo">
								<img src="{{ asset('backend-assets/images/profile/profile.png') }}" class="img-fluid rounded-circle" alt="">
							</div>
							<div class="profile-details">
								<div class="profile-name px-3 pt-2">
									<h4 class="text-primary mb-0">Soeng Souy</h4>
									<p>Role</p>
								</div>
								<div class="profile-email px-2 pt-2">
									<h4 class="text-muted mb-0">info@example.com</h4>
									<p>Email</p>
								</div>
								<div class="dropdown ms-auto">
									<a href="#" class="btn btn-primary light sharp" data-bs-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
									<ul class="dropdown-menu dropdown-menu-end">
										<li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View profile</li>
										<li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to btn-close friends</li>
										<li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group</li>
										<li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
		<div class="row">
			<div class="col-md-12">
				<div id="profile-settings">
					<div class="pt-3">
						<div class="personal-form">
							<h4 class="text-primary">Personal Info Setting</h4>
							<form >
								@csrf
							
								<div class="row">
							
									<!-- Username -->
									<div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Name</strong></label>
										<input type="text" id="u_name" name="u_name" placeholder="Name" class="form-control @error('u_name') is-invalid @enderror" value="{{ old('u_name') }}" required>
										@error('u_name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
							
									<!-- Father Name -->
									<div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Father Name</strong></label>
										<input type="text" id="u_father_name" name="u_father_name" placeholder="Father Name" class="form-control @error('u_father_name') is-invalid @enderror" value="{{ old('u_father_name') }}" required>
										@error('u_father_name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
							
									<!-- Nominee Name -->
									<div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Nominee Name</strong></label>
										<input type="text" id="u_nominee_name" name="u_nominee_name" placeholder="Nominee Name" class="form-control @error('u_nominee_name') is-invalid @enderror" value="{{ old('u_nominee_name') }}" required>
										@error('u_nominee_name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
							
									<!-- Relation with Nominee -->
									<div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Relation with Nominee</strong></label>
										<select id="u_relation_with_nominee" name="u_relation_with_nominee" class="default-select form-control wide mb-3">
											<option value="" disabled selected hidden>Select Relation</option>
											<option value="Father">Father</option>
											<option value="Mother">Mother</option>
											<option value="Brother">Brother</option>
											<option value="Sister">Sister</option>
											<option value="Wife">Wife</option>
											<option value="Friend">Friend</option>
											<option value="Other">Other</option>
										</select>
										@error('u_relation_with_nominee')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
							
									<!-- Other Relation -->
									<div class="col-md-3 mb-3" id="u_otherRelationDiv" style="display: none;">
										<label class="mb-1"><strong>Other</strong></label>
										<input id="u_otherRelation" type="text" name="u_other_relation" placeholder="Other" class="form-control @error('u_other_relation') is-invalid @enderror" value="{{ old('u_other_relation') }}">
										@error('u_other_relation')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
							
									<!-- Address -->
									{{-- <div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Address</strong></label>
										<input type="text" id="u_address" name="u_address" placeholder="Address" class="form-control @error('u_address') is-invalid @enderror" value="{{ old('u_address') }}" required>
										@error('u_address')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div> --}}
							
									<!-- Block/Tahsil -->
									{{-- <div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Block/tahsil</strong></label>
										<input type="text" id="u_block_tahsil" name="u_block_tahsil" placeholder="Block/tahsil" class="form-control @error('u_block_tahsil') is-invalid @enderror" value="{{ old('u_block_tahsil') }}" required>
										@error('u_block_tahsil')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div> --}}
							
									<!-- Police Station -->
									{{-- <div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Police station</strong></label>
										<input type="text" id="u_police_station" name="u_police_station" placeholder="Police station" class="form-control @error('u_police_station') is-invalid @enderror" value="{{ old('u_police_station') }}" required>
										@error('u_police_station')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div> --}}
							
									<!-- Post Office -->
									{{-- <div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Post office</strong></label>
										<input type="text" id="u_post_office" name="u_post_office" placeholder="Post office" class="form-control @error('u_post_office') is-invalid @enderror" value="{{ old('u_post_office') }}" required>
										@error('u_post_office')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div> --}}
							
									<!-- District -->
									{{-- <div class="col-md-3 mb-3">
										<label class="mb-1"><strong>District</strong></label>
										<input type="text" id="u_district" name="u_district" placeholder="District" class="form-control @error('u_district') is-invalid @enderror" value="{{ old('u_district') }}" required>
										@error('u_district')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div> --}}
							
									<!-- State -->
									{{-- <div class="col-md-3 mb-3">
										<label class="mb-1"><strong>State</strong></label>
										<input type="text" id="u_state" name="u_state" placeholder="State" class="form-control @error('u_state') is-invalid @enderror" value="{{ old('u_state') }}" required>
										@error('u_state')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div> --}}
							
									<!-- Pincode -->
									{{-- <div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Pincode</strong></label>
										<input type="text" id="u_pincode" name="u_pincode" placeholder="Pincode" class="form-control @error('u_pincode') is-invalid @enderror" value="{{ old('u_pincode') }}" required>
										@error('u_pincode')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div> --}}
							
									<!-- Phone -->
									{{-- <div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Phone</strong></label>
										<input type="text" id="u_phone" name="u_phone" placeholder="+912345678900" class="form-control @error('u_phone') is-invalid @enderror" value="{{ old('u_phone') }}" required>
										@error('u_phone')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div> --}}
							
									<!-- Email -->
									{{-- <div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Email</strong></label>
										<input type="email" id="u_email" name="u_email" placeholder="hello@example.com" class="form-control @error('u_email') is-invalid @enderror" value="{{ old('u_email') }}" required>
										@error('u_email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div> --}}
							
									<!-- Password -->
									{{-- <div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Password</strong></label>
										<input type="password" id="u_password" name="u_password" placeholder="********" class="form-control @error('u_password') is-invalid @enderror" required>
										@error('u_password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div> --}}
							
									<!-- Confirm Password -->
									{{-- <div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Confirm Password</strong></label>
										<input type="password" id="u_confirm_password" name="u_confirm_password" placeholder="********" class="form-control @error('u_confirm_password') is-invalid @enderror" required>
										@error('u_confirm_password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div> --}}
							
								</div>
							
								<div class="row mt-4">
									<div class="col-md-12 text-end">
										<button type="submit" class="btn btn-primary">Update Personal Info</button>
									</div>
								</div>
							</form>
							
						</div>
						<div class="address-form">
							<h4 class="text-primary">Address Setting</h4>
							<form >
								@csrf
							
								<div class="row">
							
									<!-- Username -->
									{{-- <div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Name</strong></label>
										<input type="text" id="u_name" name="u_name" placeholder="Name" class="form-control @error('u_name') is-invalid @enderror" value="{{ old('u_name') }}" required>
										@error('u_name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div> --}}
							
									<!-- Father Name -->
									{{-- <div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Father Name</strong></label>
										<input type="text" id="u_father_name" name="u_father_name" placeholder="Father Name" class="form-control @error('u_father_name') is-invalid @enderror" value="{{ old('u_father_name') }}" required>
										@error('u_father_name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div> --}}
							
									<!-- Nominee Name -->
									{{-- <div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Nominee Name</strong></label>
										<input type="text" id="u_nominee_name" name="u_nominee_name" placeholder="Nominee Name" class="form-control @error('u_nominee_name') is-invalid @enderror" value="{{ old('u_nominee_name') }}" required>
										@error('u_nominee_name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div> --}}
							
									<!-- Relation with Nominee -->
									{{-- <div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Relation with Nominee</strong></label>
										<select id="u_relation_with_nominee" name="u_relation_with_nominee" class="default-select form-control wide mb-3">
											<option value="" disabled selected hidden>Select Relation</option>
											<option value="Father">Father</option>
											<option value="Mother">Mother</option>
											<option value="Brother">Brother</option>
											<option value="Sister">Sister</option>
											<option value="Wife">Wife</option>
											<option value="Friend">Friend</option>
											<option value="Other">Other</option>
										</select>
										@error('u_relation_with_nominee')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div> --}}
							
									<!-- Other Relation -->
									{{-- <div class="col-md-3 mb-3" id="u_otherRelationDiv" style="display: none;">
										<label class="mb-1"><strong>Other</strong></label>
										<input id="u_otherRelation" type="text" name="u_other_relation" placeholder="Other" class="form-control @error('u_other_relation') is-invalid @enderror" value="{{ old('u_other_relation') }}">
										@error('u_other_relation')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div> --}}
							
									<!-- Address -->
									<div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Address</strong></label>
										<input type="text" id="u_address" name="u_address" placeholder="Address" class="form-control @error('u_address') is-invalid @enderror" value="{{ old('u_address') }}" required>
										@error('u_address')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
							
									<!-- Block/Tahsil -->
									<div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Block/tahsil</strong></label>
										<input type="text" id="u_block_tahsil" name="u_block_tahsil" placeholder="Block/tahsil" class="form-control @error('u_block_tahsil') is-invalid @enderror" value="{{ old('u_block_tahsil') }}" required>
										@error('u_block_tahsil')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
							
									<!-- Police Station -->
									<div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Police station</strong></label>
										<input type="text" id="u_police_station" name="u_police_station" placeholder="Police station" class="form-control @error('u_police_station') is-invalid @enderror" value="{{ old('u_police_station') }}" required>
										@error('u_police_station')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
							
									<!-- Post Office -->
									<div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Post office</strong></label>
										<input type="text" id="u_post_office" name="u_post_office" placeholder="Post office" class="form-control @error('u_post_office') is-invalid @enderror" value="{{ old('u_post_office') }}" required>
										@error('u_post_office')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
							
									<!-- District -->
									<div class="col-md-3 mb-3">
										<label class="mb-1"><strong>District</strong></label>
										<input type="text" id="u_district" name="u_district" placeholder="District" class="form-control @error('u_district') is-invalid @enderror" value="{{ old('u_district') }}" required>
										@error('u_district')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
							
									<!-- State -->
									<div class="col-md-3 mb-3">
										<label class="mb-1"><strong>State</strong></label>
										<input type="text" id="u_state" name="u_state" placeholder="State" class="form-control @error('u_state') is-invalid @enderror" value="{{ old('u_state') }}" required>
										@error('u_state')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
							
									<!-- Pincode -->
									<div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Pincode</strong></label>
										<input type="text" id="u_pincode" name="u_pincode" placeholder="Pincode" class="form-control @error('u_pincode') is-invalid @enderror" value="{{ old('u_pincode') }}" required>
										@error('u_pincode')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
							
									<!-- Phone -->
									{{-- <div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Phone</strong></label>
										<input type="text" id="u_phone" name="u_phone" placeholder="+912345678900" class="form-control @error('u_phone') is-invalid @enderror" value="{{ old('u_phone') }}" required>
										@error('u_phone')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div> --}}
							
									<!-- Email -->
									{{-- <div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Email</strong></label>
										<input type="email" id="u_email" name="u_email" placeholder="hello@example.com" class="form-control @error('u_email') is-invalid @enderror" value="{{ old('u_email') }}" required>
										@error('u_email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div> --}}
							
									<!-- Password -->
									{{-- <div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Password</strong></label>
										<input type="password" id="u_password" name="u_password" placeholder="********" class="form-control @error('u_password') is-invalid @enderror" required>
										@error('u_password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div> --}}
							
									<!-- Confirm Password -->
									{{-- <div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Confirm Password</strong></label>
										<input type="password" id="u_confirm_password" name="u_confirm_password" placeholder="********" class="form-control @error('u_confirm_password') is-invalid @enderror" required>
										@error('u_confirm_password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div> --}}
							
								</div>
							
								<div class="row mt-4">
									<div class="col-md-12 text-end">
										<button type="submit" class="btn btn-primary">Update Address</button>
									</div>
								</div>
							</form>
							
						</div>
						<div class="password-check-form">
							<h4 class="text-primary">Verify Password</h4>
							<form id="oldPasswordForm">
								@csrf
								<div class="row">
									<!-- Old Password -->
									<div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Old Password</strong></label>
										<input type="password" id="u_old_password" name="u_old_password" placeholder="********" class="form-control @error('u_old_password') is-invalid @enderror" required>
										@error('u_old_password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								<div class="row mt-4">
									<div class="col-md-12 text-end">
										<button type="submit" class="btn btn-primary">Verify Password</button>
									</div>
								</div>
							</form>
						</div>
						
						<div class="password-form" style="display:none;">
							<h4 class="text-primary">Change Password</h4>
							<form id="changePasswordForm">
								@csrf
								<div class="row">
									<!-- Password -->
									<div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Password</strong></label>
										<input type="password" id="u_password" name="u_new_password" placeholder="********" class="form-control @error('u_new_password') is-invalid @enderror" required>
										@error('u_new_password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
									<!-- Confirm Password -->
									<div class="col-md-3 mb-3">
										<label class="mb-1"><strong>Confirm Password</strong></label>
										<input type="password" id="u_confirm_password" name="u_new_password_confirmation" placeholder="********" class="form-control @error('u_new_password_confirmation') is-invalid @enderror" required>
										@error('u_new_password_confirmation')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								<div class="row mt-4">
									<div class="col-md-12 text-end">
										<button type="submit" class="btn btn-primary">Update Password</button>
									</div>
								</div>
							</form>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	@section('script')
	<script>
		$(document).ready(function() {
			// Set up AJAX to include the CSRF token in the header
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		
			// Function to fetch and populate user data
			function fetchUserData() {
				$.ajax({
					url: '{{ route('profile.fetchUserData') }}',
					method: 'GET',
					success: function(data) {
						$('#u_name').val(data.name);
						$('#u_father_name').val(data.father_name);
						$('#u_nominee_name').val(data.nominee_name);
						$('#u_relation_with_nominee').val(data.relation_with_nominee).change();
		
						// Show or hide 'Other Relation' field based on the relation type
						if (data.relation_with_nominee === 'Other') {
							$('#u_otherRelationDiv').show();
							$('#u_otherRelation').val(data.other_relation);
						} else {
							$('#u_otherRelationDiv').hide();
						}
		
						$('#u_address').val(data.address);
						$('#u_block_tahsil').val(data.block_tahsil);
						$('#u_police_station').val(data.police_station);
						$('#u_post_office').val(data.post_office);
						$('#u_district').val(data.district);
						$('#u_state').val(data.state);
						$('#u_pincode').val(data.pincode);
						$('#u_phone').val(data.phone);
						$('#u_email').val(data.email);
					},
					error: function(xhr) {
						console.error('Failed to fetch user data:', xhr.responseText);
					}
				});
			}
		
			// Fetch user data initially
			fetchUserData();
		
			// Handle form submission for verifying the old password
			$('#oldPasswordForm').on('submit', function(e) {
				e.preventDefault();
				var formData = $(this).serialize();
		
				$.ajax({
					url: "{{ route('profile.verifyPassword') }}",
					type: 'POST',
					data: formData,
					success: function(response) {
						if (response.success) {
							$('.password-check-form').hide();
							$('.password-form').show();
						} else {
							alert('Old password is incorrect. Please try again.');
						}
					},
					error: function(xhr) {
						console.error('Error:', xhr.responseText);
						alert('An error occurred. Please try again.');
					}
				});
			});
		
			// Handle form submission for updating personal info
			$('.personal-form form').on('submit', function(e) {
				e.preventDefault();
		
				$.ajax({
					type: 'POST',
					url: '{{ route("profile.updatePersonalInfo") }}',
					data: $(this).serialize(),
					success: function(response) {
						if(response.success) {
							alert('Profile updated successfully!');
							fetchUserData();  // Refresh the form fields with updated data
						} else {
							alert('An error occurred: ' + response.error);
						}
					},
					error: function(xhr, status, error) {
						console.error('Error:', xhr.responseText);
						alert('AJAX error: ' + error);
					}
				});
			});
		
			// Handle form submission for updating address
			$('.address-form form').on('submit', function(e) {
				e.preventDefault();
		
				$.ajax({
					type: 'POST',
					url: '{{ route("profile.updateAddress") }}',
					data: $(this).serialize(),
					success: function(response) {
						if(response.success) {
							alert('Address updated successfully!');
							fetchUserData();  // Refresh the form fields with updated data
						} else {
							alert('An error occurred: ' + response.error);
						}
					},
					error: function(xhr, status, error) {
						console.error('Error:', xhr.responseText);
						alert('AJAX error: ' + error);
					}
				});
			});
		
			// Handle form submission for changing the password
			$('#changePasswordForm').on('submit', function(e) {
				e.preventDefault();
		
				$.ajax({
					type: 'POST',
					url: '{{ route("profile.changePassword") }}',
					data: $(this).serialize(), // Ensure this includes 'u_new_password' and 'u_new_password_confirmation'
					success: function(response) {
						if(response.success) {
							alert('Password updated successfully!');
							$('.password-form').hide();   // Hide the change password form
							$('.password-check-form').show(); // Show the verify password form
						} else {
							alert('An error occurred: ' + response.error);
						}
					},
					error: function(xhr) {
						// Handle validation errors
						if (xhr.status === 422) {
							var errors = xhr.responseJSON.errors;
							var errorMessages = '';
							$.each(errors, function(key, value) {
								errorMessages += value[0] + '\n';
							});
							alert('Validation error(s):\n' + errorMessages);
						} else {
							console.error('Error:', xhr.responseText);
							alert('AJAX error: ' + xhr.statusText);
						}
					}
				});
			});
		
			// Show or hide 'Other Relation' field based on the selected option
			$('#u_relation_with_nominee').change(function() {
				if ($(this).val() === 'Other') {
					$('#u_otherRelationDiv').show();
				} else {
					$('#u_otherRelationDiv').hide();
				}
			});
		});
	</script>
		
	@endsection
@endsection