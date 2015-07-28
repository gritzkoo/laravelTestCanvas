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

		public function gojs()
		{
			return View::make('flowcharts.gojsTeste');
		}

		public function saveGojs()
		{
			log::debug(Input::all());
		}
	}