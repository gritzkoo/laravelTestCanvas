@extends('layout.gojsTemplate')

{{-- defining master title page --}}
@section('title', 'My Personal title')

{{-- section from sctipts includes --}}
@section('scripts')
	<script type="text/javascript" src="{{ asset('assets/custom/js/funcoesPrincipaisGoJS.js') }}"></script>
@stop

{{-- main content container --}}
@section('content')
<div class="small-12 small-centered columns">&nbsp;</div>

	<div class="small-12 columns">
		{{-- <fieldset><legend>Ajuste o tamanho do fluxograma</legend>
			<span class="no_margin">Imagem de 
				<a onclick="resizeCanvas(this)" data-width="100" data-height="100">100x100 pixels</a>,
				<a onclick="resizeCanvas(this)" data-width="200" data-height="200">200x200 pixels</a>,
				<a onclick="resizeCanvas(this)" data-width="300" data-height="300">300x300 pixels</a>,
				<a onclick="resizeCanvas(this)" data-width="400" data-height="400">400x400 pixels</a>,
				<a onclick="resizeCanvas(this)" data-width="500" data-height="500">500x500 pixels</a>,
				<a onclick="resizeCanvas(this)" data-width="600" data-height="600">600x600 pixels</a>,
				<a onclick="resizeCanvas(this)" data-width="700" data-height="700">700x700 pixels</a>,
				<a onclick="resizeCanvas(this)" data-width="800" data-height="800">800x800 pixels</a>,
				<a onclick="resizeCanvas(this)" data-width="900" data-height="900">900x900 pixels</a>,
				<a onclick="resizeCanvas(this)" data-width="1000" data-height="1000">1000x1000 pixels</a>,
				<a onclick="resizeCanvas(this)" data-width="1100" data-height="1100">1100x1100 pixels</a>,
				<a onclick="resizeCanvas(this)" data-width="1200" data-height="1200">1200x1200 0pixels</a>,
				<a onclick="resizeCanvas(this)" data-width="1300" data-height="1300">1300x1300 pixels</a>,
				<a onclick="resizeCanvas(this)" data-width="1400" data-height="1400">1400x1400 pixels</a>,
				<a onclick="resizeCanvas(this)" data-width="1500" data-height="1500">1500x1500 pixels</a>,
				<a onclick="resizeCanvas(this)" data-width="1600" data-height="1600">1600x1600 pixels</a>,
				<a onclick="resizeCanvas(this)" data-width="1700" data-height="1700">1700x1700 pixels</a>,
				<a onclick="resizeCanvas(this)" data-width="1800" data-height="1800">1800x1800 pixels</a>,
				<a onclick="resizeCanvas(this)" data-width="1900" data-height="1900">1900x1900 pixels</a>,
				<a onclick="resizeCanvas(this)" data-width="2000" data-height="2000">2000x2000 pixels</a>,
			</span>
		</fieldset> --}}
		<div class="row">
			<div class="small-8 small-centered columns">
				<table style="width:100%;">
					<caption>Ajuste o tamanho da imagem</caption>
					<tr>
						<td><label for="Largura">Largura:</label></td>
						<td>
							<select name="width">
								@for($i = 1; $i <= 20; $i++)
									<option value="{{ $i*100 }}">{{ ($i*100) }} pixels</option>
								@endfor
							</select>
						</td>
						<td><label for="Altura">Altura:</label></td>
						<td>
							<select name="height">
								@for($i = 1; $i <= 20; $i++)
									<option value="{{ $i*100 }}">{{ ($i*100) }} pixels</option>
								@endfor
							</select>
						</td>
						<td><button onclick="resizeCanvasV2()" class="button round">Alterar a resolução</button></td>
					</tr>
				</table>

				<p>A imagem será criada exatamente com o que esta sendo exibido no quadro abaixo.</p>

				<form action="{{Route('ACB.gojs.save')}}" method="POST">
					<textarea name="mySavedModel" id="mySavedModel" style="width:100%;height:300px;"></textarea>
					<input type="hidden" name="imagem" id="imagem" value="">
					<button class="button round right" onclick="save()" id="SaveButton" >Pré visualizar</button>
					{{-- <input type="submit" class="button round" value="Encaminhar"> --}}
				</form>
					<button class="button round right" onclick="save()" id="SaveButton" >Save</button>
					<button class="button round" onclick="load()">Load</button>

			</div>
		</div>

	</div>

	<div class="row">
		<div class="small-12 small-centered columns">&nbsp;</div>
	</div>

	{{-- <div style="width: 100%; margin:auto; overflow-x: auto; overflow-y:hidden;"> --}}
		<span style="display: inline-block; vertical-align: top; padding: 5px; width:15%">
			<small>&nbsp;</small>
  			<div id="myPalette" style="border: solid 1px gray; height: 1024px"></div>
		</span>
		
		<span style="display: inline-block; vertical-align: top; padding: 5px; width:80%">
			<small>*Resolução atual <span name="resolucao">2000x2000 pixels</span></small>
			<div id="myDiagram" style="border: solid 1px gray; width:2000px; height: 2000px"></div>
		</span>
	{{-- </div> --}}


	<div class="row">
		<div class="small-12 columns">
			{{-- <button class="button round" onclick="save()" id="SaveButton" >Save</button> --}}
  			{{-- <button class="button round" onclick="load()">Load</button> --}}
		</div>
	</div>
	
	
<script type="text/javascript">
	function resizeCanvas(obj_call)
	{
		var width = $(obj_call).data('width');
		var height = $(obj_call).data('height');
		$("#myDiagram").css('width',width).css('height',height);
	}
	function resizeCanvasV2()
	{
		var width =  $('select[name=width] :selected').val();
		var height = $('select[name=height] :selected').val();
		$("#myDiagram").css('width',width).css('height',height);
		$("span[name=resolucao]").html(width+'x'+height+' pixels');
	}
	$(function()
	{
		setTimeout(function(){
			$("#myDiagram").find('canvas').attr('id','canvasToImage');
			
		},1500);
	});
</script>

<style type="text/css" media="screen">
	.no_margin{
		margin: 0;
		padding: 0;
	}
</style>
		
@stop
