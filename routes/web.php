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
    return view('welcome');
});
//endpoint where the payload will be sent to
Route::post('/handle-payload', 'PayloadController@analyse')->name('handle-payload');
//user ui to edit rule table in db
Route::get('/rules/edit', 'RuleController@index')->name('rule-index');
Route::get('/rules/edit', 'RuleController@getEdit')->name('rule-get-edit');
Route::post('/rules/edit', 'RuleController@postEdit')->name('rule-post-edit');
