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

	//$post = User::all();
	//$post = DB::select('SELECT *FROM users LIMIT 1')[0];
	//dd($post->name); 

	//$poste=DB::table('users')->get();
	//dd($poste); 
	  return view('auth.login');

    
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/userList', 'UserController@lister')->name('userList');
Route::delete('/userSupp', 'UserController@Supprimer')->name('userSupp');
Route::patch('/userModifier', 'UserController@update')->name('userModifier');  
Route::patch('/profilModifier', 'UserController@updateprofil')->name('profilModifier');

Route::get('/fournisseurList', 'FournisseurController@show')->name('fournisseurList');
Route::delete('/fournisseurSupp', 'FournisseurController@destroy')->name('fournisseurSupp');
Route::post('/fournisseurAjout', 'FournisseurController@store')->name('fournisseurAjout');
Route::patch('/fournisseurModifier', 'FournisseurController@update')->name('fournisseurModifier');

Route::get('/entreBordereauList', 'EntreBordereauController@show')->name('entreBordereauList');
Route::delete('/entreBordereauSupp', 'EntreBordereauController@destroy')->name('entreBordereauSupp');
Route::post('/entreBordereauAjout', 'EntreBordereauController@store')->name('entreBordereauAjout');
Route::patch('/entreBordereauModifier', 'EntreBordereauController@update')->name('entreBordereauModifier');

Route::get('/sortieBordereauList', 'SortieBordereauController@show')->name('sortieBordereauList');
Route::delete('/sortieBordereauSupp', 'SortieBordereauController@destroy')->name('sortieBordereauSupp');
Route::post('/sortieBordereauAjout', 'SortieBordereauController@store')->name('sortieBordereauAjout');
Route::patch('/sortieBordereauModifier', 'SortieBordereauController@update')->name('sortieBordereauModifier');

Route::get('/entreSecuripackList', 'EntreSecuripackController@show')->name('entreSecuripackList');
Route::delete('/entreSecuripackSupp', 'EntreSecuripackController@destroy')->name('entreSecuripackSupp');
Route::post('/entreSecuripackAjout', 'EntreSecuripackController@store')->name('entreSecuripackAjout');
Route::patch('/entreSecuripackModifier', 'EntreSecuripackController@update')->name('entreSecuripackModifier');

Route::get('/sortieSecuripackList', 'SortieSecuripackController@show')->name('sortieSecuripackList');
Route::delete('/sortieSecuripackSupp', 'SortieSecuripackController@destroy')->name('sortieSecuripackSupp');
Route::post('/sortieSecuripackAjout', 'SortieSecuripackController@store')->name('sortieSecuripackAjout');
Route::patch('/sortieSecuripackModifier', 'SortieSecuripackController@update')->name('sortieSecuripackModifier');

Route::get('/entreApprovisList', 'EntreApprovisController@show')->name('entreApprovisList');
Route::delete('/entreApprovisSupp', 'EntreApprovisController@destroy')->name('entreApprovisSupp');
Route::post('/entreApprovisAjout', 'EntreApprovisController@store')->name('entreApprovisAjout');
Route::patch('/entreApprovisModifier', 'EntreApprovisController@update')->name('entreApprovisModifier');

Route::get('/sortieApprovisList', 'SortieApprovisController@show')->name('sortieApprovisList');
Route::delete('/sortieApprovisSupp', 'SortieApprovisController@destroy')->name('sortieApprovisSupp');
Route::post('/sortieApprovisAjout', 'SortieApprovisController@store')->name('sortieApprovisAjout');
Route::patch('/sortieApprovisModifier', 'SortieApprovisController@update')->name('sortieApprovisModifier');

Route::get('/entreBonComdList', 'EntreBonComdController@show')->name('entreBonComdList');
Route::delete('/entreentreBonComdSupp', 'EntreBonComdController@destroy')->name('entreBonComdSupp');
Route::post('/entreBonComdAjout', 'EntreBonComdController@store')->name('entreBonComdAjout');
Route::patch('/entreBonComdModifier', 'EntreBonComdController@update')->name('entreBonComdModifier');

