<?php 

	Route::group(array('before' => 'auth','prefix' => 'PlumbJS'),function()
	{
		#CRIADORES DE TELAS
		Route::get('/',        array('as' => 'PlumbJS.FIRST',     'uses' => 'PlumbJSController@firstTest'));
		Route::get('/jsplumb',    array('as' => 'PlumbJS.plumb',     'uses' => 'PlumbJSController@plumbjs'));
		
	});
