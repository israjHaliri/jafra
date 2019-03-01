@extends('admin_layout')
@section('admin_content')
@section('admin_include_css_content')
<link href="{{ asset('resources/assets/css/backend/fileinput.min.css') }}" rel="stylesheet">
@stop
<div class="col-md-12">
	<ul class="breadcrumb">
		<li><a href="{{ route('admin/dashboard')}}">Dashboard</a></li>
		<li class="active"><a>Gallery</a></li>
	</ul>
</div>
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<i class="fa fa-image" style="margin-top: 5px;"></i>&nbsp;<b><i>{{$label}}</i></b>
		</div>
		<div class="panel-body">
			{{ Form::open(array('url' => 'admin/gallery/upload', 'id'=>'my-gallery')) }}
			<div class="form-group" style="display:none">
				<label>Select Category :</label>
				{{ Form::select('category', $category, '',array('class'=>'form-control','disabled' => 'disabled','id'=>'selectbox_category')) }}
			</div>
			<div class="form-group">
				<label>File :</label>
				<input id="input-gallery" name="images[]" type="file" multiple=true class="file-loading">
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@section('admin_include_js_content')
<script src="{{ asset('resources/assets/js/backend/fileinput.min.js') }}"></script>
<script src="{{ asset('resources/assets/js/backend/admin/gallery.js') }}"></script>
@stop
@stop
