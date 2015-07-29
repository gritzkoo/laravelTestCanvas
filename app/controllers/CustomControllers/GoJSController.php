<?php 
	class GoJSController extends BaseController
	{
		public function gojsList()
		{
			$usuario = new stdClass;
			$usuario->USU_NOME = Auth::user()->USU_NOME;
			return View::make('flowcharts.userFlowchartList')
				->with('usuario', $usuario);
		}

		public function gojs($id = null)
		{
			if (empty($id))
			{
				$data = new stdClass;
				$data->FLG_ID = 1;
				$data->FLG_ID2 = null;
				$data->FLG_JSON = '{ "class": "go.GraphLinksModel",
  "nodeDataArray": [ 
{"category":"Start", "text":"Início", "key":-6, "loc":"-11.875 -165"},
{"text":"Aqui esta a função", "figure":"Rectangle", "key":-2, "loc":"-11.875 -65"},
{"text":"Sim/Não", "figure":"Diamond", "key":-9, "loc":"-11.875 19"},
{"text":"???", "figure":"Rectangle", "key":-4, "loc":"-168.875 20"},
{"text":"???", "figure":"Rectangle", "key":-5, "loc":"149.125 21"},
{"category":"End", "text":"Fim", "key":-11, "loc":"-17.875 143"}
 ],
  "linkDataArray": [ 
{"from":-6, "to":-2, "points":[-11.875,-136.88372093023256,-11.875,-126.88372093023256,-11.875,-109.09186046511627,-11.875,-109.09186046511627,-11.875,-91.3,-11.875,-81.3]},
{"from":-9, "to":-5, "visible":true, "points":[63.625,19,73.625,19,95.375,19,95.375,21,117.125,21,127.125,21], "text":"Sim"},
{"from":-9, "to":-4, "visible":true, "points":[-87.375,19,-97.375,19,-117.125,19,-117.125,20.000000000000004,-136.875,20.000000000000004,-146.875,20.000000000000004], "text":"Não"},
{"from":-5, "to":-11, "points":[127.125,21,117.125,21,116,21,116,143,12.125,143,2.125,143]},
{"from":-4, "to":-11, "points":[-146.875,20.000000000000004,-136.875,20.000000000000004,-136.875,20.000000000000004,-136.875,143,-47.875,143,-37.875,143]},
{"from":-2, "to":-9, "points":[-11.875,-48.699999999999996,-11.875,-38.699999999999996,-11.875,-30.9,-11.875,-30.9,-11.875,-23.1,-11.875,-13.100000000000001]}
 ]}';
				$data->FLG_NOME = 'Meu Primeiro Fluxograma';
				$data->FLG_DESCRICAO = 'Esse documento visa mostrar as funcionalidades do sistema como um todo';
				$data->FLG_WIDTH = '400';
				$data->FLG_HEIGHT = '400';

				return View::make('flowcharts.gojsTeste')
					->with('data', $data);
			}
			
			return View::make('flowcharts.gojsTeste');
		}

		public function saveGojs()
		{
			$data = Input::all();
			debug($data);
		}

		
	}