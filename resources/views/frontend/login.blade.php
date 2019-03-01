@extends('frontend_layout')
@section('content')
<div class="container" style="margin-bottom:30px;">
	<div class="row">
		<div class='col-md-3'></div>
		<div class="col-md-6">
			<div class="login-box well">
				{{ Form::open(array('route' => 'login/auth')) }}
				<legend>Sign In</legend>
				<div class="col-md-12" align="center">
					@if(Session::has('message'))
					{{ Session::get('message') }}
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
				<div class="input-group">
					<div class="checkbox">
						<label>
							{{ Form::checkbox('remember_me', '1',false, array('id'=>'remember_me')) }} Remember me
						</label>
					</div>
				</div>
				<div class="form-group" align="center">
					{{ Form::submit('Login', array('class'=>'btn btn-success')) }}
				</div>
				<span class='text-center'><a href="{{ route('forgot_password') }}" class="text-sm">Forgot Password?</a></span>
				<div class="form-group">
					<p class="text-center m-t-xs text-sm">Do not have an account? / <a href="{{ route('fbauth') }}" role="button">login with facebook</a></p> 
					<a href="{{ route('register') }}" class="btn btn-default btn-block m-t-md">Create an account</a>
				</div>
				{{ Form::close() }}
			</div>
		</div>
		<div class='col-md-3'></div>
	</div>
</div>
@stop