<?php 
	use FlowChart\FlowCharts as Chart;
	/**
	* 
	*/
	class PrimalController extends BaseController
	{
		
		public function firstTest()
		{
			$t = new Chart\VerificaUsuario();
			$t->getUsuario();
			Log::info(var_export($t));
			dd($t);
		}
	}