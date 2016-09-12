<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\workon;
use App\workoff;

Route::get('/clock/index','clockcontroller@getSearch');

Route::get('/clock/index','clockcontroller@index');

Route::get('clock/show', 'clockcontroller@create');

Route::post('clock/show', 'clockcontroller@store');

Route::get('clock/selfservice','clockcontroller@getSearch');

Route::get('clock/goSearch','clockcontroller@goSearch');

Route::post('/','clockcontroller@f_id');

Route::get('/', function () {
    return view('welcome');
});

