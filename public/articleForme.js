$(document).ready(function(){
/*
   $('.monTable').click(function(){
     
   });
  var i = 1;
   var all_data =[];
       $.get('http://localhost:8000/article-all', function(data, status){
		   all_data = data;
		    console.log(all_data);
		});
         
   	    $("#add").click(function(){
   	    		  $('#cmd_ajout').append('<table>	<div class="form-group">'
								+'<tr>'
								+'<td>Article :<select class="form-control">'+
								    	
									+'</select></td>'
									+'<td> Qte : <input type="number" name="" class="form-control"> </td>'
									+'<td>Prix <input type="number" name="" class="form-control"></td>'
								+'</tr>'
						+'</div></table>');
   	    })
  */
    var nb_clik = 0;
    var all_articles = $.get('http://localhost:8000/article', function(data){});
     console.log(all_articles);
   $('#add').click(function(){
    nb_clik ++;
     console.log(nb_clik);
      $('#ajouter').append('<br><div class=""<div class="col-md-2">'
   				+' <div class="form-group">'
                   +'<select class="form-control">'+

                    +'</select>'	
   				+' </div>'
   				+'</div>'
   				+'<div class="col-md-1">'
   				+' <div class="form-group">'
   				+ '	<input type="number" name="article['+nb_clik+'][qte]" placeholder="quantite a commander" class="form-control">'
   				+ '</div>'
   				+'</div>	'
   				+'<div class="col-md-2">'
   				 +'<div class="form-group">'
   				 +'	<input type="number" name="article['+nb_clik+'][prix_ht]" placeholder="prix HT" class="form-control">'
   			+'	 </div>'
   			+'	</div>'
   				+'<div class="col-md-2">'
   				+' <div class="form-group">'
   				 	+'<input type="number" name="article['+nb_clik+'][prix_ttc]" placeholder="prix TTC" disabled class="form-control">'
   				+' </div>'
   			+'	</div><div class="col-md-2"><div class="form-group"><input type="number" name="article['+nb_clik+'][montant_ht]" disabled placeholder="montant ht" id="montat_ht" class="form-control">'
   				+' </div>'
   		+	'	</div>'
   				+'<div class="col-md-1">'
   			+'	 <div class="form-group"> 	<input type="number" name="article['+nb_clik+'][montant_ttc]" disabled placeholder="montant ttc" id="montat_ht" class="form-control"> </div></div>'
   				+'<div class="col-md-1">'
   					+'<label>TVA: 18%</label>'
   				+'	<input type="checkbox" name="tva" >'
   				+'</div>'
   				+'<div class""><span class="badge badge-secondary" style="cursor: pointer;" onclick="my_click()" id=curseur['+nb_clik+']>X</span></div></div>'
);
   });
  // comment recupere les artciles sur 
    var select = document.getElementsByClassName('tag_ajout');
        console.log(select);
});