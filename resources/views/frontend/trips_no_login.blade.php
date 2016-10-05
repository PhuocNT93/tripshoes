<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/main.css') }}">
	</head>
	<body>

		<div id="header" class="has-banner" style="background: linear-gradient( rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.25) ), url(frontend/images/Depositphotos_12619090_original.jpg) no-repeat; background-size: cover;">
			<div class="container">
				<div class="top">
					<div class="pull-left">
						<div class="link">
							<a href="{{ asset('/trip') }}">{{ trans('lang_user.header.trips') }}</a>
							<a href="{{ asset('/blog') }}" class="padding_left_10">{{ trans('lang_user.header.blog') }}</a>	
						</div>
					</div>
					@if(!Auth::check())
						<div class="pull-right">
							<div class="link">
								<a href="#" data-toggle="modal" data-target="#signin1">{{ trans('lang_user.header.sign_in') }}</a>
								<a href="{{ asset('/trip3') }}"><i class="fa fa-shopping-cart padding_left_10"></i>Cart</a>
							</div>
						</div>
						<div class="modal fade" id="signin1" tabindex="-1" role="dialog" aria-labelledby="signin" aria-hidden="true">
						  <div class="modal-dialog modal-sm">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">{{ trans('lang_user.header.sign_in') }}</h4>
						      </div>
						      <div class="modal-body modal_login">
						        <p>{{ trans('lang_user.header.sign_in_here') }}</p>
						        <form>
						        	<div class="form-group">
						        		<input type="text" class="form-control form_padding" placeholder="Email">
						        	</div>
						        	<div class="form-group">
						        		<input type="password" class="form-control form_padding" placeholder="Password">
						        	</div>
						        	<div>
						        	<div class="pull-left">
						        		<input type="checkbox"> {{ trans('lang_user.header.remember_me') }}
						        	</div>
						        	<div class="pull-right">
						        		<a href="#">{{ trans('lang_user.header.forgot_password') }}</a>
						        	</div>
						        	</div>
						        	<div class="clearfix"></div>
						        	<input type="submit" value="Sign In" class="btn btn-lg btn-success btn_login"> 
						        </form>
						        <a href="#" data-toggle="modal" data-target="#signup"><strong>{{ trans('lang_user.header.access_code') }}</strong></a>
						      </div>
						      
						    </div>
						  </div>
						</div>

						<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="signup" aria-hidden="true">
						  <div class="modal-dialog modal-sm">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">{{ trans('lang_user.header.access_code_send') }}</h4>
						      </div>
						      <div class="modal-body">
						       	<form>
						       		<div class="form-group">
						        		<input type="text" class="form-control" placeholder="Name">
						        	</div>
						        	<div class="form-group">
						        		<input type="text" class="form-control" placeholder="Email">
						        	</div>
						        	<div class="form-group">
						        		<input type="text" class="form-control" placeholder="Password">
						        	</div>
						        	<div class="form-group">
						        		<input type="text" class="form-control" placeholder="Age">
						        	</div>
						        	<div class="form-group">
						        		<input type="text" class="form-control" placeholder="Country of Residence">
						        	</div>
						        	<div class="form-group">
						        		<input type="text" class="form-control" placeholder="Access Code">
						        	</div>
						        	<input type="submit" value="Get me access" class="btn btn-lg btn-success btn_login"> 
						       	</form>
						      </div>
						      
						    </div>
						  </div>
						</div>
						@else
							<div class="link">
						<ul class="nav-right pull-right list-inline">
							<li><a href="{{ route('booking.index') }}">{{ trans('lang_user.header.my_booking') }}</a></li>
							<li>
								<a href="#"><i class="fa fa-shopping-cart"></i>{{ trans('lang_user.header.cart') }}</a>
							</li>

							<li class="dropdown">
								<a href class="dropdown-toggle" data-toggle="dropdown">
									@if(Auth::user()->avatar)
										<img src="{{ asset(config('path.avatar_view').Auth::user()->avatar) }}" class="img-circle img-responsive" width="40px" height="40px">
									@else
										<img src="{{ asset(config('path.profile_default')) }}" class="img-circle img-responsive" width="40px" height="40px">
									@endif
								</a>
								
								<ul class="dropdown-menu pull-right with-arrow panel panel-default littleFadeInUp" role="menu">

					                <li>
					                    <a role="button" href="{{ url('/profile') }}">
					                        <i class="fa fa-user"></i>{{ trans('lang_user.header.profile') }}
					                    </a>
					                </li>
					                <li>
					                    <a role="button">
					                        <i class="fa fa-cog"></i>{{ trans('lang_user.header.account') }}
					                    </a>
					                </li>
					                <li>
					                    <a role="button" href="{{ url('/logout') }}" tabindex="0">
					                        <i class="fa fa-sign-out"></i>{{ trans('lang_user.header.logout') }}
					                    </a>
					                </li>

					            </ul>
								
							</li>
						</ul>
					</div>
				@endif
					
				</div>
				<div class="text-center webname">
					<a href="{{ url('/') }}"><img src="{{ asset('frontend/images/Group3.png') }}"></a>
					{{ trans('lang_user.header.trips') }}<span>{{ trans('lang_user.header.shoes') }}</span>
				</div>
				<div class="border_header"></div>
				<div class="title-header text-center">
					<h1>{{ trans('lang_user.header.contact') }}<br> {{ trans('lang_user.header.contact_1') }}</h1>
					<a href="" class="btn btn-lg">{{ trans('lang_user.header.button') }}</a>
				</div>
			</div>

		</div>
			<div id="content">
				<div class="container">					
					<div class="row">
						@foreach($tourlist as $item)
						<div class="col-lg-6 my_booking">
							<a href="{{ url('/trip/'.$item->id) }}">
							<div style="background: url(upload/images/{{$item->image}}) no-repeat; background-size:cover;background-position: -140px;" class="tripclass img-rounded">
							</div>
							</a>
							<h2 class="text-center"> {{ $item->userid->first_name }} {{ $item->userid->last_name }}'s</h2>
							<a href="{{ url('/trip/'.$item->id) }}"><h2 class="text-center"> {{ $item->name }}</h2></a>
							<p class="text-center">${{number_format((float)$item->price, 2, '.', '')}} | {{$item->time_period}}mins | {{ $item->transport }}</p>
						</div>
						@endforeach
					</div>
					<div class="text-center col-lg-12">{!! $tourinfos->render() !!}</div>
				</div>
				<!-- form -->
				<div class="container">
				<!-- form -->
				<div class="col-lg-12 text-center form_send">
			       	<h1 class="text-center">{{ trans('lang_user.index.content_28')}}</h1>
			        <div class="col-lg-offset-2 col-lg-8 text-center">
			            <form class="form_access">
		                 <div class="row">
		                  <div class="col-lg-6">
		                   <div class="form-group">
		                        <input type="text" name="youname" class="form-control form_padding input-lg" placeholder="Youname" width="100%">
		                    </div>
		                   </div>
		                   <div class="col-lg-6">
		                    <div class="form-group">
		                        <input type="email" class="form-control form_padding input-lg" name="email" placeholder="E-mail" width="100%">
		                    </div>
		                   </div>
		                 </div>
		             <div class="row">
		                  <div class="col-lg-6">
		                   <div class="form-group">
		                        <select class="form-control form_padding input-lg">
		                         <option value="">{{ trans('lang_user.index.content_29') }}</option>
		                        </select>
		                    </div>
		                   </div>
		                   <div class="col-lg-6">
		                    <div class="form-group">
		                        <input type="email" class="form-control form_padding input-lg" name="email" placeholder="Which country are you from?">
		                    </div>
		                   </div>
		                 </div> 
		                 <div class="row">
		                  <div class="col-lg-12">
		                   <div class="form-group">
		                        <select class="form-control form_padding input-lg">
		                         <option value="">{{ trans('lang_user.index.content_30') }}</option>
		                        </select>
		                    </div>
		                   </div>
		                 </div>
		                 <button class="btn btn-lg btn_login col-lg-12 form_padding">{{ trans('lang_user.index.end') }}</button>
		             </form>
			        </div>
			    </div>
			    <!-- end form -->
			    </div>
				<div id="footer">
	<div class="container">
		<div class="top">
			<div class="pull-left webname">
				<a href="{{ asset('/') }}"><img src="{{ asset('frontend/images/Group3.png') }}"></a>
				{{ trans('lang_user.footer.trip') }}<span>{{ trans('lang_user.footer.shoes') }}</span>
			</div>
			<div class="pull-right">
				<ul>
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram"></i></a></li>
				</ul>
			</div>
			<div class="text-center">
				<ul>
					<li><a href="{{ asset('/about') }}">{{ trans('lang_user.footer.about') }}</a></li>
					<li><a href="{{ asset('/sendusemail')}}">{{ trans('lang_user.footer.contact') }}</a></li>
					<li><a href="{{ asset('/support') }}">{{ trans('lang_user.footer.support') }}</a></li>
				</ul>
			</div>
			<div class="border"></div>
		</div>

	</div>
	<div class="text-center copyright">
		<strong>{{ trans('lang_user.footer.copy_right') }}</strong>
	</div>
</div>
<script type="text/javascript" src="{{ asset('/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>