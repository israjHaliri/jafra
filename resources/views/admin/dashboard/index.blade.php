@extends('admin_layout')
@section('admin_content')
@section('admin_include_css_content')
<link href="{{ asset('resources/assets/css/backend/admin/dashboard.css') }}" rel="stylesheet">
@stop
<?= $itemsHelper->show_tree(); ?>
@stop
@section('admin_include_js_content')	
<script src="{{ asset('resources/assets/js/backend/admin/dashboard.js') }}"></script>
@stop