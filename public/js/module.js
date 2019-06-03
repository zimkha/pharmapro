var myAppModule = angular.module('myApp', [
    'myAppControllers',
  
    ]);

var myAppControllers = angular.module('myAppControllers', []);

myAppControllers.controller('formCtrl', ['$scope' ,
  function ($scope) {
    //nous commençons avec un champ hobby dans notre forumaire
   var fields = [{name:'hobby 1', val:''}];  
   //va contenir toutes les valeurs de notre formulaire
   $scope.formData = {};
   $scope.formData.dynamicFields = fields;
   $scope.SentValues;
   
   //fonction pour ajouter un champ hobby
   // nous ajoutons à notre objet formDatadynamicFields un nouvel objet
   $scope.addField=function(){
     
     var newItemNum = $scope.formData.dynamicFields.length+1;
     $scope.formData.dynamicFields.push( {name: 'Hobby '+newItemNum, val: ''});        
       
   }
   //nous récupérons les valeurs du formulaires au click 'envoyer'
   //ici nous  ne feront qu'afficher les valeurs rentrées par l'utilisateur,
   //elles pourront être par méthode POST, etc  
   $scope.sendFormValues= function(formValues){
      //the form values ready to be sent , etc
       $scope.SentValues=formValues.dynamicFields;
   }
  }]);
/*
XHTML
 <div class="container" ng-controller="formCtrl">
    <form name="myForm" method="post">
      <div class="form-group col-sm-12">
         <label class="col-sm-3 control-label">Nom :</label>
         <div class="col-sm-9"> 
         <input type="text" class="form-control" name="formData.nom" ng-model="formData.nom" required>
         </div>
      </div>
      <h3>Vos hobbies</h3>
      <div class="form-group">
         <button ng-click="addField()" class="btn btn-info">Ajouter un hobby</button>
      </div>
      
      <div class="form-group col-sm-12" ng-repeat="formfield in formData.dynamicFields">
         <label class="col-sm-3 control-label">
             {{formfield.name}}
         </label>
         <div class="col-sm-9">
            <input type="text" class="form-control" name="formfield.val" ng-model="formfield.val">
          </div>
      </div>
     <div class="form-group">
        <div class="col-sm-offset-6 col-sm-12">
          <button class="btn  btn-primary btn-lg"  ng-click="sendFormValues(formData)">Envoyer</button>
        </div>
      </div>
    </form>
    
    <!-- pour la demo nous affichons une sortie des valeurs contenues dans nos champs hobby au submit -->
    <ul class="form-group col-sm-12" ng-repeat="formfield in SentValues.dynamicFields">
        <li>Name: {{formfield.name}}  -  Field value : {{formfield.val}}</li>
     </ul>
    </div><!-- /.container -->
  </div>

 