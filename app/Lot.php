<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    protected $fillable = [
    	'date_peremtion',
    	'code_bare',
    	'prix_de_vente'
    	//'livarison_id'
    ];

    public function article_ventes()
    {
    	 return $this->hasMany('App\Article_vente');
    }
  public function ventes ()
  {
  	 return $this->hasMany('App\Vente');
  }

}
