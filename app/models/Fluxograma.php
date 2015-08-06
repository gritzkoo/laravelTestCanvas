<?php
	
	class Fluxograma extends Eloquent
	{
		protected $table = 'FLUXOGRAMA';
		protected $primaryKey = 'FLG_ID';
		public $timestamps = false;

		/*
			constantes para identificar a origem dos dados na tabela fluxograma para não quebrar a visualização por json oriundo
			de outros plugins.
			Todos os plugins funcionam com canvas, e canvas é serializado como json mas cada plugins monta uma estrutuda individual.
		*/
		const GOJS = 1;
		const PLUMB_JS = 2;
		const DIAGRAMO = 3;

	}