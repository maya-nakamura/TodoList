<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'TodoController@index');    //デスクトップ
Route::get('/todos/create', 'TodoController@create');   //編集画面
Route::get('/todos/{todo}/edit', 'TodoController@edit');    //変更ページ
Route::get('/todos/{todo}', 'TodoController@show'); //詳細ページ
Route::post('/todos', 'TodoController@store');  //保存
Route::put('/todos/{todo}', 'TodoController@update');   //変更を登録
Route::delete('/todos/{todo}', 'TodoController@destroy');