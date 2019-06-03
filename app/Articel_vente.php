<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articel_vente extends Model
{
    protected $fillable = [
        'lot_id',
        'vente_id'
    	'qte_vendu',
    	'montant_total',
    	'remise'
    ];

    public function lot()
    {
 		return $this->belongsTo('App\Lot');
    }
    public function vente()
    {
    	return $this->belongsTo('App\Vente');	
    } 
}
