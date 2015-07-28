<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
* INCLUDE ALL ROUTES
*/
	Route::group(array('before' => 'auth','prefix' => ''),function()
	{
		$glob_file = __DIR__.DIRECTORY_SEPARATOR.'routes'.DIRECTORY_SEPARATOR.'*'.DIRECTORY_SEPARATOR.'*';
		foreach(glob($glob_file) as $file)
		{
			log::debug($file);
			include $file;
		}
	
		Route::get('/', function()
		{
			return View::make('hello');
		});
		
	});
/*________________________________________________*/

	Route::get('/login', array('as' => 'home.login', 'uses' => 'HomeController@login'));
	Route::post('/login', array('as' => 'home.login.validate', 'uses' => 'HomeController@loginValidate'));
	Route::get('/logout', array('as' => 'home.logout', 'uses' => 'HomeController@logout'));





