@extends('frontend_layout')
@section('content')
@section('include_css_content')
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/css/frontend/detail_content.css') }}">
@stop
<div class="container" style="margin:30px;min-height:378px;">
	<div class="col-md-12">
		<div class="col-md-6 row">
			<div class="col-md-12" align="center" style="margin-bottom:25px;">
				<?php if ($image !=""): ?>
					<img src="{{asset('resources/assets/image/landing_page')}}/{{$id}}/{{$image}}" alt="Documentation Image" style="width:250px;heigth:250px;" class="img-thumbnail" />
				<?php else: ?>
					<img src="{{asset('resources/assets/image')}}/no_photo.png" style="width:250px;heigth:250px;" class="img-thumbnail">
				<?php endif ?>
			</div>
			<div class='col-md-12' align="center">
				@if($list_data_child->count())
				<div class="carousel slide media-carousel" id="media">
					<div class="carousel-inner">
						<?php 
						echo "<div class='item active'>";
						echo "<div class='row'>";
						    foreach($list_data_child as $key=>$value)
						    {
						        if ($key % 3 == 0) 
						        {
						            echo "</div>";
						            echo "</div>";
						            echo "<div class='item'>";
						            echo "<div class='row'>";
						        }
						         echo "<div class='col-md-4'>";
						         echo "<a href='#' class='thumbnail'><img src='$path$value->original_name' alt='Image'></a>";
						        echo "</div>";
						    }
						echo "</div>";  
						echo "</div>";?>  

					</div>
					<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
					<a data-slide="next" href="#media" class="right carousel-control">›</a>
				</div>  
				@else
				<p style="margin-top:80px;"><i>No Gallerry</i></p>
				@endif
			</div>
		</div>
		<div class="col-md-6" style="margin-left:25px;">
			<h5><b>Title : </b>{{$title}}</h5>
			<p><b>Description :</b></p>
			<p>{{$description}}</p>
			<div align="right" style="color:#3EB9B9"><b><i>{{$create_by}}</i></b></div>
		</div>
	</div>
</div>
@section('include_js_content')
<script src="{{asset('resources/assets/js/frontend/detail_content.js')}}"></script>
@stop
@stop