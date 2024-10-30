<?php

//Auth
Route::Post('/register','AuthController@register');

Route::Post('/login','AuthController@login');

Route::Get('/user','AuthController@user');

Route::Post('/logout','AuthController@logout');


//CRUD
Route::Group(['prefix' => 'topics'], function(){

	//Aqui o middleware indica que ao armazenar um usuário só é possivel caso esteja autenticado,confirma-se isso através do token

	//Cadastra topics na base de dados, apenas para usuários autenticados
	Route::Post('/','TopicController@store')->middleware('auth:api');

	//Lista uma colecção de topicos
	Route::Get('/','TopicController@index');

	//Lista um tópico especifico
	Route::Get('/{topic}','TopicController@show');

	//Actualiza um tópico especifico
	Route::Patch('/{topic}','TopicController@update')->middleware('auth:api');

	//Elimina um tópico especifico
	Route::Delete('/{topic}','TopicController@destroy')->middleware('auth:api');


});