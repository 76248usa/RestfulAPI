<?php

Route::ApiResource('/class','App\Http\Controllers\Api\SclassController');
Route::ApiResource('/subject', 'App\Http\Controllers\Api\SubjectController');
Route::ApiResource('/section', 'App\Http\Controllers\SectionController');
Route::ApiResource('/student', 'App\Http\Controllers\Api\StudentController');

Route::group([

    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
