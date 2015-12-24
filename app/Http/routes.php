<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('about', function() {
	return view('index');
});

Route::group(['prefix' => 'admission'], function () {
    Route::get('inquire', function ()    {
    	return view('admission.inquire');
    });

    Route::get('organizational-chart', function ()    {
    	return view('admission.organizational-chart');
    });
});

Route::group(['prefix' => 'academics'], function () {
    Route::get('library', function ()    {
        return view('academics.library');
    });

    Route::get('highschool', function ()    {
        return view('academics.highschool');
    });

    Route::get('senior-highschool', function ()    {
        return view('academics.senior-highschool');
    });
});


Route::group(['prefix' => 'department'], function () {
    Route::get('/', function ()    {
        return view('academics.library');
    });

    Route::get('english', function ()    {
        // return view('academics.highschool');
    });

    Route::get('mathematics', function ()    {
        // return view('academics.highschool');
    });
    
    Route::get('science', function ()    {
        // return view('academics.highschool');
    });
    
    Route::get('araling-panlipunan', function ()    {
        // return view('academics.highschool');
    });
    
    Route::get('cp-tle', function ()    {
        // return view('academics.highschool');
    });

    Route::get('values-education', function ()    {
        // return view('academics.highschool');
    });

    Route::get('filipino', function ()    {
        // return view('academics.highschool');
    });

    Route::get('mapeh', function ()    {
        // return view('academics.highschool');
    });
});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
