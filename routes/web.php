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

//Route::get('/{short}', 'UrlController@redirectShort')->where('short', '[^myshortener]');

Route::get('/{short}', function ($short) {
    if ($short == 'myshortener') {
        return view('shortener');
    } else {
        return (new \App\Http\Controllers\UrlController)->redirectShort($short);
    }
});

Route::get('/', function () {
    return view('shortener');
});

Route::post('/myshortener/create', 'UrlController@create');

