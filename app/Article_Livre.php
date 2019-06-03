<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article_Livre extends Model
{
    protected $fillable = [
    	'Bon_livraison_id'
    	'qte_livre',
    	'lot_id'
    ];

    public function lot()
    {

    }
    
}
