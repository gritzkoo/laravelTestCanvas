<div class="row">
	<div class="small-12 columns">
		<table style="width:100%;">
			<caption>Lista da alteraçoes realizada nesse documento.</caption>
			<thead>
				<tr>
					<th>Versão</th>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Imagem</th>
				</tr>
			</thead>
			<tbody>
				@if(isset($fluxogramas) && count($fluxogramas) > 0)
					@foreach($fluxogramas as $td)
						<tr>
							<td>Versão {{ $td->FLG_VERSAO }} em {{ date("d/m/Y G:h:i", strtotime($td->FLG_TIMESTAMP)) }}</td>
							<td>{{ $td->FLG_NOME }}</td>
							<td>{{ $td->FLG_DESCRICAO }}</td>
							<td>
								<a 	href="data:image/png;base64,{{base64_encode($td->FLG_BLOB)}}"
									target="_blank">Fluxograma
								</a>
							</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td colspan="4">{{ isset($message) ? $message : 'Nenhum dado encontrado' }}</td>
					</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>
