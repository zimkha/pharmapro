<div class="container-fluid" ng-controlle="venteCtrl" ng-init="all_art()">
	   <fieldset class="card shadow" ng-init="getAllFournisseur()">
  		<div class="card-header">Faire une Vente</div>
  		<div class="card-body">
	  	 <form class="form-horizontal"  method="post" action="" name="FormVente">
	  	 		<table class="table table-sm table-bordered">
  				<thead>
  					<th>article</th>
  					<th>qte commande</th>
  					<th>prix ht</th>
  					
  					<th>Montant</th>
  					<th>remise</th>
  					<th></th>
  				</thead>
  				<tbody>
  					 <tr ng-repeat="v in vente.details track by $index">
  					 	<td>@{{ v.libelle}}</td>
  					 	<td>@{{ v.qte_vente}}</td>
  					 	<td>@{{ v.prix_unitaire}}</td>
  					 	<td>@{{ v.montant }}</td>
  					 	<td>@{{v.remise }}</td>
  					 	<td class="text-right"><button class="btn btn-sm btn-danger" type="button" ng-click="remove(v)"><i class="fas fa-trash"></i></button></td>
  					 </tr>
  				</tbody>
	  	 	</table>
	  	 	<tfoot>
	  	 		<tr>
	  	 			<td>
	  	 				<div class="col-md-12 form-inline">		
        			<div class=" input-group input-group-lg col-lg-3">
        				<div class="input-group-addon">Articles &nbsp;</div>
        				<select class="form-control"
        				 id="article_id" 
        				 ng-model="articles.libelle"
        				 ng-options="art.libelle for art in articles" ng-change="changeValue()" required >
        				</select>
        			</div>
        				<div class=" input-group input-group-lg col-lg-2">
        				<div class="input-group-addon">qte &nbsp;</div>
        				<input type="number" name="qte_vente" class="form-control" id="qte_vente" ng-model="qte_vente" required>
        			</div>
        			<div class=" input-group input-group-lg col-lg-3">
        				<div class="input-group-addon">prix ht &nbsp;</div>
        				
        				<input type="number" name="prix_unitaire"  class="form-control" id="prix_unitaire" ng-model="prix_unitaire" required>
        			</div>
        		   <div class="input-group input-group-lg col-lg-2">
        		        Remise : 0.05 &nbsp;  <input type="checkbox" id="myCheck">
        			</div>
	  	 			</td>
	  	 		</tr>
	  	 			<td><button ng-click="addVente()" type="button" class="btn btn-primary btn-sm" >Ajouter <i class="fa fa-plus-circle" aria-hidden="true"></i></button></td>
  				</tfoot>&nbsp;&nbsp;&nbsp;
  				<div class="form-group text-right" ng-if="!chargement">
                    <button class="btn btn-success btn-sm col-12" type="button" ng-click="saveVente()" ng-disabled="vente.detailVente.length == 0 || FormVente.$invalid">Enregister</button>
                </div>
	  	 		</tr>
	  	 		</div>
	  	 	</tfoot>
	  	 </form>
	  </div>
	</fieldset>
</div>