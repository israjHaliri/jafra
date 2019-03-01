@extends('frontend_layout')
@section('content')
<div class="container" style="margin-bottom:30px;">
	<div class="row">
		<div class='col-md-3'></div>
		<div class="col-md-6">
			<div class="login-box well">
				{{ Form::open(array('route' => 'register/submit')) }}
				<legend>Sign Up</legend>
				<div class="col-md-12" align="center">
					@if(Session::has('message'))
					{{ Session::get('message') }}
					@endif
				</div>
				<div class="form-group">
				<label>Mother's :</label>
					{{ Form::select('parent', $list_parent, '',array('class'=>'form-control')) }}
					@if($errors->has('parent'))
					{{ $errors->first('parent') }}
					@endif
				</div>
				<div class="form-group">
					<label>name :</label>
					{{ Form::text('name' , '', array('class'=>'form-control', 'placeholder'=>'admin')) }}
					@if($errors->has('name'))
					{{ $errors->first('name') }}
					@endif
				</div>
				<div class="form-group">
					<label>email :</label>
					{{ Form::text('email' , '', array('class'=>'form-control', 'placeholder'=>'admin@mail.com')) }}
					@if($errors->has('email'))
					{{ $errors->first('email') }}
					@endif
				</div>
				<div class="form-group">
					<label>Password :</label>
					{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'*************')) }}
					@if($errors->has('password'))
					{{ $errors->first('password') }}
					@endif
				</div>
				<div class="form-group">
					<label>Cpatcha :</label>
					<div align="center">
						{!! app('captcha')->display(); !!}
						@if($errors->has('g-recaptcha-response'))
						{{ $errors->first('g-recaptcha-response') }}
						@endif
					</div>
				</div>
				<div class="form-group" align="center" style="margin-top:15px;">
					{{ Form::submit('Regsiter', array('class'=>'btn btn-success')) }}
				</div>
				<span class='text-center'><a href="{{ route('forgot_password') }}" class="text-sm">Forgot Password?</a></span>
				<div class="form-group">
					<p class="text-center m-t-xs text-sm">Doesn't Recieve Email?<a href="{{ route('request_mail')}}">&nbsp;Click Here</a></p>
					<a href="{{ route('login') }}" class="btn btn-default btn-block m-t-md">Login</a>
				</div>
				{{ Form::close() }}
			</div>
		</div>
		<div class='col-md-3'></div>
	</div>
</div>
@stop