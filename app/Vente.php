<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    protected $fillable = [
    	'montant_total',
    	'lot_id'
    	];

    	public function lot()
    	{
    		return $this->belongsTo('App\Lot');
    	}
}
