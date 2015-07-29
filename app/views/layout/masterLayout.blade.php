<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" lang="pt-br">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>@yield('title')</title>
		<link rel="stylesheet" href="{{asset('assets/foundation-5.5.2/css/foundation.css')}}">
		<script src="{{asset('assets/jquery-ui-1.9.2/js/jquery-1.8.3.js')}}"></script>
		@yield('scripts')
	</head>
	<body>
		@if(Auth::check())
			@include('layout.topMenu')
		@endif
		<div class="row">
			@yield('content')
		</div>
		
		<script src="{{asset('assets/foundation-5.5.2/js/vendor/jquery.js')}}"></script>
	    <script src="{{asset('assets/foundation-5.5.2/js/foundation.min.js')}}"></script>
	    <script>
	      $(document).foundation();
	    </script>
	</body>
</html>