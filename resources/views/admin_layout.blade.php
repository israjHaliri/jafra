<!DOCTYPE html>
<html>
<head>
	<title>Nicenetwork Admin Pages</title>
	<link href="{{ asset('resources/assets/css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('resources/assets/css/font-awesome.css') }}" rel="stylesheet">
	<link href="{{ asset('resources/assets/css/backend/jquery.gritter.css') }}" rel="stylesheet">
	<link href="{{ asset('resources/assets/css/backend/pace-theme-minimal.css') }}" rel="stylesheet">
	<link href="{{ asset('resources/assets/css/backend/main.css') }}" rel="stylesheet">
	<link href="{{ asset('resources/assets/css/backend/skins.css') }}" rel="stylesheet">
	<link href="{{ asset('resources/assets/css/backend/custom_global.css') }}" rel="stylesheet">
	@yield('admin_include_css_content')
</head>
<body class="skin-dark">
	@include('admin.layout.header')
	@yield('admin_content')
	@include('admin.layout.footer')
	<script src="{{ asset('resources/assets/js/jquery-2.2.0.min.js') }}"></script>
	<script src="{{ asset('resources/assets/js/bootstrap.js') }}"></script>
	<script src="{{ asset('resources/assets/js/backend/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('resources/assets/js/backend/dataTables.bootstrap.js') }}"></script>
	<script src="{{ asset('resources/assets/js/backend/pace.min.js') }}"></script>
	<script src="{{ asset('resources/assets/js/backend/jquery.totemticker.min.js') }}"></script>
	<script src="{{ asset('resources/assets/js/backend/jquery.ba-resize.min.js') }}"></script>
	<script src="{{ asset('resources/assets/js/backend/jquery.blockUI.min.js') }}"></script>
	<script src="{{ asset('resources/assets/js/backend/jquery.gritter.min.js') }}"></script>
	<script src="{{ asset('resources/assets/js/backend/jquery.sparkline.min.js') }}"></script>
	<script src="{{ asset('resources/assets/js/backend/main.js') }}"></script>
	@yield('admin_include_js_content')
</body>
</html>