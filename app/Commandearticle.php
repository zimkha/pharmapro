<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commandearticle extends Model
{
    protected $fillable = [
    	'bon_commande_id',
        'article_id',
    	'qte_commande',
    	'prix_ht',
    	'prix_TTC',
    	'montant_ht',
    	'montant_ttc',
    	'remise',
    	
    ];

    public function bon_commande()
    {
        return $this->belongsTo('App\Bon_commande');
    }

    public function article()
    { 
      return $this->belongsTo('App\Article');
    }
}
