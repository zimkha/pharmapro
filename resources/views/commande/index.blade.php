 <div class="card shadow mb-4" ng-init="getAllcommande()">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> Listes des commandes non livrées</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="overflow-x:auto;">
                  <thead>
                  	<th>code Commande</th>
                  	<th>Forunisseur</th>
                  	<th>adresse</th>
                  	<th>Email</th>
                  	<th>status commande</th>
                  	
                  </thead>
                  <tbody>
                  	<tr  ng-repeat="com in All_commande.commande" ng-model ="com.id" id="com.id" style="text-align: center;">
                  		<a href="" >
                  		<td style="text-align: center;" ng-click="cliquer()">@{{com.code_commande}}</td>
                  		<td ng-click="cliquer()">@{{com.fournisseur.nom_complet}}</td>
                  		<td ng-click="cliquer()">@{{ com.fournisseur.adresse}}</td>
                  		<td ng-click="cliquer()">@{{ com.fournisseur.email }}</td>
                  		<td ng-if="com.status == 1"><span class="badge badge-primary">pas de livraison</span></td>
                  		</a>
                  		
                  	</tr>
                  </tbody>
              </table>


          </div>
      </div>
  </div>
  <br>
   <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> Listes des Articles Pour cette commande</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              	<form class="form-horiontal"  method="post" name="validationLivre">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0" id="tab_article_commande" style="overflow-x:auto;">
                  <thead>
                  	
                  	<th>qte commande</th>
                  	<th>article</th>
                  	<th>prix U</th>
                  	<th>prix TTC</th>
                  	<th>montant HT</th>
                  	<th>montant TTC</th>
                  	<th>remise</th>
                  	<th>Marge</th>
                  	<th>Action</th>
                  </thead>
                   <tbody>
                  	  <tr  ng-repeat="p in article_commande track by $index" style="text-align: center;">
                  	  	<td>@{{ p.qte_commande | number}}</td>
                  	  	<td>@{{ p.article.libelle }}</td>
                  	  	<td>@{{ p.prix_ht | number}} &nbsp; FRC</td>
                  		<td>@{{ p.prix_TTC | number}} &nbsp; FRC</td>
                  	  	<td>@{{ p.montant_ht | number}} &nbsp; FRC</td>
                  	  	<td>@{{ p.montant_ttc | number }} &nbsp; FRC</td>
                  	  	<td ng-if="p.remise !=0">@{{ p.remise | number}} &nbsp; FRC</td>
                  	  	<td ng-if="p.remise ==0"><span class="badge badge-success">pas de remise</span> </td>
                  	  	<td ng-if="p.remise != 0">@{{ (p.montant_ttc - p.remise) | number }} </td>
                  	  	<td ng-if="p.remise == 0"><span class="badge badge-success">pas de marge</span> </td>
                  	  	<div class="form-group">
                  	  	<td>
                  	  		<input
                  	  		 type="checkbox" 
                  	  		 
                  	  		 ng-checked="cheked_Single(p)" 
                  	  		 value="@{{p.id}}" 
                  	  		 ng-click="checkedUnchecked(p)"
                  	  		 ng-true-value="1"
                  	  		 ng-false-value="0"
                  	  		 > <label>ajouter </label> </td>
                  	 	</div>
                  	  </tr>
                  	  
                  </tbody>
              </table>
               <div class="form-group">
               	<button class="btn btn-primary" ng-click="livraison(validationLivre)" ng-diseabled="!validationLivre.$valide">Valider la livraison</button>
               </div>
              </form>


          </div>
      </div>
  </div