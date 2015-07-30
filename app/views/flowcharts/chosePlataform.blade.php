@extends('layout.masterLayout')
{{-- master page title --}}
@section('title','Escolha o Plugin')
{{-- main script input --}}
@section('scripts')
@stop
{{-- main content container --}}
@section('content')
	<div class="row">
		<div class="small-6 small-centered columns" style="top:200px;">
			<fieldset>
				<legend>Escolha qual Plugin gostaria de testar!</legend>
				<center>
					<a href="{{ Route('GoJS.gojslist') }}" class="button round">GoJS</a>
					<button href="{{ Route('PlumbJS.plumb') }}" class="button round alert" disabled title="Em construção">PlumbJS</button>
				</center>
			</fieldset>
		</div>
	</div>
@stop