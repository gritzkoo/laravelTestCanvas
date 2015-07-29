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
					<tr>
						@if(isset($fluxogramas) && count($fluxogramas) > 0)
							@foreach($fluxogramas as $td)
								<td>{{ $td->FLG_NOME }}</td>
								<td>{{ !empty($td->FLG_DESCRICAO) ? $td->FLG_DESCRICAO : '' }}</td>
								<td>
									<center>
										<a href="/abc/gojs/$td->FLG_ID"><img src="{{ asset('assets/custom/img/pencil_2.png') }}" style="width:15px;"></a>
										<a href="#" class="x_excluir">&#215</a>
									</center>
								</td>
							@endforeach
						@else
							<td colspan="3"><h3 class="text-center">Você não possui nenhum documento</h3></td>
						@endif
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="3">
							<a href="{{ Route('GoJS.gojs') }}" class="button round right ">Adicionar novo documento</a>
						</td>

					</tr>
				</tfoot>
			</table>

		</div>
	</div>

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