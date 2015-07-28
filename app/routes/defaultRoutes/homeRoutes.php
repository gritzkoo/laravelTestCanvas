<?php 

	Route::group(array('before' => 'auth','prefix' => 'abc'),function()
	{
		#CRIADORES DE TELAS
		Route::get('/ver',        array('as' => 'ACB.FIRST',     'uses' => 'PrimalController@firstTest'));
		Route::get('/jsplumb',    array('as' => 'ACB.plumb',     'uses' => 'PrimalController@plumbjs'));
		Route::get('/gojslist',   array('as' => 'ACB.gojslist',  'uses' => 'PrimalController@gojsList'));
		Route::get('/gojs',       array('as' => 'ACB.gojs',      'uses' => 'PrimalController@gojs'));
		Route::get('/gojs/{id}',  array('as' => 'ACB.gojs.ID',      'uses' => 'PrimalController@gojs'));

		#AJAX & FORM REQUESTS
		Route::post('/gojs/save', array('as' => 'ACB.gojs.save', 'uses' => 'PrimalController@saveGojs'));
	});
