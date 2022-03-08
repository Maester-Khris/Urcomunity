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

Route::get('accueil','App\Http\Controllers\AccueilController@index');
Route::get('site-managment','App\Http\Controllers\AdministrationController@index')->middleware('admin');;
Route::get('membres-voir','App\Http\Controllers\MembreProfileController@index');
Route::get('evenements','App\Http\Controllers\EventController@list');
Route::get('evts-details/{event}','App\Http\Controllers\EventController@voir')->name('details');
Route::get('post-event','App\Http\Controllers\AdministrationController@event');
Route::get('connexion', function () {
    return view('auth.login');
});

Route::post('ajouter-zone','App\Http\Controllers\ZoneController@create');
Route::post('ajouter-membre','App\Http\Controllers\MembreProfileController@create');
Route::post('ajouter-evenement','App\Http\Controllers\EventController@create');
Route::post('definir-role','App\Http\Controllers\MembreProfileController@setrole');
Route::post('login','App\Http\Controllers\UserController@connect');
Route::post('logout','App\Http\Controllers\UserController@deconnect');

Route::get('/', function () {
    return redirect('accueil');
});
if (App::environment('production')) {
    URL::forceScheme('https');
}
