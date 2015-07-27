<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" lang="pt-br">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>jsPlumb</title>
	<link rel="stylesheet" href="{{asset('assets/foundation-5.5.2/css/foundation.css')}}">
	<script src="{{asset('assets/jquery-ui-1.9.2/js/jquery-1.8.3.js')}}"></script>

	<script type="text/javascript" src="{{asset('assets/jsplumb/jquery.jsPlumb.js')}}"></script>
</head>
<body>
	
	@yield('content')


	<script src="{{asset('assets/foundation-5.5.2/js/vendor/jquery.js')}}"></script>
	<script src="{{asset('assets/foundation-5.5.2/js/foundation.min.js')}}"></script>
	<script>
		$(document).foundation();
	</script>
</body>
</html>