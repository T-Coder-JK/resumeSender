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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



/*
 | Route for emailTemplates Controllers
 */
Route::get('/emailTemplates', 'EmailTemplatesController@index')->name('emailTemplates');
Route::post('/emailTemplates', 'EmailTemplatesController@store');
Route::get('/emailTemplates/create','EmailTemplatesController@create')->name('createEmailTemplate');
Route::get('/emailTemplates/{template_id}/show', 'EmailTemplatesController@show');
Route::get('/emailTemplates/{template_id}/load','EmailTemplatesController@load');

/*
 | Route for Application Controllers
 */
Route::get('application/{user}/create','ApplicationController@create')->name('createApplication');
