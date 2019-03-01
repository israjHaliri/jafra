@extends('admin_layout')
@section('admin_content')
<div class="col-md-12">
	<ul class="breadcrumb">
		<li><a href="{{ route('admin/dashboard')}}">Dashboard</a></li>
		<li ><a href="{{ route('admin/landing_page') }}">Landing Page</a></li>
		<li class="active"><a>Add Landing Page</a></li>
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
			{{ Form::open(array('route' => 'admin/landing_page/insert', 'files' => true)) }}
			<div class="form-group">
				<label>title :</label>
				{{ Form::text('title' , '', array('class'=>'form-control')) }}
				@if($errors->has('title'))
				<span style="color:red">{{ $errors->first('title') }}</span>
				@endif
			</div>
			<div class="form-group">
				<label>Description :</label>
				{{ Form::textarea('description' , '', array('class'=>'form-control')) }}
				@if($errors->has('description'))
				<span style="color:red">{{ $errors->first('description') }}</span>
				@endif
			</div>
			<div class="form-group">
				<label>category :</label>
				{{ Form::select('category', $category, '',array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				<label>active :</label>
				{{ Form::select('active', $active, '',array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				<label>Cover content (Image) :</label>
				<input type="file" name="file" id="pick_file" />
				@if($errors->has('file'))
				<span style="color:red">{{ $errors->first('file') }}</span>
				@endif
			</div>
			<div>
				<img src="{{asset('resources/assets/image')}}/no_photo.png" id="show_file" style="height:150px;width:150px;">
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