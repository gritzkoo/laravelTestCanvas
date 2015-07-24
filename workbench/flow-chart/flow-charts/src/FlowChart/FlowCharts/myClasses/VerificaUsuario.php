<?php 
	namespace FlowChart\FlowCharts;

	/**
	* 
	*/
	class VerificaUsuario extends \BaseController
	{
		
		public function getUsuario()
		{
			return \Usuario::all();
		}
	}
