/*var express =   require('express'),
    http =      require('http'),
    server =    http.createServer(appS);

var appS = express();

const redis =   require('redis');
const io =      require('socket.io');
const client =  redis.createClient();

server.listen(3000, 'localhost');
console.log("Listening.....");

io.listen(server).on('connection', function(client) {
    const redisClient = redis.createClient();

    redisClient.subscribe('commnde.update');

    console.log("Redis server running.....");

    redisClient.on("message", function(channel, message) {
        console.log(message);
        client.emit(channel, message);
    });

    client.on('disconnect', function() {
        redisClient.quit();
    });
});

*/

var app = angular.module('App',  ['ngRoute']);

app.config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider){
  $routeProvider.when('/', {
     templateUrl: '/index',
     controller: 'MyFormCtrl'

  }).when('/commande', {
    templateUrl: 'commandes',
    controller: 'MyFormCtrl'
  }).when('/article', {
      templateUrl: '/article',
      controller: 'ArticleCtrl'
  }).when('/vente/create', {
    templateUrl:'/vente/create',
    controller: 'venteCtrl'
  });
   $locationProvider.hashPrefix('');
}]);
app.factory('articleFactory', function($http){
    $http.defaults.headers.common['Authorization'] = 'Bearer ' + $('input[name=api_token]').val();
    $http.defaults.headers.common['Accept'] = 'application/json';
      var apiUrl = 'http://localhost:8000/api'
	return {
		getallarticle: function (){
			return $http.get(`${apiUrl}/article`);
		},
     addCommande : function(commande){
       return $http.post(`${apiUrl}/commande`, commande);
     }, getAllcommande: function(){
      return $http.get(`${apiUrl}/getAllcommande`);
     }, addLivraison: function(livraisons){
        return $http.post(`${apiUrl}/livraison`, livraisons);
     }

	}
});
app.factory('venteFactory', function($http){
  $http.defaults.headers.common['Authorization'] = 'Bearer ' + $('input[name=api_token]').val();
    $http.defaults.headers.common['Accept'] = 'application/json';
      var apiUrl = 'http://localhost:8000/api';
      //

});
app.controller('venteCtrl', ['$scope', '$window', function($scope, $window){
    

}]);
app.controller('ArticleCtrl', ['$scope', '$window', function($scope, $window){
}]);



  app.controller('MyFormCtrl',
     function($scope, $http, articleFactory) 
     {
    const $url = 'http://localhost:8000/api/commande';
     $scope.articles = [];
     $scope.All_commande = [];
       $scope.ids = [];
     $scope.fournisseur = [];
     $scope.selected_one = [];
     $scope.article_commande = [];
     $scope.loader = "Chargement des données";
        $scope.commande = { fournisseur_id: 0, detailsCommande: [], remiseTottal: 0};
      $scope.chargemenet = false;

    $scope.saveCommande = function(){
       let cmd = $scope.commande;
       console.log(this.commande)
        $scope.chargemenet = true;
         
        articleFactory.addCommande($scope.commande).then((response) =>{
            //  console.log($scope.commande);
           if(response.data && response.status === 200){
                 $scope.commande.detailsCommande = [];
                 $scope.fournisseur =  $scope.getAllFournisseur();
                  $scope.Total_ht =0;
                      $scope.total_TTC = 0;
                 alert('La commande est bien enregistre');
               $scope.nb_commande = $scope.getAllcommande();
            }else{
            $scope.chargemenet = false;
               alert('Une erreur inconnue est survenue')
           }

        })
        
        
    }; 
    // si on click sur le button
     $scope.cheked_Single = function(item)
     {
       return $scope.selected_one.indexOf(item) > +1;
     }


   $scope.liste = []; 
       // end function checked
         /**
         *   function ToogleSelectedget
         *
         */ 

         $scope.toggleSelected = function (item){
            let current_id = $scope.selected_one.indexOf(item);
            if(current_id > -1)
                 $scope.selected_one.splice(current_id, 1)
            else
              $scope.selected_one.push(item)

            console.log($scope.selected_one.article.id)     
         }

         /**
         *  End function ToogleSelected
         *
         */ 
       $scope.cliquer =function(){
       $scope.id = this.com.id
      // on recuper le id puis fais une requete qui vas  dans la base recuper tout les 
      // articles commande pour cette commande
        $http({
           method: 'GET',
           url: 'http://localhost:8000/api/show-Produit-commande/'+$scope.id
        }).then(function success(result){
         
           $scope.article_commande = result.data;
           console.log($scope.article_commande);
           
        }, function error(result){
          console.log(result);
        }); 
      }
      //
       $scope.checkedUnchecked = function(item) {
          let current_id = $scope.selected_one.indexOf(item);
            if(current_id > -1)
                 $scope.selected_one.splice(current_id, 1)
            else
              $scope.selected_one.push(item)
            
            angular.forEach($scope.selected_one, function(item){
              $scope.current = item.id
              console.log($scope.current)
            });
            //console.log($scope.selected_one)    
       }


      $scope.livraison = function (validationLivre){
        articleFactory.addLivraison($scope.selected_one).then((response) =>{
          if(response.status === 2000){
             console.log("La livraison est bien effectue");
          }else{
            console.log("erreur sur les données entrés");
          }

        console.log('envoi des données')
        })
      }

     $scope.getAllFournisseur = function (){
        $http({
          method: 'GET',
          url: 'http://localhost:8000/fournisseur',
        }).then(function success(result){
          $scope.fournisseur= result.data
          
        }, function error(result){
          console.log(result);
        })
     }

     $scope.listeAll_artilce = function(){
      $http({
        method: 'GET',
        url: 'http://localhost:8000/api/article',
      }).then(function success(result){
        $scope.articles= result.data;
        
      }, function error(result){
        console.log(result);
      });
     }

     $scope.getAllcommande = function()
     {
      $http({
        method:'GET',
        url: 'http://localhost:8000/api/getAllcommande',
      }).then(function success(result){
       $scope.All_commande = result.data
      $scope.nb_commande = $scope.All_commande.nb;
     
      }, function error(error){
        console.log(error);
      });
     }
 
 

   $scope.findArticle = function(id) {

    return articles.find((ar) => { return ar.id == id })
  }


   $scope.Total_ht = 0;
   $scope.total_TTC = 0;

   // function pour ajouter une commande dans le tableau des commandes
  $scope.addCommandeArticle = function(){
       $scope.details = {
                       article_id: 0, 
                       qte_commande: 0,
                       prix_ht:0,
                       prix_ttc:0,
                       remise:0, 
                       montant_ht: 0, 
                       montant_ttc: 0};
     $scope.priht = parseInt(document.getElementById('prix_ht').value)
     $scope.prixtt =   parseInt(document.getElementById('prix_ttc').value)
     $scope.qte =  parseInt(document.getElementById('qte').value)

     //$scope.commande.fournisseur_id = this.
      try{
     $scope.commande.fournisseur_id = this.fournisseur.nom_complet.id
      }catch(error){
         if(error instanceof TypeError){
           alert('chosir un founisseur svp pour faire avancer')
           console.error('une erreur sur la selection de forunisseur car la propriete demande est inextistant'+error)
         }
      }
     
     $scope.details.articleLibele = this.articles.libelle.libelle
     $scope.details.article_id = this.articles.libelle.id

     $scope.details.prix_ht = this.prix_ht;
    

     $scope.details.qte_commande = this.qte;
     $scope.details.prix_ttc = this.prix_ttc;
     
     $scope.mnt_ht =  $scope.priht  * $scope.qte;
     $scope.mnt_ttc = $scope.prixtt * $scope.qte;
     $scope.Total_ht += $scope.mnt_ht;
     $scope.total_TTC += $scope.mnt_ttc;
     
      if(document.getElementById('myCheck').checked == true){
          $scope.details.remise = $scope.mnt_ht * 0.05;
          $scope.commande.remiseTottal += $scope.details.remise
      }else
          $scope.details.remise = 0;
     
     $scope.details.montant_ht  = $scope.mnt_ht;
     $scope.details.montant_ttc  = $scope.mnt_ttc;     
     $scope.commande.detailsCommande.push($scope.details);
     $scope.details = [];
     

     console.log($scope.commande);
     document.getElementById('prix_ht').value = '';
     document.getElementById('qte').value = '';
     document.getElementById('prix_ttc').value = '';

  
  }
// End function
    

 
    $scope.remove = function (commande){
      let i = $scope.commande.detailsCommande.indexOf(commande);
       var j =$scope.commande.detailsCommande.indexOf(commande);
       $scope.qteRe = $scope.commande.detailsCommande[j].qte_commande;
       $scope.prixRemov = $scope.commande.detailsCommande[j].prix_ht;
       $scope.prixTtc = $scope.commande.detailsCommande[j].prix_ttc;
       $scope.som_ttc = $scope.qteRe *  $scope.prixTtc;
       $scope.som =  $scope.qteRe * $scope.prixRemov;
       $scope.Total_ht = $scope.Total_ht - $scope.som;
       $scope.total_TTC = $scope.total_TTC - $scope.som_ttc;
       $scope.remiseTottal =  $scope.remiseTottal - $scope.details.remise;


     

      $scope.commande.detailsCommande.splice(i, 1);
    }
   });
   app.controller('CommandCtrl', ['$scope', '$window', 'articleFactory', function($scope, $window, articleFactory){
   
    }]);