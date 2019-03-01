@extends('admin_layout')
@section('admin_content')
<div class="col-md-12">
	<ul class="breadcrumb">
		<li><a href="{{ route('admin/dashboard')}}">Dashboard</a></li>
		<li ><a href="{{ route('admin/user') }}">User</a></li>
		<li class="active"><a>Add User</a></li>
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
			<i class="fa fa-plus" style="margin-top: 5px;"></i>&nbsp;<b><i>Add Data</i></b>
		</div>
		<div class="panel-body">
			{{ Form::open(array('route' => 'admin/user/insert')) }}
			<div class="form-group">
				<label>name :</label>
				{{ Form::text('name' , '', array('class'=>'form-control')) }}
				@if($errors->has('name'))
				{{ $errors->first('name') }}
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
				<label>Email :</label>
				{{ Form::text('email' , '', array('class'=>'form-control')) }}
				@if($errors->has('email'))
				{{ $errors->first('email') }}
				@endif
			</div>
			<div class="form-group">
				<label>Active :</label>
				{{ Form::select('active', $active, '',array('class'=>'form-control')) }}
				@if($errors->has('active'))
				{{ $errors->first('active') }}
				@endif
			</div>
			<div class="form-group">
				<label>Level :</label>
				{{ Form::select('level', $level, '',array('class'=>'form-control')) }}
				@if($errors->has('level'))
				{{ $errors->first('level') }}
				@endif
			</div>
			<div class="form-group">
				<label>Mother's Name :</label>
				{{ Form::select('parent', $list_parent, '',array('class'=>'form-control')) }}
				@if($errors->has('parent'))
				{{ $errors->first('parent') }}
				@endif
			</div>
			<div class="form-group" align="center">
				{{ Form::submit('Submit', array('class'=>'btn btn-success')) }}
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop			