<?php 
class DiagramoController extends BaseController
{
	//abre a tela de listagem de documentos do usuario logado
	public function diagramoList()
	{
		$usuario = new stdClass;
		$usuario->USU_NOME = Auth::user()->USU_NOME;
		$fluxogramas = (new FluxogramaService)->getListaDocumento(Auth::user()->USU_ID, FLuxograma::DIAGRAMO);

		return View::make('diagramo.diagramoFlowchartList')
			->with('usuario', $usuario)
			->with('fluxogramas', $fluxogramas);
	}

	//abre a tela de edição para novos arquivos ou arquivos existentes
	public function edit($id = null)
	{
		// return View::make('diagramo.test');
		return View::make('diagramo.diagramoEdit');
	}
}