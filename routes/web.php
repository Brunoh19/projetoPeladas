<?php

use Illuminate\Support\Facades\Route;

// Rotas Jogador
Route::get('admin/jogadores/destroy/{id}','Admin\JogadorController@destroy')->name('jogadores.destroy');
Route::put('admin/jogadores/update/{id}','Admin\JogadorController@update')->name('jogadores.update');
Route::get('admin/jogadores/edit/{id}','Admin\JogadorController@edit')->name('jogadores.edit');
Route::get('admin/jogadores/create','Admin\JogadorController@create')->name('jogadores.create');
Route::post('admin/jogadores','Admin\JogadorController@store')->name('jogadores.store');
Route::get('admin/jogadores', 'Admin\JogadorController@index')->name('jogadores.index');

Route::get('/', function () {
    return view('welcome');
});
