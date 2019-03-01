@extends('admin_layout')
@section('admin_content')
<div class="col-md-12">
	<ul class="breadcrumb">
		<li><a href="{{ route('admin/dashboard')}}">Dashboard</a></li>
		<li ><a href="{{ route('admin/user') }}">User</a></li>
		<li class="active"><a>Edit User</a></li>
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
			<i class="fa fa-pencil" style="margin-top: 5px;"></i>&nbsp;<b><i>Edit Data</i></b>
		</div>
		<div class="panel-body">
			{{ Form::model($list_data, array('route' => array('admin/user/edit', $list_data->id), 'method' => 'PUT')) }}
			<div class="form-group">
				<label>name :</label>
				{{ Form::text('name' , $list_data->name, array('class'=>'form-control')) }}
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
				{{ Form::text('email' , $list_data->email, array('class'=>'form-control')) }}
				@if($errors->has('email'))
				{{ $errors->first('email') }}
				@endif
			</div>
			<div class="form-group">
				<label>Active :</label>
				{{ Form::select('active', $active, $list_data->active,array('class'=>'form-control')) }}
				@if($errors->has('active'))
				{{ $errors->first('active') }}
				@endif
			</div>
			<div class="form-group">
				<label>Level :</label>
				{{ Form::select('level', $level, $list_data->level,array('class'=>'form-control')) }}
				@if($errors->has('level'))
				{{ $errors->first('level') }}
				@endif
			</div>
			<div class="form-group">
				<label>Mother's Name :</label>
				{{ Form::select('parent', $list_parent, $list_data->parent_id,array('class'=>'form-control')) }}
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
