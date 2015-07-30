@extends('layout.gojsTemplate')

{{-- defining master title page --}}
@section('title', 'GoJS Plugin')

{{-- section from sctipts includes --}}
@section('scripts')
	<script type="text/javascript" src="{{ asset('assets/custom/js/funcoesPrincipaisGoJS.js') }}"></script>
@stop

{{-- main content container --}}
@section('content')

<div class="small-12 small-centered columns">&nbsp;</div>

<div class="small-12 columns">
	<div class="row">
	<a href="{{ Route('GoJS.gojslist') }}" class="button round left">Voltar</a>
		<div class="small-8 small-centered columns">
			<form id="chartContainer" action="{{Route('GoJS.gojs.save')}}" method="POST">
				<table style="width:100%;">
					<caption>Ajuste o tamanho da imagem</caption>
					<tr>
						<td><label for="Largura">Largura:</label></td>
						<td>
							<select name="FLG_WIDTH">
								@for($i = 1; $i <= 20; $i++)
									<option 
										value="{{ $i*100 }}"
										{{ (isset($data->FLG_WIDTH) && $data->FLG_WIDTH == ($i*100))
											? 'selected' : (empty($data->FLG_WIDTH) && $i == 20) ?'selected': '' }}
									>
										{{ ($i*100) }} pixels
									</option>
								@endfor
							</select>
						</td>
						<td><label for="Altura">Altura:</label></td>
						<td>
							<select name="FLG_HEIGHT">
								@for($i = 1; $i <= 20; $i++)
									<option 
										value="{{ $i*100 }}"
										{{ (isset($data->FLG_HEIGHT) && $data->FLG_HEIGHT == ($i*100))
											? 'selected' : (empty($data->FLG_HEIGHT) && $i == 20) ?'selected': '' }}
									>
										{{ ($i*100) }} pixels
									</option>
								@endfor
							</select>
						</td>
						<td><input type="button" onclick="resizeCanvasV2()" class="button round" value="Alterar a resolução"></td>
					</tr>
				</table>
				<input type="hidden" name="FLG_ID" value="{{ isset($data->FLG_ID) ? $data->FLG_ID : '' }}">
				<input type="hidden" name="FLG_ID2" value="{{ isset($data->FLG_ID2) ? $data->FLG_ID2 : '' }}">
				<textarea name="FLG_JSON" id="FLG_JSON" style="width:100%;height:300px; display:none;">{{ isset($data->FLG_JSON) ? $data->FLG_JSON : '' }}</textarea>
				<input type="hidden" name="FLG_BLOB" id="FLG_BLOB" value="">
				<label for="NomeFLuxograma">Nome do Fluxograma <spam style="color:red; display: none;" id="alerta_nome">Esse campo é obrigatório!</span></label>
				<input type="text" name="FLG_NOME" id="FLG_NOME" maxlength="120" required value="{{ isset($data->FLG_NOME) ? $data->FLG_NOME : '' }}">
				<label for="Descricao_do_documento">Descrição do documento</label>
				<textarea name="FLG_DESCRICAO" cols="3" rows="3">{{ isset($data->FLG_DESCRICAO) ? $data->FLG_DESCRICAO : '' }}</textarea>
			</form>
				<input type="button" class="button round right" onclick="save()" value="Salvar">
				<input type="button" class="button round right" onclick="preview()" style="right:5px;" value="Pré visualizar">
				@if(isset($data->FLG_VERSAO) && $data->FLG_VERSAO > 1)
					<a class="button round" onclick="buscarHistorico()">Visualizar histórico do documento</a>
				@endif
				
				{{-- <button class="button round" onclick="load()">Load</button> --}}
		</div>
	</div>
</div>

<div class="row"><div class="small-12 small-centered columns">&nbsp;</div></div>

	<span style="display: inline-block; vertical-align: top; padding: 5px; width:15%">
		<small>&nbsp;</small>
			<div id="myPalette" style="border: solid 1px gray; height: 600px"></div>
	</span>
	
	<span style="display: inline-block; vertical-align: top; padding: 5px; width:80%">
		<small>*Resolução atual <span name="resolucao">{{ isset($data->FLG_WIDTH) && isset($data->FLG_HEIGHT) 
			? $data->FLG_WIDTH."x".$data->FLG_HEIGHT."px" : '2000x2000 pixels' }}</span>. A imagem será criada exatamente com o que esta sendo exibido no quadro abaixo.</small>
		<div 
			id="myDiagram" 
			style="	border: solid 1px gray;
					width:{{ isset($data->FLG_WIDTH) ? $data->FLG_WIDTH : '2000' }}px;
					height:{{ isset($data->FLG_HEIGHT) ? $data->FLG_HEIGHT : '2000' }}px"></div>
	</span>

<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
	<a class="close-reveal-modal" aria-label="Close">&#215;</a>
	<div class="row"><div class="small-12 columns">&nbsp;</div></div>
	<div id="preview"></div>
</div>

<div id="ModalHistorico" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
	<a class="close-reveal-modal" aria-label="Close">&#215;</a>
	<div class="row"><div class="small-12 columns">&nbsp;</div></div>
	<div id="historico" style="height:auto;">
		{{-- dados carregado por ajax --}}
	</div>
</div>

<style type="text/css">
	a.button{
		text-decoration: blink;
	}
</style>
@stop
