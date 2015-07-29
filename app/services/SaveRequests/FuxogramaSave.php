<?php 

class FuxogramaSave extends \BaseController
{
	public function salvarModelo($data)
	{
		if (!empty($data))
		{
			$tabela = new Fluxograma;
			$tabela->FLG_VERSAO    = 1;

			if (!empty($data['FLG_ID']))
			{
				$tabela->FLG_ID2 = $data['FLG_ID'];
				$v = Fluxograma::where('FLG_ID2', $data['FLG_ID'])->selectRaw('MAX(FLG_VERSAO) AS FLG_VERSAO')->first();
				if
				
			}

			$tabela->USU_ID        = isset($data['USU_ID'])        ? $data['USU_ID']        : null;
			$tabela->FLG_JSON      = isset($data['FLG_JSON'])      ? $data['FLG_JSON']      : null;
			$tabela->FLG_BLOB      = isset($data['FLG_BLOB'])      ? $data['FLG_BLOB']      : null;
			$tabela->FLG_NOME      = isset($data['FLG_NOME'])      ? $data['FLG_NOME']      : null;
			$tabela->FLG_DESCRICAO = isset($data['FLG_DESCRICAO']) ? $data['FLG_DESCRICAO'] : null;
			$tabela->FLG_WIDTH     = isset($data['FLG_WIDTH'])     ? $data['FLG_WIDTH']     : null;
			$tabela->FLG_HEIGHT    = isset($data['FLG_HEIGHT'])    ? $data['FLG_HEIGHT']    : null;

		}
		
	}
}