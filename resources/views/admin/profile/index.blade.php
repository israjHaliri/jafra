@extends('admin_layout')
@section('admin_content')
<div class="col-md-12">
	<ul class="breadcrumb">
		<li><a href="{{ route('admin/dashboard')}}">Dashboard</a></li>
		<li class="active"><a>Profile</a></li>
	</ul>
</div>
<div class="col-md-12" align="center">
	@if(Session::has('message'))
	{{ Session::get('message') }}
	@endif
</div>
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<i class="fa fa-pencil" style="margin-top: 5px;"></i>&nbsp;<b><i>User Data</i></b>
		</div>
		<div class="panel-body">
			{{ Form::model($list_data, array('route' => array('admin/profile/edit', $list_data->id), 'method' => 'PUT','files'=>true)) }}
			<div class="form-group">
				<label>name :</label>
				{{ Form::text('name' , $list_data->name, array('class'=>'form-control')) }}
				@if($errors->has('name'))
				<span style="color:red">{{ $errors->first('name') }}</span>
				@endif
			</div>
			<div class="form-group">
				<label>Password :</label>
				{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'*************')) }}
				@if($errors->has('password'))
				<span style="color:red">{{ $errors->first('password') }}</span>
				@endif
			</div>
			<div class="form-group">
				<label>Email :</label>
				{{ Form::text('email' , $list_data->email, array('class'=>'form-control','disabled' => 'disabled')) }}
				@if($errors->has('email'))
				<span style="color:red">{{ $errors->first('email') }}</span>
				@endif
			</div>
			<div class="form-group">
				<label>Fullname :</label>
				{{ Form::text('fullname' , $list_data->profile->fullname, array('class'=>'form-control')) }}
				@if($errors->has('email'))
				<span style="color:red">{{ $errors->first('email') }}</span>
				@endif
			</div>
			<div class="form-group">
				<label>Address :</label>
				{{ Form::text('address' , $list_data->profile->address, array('class'=>'form-control')) }}
				@if($errors->has('address'))
				<span style="color:red">{{ $errors->first('address') }}</span>
				@endif
			</div>
			<div class="form-group">
				<label>Phone Number :</label>
				{{ Form::text('phone_number' , $list_data->profile->phone_number, array('class'=>'form-control')) }}
				@if($errors->has('phone_number'))
				<span style="color:red">{{ $errors->first('phone_number') }}</span>
				@endif
			</div>
			<div class="form-group">
				<label>Photo :</label>
				<input type="file" name="file" id="pick_file" />
				@if($errors->has('file'))
				<span style="color:red">{{ $errors->first('file') }}</span>
				@endif
			</div>
			<div>
				<?php if ($list_data->profile->photo !=""): ?>
					<img src="{{asset('resources/assets/image/profile')}}/{{$list_data->profile->photo}}" id="show_file" style="height:150px;width:150px;">
				<?php else: ?>
					<img src="{{asset('resources/assets/image')}}/no_photo.png" id="show_file" style="height:150px;width:150px;">
				<?php endif ?>
			</div>
			<div class="form-group" align="center">
				{{ Form::submit('Submit', array('class'=>'btn btn-success')) }}
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@section('admin_include_js_content')
<script src="{{ asset('resources/assets/js/backend/showFoto.js') }}"></script>
@stop
@stop