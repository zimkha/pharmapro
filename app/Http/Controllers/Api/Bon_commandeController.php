<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Bon_commande;
use App\Article;
use Validator;
use App\Http\Resources\Article as ResourceArticle;
use Illuminate\Support\Facades\Redirect;
use App\Fournisseur;
use DB;
use App\Events\CommandcreateEvent;
use App\Commandearticle;
class Bon_commandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         return $all_commande =  Bon_commande::all();
       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllCommande(){
         $cmd = Bon_commande::all();
        
            foreach ($cmd as $value) {
                $fournisseur = $value->fournisseur;
                $command_article = $value->command_article;
            }
          $nb = 0;
          foreach ($cmd as $key ) {
            $nb ++;
          }
         
          return response()->json([
            'commande' => $cmd,
            'nb' => $nb,
          ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
          
          $data = $request->all();
          $lignedd = [];
          $messages =[
            'fournisseur_id' => 'Fournisseur requise',
          ];
          $validation = Validator::make($data, [
            'fournisseur_id' => 'required',
          ], $messages)->validate();
           $data['code_commande'] = mt_rand(100000, 999999);
               $data['status'] = true;
               $data['motif'] = isset($data['motif']) ? $data['motif'] : null;
               $data['details'] = [];
             
                foreach ($data['detailsCommande'] as $detail) {
                   array_push($data['details'], [
                    'article_id' => $detail['article_id'],
                    'qte_commande' => $detail['qte_commande'],
                    'prix_ht' => $detail['prix_ht'],
                    'prix_TTC' => $detail['prix_ttc'],
                    'montant_ttc' => $detail['montant_ttc'],
                    'montant_ht' => $detail['montant_ht'],
                    'remise' => $detail['remise']
                   ]);           
                }
                // pARTIE AJOUTE POUR LE REAL-TIME

                    event(new CommandcreateEvent($data));


                // Fin
                try{
                        DB::beginTransaction();
                         $cmd = Bon_commande::create([
                            'fournisseur_id' => $request->fournisseur_id,
                            'code_commande' => $data['code_commande'],
                            'motif' => $data['motif'],
                            'status' => $data['status'],
                         ]);

                         foreach ($data['details'] as  $ligne_commande) {
                              $ligne = Commandearticle::create([
                                'bon_commande_id' => $cmd->id,
                                'article_id' => $ligne_commande['article_id'],
                                'qte_commande'=> $ligne_commande['qte_commande'],
                                'prix_ht'=> $ligne_commande['prix_ht'],
                                'prix_TTC'=> $ligne_commande['prix_TTC'],
                                'montant_ht'=> $ligne_commande['montant_ht'],
                                'montant_ttc'=> $ligne_commande['montant_ttc'],
                                'remise'=> $ligne_commande['remise'],
                              ]);
                              array_push($lignedd, $ligne); 
                         }
                        
                           DB::commit();
                         return response()->json('Ok enregistrement reussi');
                   }catch(\Throwable $th){
                     DB::rollback();
                        return response()->json("la transaction  échoue ".$th);
                   }
                 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validate_data($data)
    {

         $data = $request->all();
         

    }

    public function newcommande(){
          
          return view('commande.new');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $commande = Bon_commande::findOrfail($id);
            $command_article = $commande->command_article;
           $fournisseur = $commande->fournisseur;
           foreach ($command_article as $value) {
              $article = $value->article;
           }
            return response()->json($command_article);
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
