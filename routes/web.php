<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('landing');
});

Auth::routes();

//Here I created a named route for the main projects page.
Route::get('/projects', 'ProjectController@index')->name('projects');


//Here are all of the resource routes for projects.
Route::resource('/projects', 'ProjectController');


//Here are all of the resource routes for tasks.
Route::resource('/tasks', 'TaskController');
