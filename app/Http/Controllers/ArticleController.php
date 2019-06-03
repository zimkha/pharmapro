<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Validator;
use App\Http\Resources\Article as ResourceArticle;
use Illuminate\Support\Facades\DB as DB;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view ('article.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
       return  new ResourceArticle(Article::paginate());  
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $message = [
        'libelle.required' => 'le libelle de l\'article est required' ,
        'code_article.required' => 'le code de l\'article est required',
        'min_seuil.required' => 'reseigne le seuil miniomal de l\'artilce',
        'dosage.required' => 'reseigne le dosage ',
        'forme_id.required' => 'l\'article doit appartenir a une famille',
        'famillearticle_id.required' => 'definir la famille '
         ];
         $validations = Validator::make($request->all(), [
        'libelle' => 'required|min:4',
        'code_article' => 'required',
        'min_seuil' => 'required',
        'dosage' => 'required',
        'forme_id' => 'required',
        'famillearticle_id'
         ], $message);

            if($validations->fails()){
                return Redirect::back()->withErrors($validations);
            }  
            $article = Article::create($request->all());
              $succes = "Article bien enregistre";
             return response()->json([$succes, 201]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ResourceArticle(Article::findOrfail($id));
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
         $article = Article::findOrfail($id);
         if($article){

        $message = [
        'libelle.required' => 'le libelle de l\'article est required' ,
        'code_article.required' => 'le code de l\'article est required',
        'min_seuil.required' => 'reseigne le seuil miniomal de l\'artilce',
        'dosage.required' => 'reseigne le dosage ',
        'forme_id.required' => 'l\'article doit appartenir a une famille',
        'famillearticle_id.required' => 'definir la famille '
         ];
         $validations = Validator::make($request->all(), [
        'libelle' => 'required|min:4',
        'code_article' => 'required',
        'min_seuil' => 'required',
        'dosage' => 'required',
        'forme_id' => 'required',
        'famillearticle_id'
         ], $message);
         Article::where('id' ,$article->id)
                ->update($request->all());
                return response()->json(array(
                    'Bien modifier',
                     201
                ));
         }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Article::destroy($id);
    }

   /**
    * Cette function retourn l'article le plus vendu entre deux dates
    * @param $date_debut $date_fin
    * @return \Illimunate\Http\Response
    */
    public function getArticlePlusVendu($date_debut, $date_fin)
    {
          $liste_article = [];
       if($this->validateDate($date_debut) && $this->validateDate($date_fin)){
          // Une requete qui doit retourner un tableau des id des produits les mieux vendus entre ses periodes
            $baseQuery = DB::select('');
             foreach ($baseQuery as $value) {
                 $article = Article::find($value);
                 array_push($liste_article, $article);
             }
              return response()->json($liste_article);
       }else
         return response()->json('verifier vos les dates entrées en parametres');
    }

     public function validateDate($date, $format = 'Y-m-d')
    {
      $d = DateTime::createFromFormat($format, $date);
      return $d && $d->format($format) == $date;
    }
}
