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
/*
 | Route for Dashboard Controllers
 */
//Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/getApplicationInfo', 'DashboardController@getApplicationInfo');
Route::get('/view/{name}','DashboardController@showView');
Route::get('/dashboard/{path?}','DashboardController@index')->name('dashboard');



/*
 | Route for emailTemplates Controllers
 */
Route::get('/emailTemplates', 'EmailTemplatesController@index')->name('emailTemplates');
Route::post('/emailTemplates', 'EmailTemplatesController@store');
Route::get('/emailTemplates/create','EmailTemplatesController@create')->name('createEmailTemplate');
Route::get('/emailTemplates/{template_id}/show', 'EmailTemplatesController@show');
Route::patch('/emailTemplates/{templateId}/update', 'EmailTemplatesController@update')->name('updateEmailTemplate');

/*
 | Route for Application Controllers
 */
Route::get('application/{user}/new_job','ApplicationController@formView')->name('newApplication');
Route::post('application/create', 'ApplicationController@create')->name('createNewApplication');

/*
 | Route for Job Ad Scrapper Controller
 */

Route::resource('scrapper','JobAdScrapperController')->only('index');
