<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bon_commande;
class Fournisseur extends Model
{
    protected $fillable = ['nom_complet', 'adresse', 'telephone', 'email'];


    public function bon_commandes()
    {
    	return $this->hasMany(Bon_commande::class);
    }
}
