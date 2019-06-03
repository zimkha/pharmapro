<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
    	'libelle',
    	'code_article',
        'prix_vente',
    	'min_seuil',
    	'dosage',
    	'forme_id',
    	'famillearticle_id'

    ];

    public function commande_articles()
    {
    	return $this->hasMany('App\Commandearticle');
    }
}
