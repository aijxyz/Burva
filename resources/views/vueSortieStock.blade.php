   @extends('layouts.master')
@section('content')
<div class="container">

 <!-- <a class="toggle-vis" data-column="0">ID</a> - <a class="toggle-vis" data-column="1">Nom</a> - <a class="toggle-vis" data-column="2">prenom</a>-<a class="toggle-vis" data-column="3">Sociéte</a>-<a class="toggle-vis" data-column="4">Civilité</a>-<a class="toggle-vis" data-column="5">Adresse</a>-<a class="toggle-vis" data-column="6">Pays</a>-<a class="toggle-vis" data-column="7">Telephone</a>-<a class="toggle-vis" data-column="8">Mobile</a>-<a class="toggle-vis" data-column="9">Fax</a>-<a class="toggle-vis" data-column="10">Email</a>-<a class="toggle-vis" data-column="11">DCompetence</a>-<a class="toggle-vis" data-column="12">DLivre</a>-<a class="toggle-vis" data-column="13">CPaye</a>-<a class="toggle-vis" data-column="14">Observation</a>-<a class="toggle-vis" data-column="15">Modif/Supp</a></br>-->


 <select style="width: 200px;" name="toggle_column"  id="toggle_column">
   <option value="0">Id </option>
    <option value="1">Ref Produit</option>
    <option value="2">Date Sortie</option>
    <option value="3">Qte Sortant</option> 
   <option value="4">Motif</option>
   <option value="5">Date Saisie</option>    
   <option value="6">observation</option>   
   <option value="7">Service/Centre</option> 
   <option value="8">Modif/Supp</option> 
 </select>

 
 <div class="col-md-12" style="margin-left:15px; margin-right:50px">                   
   <!-- /.row -->
   <div class="row mt-5">

    <div class="card">
      <div class="card-header">
        <h6 class="card-title">Sortie Stock
          <div class="card-tools" style="text-align: right;">
            <button class="btn btn-success" data-toggle="modal" data-target="#ajout">Ajouter<i class="fa fa-user-plus"></i></button>
          </div>

        </h6>

      </div>            

      <!-- /.card-header -->
      <div class="table-responsive p-0">
        <table id="id_sortiestock" class="table table-bordered table-striped  display ">
          <thead>
            <tr> 
              <th class="text-center">Id</th>             
              <th class="text-center">Ref Produit</th>               
              <th class="text-center">Date Sortie</th>
               <th class="text-center">Qte Sortant</th> 
              <th class="text-center">Motif</th>
              <th class="text-center">Date Saisie</th>
              <th class="text-center">observation</th> 
              <th class="text-center">Service/Centre</th>                       
              <th class="text-center">Modif|Supp</th>                 
            </tr>
          </thead>
          <tbody>
           @foreach($sortieStocks as $sortieStockscat)
           <tr>   
             <td class="text-center">{{$sortieStockscat->id}}</td> 
             <td class="text-center">{{$sortieStockscat->produit->reference}}</td>                                 
             <td class="text-center">{{$sortieStockscat->dateSortie}}</td> 
             <td class="text-center">{{$sortieStockscat->QSortant}}</td>                          
             <td class="text-center">{{$sortieStockscat->motif}}</td>     
             <td class="text-center">{{$sortieStockscat->dateSaisie}}</td>              
             <td class="text-center">{{$sortieStockscat->observ}}</td>  
             <td class="text-center">{{$sortieStockscat->centre}}</td>                              
             <td class="text-center"> 
              <button class="btn btn-info" data-toggle="modal"
              data-catid="{{$sortieStockscat->id}}"
              data-mydatesortie="{{$sortieStockscat->dateSortie}}"
              data-mydatesaisie  ="{{$sortieStockscat->dateSaisie}}"
              data-mysortant="{{$sortieStockscat->QSortant}}"
              data-mystock="{{$sortieStockscat->produit->stockAlert}}"
              data-myobserv="{{$sortieStockscat->observ}}" 
              data-mycentre="{{$sortieStockscat->centre}}"  
              data-mymotif="{{$sortieStockscat->motif}}"         
              data-myidproduit="{{$sortieStockscat->produit->reference}}"   
              data-myidproduits="{{$sortieStockscat->produit->id}}"               
              data-target="#modifier">
              <i class="fa fa-edit"></i>
            </button>
            |                   
            <button class="btn btn-danger" data-toggle="modal" data-target="#supp" 
             data-catid="{{$sortieStockscat->id}}"
             data-myidproduits="{{$sortieStockscat->produit->id}}">
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

       <form id="myForm" method="POST" action="{{route('sortieStockAjout')}}">

        @csrf
		 <div class="form-group row">          
		    <label for="idproduit" class="col-md-4 col-form-label text-md-right">{{ __('ref Produit') }}</label>
		    <div class="col-md-6">     
		      <select id="idproduit" type="text" class="form-control" name="produit_id"  required autocomplete="idproduit" autofocus>                     
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

          <label for="dateSortie" class="col-md-4 col-form-label text-md-right">{{ __('Date Sortie') }}</label>
          <div class="col-md-6">  
            <input type="date"  class="form-control  @error('dateSortie') is-invalid @enderror" id="dateSortie" name="dateSortie"       value="{{ old('dateSortie') }}" required autocomplete="dateSortie" autofocus >
            @error('dateSortie')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>


         <div id="test">
      
      	      
         </div>



        <div class="form-group row">
          <label for="QSortant" class="col-md-3 col-form-label text-md-right">{{ __('Qte Sortant') }}</label>
          <div class="col-md-3">                      
           <input type="number"  min="0" class="form-control @error('QSortant') is-invalid @enderror" id="QSortant"  name="QSortant" value="{{ old('QSortant') }}" required autocomplete="QSortant" autofocus>
           @error('QSortant')
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
        <label for=" motif" class="col-md-4 col-form-label text-md-right">{{ __('Motif') }}</label>
        <div class="col-md-6"> 
         <input type="text"  class="form-control @error(' motif') is-invalid @enderror" id="motif"  name=" motif" value="{{ old(' motif') }}" required autocomplete=" motif" autofocus>
         @error(' motif')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="form-group row">                  

      <label for="dateSaisie" class="col-md-4 col-form-label text-md-right">{{ __('Date Saisie') }}</label>
      <div class="col-md-6">  
        <input type="date"  class="form-control  @error('dateSaisie') is-invalid @enderror" id="dateSaisie" name="dateSaisie" value="{{ old('dateSaisie') }}" required autocomplete="dateSaisie" autofocus >
        @error('dateSaisie')
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
        <label for="centre" class="col-md-4 col-form-label text-md-right">{{ __('Service/Centre') }}</label>
        <div class="col-md-6"> 
         <input type="text" class="form-control @error('centre') is-invalid @enderror" id="centre"  name="centre" value="{{ old('centre') }}" required autocomplete="centre" autofocus>
         @error('centre')
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

       <form id="myFormModif" method="POST" action="{{route('sortieStockModifier')}}">
        {{method_field('patch')}} 
        {{csrf_field()}} 
		  	  <div class="form-group row">          
		    <label for="idproduit" class="col-md-4 col-form-label text-md-right">{{ __('ref Produit') }}</label>
		    <div class="col-md-6">     
		      <input id="idproduit" disabled type="text" class="form-control" name="produit_id"  required autocomplete="idproduit" autofocus>                   
		    
		  </div>
		</div>   	

        <div class="form-group row">                  

          <label for="dateSortie" class="col-md-4 col-form-label text-md-right">{{ __('Date Sortie') }}</label>
          <div class="col-md-6">  
            <input type="date"  class="form-control  @error('dateSortie') is-invalid @enderror" id="dateSortie" name="dateSortie"  value="{{ old('dateSortie') }}" required autocomplete="dateSortie" autofocus>
            @error('dateSortie')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="QSortant" class="col-md-3 col-form-label text-md-right">{{ __('Qte Sortant') }}</label>
          <div class="col-md-3">                      
           <input type="number"  min="0" class="form-control @error('QSortant') is-invalid @enderror" id="QSortant"  name="QSortant" value="{{ old('QSortant') }}" required autocomplete="QSortant" autofocus>
           @error('QSortant')
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
        <label for=" motif" class="col-md-4 col-form-label text-md-right">{{ __('Motif') }}</label>
        <div class="col-md-6"> 
         <input type="text"  class="form-control @error('motif') is-invalid @enderror" id="motif"  name="motif" value="{{ old('motif') }}" required autocomplete="motif" autofocus>
         @error(' motif')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="form-group row">                  

      <label for="dateSaisie" class="col-md-4 col-form-label text-md-right">{{ __('Date Saisie') }}</label>
      <div class="col-md-6">  
        <input type="date"  class="form-control  @error('dateSaisie') is-invalid @enderror" id="dateSaisie" name="dateSaisie" value="{{ old('dateSaisie') }}" required autocomplete="dateSaisie" autofocus  data-mydebut="{{ old('dateSaisie') }}">
        @error('dateSaisie')
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
        <label for="centre" class="col-md-4 col-form-label text-md-right">{{ __('Service/Centre') }}</label>
        <div class="col-md-6"> 
         <input type="text" class="form-control @error('centre') is-invalid @enderror" id="centre"  name="centre" value="{{ old('centre') }}" required autocomplete="centre" autofocus>
         @error('centre')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
  </div> 

