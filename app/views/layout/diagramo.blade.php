<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/foundation-5.5.2/css/foundation.css')}}">
	@include('layout.header')
	
	@include('layout.diagramoHeader')
	@yield('scripts')
</head>
<body onload="initLight('');" id="body">
    <div style="width:100%;height:auto;">
        @if(Auth::check())
            @include('layout.topMenu')
        @endif
    </div>
    <div style="width:100%; height:auto;">
        @yield('content')
    </div>


</body>
</html>