<?php
namespace App\Http\Controllers\Api;

use App\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
	
	public function index (){
		return response()->jsno(Fournisseur::all());
	}
}