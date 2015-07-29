<?php 

class LoginService extends \BaseController
{
	public function loginMake($data)
	{
		if (isset($data['login']) && isset($data['password']))
		{
			$q = \Usuario::where('USU_NOME', $data['login'])->where('USU_PASSWORD', sha1($data['password']))->first();

			if (!is_null($q))
			{
				return ['status'=>'OK', 'data'=>$q];
			}
			else
			{
				return ['status'=>'NOK', 'data'=>''];
			}
		}
	}
}