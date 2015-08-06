@extends('layout.masterLayout')
{{-- personal title page --}}
@section('title','Lista de fluxogramas')
{{-- custons sctipts --}}
@section('scripts')
@stop
{{-- Main content container --}}
@section('content')
<div class="row"><div class="small-12 columns">&nbsp;</div></div>
	<div class="row">
		<div class="small-8 small-centered columns">
			<table style="width:100%">
				<caption>{{ isset($usuario->USU_NOME) ? 'Lista de fluxogramas de '.$usuario->USU_NOME : '' }}</caption>
				<thead>
					<tr>
						<th>nome</th>
						<th>Descrição</th>
						<th>
							<center>
								<img src="{{ asset('assets/custom/img/gear.png') }}" style="width:25px; margin: auto;">
							</center>
						</th>
					</tr>
				</thead>
				<tbody>
					@if(isset($fluxogramas) && count($fluxogramas) > 0)
						@foreach($fluxogramas as $td)
							<tr>
								<td>{{ $td->FLG_NOME }}</td>
								<td>{{ !empty($td->FLG_DESCRICAO) ? $td->FLG_DESCRICAO : '' }}</td>
								<td>
									<center>
										<a href="/GoJS/gojs/{{ $td->FLG_ID }}"><img src="{{ asset('assets/custom/img/pencil_2.png') }}" style="width:15px;"></a>
										<a onclick="exluirFluxograma(this)" class="x_excluir" data-id="{{ $td->FLG_ID }}">&#215</a>
									</center>
								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td colspan="3"><h3 class="text-center">Você não possui nenhum documento</h3></td>
						</tr>
					@endif
				</tbody>
				<tfoot>
					<tr>
						<td colspan="3">
							<a href="{{ Route('diagramo.edit') }}" class="button round right ">Adicionar novo documento</a>
						</td>

					</tr>
				</tfoot>
			</table>
			<label for="Alertas" style="color:red;"> {{-- dados preenchidos por jquery --}}</label>

		</div>
	</div>

	<div id="excluirFluxograma" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
		<div class="row">
			<div class="small-12 columns">
				<center><h3>Deseja realmente excluir esse documetno</h3></center>
			</div>
		</div>
		<div class="row">
			<div class="small-3 small-centered columns">
				<button onclick="confirmaEscluir(this)" data-id="" id="confirmaExluir" class="button round">Sim</button>
				<button onclick="closeModal()" class="button round alert">Não</button>
			</div>
		</div>
	
	</div>

<script type="text/javascript">

	function exluirFluxograma(obj_call)
	{
		var id = $(obj_call).data('id');
		$("#confirmaExluir").attr('data-id', id);
		$("#excluirFluxograma").foundation('reveal','open');
	}

	function closeModal()
	{
		$("#excluirFluxograma").foundation('reveal','close');
	}

	function confirmaEscluir(obj_call)
	{
		var id = $(obj_call).data('id');
		$.post(BASE_URL + '/GoJS/gojs/excluir', {FLG_ID:id})
			.done (function ( data )
			{
				data = JSON.parse(data);
				if (data.status == 'OK')
				{
					location.reload();
				}
				else
				{
					$('label[for=Alertas]').html(data.message).show().fadeOut(5000);
				}
			});
	}

</script>
	<style type="text/css" media="screen">
		.x_excluir{
			color: red;
			font-size: 1.9em;
			font-weight: bold;
			padding-left: 5px;
			position: relative;
			top: 5px;
		}
	</style>
@stop