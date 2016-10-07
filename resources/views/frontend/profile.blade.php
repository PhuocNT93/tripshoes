@extends('frontend.layout.master')
@section('header')
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/intlTelInput.css') }}">
	<style type="text/css">
		.iti-flag {background-image: url("frontend/images/flags.png");}


	</style>
@endsection
@section('content')
	<div class="container">
		<div class="profile">
			<div class="row">			
				<div class="col-lg-8">
					<div class="left-profile">
						<form action="{{ url('/updateLeftProfile') }}" method="POST" id="formleftprofile">
							<span class="errors hidden"></span>
							<div class="head-profile"></div>
							<div class="content-profile">
								<div class="avatar"></div>
								<h4>General Info</h4>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label class="control-label">First name</label>
												<input type="text" class="form-control form_padding" name="firstname" id="firstname" value="{{ $user->first_name }}">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="control-label">Last name</label>
												<input type="text" class="form-control form_padding" name="lastname" id="lastname" value="{{ $user->last_name }}">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label class="control-label">Mobile Phone</label>
												<input type="text" class="form-control form_padding" name="mobilephone" id="mobilephone" value="{{ $user->mobile_phone }}">
												<a href="#" class="add">
													<i class="fa fa-plus"></i>
													Add mobile number (if different)
												</a>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="control-label">Work Phone</label>
												<div class="row">
													<div class="col-md-12">
														<input type="tel" id="phone" class="form-control form-padding" name="phone" value="{{ $user->workphone }}">
													</div>

												</div>

											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label class="control-label">Address</label>
												<input type="text" class="form-control form_padding" name="address" id="address" value="{{ $user->address }}">
											</div>
										</div>
										
									</div>
									<span class="changePassword">Change Password</span>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label class="control-label">Confirm current password</label>
												<input type="password" class="form-control form_padding" name="confirmcurrentpassword" id="confirmcurrentpassword">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="control-label">Confirm new password</label>
												<input type="text" class="form-control form_padding" name="confirmnewpassword" id="confirmnewpassword">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label class="control-label">New password</label>
												<input type="text" class="form-control form_padding" name="newpassword" id="newpassword">
											</div>
										</div>
										
									</div>
							</div>
							<div>
								<button type="reset" class="cancel">Cancel</button>
								<button type="submit" class="submit">Save Changes<i class="fa fa-check"></i></button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="right-profile">
						<div class="head-profile"></div>
						<div class="content-profile">
							<form id="img-upload-form" method="post" accept-charset="utf-8" onsubmit="return submitImageForm(this)">
								@if(Auth::user()->avatar)
			                    	<img id="logo-img" onclick="document.getElementById('add-new-logo').click();" src="{{ asset(config('path.avatar_view').Auth::user()->avatar)}}" class="img-rounded img-responsive showPlay" width="35%" />
			                    @else
			                    	<img id="logo-img" onclick="document.getElementById('add-new-logo').click();" src="{{ asset(config('path.profile_default'))}}" class="img-rounded img-responsive showPlay" width="35%" />
			                    @endif
			                    <input type="file" style="display: none" id="add-new-logo" name="file" accept="image/*" onchange="addNewLogo(this)"/>
			                    <input type="hidden" name="_token" value="{{ Session::token() }}" />
			                </form>
							<form>
								<div class="input-form">
									<div class="form-group">
										<input type="text" class="form-control form_padding" placeholder="Email"><!--<i class="fa fa-envelope"></i>-->
									</div>
									<div class="form-group">
										
										<input type="text" class="form-control form_padding" placeholder="Password"><!--<i class="fa fa-lock"></i>-->
									</div>
								</div>
								<div class="border-profile"></div>
								{{--<div class="username">
									<div class="form-group">
										<select class="form-control pull-left">
											<option value=""><i class="fa fa-facebook"></i></option>
										</select>
										<input type="text" class="form-control form_padding" placeholder="Username"><!--<i class="fa fa-envelope"></i>-->
										<a href="#" class="add">
											<i class="fa fa-plus"></i>Add another link
										</a>
									</div>
								</div>--}}
								
								<button type="submit" class="btn btn-success btn-lg">Save Changes</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@section('script')
	<script type="text/javascript">
		var pathprofile = {!! json_encode(config('path.pathprofile')) !!};
	</script>
	<script type="text/javascript" src="{{ asset('frontend/js/profile.js') }}"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="{{ asset('frontend/js/intlTelInput.js') }}"></script>
	<script>
	  $("#phone").intlTelInput();
	</script>
@endsection	
@endsection	
		