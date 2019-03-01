@extends('admin_layout')
@section('admin_content')
<div class="col-md-12">
	<ul class="breadcrumb">
		<li><a href="{{ route('admin/dashboard')}}">Dashboard</a></li>
		<li ><a href="{{ route('admin/message') }}">Message</a></li>
		<li class="active"><a>Detail Message</a></li>
	</ul>
</div>
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<i class="fa fa-pencil" style="margin-top: 5px;"></i>&nbsp;<b><i>Detail Message</i></b>
		</div>
		<div class="panel-body">
			@foreach($list_data as $data)
			<div class="form-group">
				<label>name :</label>
				{{ Form::text('name' , $data->name, array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				<label>email :</label>
				{{ Form::text('name' , $data->email, array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				<label>subject :</label>
				{{ Form::text('name' , $data->subject, array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				<label>message :</label>
				{{ Form::textarea('name' , $data->message, array('class'=>'form-control')) }}
			</div>
			@endforeach
		</div>
	</div>
</div>
@stop
