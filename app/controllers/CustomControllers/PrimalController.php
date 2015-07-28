<?php 
	use FlowChart\FlowCharts as Chart;
	/**
	* 
	*/
	class PrimalController extends BaseController
	{
		
		public function firstTest()
		{
			return View::make('flowChartTemplate');
		}

		public function plumbjs()
		{
			return View::make('flowcharts.jsplumb');
		}

		public function gojsList()
		{
			$usuario = new stdClass;
			$usuario->USU_NOME = Auth::user()->USU_NOME;
			return View::make('flowcharts.userFlowchartList')
				->with('usuario', $usuario);
		}

		public function gojs($id = null)
		{
			if (!empty($id))
			{

			}
			
			return View::make('flowcharts.gojsTeste');
		}

		public function saveGojs()
		{
			log::debug(Input::all());
		}
	}