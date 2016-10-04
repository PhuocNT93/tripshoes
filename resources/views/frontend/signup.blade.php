@extends('frontend.layout.master')
	
@section('content')
	<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="signup" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">{{ trans('lang_user.header.access_code_send') }}</h4>
	      </div>
	      <div class="modal-body">
	       	<form method="POST" action="{{ url('/postRegister') }}">
	       		{{ csrf_field() }}
	       		@if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
	       		<div class="form-group">
	        		<input type="text" class="form-control" placeholder="Name" name="name" required>
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control" placeholder="Email" name="email" required>
	        	</div>
	        	<div class="form-group">
	        		<input type="password" class="form-control" placeholder="Password" name="password">
	        	</div>
	        	<div class="form-group">
	        		<input type="number" class="form-control" placeholder="Age" name="age">
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control" placeholder="Country of Residence" name="country">
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control" placeholder="Access Code" name="code" required>
	        	</div>
	        	<input type="submit" value="Get me access" class="btn btn-lg btn-success btn_login"> 
	       	</form>
	      </div>
	      
	    </div>
	  </div>
	</div>
	<div class="container">
		<div class="trip">
			<div class="text-center">
				<div class="col-lg-offset-1 col-lg-10"><h1>{{ trans('lang_user.index.content')}}</h1></div>
				<div class="col-lg-12" style="padding:0px;"><p>{{ trans('lang_user.index.content_1')}}</p></div>
			</div>
			<div class="col-lg-12 img-round bagia"></div>
			<div class="row">
				<div class="col-lg-4">
					<div class="col-lg-2"><img src="{{ asset('frontend/images/Icon3.png')}}"></div>
					<div class="col-lg-10 align_left">
						
						<p><strong> {{ trans('lang_user.index.content_2')}}</strong><br>{{ trans('lang_user.index.content_3')}}</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="col-lg-2"><img src="{{ asset('frontend/images/Icon4.png')}}"></div>
					<div class="col-lg-10 align_left">
						
						<p><strong> {{ trans('lang_user.index.content_4')}}</strong><br>{{ trans('lang_user.index.content_5')}}</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="col-lg-2"><img src="{{ asset('frontend/images/Icon5.png')}}"></div>
					<div class="col-lg-10 align_left">
						
						<p><strong> {{ trans('lang_user.index.content_6')}}</strong><br>{{ trans('lang_user.index.content_7')}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="row">
		<div class="gotchan text-center">
			<div class="col-lg-offset-2 col-lg-8 ">
				<img src="{{ asset('frontend/images/noun_145969.png') }}">
				<p>{{ trans('lang_user.index.content_8')}}</p>
			</div>
		</div>
		</div>
	</div>
	<div class="container">
		<div class="app">
			<div class="row">
				<div class="col-lg-12">
					<img src="{{ asset('frontend/images/Icon11.png') }}">
				</div>
				<div class="col-lg-12 app_behind">
					<div class="col-lg-6">
						<h1>{{ trans('lang_user.index.content_9')}}</h1>
						<p>{{ trans('lang_user.index.content_10')}}</p>
						<p>{{ trans('lang_user.index.content_11')}}</p>
						<p>{{ trans('lang_user.index.content_12')}}</p>
					</div>
					<div class="col-lg-6">
						<div class="remarkable img-round "></div>
					</div>
				</div>
			</div>
			<h1 class="text-center"> {{ trans('lang_user.index.content_13')}}</h1>
			<p id="app_end">{{ trans('lang_user.index.content_14')}}</p>
			<div class="photobook"></div>	
		</div>
	</div>	
	<div class="container">
		<!-- Begin A new form of giving -->
		<div class="col-lg-12 giving">
			<div class="col-lg-offset-1 col-lg-5 giving_content img-round">
				<div class="col-lg-12"><h1 class="text-center"> {{ trans('lang_user.index.content_15')}}</h1></div>
				<div class="col-lg-offset-1 col-lg-10"><p class="text-center"> {{ trans('lang_user.index.content_16')}}</p></div>
			</div>
		</div>
		<!-- End giving -->

		<!-- How to book -->
		<div class="col-lg-12 book">
			<h4 class="text-center">{{ trans('lang_user.index.content_17')}}</h4>
			<h1 class="text-center"> {{ trans('lang_user.index.content_18')}}</h1>
			<div class="col-lg-12 book_content">
				<div class="col-lg-4 text-center">
					<img src="{{ asset('frontend/images/noun_464.png') }}">
					<div class="col-lg-offset-1 col-lg-10 ">
						<h4 class="text-center"> {{ trans('lang_user.index.content_19')}}</h4>
						<p class="text-center"> {{ trans('lang_user.index.content_20')}}</p>
					</div>
				</div>
				<div class="col-lg-4 text-center">
					<img src="{{ asset('frontend/images/noun_579236.png') }}">
					<h4 class="text-center"> {{ trans('lang_user.index.content_21')}}</h4>
					<div class="col-lg-offset-1 col-lg-10 ">
						<p class="text-center"> {{ trans('lang_user.index.content_22')}}</p>
					</div>
				</div>
				<div class="col-lg-4 text-center">
					<img src="{{ asset('frontend/images/noun_532311.png') }}">
					<h4 class="text-center"> {{ trans('lang_user.index.content_23')}}</h4 >
					<div class="col-lg-offset-1 col-lg-10 ">
						<p class="text-center"> {{ trans('lang_user.index.content_24')}}</p>
					</div>
				</div>
			</div>
		</div>
		<!-- End how to book -->
	</div>
	<div class="photolauch"></div>	
	<!-- Begin Launch -->
	<div class="col-lg-12 launch">
		<div class="col-lg-offset-1 col-lg-10 launch_content">
			<h3 class="text-center"> {{ trans('lang_user.index.content_25')}}</h3>
			<h1 class="text-center"> {{ trans('lang_user.index.content_26')}}</h1>
			<p class="text-center">{{ trans('lang_user.index.content_27')}}</p>
		</div>
	</div>
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
                        <input type="email" class="form-control form_padding input-lg" name="email" placeholder="E-mail" width="100%" required>
                    </div>
                   </div>
                 </div>
             <div class="row">
                  <div class="col-lg-6">
                   <div class="form-group">
                        <select class="form-control form_padding input-lg">
                         <option value="">{{ trans('lang_user.index.content_29')}}</option>
                        </select>
                    </div>
                   </div>
                   <div class="col-lg-6">
                    <div class="form-group">
                        <input type="text" class="form-control form_padding input-lg" name="email" placeholder="Which country are you from?">
                    </div>
                   </div>
                 </div> 
                 <div class="row">
                  <div class="col-lg-12">
                   <div class="form-group">
                        <select class="form-control form_padding input-lg">
                         <option value="">{{ trans('lang_user.index.content_30')}}</option>
                        </select>
                    </div>
                   </div>
                 </div>
                 <button class="btn btn-lg btn_login col-lg-12 form_padding">{{ trans('lang_user.index.end')}}</button>
             </form>
	        </div>
	    </div>
	    <!-- end form -->	
	</div> 
@endsection