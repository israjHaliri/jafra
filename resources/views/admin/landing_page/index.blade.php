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
		<li class="active"><a>List Landing Page</a></li>
	</ul>
</div>
<div class="col-md-12" align="right">
	{{ Form::open(array('route' => 'admin/landing_page','method' => 'GET')) }}
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
					<i class="fa fa-list" style="margin-top: 5px;"></i>&nbsp;<b><i>Add Data</i></b>
				</div>
				<div class="col-md-6" align="right">
					<a href="{{ route('admin/landing_page/create') }}" style="margin-bottom: 0px;" class="btn btn-xs btn-primary"><em class="fa fa-plus"></em>&nbsp;Add</a>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="col-md-12">
				<table class="table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th>title</th>
							<th>category</th>
							<th>active</th>
							<th width="20%"><em class="fa fa-cog"></em></th>
						</tr>
					</thead>
					<tbody>
						<!-- Lakukan Perulangan untuk menampilkan seluruh isi tabel -->
						<?php $no=1; ?>
						@foreach($list_data as $data)
						<tr>					
							<td align="center"><?= $no++ ?></td>
							<td>{{ $data->title }}</td>
							<td>{{ $data->category }}</td>
							<td>
							<?php if ($data->active == 1): ?>
								active
							<?php else: ?>
								non active
							<?php endif ?>
							</td>
							<!-- Siapkan tombol untuk edit dan hapus item tertentu -->
							<td align="center">
								<a class="btn btn-success" href="{{ route('admin/landing_page/edit', $data->id) }}"><em class="fa fa-pencil"></em></a>
								<a class="btn btn-danger" href="{{ route('admin/landing_page/delete', $data->id) }}"><em class="fa fa-trash"></em></a>
								<a class="btn btn-primary" href="{{ route('admin/landing_page/gallery', $data->id) }}"><em class="fa fa-image"></em>Add Gallery</a>
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