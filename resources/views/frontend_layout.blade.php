 <!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<title>MARKET</title>

    <!-- Basic -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="keywords" content="Nicenetwork, nicenetwork,Unice Mulitlevel Marketing" />
<meta name="author" content="nicenetwork" />
<meta name="robots" content="index follow"/>
<meta name="description" content="Nicenetwork - Network Web For Multilevel Marketing" />

<!-- Mobile Configurations -->
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="GOOGLEBOT" content="index follow"/>
<meta name="apple-mobile-web-app-capable" content="yes" />      

<link href="{{ asset('resources/assets/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('resources/assets/css/frontend/custom.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/css/frontend/style.css') }}">
@yield('include_css_content')
</head>
<body>
	@include('frontend.layout.header')
	@yield('content')
	@include('frontend.layout.footer')
</body>
<script src="{{ asset('resources/assets/js/jquery-2.2.0.min.js') }}"></script>
<script src="{{ asset('resources/assets/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/js/frontend/plugins/jquery.easing.1.3.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/js/frontend/plugins/jquery.scrollto.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/js/frontend/plugins/rs-plugin/js/jquery.themepunch.plugins.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/js/frontend/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/js/frontend/plugins/jquery.parallax-1.1.3.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/js/frontend/plugins/jquery.countTo.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/js/frontend/plugins/fancybox/jquery.mousewheel-3.0.6.pack.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/js/frontend/plugins/fancybox/jquery.fancybox.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/js/frontend/plugins/fancybox/helpers/jquery.fancybox-media.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/js/frontend/plugins/jquery.isotope.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/js/frontend/plugins/owl/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/js/frontend/plugins/jquery.knob.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/js/frontend/plugins/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/js/frontend/plugins/uikit/uikit.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/js/frontend/plugins/retina-1.1.0.js') }}"></script>
@yield('include_js_content')
</html>