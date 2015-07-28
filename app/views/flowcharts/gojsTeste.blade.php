@extends('layout.gojsTemplate')

{{-- defining master title page --}}
@section('title', 'My Personal title')

{{-- section from sctipts includes --}}
@section('scripts')
	<script type="text/javascript" src="{{ asset('assets/custom/js/funcoesPrincipaisGoJS.js') }}"></script>
@stop

{{-- main content container --}}
@section('content')
	<div class="row">
		<div class="small-12 small-centered columns">
			
			<span style="display: inline-block; vertical-align: top; padding: 5px; width:15%">
      			<div id="myPalette" style="border: solid 1px gray; height: 1024px"></div>
			</span>
			
			<span style="display: inline-block; vertical-align: top; padding: 5px; width:80%">
				<div id="myDiagram" style="border: solid 1px gray; height: 2000px"></div>
			</span>

		</div>
	</div>
	<div class="row">
		<div class="small-12 columns">
			<button class="button round" onclick="save()" id="SaveButton" >Save</button>
  			<button class="button round" onclick="load()">Load</button>
		</div>
	</div>
	<div class="row">
		<div class="small-12 columns">
			<form action="{{Route('ACB.gojs.save')}}" method="POST">
				<textarea name="mySavedModel" id="mySavedModel" style="width:100%;height:300px"></textarea>
				<input type="hidden" name="imagem" id="imagem" value="">
				<input type="submit" class="button round" value="Encaminhar">
			</form>
		</div>
	</div>
	
<script type="text/javascript">
	$(function()
	{
		setTimeout(function(){
			$("#myDiagram").find('canvas').attr('id','canvasToImage');
			
		},1500);
	});
</script>
		
@stop
