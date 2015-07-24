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
	}