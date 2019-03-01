@extends('staff_layout')
@section('staff_content')
@section('staff_include_css_content')
<link href="{{ asset('resources/assets/css/backend/admin/dashboard.css') }}" rel="stylesheet">
@stop
<?= $itemsHelper->show_tree(); ?>
@stop
@section('staff_include_js_content')	
<script src="{{ asset('resources/assets/js/backend/admin/dashboard.js') }}"></script>
@stop