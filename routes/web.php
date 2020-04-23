<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home', [
        'projets' => App\Projet::latest()->get()
    ]);
});

Route::get('/projet/modifier/{id}', "ProjetController@index");

Route::get('/projet/create', function () {
    return view('projet/create');
});
Route::POST("/projet/create", "ProjetController@store")->name("store_projet");

Route::get('/image/create', 'ImageController@create');
Route::post('/image/create', "ImageController@store")->name("store_image");
Route::get('/image/modifier', "ImageController@update")->name('update_image');

