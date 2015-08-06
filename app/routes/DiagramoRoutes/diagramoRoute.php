<?php 

	Route::group(array('before' => 'auth','prefix' => 'diagramo'),function()
	{
		#CRIADORES DE TELAS
		Route::get('/', array('as' => 'diagramo.home', 'uses'=>'DiagramoController@diagramoList'));
		Route::get('/edit', array('as' => 'diagramo.edit', 'uses' => 'DiagramoController@edit'));
		Route::get('/edit/{id}', array('as' => 'diagramo.edit.id', 'uses' => 'DiagramoController@edit'));

		#AJAX & FORM REQUESTS
		
	});
