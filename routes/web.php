<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
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
Route::get('contact','App\Http\Controllers\MembreProfileController@delegues');
Route::get('zones-voir','App\Http\Controllers\ZoneController@index');
Route::get('evenements','App\Http\Controllers\EventController@list');
Route::get('evts-details/{event}','App\Http\Controllers\EventController@voir')->name('details');
Route::post('add-views','App\Http\Controllers\EventController@addOneView');

Route::get('connexion', function () {
    return view('auth.login');
});

Route::post('ajouter-zone','App\Http\Controllers\ZoneController@create');
Route::post('ajouter-membre','App\Http\Controllers\MembreProfileController@create');
Route::post('ajouter-evenement','App\Http\Controllers\EventController@create');
Route::post('valider-evenement','App\Http\Controllers\EventController@eventvalidate');
Route::post('lancer-collecte','App\Http\Controllers\CollectefondController@launchfund');
Route::post('definir-role','App\Http\Controllers\MembreProfileController@setrole');
Route::post('mixer-collecte','App\Http\Controllers\CollectefondController@mixeventforfund');
Route::post('nouvelle-participation','App\Http\Controllers\CollectefondController@addparticipationforfund');
Route::post('reset-compte','App\Http\Controllers\MembreProfileController@resetaccount');
Route::post('login','App\Http\Controllers\UserController@connect');
Route::post('logout','App\Http\Controllers\UserController@deconnect');

Route::get('/', function () {
    return redirect('accueil');
});
if (App::environment('production')) {
    URL::forceScheme('https');
}
