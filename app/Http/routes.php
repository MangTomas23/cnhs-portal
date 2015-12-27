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


// Route::get('login', 'LoginController@index');

// Route::post('login', 'LoginController@authenticate');


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

Route::group(['middleware' => 'web'], function () {
    Route::auth();

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
            return Redirect::to('/department/english');
        });

        Route::get('english', function ()    {
            return view('department.english');
        });

        Route::get('mathematics', function ()    {
            return view('department.mathematics');
        });
        
        Route::get('science', function ()    {
            return view('department.science');
        });
        
        Route::get('araling-panlipunan', function ()    {
            return view('department.araling-panlipunan');
        });
        
        Route::get('cp-tle', function ()    {
            return view('department.tle');
        });

        Route::get('values-education', function ()    {
            return view('department.values-education');
        });

        Route::get('filipino', function ()    {
            return view('department.filipino');
        });

        Route::get('mapeh', function ()    {
            return view('department.mapeh');
        });
    });


    Route::get('events', function () {
        return view('events');
    });

    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
        Route::get('account/create', 'AdminController@registrationForm');

        Route::post('create', 'AdminController@storeAccount');

        Route::group(['prefix' => 'subject'], function () {
            Route::get('register', 'AdminController@subjectRegistration');

            Route::post('/', 'SubjectController@store');

            Route::put('{id}', 'SubjectController@update');

            Route::delete('{id}', 'SubjectController@destroy');

            Route::get('edit/{id}', 'SubjectController@edit');

            Route::get('delete/{id}', 'SubjectController@delete');
         });

        Route::group(['prefix' => 'user'], function () {
            Route::get('/', 'UserController@index');

            Route::get('{id}', 'UserController@show');

            Route::put('{id}', 'UserController@update');
            
            Route::get('{id}/subject/add', 'StudentSubjectController@create');

            Route::get('{id}/subject/delete/all', 'StudentSubjectController@deleteAll');
            Route::delete('{id}/subject/delete/all', 'StudentSubjectController@destroyAll');

            Route::get('{id}/subject/delete/{s_id}', 'StudentSubjectController@delete');

            Route::post('{id}/subject', 'StudentSubjectController@store');

            Route::delete('{id}/subject', 'StudentSubjectController@destroy');
        });

        Route::group(['prefix' => 'section'], function () {
            Route::get('/', 'SectionController@index');

            Route::post('/', 'SectionController@store');

            Route::get('edit/{id}', 'SectionController@edit');

            Route::get('delete/{id}', 'SectionController@delete');

            Route::put('{id}', 'SectionController@update');

            Route::delete('{id}', 'SectionController@destroy');
        });

    });
});
