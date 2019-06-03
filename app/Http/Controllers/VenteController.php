<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VenteController extends Controller
{
    public function create()
    {
    	 return view('vente.create');
    } 
}
