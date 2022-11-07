<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
// use View;
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
Route::get('policy', function () {
    return view('policy');
    // dd("entrer");
});
Route::get('accueil','App\Http\Controllers\AccueilController@index')->name('accueil');
Route::get('site-managment','App\Http\Controllers\AdministrationController@index')->middleware('admin');
Route::get('membres-voir','App\Http\Controllers\MembreProfileController@index');
Route::get('contact','App\Http\Controllers\MembreProfileController@delegues');
Route::get('zones-voir','App\Http\Controllers\ZoneController@index');
Route::get('evenements','App\Http\Controllers\EventController@list');
Route::get('evts-details/{event}','App\Http\Controllers\EventController@voir')->name('details');

Route::get('collectes','App\Http\Controllers\CollectefondController@index');

// Route::get('connexion', function () {
//     
// });

Route::get('messagerie','App\Http\Controllers\MessagerieController@index')->middleware('chatroom');
Route::get('loadMessage','App\Http\Controllers\MessagerieController@getMessages');
Route::post('sendMessage','App\Http\Controllers\MessagerieController@pushMessage');


//=========== Membre ============
Route::post('ajouter-zone','App\Http\Controllers\ZoneController@create');
Route::post('ajouter-membre','App\Http\Controllers\MembreProfileController@create');
Route::post('definir-role','App\Http\Controllers\MembreProfileController@setrole');
Route::post('last-compte-infos','App\Http\Controllers\MembreProfileController@getLastInfos');
Route::post('reset-compte','App\Http\Controllers\MembreProfileController@resetaccount');
Route::post('toggle-activate','App\Http\Controllers\MembreProfileController@toggleActivate');
Route::post('remove-role','App\Http\Controllers\MembreProfileController@removeRole');

//=========== Evenement ============
Route::post('ajouter-evenement','App\Http\Controllers\EventController@create');
Route::post('valider-evenement','App\Http\Controllers\EventController@eventvalidate');
Route::post('add-views','App\Http\Controllers\EventController@addOneView');

//=========== Collecte ============
Route::post('lancer-collecte','App\Http\Controllers\CollectefondController@launchfund');
Route::post('mixer-collecte','App\Http\Controllers\CollectefondController@mixeventforfund');
Route::post('nouvelle-participation','App\Http\Controllers\CollectefondController@addparticipationforfund');

//=========== Connexion ============
Route::get('connexion','App\Http\Controllers\UserController@loginpage');
Route::post('login','App\Http\Controllers\UserController@connect');
Route::post('logout','App\Http\Controllers\UserController@deconnect');

Route::get('/', function () {
    return redirect('accueil');
});

if (App::environment('production')) {
    URL::forceScheme('https');
}
