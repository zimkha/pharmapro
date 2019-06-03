<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bon_commande extends Model
{
    protected $fillable = [
    	'fournisseur_id',
    	'code_commande',
    	'status',
    	'motif'
    ];

    public function command_article()
    {
    	 return $this->hasMany('App\Commandearticle');
    }

    public function fournisseur()
    {
        return $this->belongsTo('App\Fournisseur');
    }
}
