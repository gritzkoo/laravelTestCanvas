<?php 
	class GoJSController extends BaseController
	{
		//abre a tela de listagem de documentos do usuario logado
		public function gojsList()
		{
			$usuario = new stdClass;
			$usuario->USU_NOME = Auth::user()->USU_NOME;
			$fluxogramas = (new FluxogramaService)->getListaDocumento(Auth::user()->USU_ID);

			return View::make('flowcharts.userFlowchartList')
				->with('usuario', $usuario)
				->with('fluxogramas', $fluxogramas);
		}

		//abre a tela para edição ou criação de novos documentos
		public function gojs($id = null)
		{
			if (!empty($id))
			{
				$FluxogramaService = new FluxogramaService;
				$validaAcesso = $FluxogramaService->validaAcesso($id, Auth::user()->USU_ID);
				if ($validaAcesso)
				{
					$data = $FluxogramaService->getUltimaVersaoFLuxograma($id, Auth::user()->USU_ID);
					return View::make('flowcharts.gojsTeste')
						->with('data', $data);
				}
				else
				{
					return Redirect::to('/GoJS');
				}
			}
			
			return View::make('flowcharts.gojsTeste');
		}

		//salva os dados do fluxograma com $.post
		public function saveGojs()
		{
			$data = Input::all();
			$data['USU_ID'] = Auth::user()->USU_ID;
			return json_encode((new FuxogramaSave)->salvarModelo($data));
		}

		#ajax post request para montar a modal com o historico do fluxograma
		public function getHistoricoFluxograma()
		{
			$data = Input::all();
			debug($data);
			$data['USU_ID'] = Auth::user()->USU_ID;
			$fluxograma = new FluxogramaService;
			$t = $fluxograma->validaAcesso($data['FLG_ID2'], $data['USU_ID']);
			if ($t)
			{
				$result = $fluxograma->getHistoricoFluxograma($data['FLG_ID2']);
				return View::make('flowcharts.modalHistoricoFluxograma')
					->with('fluxogramas', $result);
			}
			else
			{
				return View::make('flowcharts.modalHistoricoFluxograma')
					->with('message', 'Nenhum dado foi encontrado');
			}
		}

		//ajax post request para excluir documento
		public function excluirFluxograma()
		{
			$data = Input::all();
			$FluxogramaService = new FluxogramaService;
			$validaAcesso = $FluxogramaService->validaAcesso($data['FLG_ID'], Auth::user()->USU_ID);
			if ($validaAcesso)
			{
				return json_encode($FluxogramaService->excluiFluxograma($data['FLG_ID']));
			}
			return json_encode(['status'=>'NOK','message'=>'Você não tem propriedade do documento, por tanto não pode exclui-lo.']);
		}

		
	}