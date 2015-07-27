<?php 

	Route::group(array('before' => '','prefix' => 'abc'),function()
	{
		Route::get('/ver', array('as' => 'ACB.FIRST', 'uses' => 'PrimalController@firstTest'));
		Route::get('/jsplumb', array('as' => 'ACB.plumb', 'uses' => 'PrimalController@plumbjs'));
		Route::get('/gojs', array('as' => 'ACB.gojs', 'uses' => 'PrimalController@gojs'));

	});
