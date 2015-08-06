<?php
class FluxogramaService extends BaseController
{

	//valida o acesso aos dados do documento
	public function validaAcesso($FLG_ID, $USU_ID, $FLG_PLUGIN)
	{
		$q = Fluxograma::where('FLG_ID', $FLG_ID)->where('USU_ID', $USU_ID)->where('FLG_PLUGIN', $FLG_PLUGIN)->first();
		if(!$q)
		{
			return false;
		}
		return true;
	}

	//Retorna a lista de documentos por id de usuário
	public function getListaDocumento($USU_ID, $FLG_PLUGIN)
	{
		return Fluxograma::where('USU_ID', $USU_ID)->whereRaw('ISNULL(FLG_ID2)')->where('FLG_PLUGIN', $FLG_PLUGIN)->get();
	}

	//Retorna a ultima versão de um fluxograma apartir de um id de registro com FJG_ID2 null
	public function getUltimaVersaoFLuxograma($FLG_ID, $USU_ID, $FLG_PLUGIN)
	{
		$check = Fluxograma::where('FLG_ID2', $FLG_ID)
			->where('USU_ID', $USU_ID)
			->where('FLG_PLUGIN', $FLG_PLUGIN)
			->selectRaw('MAX(FLG_VERSAO) AS FLG_VERSAO')->first();

		if (is_null($check->FLG_VERSAO))
		{
			return Fluxograma::where('FLG_ID', $FLG_ID)
				->where('USU_ID', $USU_ID)
				->where('FLG_PLUGIN', $FLG_PLUGIN)
				->select('FLG_ID','FLG_ID2','USU_ID','FLG_JSON','FLG_VERSAO','FLG_NOME','FLG_DESCRICAO','FLG_WIDTH','FLG_HEIGHT')
				->first();
		}
		else
		{
			return Fluxograma::where('FLG_ID2', $FLG_ID)->where('FLG_VERSAO', $check->FLG_VERSAO)
				->select('FLG_ID','FLG_ID2','USU_ID','FLG_JSON','FLG_VERSAO','FLG_NOME','FLG_DESCRICAO','FLG_WIDTH','FLG_HEIGHT')
				->first();
		}
	}

	//retorna todos os documentos relacionados ao fluxograma ordenado por versão
	public function getHistoricoFluxograma($FLG_ID)
	{

		return Fluxograma::where(function($query) use ($FLG_ID)
			{
				$query->where('FLG_ID', $FLG_ID)
					->orWhere('FLG_ID2',$FLG_ID);
			})
			->orderBy('FLG_VERSAO', 'asc')
			->get();
	}
	
	//exclui com $.post o documento por id
	public function excluiFluxograma($FLG_ID)
	{
		DB::beginTransaction();
		try
		{
			Fluxograma::where(function($query) use ($FLG_ID)
			{
				$query->where('FLG_ID',$FLG_ID)->orWhere('FLG_ID2',$FLG_ID);
			})
			->delete();
			DB::commit();
			return ['status'=>'OK','Message'=>'Documento excuido com sucesso.'];
		}
		catch(Exception $e)
		{
			return ['status'=>'NOK', 'Message'=>'Não foi possivel excluir seu documento.'];
			DB::rollback();
			debug([$e->getMessage(), $e->getLine()]);
		}
	}
}