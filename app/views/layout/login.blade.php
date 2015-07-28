@extends('layout.masterLayout')
{{-- set custon title --}}
@section('title','Login')

{{-- custons js scripts --}}
@section('scripts')
	<script type="text/javascript">
		function fechaAlerta()
		{
			$('span[name=spanAlerta]').hide();
		}
	</script>
@stop

{{-- content container --}}
@section('content')

<div class="row ">
	<div class="small-4 small-centered columns login_div">
		<form action="{{ Route('home.login.validate') }}" method="POST" >
			<h1 class="text-center">Login</h1>
			<label for="usuario">Usuario:</label>
			<input type="text" name="login" maxlength="100" required>
			<label for="senha">Senha:</label>			
			<input type="password" name="password" maxlength="10" required>
			<input type="submit" class="button round right" value="Login">
			<span class="alerta" name="spanAlerta" {{ !isset($message) ? 'hidden' : '' }}>
				{{ isset($message) && $message != '' ? $message : '' }}
				<a name="fechaAlerta" onclick="fechaAlerta()">&#215;</a>
			</span>	
		</form>
	</div>
</div>

<style type="text/css">
	.login_div{
		top:175px;
	}
	.alerta{
		font-size: small;
		color: red;
	}
</style>
@stop