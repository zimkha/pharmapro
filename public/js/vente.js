app.controller('venteCtrl', ['$scope', '$window', '$http', '$document', function($scope, $window,$http, $document){
  $scope.vente = { details: [], remise :0 }

  $scope.articles = [];
  $scope.chargement = false; 
     $scope.all_art = function()
     {
     	$http({
        method: 'GET',
        url: 'http://localhost:8000/api/article',
      }).then(function success(result){
        $scope.articles= result.data;
        // console.log($scope.articles)
      }, function error(result){
        console.log(result);
      });
     }
      $scope.changeValue = function ()
      {
      	   var text = angular.element($document[0].querySelector('#prix_unitaire'));
      	     text.html(this.articles.libelle.prix_vente);
      }
     $scope.addVente = function (){
    $scope.detailVente = {
    	     libelle: '',
     	 	 article_id: 0,
     	 	 qte_vente: 0,
     	 	 prix_unitaire: 0,
     	 	 montant_tt: 0,
     	 	 remise: 0,
     	 }
     	  
     	  $scope.prixU = parseInt(document.getElementById('prix_unitaire').value);
     	  $scope.qte = parseInt(document.getElementById('qte_vente').value);

     	   if($scope.prixU <= 0 || $scope.prixU == null || $scope.qte_vente <= 0  || $scope.qte_vente ==null){
     	   	  alert('les données entres sont erroné');
     	   	  return false;
     	   }
     	   console.log($scope.prix_unitaire);
     	  try{	
     	  $scope.detailVente.article_id = this.articles.libelle.id;
     	  }catch(error){
     	  	   if(error instanceof TypeError){
           alert('chosir un un Article  svp pour faire avancer')
           console.error('une erreur sur la selection des articles car la propriete demande est inextistant'+error)
         }
     	  }
     	   
     	   $scope.montant_tt = $scope.qte * $scope.prixU;
     	  $scope.detailVente.libelle = this.articles.libelle.libelle
     	  $scope.detailVente.qte_vente = this.qte_vente;
     	  $scope.detailVente.prix_unitaire = this.prix_unitaire;
     	  $scope.detailVente.remise = this.remise;
     	  $scope.detailVente.montant_tt = this.montant_tt;
     	  $scope.detailVente.articleLibele = this.articles.libelle.libelle
     	  if(document.getElementById('myCheck').checked == true){
          $scope.detailVente.remise = $scope.montant_tt * 0.05;
          $scope.vente.remise += $scope.detailVente.remise
      }else
          $scope.detailVente.remise = 0;
     
     	   //console.log($scope.detailVente)e_vente
     	  $scope.vente.details.push($scope.detailVente);
     	  // console.log($scope.vente)

     	  $scope.detailVente = [];
     	  document.getElementById('qte_vente').value = ''
     	  document.getElementById('prix_unitaire').value = ''
     	  document.getElementById('article_id').value = ''
  

     }
     $scope.remove = function(vente)
     {
     	 let i = $scope.vente.details.indexOf(vente);
     	  var j = $scope.vente.details.indexOf(vente);
     	  $scope.qte_remove = $scope.vente.details[j].qte_vente;
     	  $scope.prix_remove = $scope.vente.details[j].prix_unitaire;
     	  $scope.montant_remove  = $scope.vente.details[j].montant_tt
           $scope.vente.remise = parseInt($scope.vente.remise) - parseInt( $scope.detailVente.remise)
     	   $scope.vente.details.splice(i, 1);

     	   console.log($scope.vente.remise)
     }
     $scope.saveVente = function(){

     }

}])