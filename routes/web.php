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
    if(session('userid')){
        return redirect('/dossier');
    }else{
        return redirect('/login');
    }
});

Route::get('/login', function () {
    if(session('userid')){
        return redirect('/dossier');
    }else{
        return view('pages.login');
    }
});

Route::get('/logout', function () {
   session()->flush();
   return redirect('/login');
});

//Route::resource('/dossier','DossierClientController');
Route::get('/dossier/','DossierClientController@index');
Route::get('/dossier/search/{id?}','DossierClientController@search');
Route::get('/dossier/editDossierTrib/{id?}','DossierClientController@editDossierTrib');
Route::get('/dossier/deleteDossierTrib/{id?}','DossierClientController@deleteDossierTrib');


Route::get('/factures/','FacturesController@index');

Route::resource('/user','UserController');
Route::post('/user/auth','UserController@authUser');


Route::resource('/client','ClientController');
Route::post('/client/add','ClientController@add');

Route::resource('/contrats','ContratsController');
Route::post('/contrats/add','ContratsController@add');

Route::resource('/dossierTrib','DossierTribController');
Route::post('/dossierTrib/add','DossierTribController@add');
