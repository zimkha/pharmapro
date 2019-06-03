<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Vente;
use App\
class VenteController extends Controller
{
	public function index()
	 {
        $articles = Artilce::all();
        return response()->json($articles);
	 }
	 public function create()
	 {

	 }
	 /**
	  * @param \Illimuante\Http\Request
	  * 
	  *  @return \Illimuante\Http\Response
	  */
	 public function store(Request $request)
	 {
	 	$message = [
	 			'lot_id.required' => 'le lot de l\'article est mnquant',
	 			'vente_id.required' => 'Il y a un probleme veillez contacter le developpeur',
	 			'qte_vendu.required' => 'definir le nombre de l\'article a vendre',
	 			'montant.required' => 'Il y a un probleme veillez contacter le developpeur'
	 	];
	 	  $data = $request->all();
	 	    $validtions = Validator::make($data->details,[
	 	    	'lot_id' => 'required',
	 	    	'vente_id' => 'required',
	 	    	'qte_vendu' => 'required|min:1',
	 	    	'montant' => 'required'
	 	    ], $message);


	 }
}