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

Route::get('/', function () {
    return view('welcome');
});


Route::group(array('prefix' => 'admin'), function()
{
    Route::get("/","Admin\HomeController@index");

    Route::get("category/{id}/delete", "Admin\CategoryController@destroy")->name("category.delete");
    Route::get("category/trash", "Admin\CategoryController@trash")->name("category.trash");
    Route::resource("category","Admin\CategoryController");
});