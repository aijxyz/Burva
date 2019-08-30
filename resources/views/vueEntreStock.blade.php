 @extends('layouts.master')
@section('content')
<div class="container">

 <!-- <a class="toggle-vis" data-column="0">ID</a> - <a class="toggle-vis" data-column="1">Nom</a> - <a class="toggle-vis" data-column="2">prenom</a>-<a class="toggle-vis" data-column="3">Sociéte</a>-<a class="toggle-vis" data-column="4">Civilité</a>-<a class="toggle-vis" data-column="5">Adresse</a>-<a class="toggle-vis" data-column="6">Pays</a>-<a class="toggle-vis" data-column="7">Telephone</a>-<a class="toggle-vis" data-column="8">Mobile</a>-<a class="toggle-vis" data-column="9">Fax</a>-<a class="toggle-vis" data-column="10">Email</a>-<a class="toggle-vis" data-column="11">DCompetence</a>-<a class="toggle-vis" data-column="12">DLivre</a>-<a class="toggle-vis" data-column="13">CPaye</a>-<a class="toggle-vis" data-column="14">Observation</a>-<a class="toggle-vis" data-column="15">Modif/Supp</a></br>-->


 <select style="width: 200px;" name="toggle_column"  id="toggle_column">
   <option value="0">Id </option>
    <option value="1">Ref Produit</option>
    <option value="2">Date approvisionement</option>
    <option value="3">Fournisseur</option> 
   <option value="4">Qte Entrant </option>
   <option value="5">Prix Achat</option>    
   <option value="6">observation</option>   
   <option value="7">N Facture</option> 
   <option value="8">Modif/Supp</option> 
 </select>

 
 <div class="col-md-12" style="margin-left:15px; margin-right:50px">                   
   <!-- /.row -->
   <div class="row mt-5">

    <div class="card">
      <div class="card-header">
        <h6 class="card-title">Entrée Stock
          <div class="card-tools" style="text-align: right;">
            <button class="btn btn-success" data-toggle="modal" data-target="#ajout">Ajouter<i class="fa fa-user-plus"></i></button>
          </div>

        </h6>

      </div>            

      <!-- /.card-header -->
      <div class="table-responsive p-0">
        <table id="id_entrestock" class="table table-bordered table-striped  display ">
          <thead>
            <tr> 
              <th class="text-center">Id</th>             
              <th class="text-center">Ref Produit</th>               
              <th class="text-center">Date approvis</th>
               <th class="text-center">Fournisseur</th> 
              <th class="text-center">Qte Entrant</th>
              <th class="text-center">Prix Achat</th>
              <th class="text-center">observation</th> 
              <th class="text-center">N Facture</th>                       
              <th class="text-center">Modif|Supp</th>                 
            </tr>
          </thead>
          <tbody>
           @foreach($entreStocks as $entreStockscat)
           <tr>   
             <td class="text-center">{{$entreStockscat->id}}</td> 
             <td class="text-center">{{$entreStockscat->produit->reference}}</td>                                    
             <td class="text-center">{{$entreStockscat->dateAppro}}</td> 
             <td class="text-center">{{$entreStockscat->produit->fournisseur->nom}}</td>                          
             <td class="text-center">{{$entreStockscat->QEntrant}}</td>     
             <td class="text-center">{{$entreStockscat->prixAchat}}</td>              
             <td class="text-center">{{$entreStockscat->observ}}</td>  
             <td class="text-center">{{$entreStockscat->numFacture}}</td>                              
             <td class="text-center"> 
              <button class="btn btn-info" data-toggle="modal"
              data-mydateappro="{{$entreStockscat->dateAppro}}"
              data-myentrant="{{$entreStockscat->QEntrant}}"
              data-mystock="{{$entreStockscat->produit->stockAlert}}"
              data-myprixachat="{{$entreStockscat->prixAchat}}"
              data-myobserv="{{$entreStockscat->observ}}" 
              data-myfour="{{$entreStockscat->produit->fournisseur->nom}}" 
              data-myfacture="{{$entreStockscat->numFacture}}"              
              data-myidproduit="{{$entreStockscat->produit->reference}}"   
              data-myidproduits="{{$entreStockscat->produit->id}}"                       
              data-catid="{{$entreStockscat->id}}"
              data-target="#modifier">
              <i class="fa fa-edit"></i>
            </button>
            |                   
            <button class="btn btn-danger" data-toggle="modal" data-target="#supp" data-catid="{{$entreStockscat->id}}"  data-myidproduits="{{$entreStockscat->produit->id}}">
             <i class="fa fa-trash"></i>
           </button>                                              
         </td>                                   
       </tr>
       @endforeach  
     </tbody>              
     <tfoot>

     </tfoot>               
   </table>                
   <!-- /.card-body -->

 </div>     
 <!-- /.card -->       

