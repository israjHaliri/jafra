@extends('frontend_layout')
@section('content')
<div class="container" style="margin-bottom:30px;">
	<div class="row">
		<div class='col-md-3'></div>
		<div class="col-md-6">
			<div class="login-box well">
				{{ Form::open(array('route' => 'reset_password')) }}
				<legend>Forgot Password</legend>
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
					<label>New Password :</label>
					{{ Form::password('new_password', array('class'=>'form-control', 'placeholder'=>'*************')) }}
					@if($errors->has('new_password'))
					{{ $errors->first('new_password') }}
					@endif
				</div>
				<div class="form-group" align="center" style="margin-top:15px;">
					{{ Form::submit('Reset Password', array('class'=>'btn btn-success')) }}
				</div>
				<span class='text-center'>Doesn't Recieve Email?<a href="{{ route('request_mail') }}" class="text-sm">&nbsp;Click Here</a></span>
				<div class="form-group">
					<p class="text-center m-t-xs text-sm">Im not register yet?<a href="{{ route('register') }}">&nbsp;Click Here</a></p>
					<a href="{{ route('login') }}" class="btn btn-default btn-block m-t-md">Login</a>
				</div>
				{{ Form::close() }}
			</div>
		</div>
		<div class='col-md-3'></div>
	</div>
</div>
@stop