<input id="cat_id" type="hidden" name="sortieStock_id" value=" " >  
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
       <form method="POST" action="{{ route('sortieStockSupp') }}">  
        {{method_field('delete')}}
        {{csrf_field()}}                             
        <div class="modal-body"> 

          <h2 class="text-center" style="color: red">Voulez vous vraiment supprimer</br> cette sortie de stock?&hellip;</h2>

        </div>                             
        
         <input id="cat_id" type="hidden" name="sortieStock_id" value=" " >  
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



          var table = $('#id_sortiestock').DataTable( {


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
          url:"{{ route('compenstocks') }}",
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


  var x = document.getElementById("myForm");
  x.addEventListener("focusin", myFocusFunction); 


 function myFocusFunction() {


  var databack = $("#QSortant").val();
  var databack1 = $("#enstock").val(); 


  if (+databack1 <= +databack) {     

   
    //$('#QSortant').val("11111").css('color', 'red'); 
    ///$('#QSortant').html().css({'color': 'red', 'text-align': 'center'})
    document.getElementById("test").style.backgroundColor = "yellow";


  }

 

}







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
          url:"{{ route('compenstocks') }}",
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
          var dateSortie=button.data('mydatesortie')
          var dateSaisie=button.data('mydatesaisie')
          var QSortant=button.data('mysortant')
          var stock=button.data('mystock')         
          var motif=button.data('mymotif')
          var observ=button.data('myobserv')
          var centre=button.data('mycentre')
          var cat_id=button.data('catid')        
          var idproduit=button.data('myidproduit')
          var cat_idp=button.data('myidproduits')                              
          

          /* var profil= button.data('profil')*/
          /*var cat_id=button.data('catid')*/

          var modal=$(this)
          modal.find('.modal-body #dateSortie').val(dateSortie);
          modal.find('.modal-body #dateSaisie').val(dateSaisie);
          modal.find('.modal-body #QSortant').val(QSortant);
          modal.find('.modal-body #enstock').val(stock);
          modal.find('.modal-body #motif').val(motif); 
          modal.find('.modal-body #observ').val(observ);  
          modal.find('.modal-body #centre').val(centre);
          modal.find('.modal-body #idproduit').val(idproduit);         
          modal.find('.modal-body #cat_id').val(cat_id);
          modal.find('.modal-body #cat_idp').val(cat_idp);
          /* modal.find('.modal-body #profil').val(profile);*/
          /*modal.find('.modal-body #cat_id').vaajoutt_id):*/                  

        })










</script>


<!-- Denco@-->

@endsection