</div><!-- /.row -->
</div>          

</div>

<!-- Denco@-->
<!-- Modal ajout -->
</div>



<div class="modal fade" id="ajout" tabindex="-1" role="dialog" aria-labelledby="ajoutlLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ajoutLabel">Enregistrement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">   

       <form id="myForm" method="POST" action="{{route('entreStockAjout')}}">

        @csrf
		 <div class="form-group row">          
		    <label for="idproduit" class="col-md-4 col-form-label text-md-right">{{ __('ref Produit') }}</label>
		    <div class="col-md-6">     
		      <select id="idproduit" onfocus='this.size=3;' onblur='this.size=1;' onchange='this.size=1; this.blur();' type="text" class="form-control" name="produit_id"  required autocomplete="idproduit" autofocus>                     
		        <option> </option>  
		        @foreach($prod as $prods)

		        <option value="{{$prods->id}}">{{$prods->reference}}</option>

		        @endforeach                                          

		      </select>  
		     @error('idproduit')
		     <span class="invalid-feedback" role="alert">
		      <strong>{{ $message }}</strong>
		    </span>
		    @enderror
		  </div>
		</div> 
		 <div class="form-group row">                 
          <label for="four" class="col-md-4 col-form-label text-md-right">{{ __('Fournisseur') }}</label>
          <div class="col-md-6"> 
          <input id="four" class=" form-control" disabled value=" ">         
         </div>
        </div>

        <div class="form-group row">                  

          <label for="dateAppro" class="col-md-4 col-form-label text-md-right">{{ __('Date Approvis') }}</label>
          <div class="col-md-6">  
            <input type="date"  class="form-control  @error('dateAppro') is-invalid @enderror" id="dateAppro" name="dateAppro"       value="{{ old('dateAppro') }}" required autocomplete="dateAppro" autofocus  data-mydebut="{{ old('dateAppro') }}">
            @error('dateAppro')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="QEntrant" class="col-md-3 col-form-label text-md-right">{{ __('Qte Entrant') }}</label>
          <div class="col-md-3">                      
           <input type="number"  min="0" class="form-control @error('QEntrant') is-invalid @enderror" id="QEntrant"  name="QEntrant" value="{{ old('QEntrant') }}" required autocomplete="QEntrant" autofocus>
           @error('QEntrant')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div> 
        <label for="enstock" class="col-md-3 col-form-label text-md-right">{{ __('Qte En Stock') }}</label>
         <div class="col-md-3">                    
           <input class="form-control @error('enstock') is-invalid @enderror" id="enstock" disabled name="enstock" value="{{ old('enstock') }}">
           <input type="hidden" class="form-control @error('enstock')  is-invalid @enderror" id="enstock" name="enstock" value="{{ old('enstock') }}">          
         </div> 
      </div> 

      <div class="form-group row">                  
        <label for=" prixAchat" class="col-md-4 col-form-label text-md-right">{{ __('Prix Achat') }}</label>
        <div class="col-md-6"> 
         <input type="number" min="0"  class="form-control @error(' prixAchat') is-invalid @enderror" id="prixAchat"  name=" prixAchat" value="{{ old(' prixAchat') }}" required autocomplete=" prixAchat" autofocus>
         @error(' prixAchat')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>     
    <div class="form-group row">          
      <label for="observ" class="col-md-4 col-form-label text-md-right">{{ __('observation') }}</label>
      <div class="col-md-6"> 
      <textarea class="form-control @error('observ') is-invalid @enderror" id="observ"  name="observ" value="{{ old('observ') }}" required autocomplete="observ" autofocus></textarea>
       @error('observ')
       <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>   
  <div class="form-group row">                  
        <label for="numFacture" class="col-md-4 col-form-label text-md-right">{{ __('N Facture') }}</label>
        <div class="col-md-6"> 
         <input type="text" class="form-control @error('numFacture') is-invalid @enderror" id="numFacture"  name="numFacture" value="{{ old('numFacture') }}" required autocomplete="numFacture" autofocus>
         @error('numFacture')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
  </div> 

