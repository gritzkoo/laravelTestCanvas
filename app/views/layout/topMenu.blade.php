<nav class="top-bar myTopMenu" data-topbar role="navigation">
	<ul class="title-area">
		<li class="name">
			<h1><a href="{{Route('default.chose')}}">Home</a></h1>
		</li>
		<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
		<li class="toggle-topbar menu-icon"><a href="#"><span>Home</span></a></li>
		
	</ul>

	<section class="top-bar-section">
	<!-- Right Nav Section -->
		<ul class="right">
			<li class="active"><a>{{ (Auth::check()) ? 'Bem vindo '.Auth::user()->USU_NOME : '' }}</a></li>
			<li class="active"><a href="{{ Route('home.logout') }}">LOGOUT</a></li>
			{{-- <li class="has-dropdown">
				<a href="#">Right Button Dropdown</a>
				<ul class="dropdown">
					<li><a href="#">First link in dropdown</a></li>
					<li class="active"><a href="#">Active link in dropdown</a></li>
				</ul>
			</li> --}}
		</ul>

		<!-- Left Nav Section -->
		{{-- <ul class="left myTopMenu">
			<li><a href="#">Left Nav Button</a></li>
		</ul> --}}
	</section>
</nav>

<style type="text/css">
	.myTopMenu
	{
		background-color: #008CBA;
		background: #008CBA;
	}
	.myTopMenu a
	{
		background-color: #008CBA;
		background: #008CBA;
		text-decoration: blink;
	}

</style>