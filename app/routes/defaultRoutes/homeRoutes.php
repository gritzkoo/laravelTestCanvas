<?php 

	Route::group(array('before' => '','prefix' => 'abc'),function()
	{
		Route::get('/ver', array('as' => 'ACB.FIRST', 'uses' => 'PrimalController@firstTest'));
	});
