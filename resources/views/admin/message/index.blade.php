@extends('admin_layout')
@section('admin_content')
<link href="{{ asset('resources/assets/css/backend/custom_user.css') }}" rel="stylesheet">
<div class="col-md-12" align="center">
	@if(Session::has('message'))
	{{ Session::get('message') }}
	@endif
</div>
<div class="col-md-12">
	<ul class="breadcrumb">
		<li><a href="{{ route('admin/dashboard')}}">Dashboard</a></li>
		<li class="active"><a>Message</a></li>
	</ul>
</div>
<div class="col-md-12" align="right">
	{{ Form::open(array('route' => 'admin/message','method' => 'GET')) }}
	<div class="input-group">
		{{ Form::text('search' , '', array('class'=>'form-control', 'placeholder'=>'Type Keywords.....')) }}
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary" type="button"><i class="glyphicon glyphicon-search"></i></button>
		</span>
	</div>
	{{ Form::close() }}
</div>
@if($list_data->count())
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-6">
					<i class="fa fa-list" style="margin-top: 5px;"></i>&nbsp;<b><i>List Data</i></b>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="col-md-12">
				<table class="table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th>name</th>
							<th>Email</th>
							<th>subject</th>
							<th>status</th>
							<th width="20%"><em class="fa fa-cog"></em></th>
						</tr>
					</thead>
					<tbody>
						<!-- Lakukan Perulangan untuk menampilkan seluruh isi tabel -->
						<?php $no=1; ?>
						@foreach($list_data as $data)
						<tr>					
							<td align="center"><?= $no++ ?></td>
							<td>{{ $data->name }}</td>
							<td>{{ $data->email }}</td>
							<td>{{ $data->subject }}</td>
							<td>
							<?php if ($data->status == 1): ?>
								Readed
							<?php else: ?>
								Unread
							<?php endif ?>
							</td>
							<td align="center">
								<a class="btn btn-success" href="{{ route('admin/message/detail', $data->id) }}"><em class="fa fa-search"></em></a>
								<a class="btn btn-danger" href="{{ route('admin/message/delete', $data->id) }}"><em class="fa fa-trash"></em></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="col-md-12" align="center">
				{!! $list_data->render() !!}
			</div>
		</div>
	</div>
</div>
<!-- Sedangkan, bila tidak ada isinya, tampilkan isi berikut -->
@else
<div class="col-md-12">
	<div class="alert alert-warning" role="alert">No Data</div>
</div>
@endif
@stop