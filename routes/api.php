<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/article', 'Api\ArticleController@index');
Route::get('/fournisseur', 'FournisseurController@index');
Route::post('/commande', 'Api\Bon_commandeController@create');

Route::get('/getAllcommande', 'Api\Bon_commandeController@getAllcommande');   
Route::get('/show-Produit-commande/{id}', 'Api\Bon_commandeController@show' );
Route::post('/livraison', 'Api\LivraisonController@create');
Route::get('/vente/create', 'Api\VenteController@create');