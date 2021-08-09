<?php

use Illuminate\Support\Facades\Route;



Route::prefix('admin')
        ->middleware('auth')
        ->group(function(){

    // Rotas Jogador X Pelada
    Route::get('/jogadores/{id}/peladas/{idPelada}/detach','Admin\JogadorPeladaController@detachPeladaJogador')->name('jogadores.peladas.detach');
    Route::post('/jogadores/{id}/peladas','Admin\JogadorPeladaController@attachPeladasJogador')->name('jogadores.peladas.attach');
    Route::get('/jogadores/{id}/peladas/add','Admin\JogadorPeladaController@peladasAvailable')->name('jogadores.peladas.available');
    Route::get('/jogadores/{id}/peladas','Admin\JogadorPeladaController@peladas')->name('jogadores.peladas');
    Route::get('/peladas/{id}/jogadores','Admin\JogadorPeladaController@jogadores')->name('peladas.jogadores');


    // Rotas Jogador
    Route::any('/jogadores/search', 'Admin\JogadorController@search')->name('jogadores.search');
    Route::get('/jogadores/destroy/{id}','Admin\JogadorController@destroy')->name('jogadores.destroy');
    Route::put('/jogadores/update/{id}','Admin\JogadorController@update')->name('jogadores.update');
    Route::get('/jogadores/edit/{id}','Admin\JogadorController@edit')->name('jogadores.edit');
    Route::get('/jogadores/create','Admin\JogadorController@create')->name('jogadores.create');
    Route::post('/jogadores','Admin\JogadorController@store')->name('jogadores.store');
    Route::get('/jogadores', 'Admin\JogadorController@index')->name('jogadores.index');

    //Rotas Peladas
    Route::get('/peladas/destroy/{id}','Admin\PeladaController@destroy')->name('peladas.destroy');
    Route::put('/peladas/update/{id}','Admin\PeladaController@update')->name('peladas.update');
    Route::get('/peladas/edit/{id}','Admin\PeladaController@edit')->name('peladas.edit');
    Route::get('/peladas/create','Admin\PeladaController@create')->name('peladas.create');
    Route::post('/peladas','Admin\PeladaController@store')->name('peladas.store');
    Route::get('/peladas','Admin\PeladaController@index')->name('peladas.index');

});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