<input type="hidden" class="form-control @error('paysAt') is-invalid @enderror" id="paysAt"  name="paysAt" value="{{Auth::user()->paysAt}}" autofocus >
</div> 

<div class="modal-footer">                 
  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
  <button id="ad" type="submit" class="btn btn-primary"> {{ __('Valider') }}</button>
</div>      
</form> 
</div>
</div>
</div>
</div>




<!--- Modifier-->




<div class="modal fade" id="modifier" tabindex="-1" role="dialog" aria-labelledby="modifierLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifierLabel">Modifier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">

       <form id="myFormModif" method="POST" action="{{route('entreStockModifier')}}">
        {{method_field('patch')}} 
        {{csrf_field()}} 
		  <div class="form-group row">          
		    <label for="idproduit" class="col-md-4 col-form-label text-md-right">{{ __('ref Produit') }}</label>
		    <div class="col-md-6">     
		      <input id="idproduit" disabled type="text" class="form-control" name="produit_id"  required autocomplete="idproduit" autofocus>                   
		    
		  </div>
		</div>  
        <div class="form-group row">                 
          <label for="four" class="col-md-4 col-form-label text-md-right">{{ __('Fournisseur') }}</label>
          <div class="col-md-6"> 
          <input id="four" class=" form-control" disabled value="">    
         </div>
        </div>

       <div class="form-group row">                 
          <label for="dateAppro" class="col-md-4 col-form-label text-md-right">{{ __('Date Approvis') }}</label>
          <div class="col-md-6">  
            <input type="date"  class="form-control  @error('dateAppro') is-invalid @enderror" id="dateAppro" name="dateAppro"       value="{{ old('dateAppro') }}" required autocomplete="dateAppro" autofocus  data-mydebut="{{ old('dateAppro') }}">
            @error('dateAppro')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="QEntrant" class="col-md-3 col-form-label text-md-right">{{ __('Qte Entrant') }}</label>
          <div class="col-md-3">                      
           <input type="number"  min="0" class="form-control @error('QEntrant') is-invalid @enderror" id="QEntrant"  name="QEntrant" value="{{ old('QEntrant') }}" required autocomplete="QEntrant" autofocus>
           @error('QEntrant')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div> 
        <label for="enstock" class="col-md-3 col-form-label text-md-right">{{ __('Qte En Stock') }}</label>
        <div class="col-md-3">                    
           <input class="form-control @error('enstock') is-invalid @enderror" id="enstock" disabled name="enstock" value="{{ old('enstock') }}">
           <input type="hidden" class="form-control @error('enstock')  is-invalid @enderror" id="enstock" name="enstock" value="{{ old('enstock') }}">          
        </div> 
      </div> 

      <div class="form-group row">                  
        <label for=" prixAchat" class="col-md-4 col-form-label text-md-right">{{ __('Prix Achat') }}</label>
        <div class="col-md-6"> 
         <input type="number" min="0"  class="form-control @error(' prixAchat') is-invalid @enderror" id="prixAchat"  name=" prixAchat" value="{{ old(' prixAchat') }}" required autocomplete=" prixAchat" autofocus>
         @error(' prixAchat')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>     
    <div class="form-group row">          
     <label for="observ" class="col-md-4 col-form-label text-md-right">{{ __('observation') }}</label>
     <div class="col-md-6"> 
     <textarea class="form-control @error('observ') is-invalid @enderror" id="observ"  name="observ" value="{{ old('observ') }}" required autocomplete="observ" autofocus></textarea>
       @error('observ')
       <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>    
  <div class="form-group row">                  
        <label for="numFacture" class="col-md-4 col-form-label text-md-right">{{ __('N Facture') }}</label>
        <div class="col-md-6"> 
         <input type="text" class="form-control @error('numFacture') is-invalid @enderror" id="numFacture"  name="numFacture" value="{{ old('numFacture') }}" required autocomplete="numFacture" autofocus>
         @error('numFacture')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
   </div> 

<input id="cat_id" type="hidden" name="entreStock_id" value=" " >  
<input id="cat_idp" type="hidden" name="produits_id" value=" " >  

</div> 

<div class="modal-footer">                 
  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
  <button id="ad" type="submit" class="btn btn-primary"> {{ __('Valider') }}</button>
</div>      
</form> 
</div>
</div>
</div>
</div>
</div>






<!-- Modal supprimer-->

