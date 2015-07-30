<?php 

	Route::group(array('before' => 'auth','prefix' => 'GoJS'),function()
	{
		#CRIADORES DE TELAS
		Route::get('/',           array('as' => 'GoJS.gojslist',  'uses' => 'GoJSController@gojsList'));
		Route::get('/gojs',       array('as' => 'GoJS.gojs',      'uses' => 'GoJSController@gojs'));
		Route::get('/gojs/{id}',  array('as' => 'GoJS.gojs.ID',      'uses' => 'GoJSController@gojs'));

		#AJAX & FORM REQUESTS
		Route::post('/gojs/save', array('as' => 'GoJS.gojs.save', 'uses' => 'GoJSController@saveGojs'));
		Route::post('/gojs/historico', array('as' => 'GoJS.gojs.historico', 'uses' => 'GoJSController@getHistoricoFluxograma'));
		Route::post('/gojs/excluir', array('as' => 'GoJS.gojs.excluir', 'uses' => 'GoJSController@excluirFluxograma'));
	});
