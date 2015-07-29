<?php
	use FlowChart\FlowCharts\LoginService as LoginService;

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function login()
	{
		return View::make('layout.login');
	}

	public function loginValidate()
	{
		$data = Input::all();
		$result = (new LoginService)->loginMake($data);
		if ($result['status'] == 'OK')
		{
			$retult = (new Login)->criasessao($result['data']);
			if ($result['status'] == "OK")
			{
				return Redirect::to('/chose');
			}
			else
			{
				return View::make('layout.login')
			 	->with('message', 'Não foi possivel realizar a autenticação.');
			}
		}
		else
		{
			return View::make('layout.login')
			 	->with('message', 'Usuario ou senha inválida');
		}
	}

	public function logout()
	{
		Session::flush();
		return View::make('layout.login');
	}

}
