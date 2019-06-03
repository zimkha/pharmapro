<div class="row" ng-init="getAllcommande()">
   <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
              
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Commandes en cours </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">@{{ nb_commande}}</div>
                    </div>
                     
                    <div class="col-auto">
                    <a href="#/commande" title="lister tout les commandes"> <i class="fas fa-calendar fa-2x text-gray-300"></i> </a>
                    </div>
                   
                  </div>
                </div>

              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Ventes Journaliers</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        
                      </div>
                    </div>
                   <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Factures Clients</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Encaissemnt / jr</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>
<div class="row" ng-controller='MyFormCtrl' ng-init="listeAll_artilce()">
 
  <fieldset class="card shadow" ng-init="getAllFournisseur()">
  		<div class="card-header">Commander des articles</div>
  		<div class="card-body">
  			<form class="form-horizontal row" method="post"  name="FormCommande">
  				<div class="form-group form-inline col-sm-6">
  					<label>Fournisseur:</label>
  					<select class="form-control" required ng-model="fournisseur.nom_complet" ng-options="f.nom_complet for f in fournisseur" id="fournisseur_id"></select>
  				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	Remise Total : @{{commande.remiseTottal |  number}}
  				</div>

  		
  			<table class="table table-sm table-bordered">
  				<thead>
  					<th>article</th>
  					<th>qte commande</th>
  					<th>prix ht</th>
  					<th>prix ttc</th>
  					<th>montant ht</th>
  					<th>montant ttc</th>
  					<th>remise</th>
  					<th></th>
  				</thead>
  				<tbody>
  					<tr ng-repeat ="c in commande.detailsCommande track by $index">
  						<td>@{{c.articleLibele}}</td>
  						<td>@{{ c.qte_commande |number }}</td>
  						<td>@{{ c.prix_ht |number  }} .FCA</td>
  						<td>@{{ c.prix_ttc |number }} .FCA</td>
  						<td>@{{ c.montant_ht |number  }} .FCA</td>
  						<td>@{{ c.montant_ttc |number }} .FCA</td>
  						<td>@{{ c.remise }}</td>
  						 <td class="text-right"><button class="btn btn-sm btn-danger" type="button" ng-click="remove(c)"><i class="fas fa-trash"></i></button></td>
  					</tr>
  					<tr>
  						  <th colspan="4" class="border">Total HT</th><th class="text-right border">@{{ Total_ht |number }}</th>
  					</tr>
  					<tr>
  						  <th colspan="5" class="border">Total TTC</th><th class="text-right border">@{{ total_TTC |number }}</th>
  					</tr>
  				</tbody>
  			</table>
  					

        <tfoot>
        	<tr>
        		<td>
        			<div class="col-md-12 form-inline">		
        			<div class=" input-group input-group-lg col-lg-2">
        				<div class="input-group-addon">Articles</div><select class="form-control" id="article_id" ng-model="articles.libelle" ng-options="art.libelle for art in articles" >
        				</select>
        			</div>
        			<div class=" input-group input-group-lg col-lg-2">
        				<div class="input-group-addon">qte</div>
        				<input type="number" name="qte_commande" class="form-control" id="qte" ng-model="qte">
        			</div>
        			<div class=" input-group input-group-lg col-lg-2">
        				<div class="input-group-addon">prix ht</div>
        				<input type="number" name="prix_ht" class="form-control" id="prix_ht" ng-model="prix_ht">
        			</div>
        			<div class=" input-group input-group-lg col-lg-2">
        				<div class="input-group-addon">prix ttc</div>
        				<input type="number" name="prix_ttc" class="form-control" id="prix_ttc" ng-model="prix_ttc">
        			</div>
        			 <div class="input-group input-group-lg col-lg-2">
        		        Remise : 0.05 &nbsp;  <input type="checkbox" id="myCheck">
        			</div>

        		</td>
        	</tr>
  		<td><button ng-click="addCommandeArticle()" type="button" class="btn btn-primary btn-sm" >Ajouter <i class="fa fa-plus-circle" aria-hidden="true"></i></button></td>
  				</tfoot>&nbsp;&nbsp;&nbsp;
  				<div class="form-group text-right" ng-if="!chargement">
                    <button class="btn btn-success btn-sm col-12" type="button" ng-click="saveCommande()" ng-disabled="commande.detailsCommande.length == 0 || FormCommande.$invalid">Enregister</button>
                </div>
  			</form>
  		</div>
  </fieldset>
</div>