Route::get('/sortieBonComdList', 'SortieBonComdController@show')->name('sortieBonComdList');
Route::delete('/sortieBonComdSupp', 'SortieBonComdController@destroy')->name('sortieBonComdSupp');
Route::post('/sortieBonComdAjout', 'SortieBonComdController@store')->name('sortieBonComdAjout');
Route::patch('/sortieBonComdModifier', 'SortieBonComdController@update')->name('sortieBonComdModifier');


Route::get('/entreMaintenanceList', 'EntreMaintenanceController@show')->name('entreMaintenanceList');
Route::delete('/entreMaintenanceSupp', 'EntreMaintenanceController@destroy')->name('entreMaintenanceSupp');
Route::post('/entreMaintenanceAjout', 'EntreMaintenanceController@store')->name('entreMaintenanceAjout');
Route::patch('/entreMaintenanceModifier', 'EntreMaintenanceController@update')->name('entreMaintenanceModifier');

Route::get('/sortieMaintenanceList', 'SortieMaintenanceController@show')->name('sortieMaintenanceList');
Route::delete('/sortieMaintenanceSupp', 'SortieMaintenanceController@destroy')->name('sortieMaintenanceSupp');
Route::post('/sortieMaintenanceAjout', 'SortieMaintenanceController@store')->name('sortieMaintenanceAjout');
Route::patch('/sortieMaintenanceModifier', 'SortieMaintenanceController@update')->name('sortieMaintenanceModifier');


Route::get('/entreTicketList', 'EntreTicketController@show')->name('entreTicketList');
Route::delete('/entreTicketSupp', 'EntreTicketController@destroy')->name('entreTicketSupp');
Route::post('/entreTicketAjout', 'EntreTicketController@store')->name('entreTicketAjout');
Route::patch('/entreTicketModifier', 'EntreTicketController@update')->name('entreTicketModifier');

Route::get('/sortieTicketList', 'SortieTicketController@show')->name('sortieTicketList');
Route::delete('/sortieTicketSupp', 'SortieTicketController@destroy')->name('sortieTicketSupp');
Route::post('/sortieTicketAjout', 'SortieTicketController@store')->name('sortieTicketAjout');
Route::patch('/sortieTicketModifier', 'SortieTicketController@update')->name('sortieTicketModifier');


Route::get('/produitList', 'ProduitController@show')->name('produitList');
Route::delete('/produitSupp', 'ProduitController@destroy')->name('produitSupp');
Route::post('/produitAjout', 'ProduitController@store')->name('produitAjout');
Route::patch('/produitModifier', 'ProduitController@update')->name('produitModifier');



Route::get('/entreStockList', 'EntreStockController@show')->name('entreStockList');
Route::delete('/entreStockSupp', 'EntreStockController@destroy')->name('entreStockSupp');
Route::post('/entreStockAjout', 'EntreStockController@store')->name('entreStockAjout');
Route::patch('/entreStockModifier', 'EntreStockController@update')->name('entreStockModifier');
Route::get('/comp', 'EntreStockController@comp')->name('comp');
Route::get('/compenstock', 'EntreStockController@compEnstock')->name('compenstock');


Route::get('/sortieStockList', 'SortieStockController@show')->name('sortieStockList');
Route::delete('/sortieStockSupp', 'SortieStockController@destroy')->name('sortieStockSupp');
Route::post('/sortieStockAjout', 'SortieStockController@store')->name('sortieStockAjout');
Route::patch('/sortieStockModifier', 'SortieStockController@update')->name('sortieStockModifier');
Route::get('/compenstocks', 'SortieStockController@compEnstocks')->name('compenstocks');


Route::get('/clientList', 'ClientController@show')->name('clientList');
Route::delete('/clientSupp', 'ClientController@destroy')->name('clientSupp');
Route::post('/clientAjout', 'ClientController@store')->name('clientAjout');
Route::patch('/clientModifier', 'ClientController@update')->name('clientModifier');

Route::get('/messageList', 'MessagesController@show')->name('messageList');
Route::delete('/messageSupp', 'MessagesController@destroy')->name('messageSupp');
Route::post('/messageAjout', 'MessagesController@store')->name('messageAjout');
Route::post('/messageAccepter', 'MessagesController@update')->name('messageAccepter');



//Route::resource('fournisseur', 'FournisseurController'); 






 