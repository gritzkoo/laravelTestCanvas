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
	Route::group(array('before' => '','prefix' => ''),function()
	{
		$glob_file = __DIR__.DIRECTORY_SEPARATOR.'routes'.DIRECTORY_SEPARATOR.'*'.DIRECTORY_SEPARATOR.'*';
		foreach(glob($glob_file) as $file)
		{
			log::debug($file);
			include $file;
		}
	});
/*________________________________________________*/



Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/homesss', function()
{
	$t = array('temp'=>1, 'mane'=>2, 'other'=>array('q','w','t'));
	Log::debug($t);
	return View::make('home.home');
});