<div class="modal fade" id="supp" tabindex="-1" role="dialog" aria-labelledby="supplLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="suppLabel">Supprimer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="{{ route('entreStockSupp') }}">  
        {{method_field('delete')}}
        {{csrf_field()}}                             
        <div class="modal-body"> 

          <h2 class="text-center" style="color: red">Voulez vous vraiment supprimer</br> cette entrée de stock?&hellip;</h2>

        </div>                             
        <input id="cat_id" type="hidden" name="entreStock_id" value=" " >    
        <input id="cat_idp" type="hidden" name="produits_id" value=" " >   

        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-danger"> {{ __('Confirmer') }}</button>
        </div>
      </form>  
    </div>
  </div>
</div>   
</div>   



<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('multiple-select/dist/multiple-select.js') }}" defer></script>

<!--<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>-->
<!--<script src="https://unpkg.com/multiple-select@1.3.1/dist/multiple-select.js"></script>-->






<script type="text/javascript">
   // $(document).ready(function () {

    $(document).ready(function(){ 



     /* var table = jQuery('#id_four').DataTable( {

         "scrollY": "200px",
         "scrollX": "200px",
         "paging": true
    
       } );*/


      //id_four = jQuery('#id_four').DataTable();
          // table.column(0).visible(0);     



          var table = $('#id_entrestock').DataTable( {


            "language": {
             "sProcessing": "Traitement en cours ...",
             "sLengthMenu": "Afficher _MENU_ lignes",
             "sZeroRecords": "Aucun résultat trouvé",
             "sEmptyTable": "Aucune donnée disponible",
             "sInfo": "Lignes _START_ à _END_ sur _TOTAL_",
             "sInfoEmpty": "Aucune ligne affichée",
             "sInfoFiltered": "(Filtrer un maximum de_MAX_)",
             "sInfoPostFix": "",
             "sSearch": "Chercher:",
             "sUrl": "",
             "sInfoThousands": ",",
             "sLoadingRecords": "Chargement...",
             "oPaginate": {
               "sFirst": "Premier", "sLast": "Dernier", "sNext": "Suivant", "sPrevious": "Précédent"
             },
             "oAria": {
               "sSortAscending": ": Trier par ordre croissant", "sSortDescending": ": Trier par ordre décroissant"
             },
           },

           "scrollY": "200px",
           "scrollX": "100%",
      // "scrollXInner": "110%"
      "scrollXInner": "100%",    
      "paging": true

    } );

          function hideAllColumns(){

            for(var i=0;i<9;i++){

             columns= table.column(i).visible(0);

           }
         }

         function showAllColumns(){

          for(var i=0;i<9;i++){

           columns= table.column(i).visible(1);

         }
       }

       $('#toggle_column').multipleSelect({

        onClick: function(view){

         var selectedItems=$('#toggle_column').multipleSelect("getSelects");
         hideAllColumns();
         for(var i=0;i<selectedItems.length;i++){
           var s  = selectedItems[i];
           table.column(s).visible(i+3);
         }

       },

       onCheckAll: function(){

        showAllColumns();


      },

      onUncheckAll: function(){

        hideAllColumns();

      }
    });





$('#myForm #idproduit').click(function(){

     var query = $('#myForm #idproduit').val();

        if(query != '')
        {
         //var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('comp') }}",
          method:"get",
        //data:{query:query, _token:_token},
          data:{query:query},
          success:function(data){

          	var dat = data[0].nom;
                    //console.log(dat);       	
             $('#myForm  #four').val(dat);          
           // $('#myForm  #four').html(dat);
            
          }

         });

          $.ajax({
          url:"{{ route('compenstock') }}",
          method:"get",
        //data:{query:query, _token:_token},
          data:{query:query},
          success:function(data){

          	var datent = data[0].stockAlert;
                    //console.log(dat);       	
             $('#myForm  #enstock').val(datent);          
           // $('#myForm  #four').html(dat);
            
          }

         });

        }

  

});


/*$('#myForm # prixAchat').click(function(){

    var databack = $("#myForm  #enstock").val();
    var datab= parseInt(databack);

    var databack1 = $("#myForm  #QEntrant").val(); 
     var datab1= parseInt(databack1); 

    //var total = datab1 + datab;

    $('#myForm  #enstock').val(datab1 + datab); 


  });*/






