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

//Route::get('/clock/index','clockcontroller@getSearch');

//Route::get('/clock/index','clockcontroller@index');

//Route::get('clock/show', 'clockcontroller@create');

//Route::post('clock/show', 'clockcontroller@store');

//Route::get('clock/selfservice','clockcontroller@getSearch');

//Route::get('clock/goSearch','clockcontroller@goSearch');

//Route::post('/','clockcontroller@f_id');

Route::get('/', function () {
    return view('login');
});

Route::get('SignUp','calendarcontroller@create');

Route::post('login', 'calendarcontroller@store');

Route::post('welcome','calendarcontroller@welcome');

Route::get('light_notes/index', 'calendarcontroller@content');

Route::get('light_notes/create','calendarcontroller@add');

Route::post('light_notes/index','calendarcontroller@index');

Route::get('light_notes/content','calendarcontroller@content');

Route::get('light_notes/{id}/edit', function($id)
{

    $light_notes = DB::table('light_notes')
        ->where('id','=',$id)
        ->first();
//    dd($light_notes);

    /*
    $hap_time = DB::table('light_notes')
        ->where('id','=',$id)
        ->pluck('hap_time');


    $title = DB::table('light_notes')
        ->where('id','=',$id)
        ->pluck('title');
    $content = DB::table('light_notes')
        ->where('id','=',$id)
        ->pluck('content'); */

    return view('edit')->with([
        'id' => $id,
        'hap_time' => $light_notes->hap_time,
        'title' => $light_notes->title,
        'content' => $light_notes->content,
        'level' => $light_notes->level

    ]);

});

//Route::get('light_notes/{id}','calendarcontroller@update');

Route::post('light_notes/update', function (Request $request){

    $input = \Request::all();
    //dd($input);
    \App\light_notes::where('id', $input['id'])->update([
        'level' => $input['level'],
        'hap_time' => $input['hap_time'],
        'title'=> $input['title'],
        'content' =>$input['content']
    ]);

    //dd('1234');


    return redirect('light_notes/index');

    });

Route::get('light_notes/{id}', function ($id){

    \App\light_notes::where('id',$id)->delete();
    return redirect('light_notes/index');


});


//Route::get('light_notes/edit','calendarcontroller@edit');

//Route::get('light_notes/'.$var->id.'/edit','calendarcontroller@edit');

//Route::resource('light_notes','calendarcontroller');


