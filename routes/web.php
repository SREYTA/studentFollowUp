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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/student','StudentController');
Route::get('/studentList','StudentController@studentList')->name('studentList');
Route::get('/active/{id}','StudentController@active')->name('active');
Route::get('/followup/{id}','StudentController@followup')->name('followup');
Route::get('/pageComment','StudentController@viewComment')->name('pageComment');
Route::resource('/comment','CommentController');
Route::POST('/comment{id}','CommentController@addComment')->name('addComment');