$('#myFormModif #idproduit').click(function(){

     var query = $('#myFormModif #idproduit').val();

        if(query != '')
        {
         //var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('comp') }}",
          method:"get",
         //data:{query:query, _token:_token},
          data:{query:query},
          success:function(data){

          	var dat = data[0].nom;
                    //console.log(dat);       	
         
            $('#myFormModif #four').val(dat);
            
          }

         });


         $.ajax({
          url:"{{ route('compenstock') }}",
          method:"get",
        //data:{query:query, _token:_token},
          data:{query:query},
          success:function(data){

          	var datent = data[0].stockAlert;
                    //console.log(dat);       	
             $('#myFormModif  #enstock').val(datent);          
           // $('#myForm  #four').html(dat);
            
          }

         });






        }

  

});




/*$('#myFormModif # prixAchat').click(function(){

    var databack = $("#myFormModif #enstock").val();
    var datab= parseInt(databack);

    var databack1 = $("#myFormModif #QEntrant").val(); 
     var datab1= parseInt(databack1); 

    //var total = datab1 + datab;

    $('#myFormModif #enstock').val(datab1 + datab);  

  });
*/

   //script Modifier

   /*var y = document.getElementById("myFormModif");    

    $("#myFormModif").on("change", function() {

      var databack = $("#myFormModif #dateAppro").val();
      var databack1 = $("#myFormModif #QEntrant").val();
      var databack2 = $("#myFormModif #observ").val();
       var databack2 = $("#myFormModif #observ").val();

 
      if (+databack <= +databack1) {

        var total = databack2 *((databack1- databack)+1);
        $('#myFormModif #idproduit').val(total).css('color', 'black');  

      }

      else{

       $('#myFormModif #idproduit').val("dateAppro Serie doit être inferieur à QEntrant Serie").css('color', 'red'); 

     }
   })   
*/


  });




$('#supp').on('show.bs.modal',function(event){

        // console.log('test test test');

        var button=$(event.relatedTarget)

        var cat_id=button.data('catid')
        var cat_idp=button.data('myidproduits')

           /* var title=button.data('mytitle')
           var description= button.data('mydescription')*/
           var modal=$(this)

           /* modal.find('.modal-body #title').val(title);
           modal.find('.modal-body #observ').val(description);*/
          
           modal.find('.modal-body #cat_id').val(cat_id);
            modal.find('.modal-body #cat_idp').val(cat_idp);

         })





$('#modifier').on('show.bs.modal',function(event){
          // console.log('test ooooooo');

          var button=$(event.relatedTarget)
          var dateAppro=button.data('mydateappro')
          var QEntrant=button.data('myentrant')
          var stock=button.data('mystock')
          var four=button.data('myfour')
          var prixAchat=button.data('myprixachat')
          var observ=button.data('myobserv')
          var numFacture=button.data('myfacture')
          var cat_id=button.data('catid')        
          var idproduit=button.data('myidproduit')
          var cat_idp=button.data('myidproduits')                              
          

          /* var profil= button.data('profil')*/
          /*var cat_id=button.data('catid')*/

          var modal=$(this)
          modal.find('.modal-body #dateAppro').val(dateAppro);
          modal.find('.modal-body #QEntrant').val(QEntrant);
          modal.find('.modal-body #enstock').val(stock);
          modal.find('.modal-body #prixAchat').val(prixAchat);
          modal.find('.modal-body #observ').val(observ);  
          modal.find('.modal-body #numFacture').val(numFacture);
          modal.find('.modal-body #four').val(four); 
          modal.find('.modal-body #idproduit').val(idproduit);         
          modal.find('.modal-body #cat_id').val(cat_id);
          modal.find('.modal-body #cat_idp').val(cat_idp);
          /* modal.find('.modal-body #profil').val(profile);*/
          /*modal.find('.modal-body #cat_id').vaajoutt_id):*/                  

        })




/*$('#ajot').on('show.bs.modal',function(event){

/*var dateAppro = parseFloat(modal.etElementById('dateAppro').value);
    var QEntrant = parseFloat(modal.getElementById('QEntrant').value);
    var idproduit= parseFloat(modal.getElementById('idproduit').value);
 
// Je contrôle l'évènement lorsque l'on rempli un input:
document.addEventListener('keypress', tot);*/

//j’envoie la fonction qui additionne si mes deux inputs sont remplis:
/*$('#ad').click(function() {

  var databack = $("#ajout #dateAppro").val().trim();
  var databack1 = $("#ajout #QEntrant").val().trim();
  var databack2 = $("#ajout #observ").val().trim();
 
  

 
    //Je mets le résultat de l'addition dans la div result du html:

  } */                  

/*
})*/



  /*<form id="myForm">
  <input type="text" id="myInput">
  </form*/









</script>


<!-- Denco@-->

@endsection
