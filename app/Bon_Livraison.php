<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bon_Livraison extends Model
{
    protected $fillable = [
    	'bon_commande_id',
        'commandearticle_id',
    	'commentaires'
    ];

     public function bon_commande()
     {
     	return $this->belongsTo('App\Bon_Commande');
     }

     public function commandearticle()
     {
     	return $this->hasMany('App\Commandearticle'); 
     }
}
