<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<link href="{{asset('assets/GoJS/css/goSamples.css')}}" rel="stylesheet" type="text/css" />  <!-- you don't need to use this -->
	<script src="{{asset('assets/GoJS/js/go-debug.js')}}"></script>
	<script src="{{asset('assets/GoJS/js/goSamples.js')}}"></script><!-- this is only for the GoJS Samples framework -->

	<link rel="stylesheet" href="{{asset('assets/foundation-5.5.2/css/foundation.css')}}">
	<script src="{{asset('assets/jquery-ui-1.9.2/js/jquery-1.8.3.js')}}"></script>

	@yield('scripts')

</head>
<body onload="init()">

	@yield('content')

	<script src="{{asset('assets/foundation-5.5.2/js/vendor/jquery.js')}}"></script>
	<script src="{{asset('assets/foundation-5.5.2/js/foundation.min.js')}}"></script>
	<script>
		$(document).foundation();
	</script>
</body>
</html>