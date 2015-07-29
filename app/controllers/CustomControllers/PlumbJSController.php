<?php 
	class PlumbJSController extends BaseController
	{
		
		public function firstTest()
		{
			return View::make('flowChartTemplate');
		}

		public function plumbjs()
		{
			return View::make('flowcharts.jsplumb');
		}

		public function pluginChoser()
		{
			return View::make('flowcharts.chosePlataform');
		}
	}