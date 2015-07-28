<?php

class Login
{
	public function criaSessao($data)
	{
		if (!empty($data))
		{
			$data = json_decode($data);
			$usuario = new UsuarioMakeLogin;
			$usuario->USU_ID = $data->USU_ID;
			$usuario->USU_NOME = $data->USU_NOME;
			// log::debug(var_export($data));die;
			Auth::login($usuario);
			Session::set('user', $usuario);

			if(Auth::user()->USU_ID)
			{
				return ['status' => 'OK'];
			}	
			else
			{
				return ['status' => 'NOK'];
			}
		}
	}
}