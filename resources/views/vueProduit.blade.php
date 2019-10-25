@extends('layouts.master')
@section('content')
<div class="container">

 <select style="width: 200px;" name="toggle_column"  id="toggle_column">
   <option value="0">Id </option>
   <option value="1">Société</option>
   <option value="2">Reference</option>
   <option value="3">Libellé</option>
   <option value="4">Description</option>
   <option value="5">Seuil reapprovis</option> 
   <option value="6">Stock alert</option> 
   <option value="7">Ves</option> 
   <option value="8">Prix Ht</option> 
   <option value="9">Modif/Supp</option>  
 </select>

 
 <div class="col-md-12" style="margin-left:20px; margin-right:50px">                   
   <!-- /.row -->
   <div class="row mt-5">

    <div class="card">
      <div class="card-header">
        <h6 class="card-title">Produits
          <div class="card-tools" style="text-align: right;">
            <button class="btn btn-success" data-toggle="modal" data-target="#ajout">Ajouter<i class="fa fa-user-plus"></i></button>
          </div>

        </h6>

      </div>            

      <!-- /.card-header -->
      <div class="table-responsive p-0">
        <table id="id_produit" class="table table-bordered table-striped  display ">
          <thead>
            <tr> 
              <th class="text-center">Id</th>              
              <th class="text-center">Société</th>
              <th class="text-center">Réference</th>
              <th class="text-center">Libéllé</th>
              <th class="text-center">Description</th>                   
              <th class="text-center">Seuil reapprovis</th> 
              <th class="text-center">Stock alert</th> 
               <th class="text-center">Ves</th> 
              <th class="text-center">Prix HT</th>                  
              <th class="text-center">Modif|Supp</th>                 
            </tr>
          </thead>
          <tbody>
           @foreach($produits as $produitscat)
           <tr>   
             <td class="text-center">{{$produitscat->id}}</td>              
             <td class="text-center">{{$produitscat->fournisseur->societe}}</td>                        
             <td class="text-center">{{$produitscat->reference}}</td>     
             <td class="text-center">{{$produitscat->libelleProd}}</td>  
             <td class="text-center">{{$produitscat->description}}</td> 
             <td class="text-center">{{$produitscat->seuilApprovis}}</td>
             <td class="text-center">{{$produitscat->stockAlert}}</td>      
             <td class="text-center">{{$produitscat->ves}}</td>   
            <td class="text-center">{{$produitscat->prixHt}}</td>                  
             <td class="text-center"> 
              <button class="btn btn-info" data-toggle="modal"
              data-myidfour="{{$produitscat->fournisseur->id}}" 
              data-myref="{{$produitscat->reference}}"
              data-mylibelle="{{$produitscat->libelleProd}}"
              data-mydes="{{$produitscat->description}}"
              data-myseuil="{{$produitscat->seuilApprovis}}"
              data-mystockal="{{$produitscat->stockAlert}}"
              data-myves="{{$produitscat->ves}}" 
              data-myprix="{{$produitscat->prixHt}}"                                     
              data-catid="{{$produitscat->id}}"
              data-target="#modifier">
              <i class="fa fa-edit"></i>
            </button>
            |                   
            <button class="btn btn-danger" data-toggle="modal" data-target="#supp" data-catid="{{$produitscat->id}}">
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
  <div class="form-group row">
     <div class="col-md-3"></div>
     <div class="col-md-3"></div>
     <div class="col-md-3"></div>              
     <div class="col-md-3 border border-dark"><strong>Prix Total: {{$som}}  </strong>FCFA</div>
  </div>
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

       <form id="myForm" method="POST" action="{{route('produitAjout')}}">

        @csrf
    <div class="form-group row">          
    <label for="id_four" class="col-md-4 col-form-label text-md-right">{{ __('Société') }}</label>
    <div class="col-md-6"> 

      <select id="id_four"type="text" class="form-control" name="fournisseur_id"  required autocomplete="id_four" autofocus>                     
        <option> </option>  
        @foreach($fourn as $fourns)
        <option value="{{$fourns->id}}">{{$fourns->societe}}</option>
        @endforeach                                          

      </select>                      
      @error('id_four')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div> 
       
   <div class="form-group row">
          <label for="ref" class="col-md-4 col-form-label text-md-right">{{ __('Reference') }}</label>
          <div class="col-md-6">                      
           <input type="number"  min="0" class="form-control @error('ref') is-invalid @enderror" id="ref"  name="reference" value="{{ old('ref') }}" required autocomplete="ref" autofocus>
           @error('fin')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div> 
      </div> 

    <div class="form-group row">                  
        <label for="lib" class="col-md-4 col-form-label text-md-right">{{ __('Libéllé') }}</label>
        <div class="col-md-6"> 
         <input type="text" class="form-control @error('lib') is-invalid @enderror" id="lib"  name="libelleProd" value="{{ old('lib') }}" required autocomplete="lib" autofocus>
         @error('lib')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>     
    <div class="form-group row">          
      <label for="des" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
      <div class="col-md-6"> 
       <textarea class="form-control @error('des') is-invalid @enderror" id="des"  name="description" value="{{ old('des') }}" required autocomplete="des" autofocus></textarea>

       @error('des')
       <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    </div>
    <div class="form-group row">          
      <label for="seuil" class="col-md-4 col-form-label text-md-right">{{ __('Seuil Approvision') }}</label>
      <div class="col-md-6"> 
       <input type="number" min="0" class="form-control @error('seuil') is-invalid @enderror" id="seuil"  name="seuilApprovis" value="{{ old('seuil') }}" required autocomplete="seuil" autofocus>
       @error('seuil')
       <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>  
  <div class="form-group row">          
    <label for="alt" class="col-md-4 col-form-label text-md-right">{{ __('Stock alert') }}</label>
    <div class="col-md-6"> 
     <input type="number" min="0" class="form-control @error('alt') is-invalid @enderror" id="alt"  name="stockAlert"       
     value="{{ old('alt') }}" required autocomplete="alt" autofocus>
     @error('alt')
     <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>  
  <div class="form-group row">
        <label for="ves" class="col-md-4 col-form-label text-md-right">{{ __('Ves') }}</label>
            <div class="col-md-6">
              <select id="ves" type="text" class="form-control is-invalid @error('ves')  @enderror" name="ves" value="{{ old('ves') }}" required autocomplete="ves">
             <option>   </option>
             <option>Oui</option>
             <option>Non</option>                              
              </select>                 
                           

              @error('ves')
               <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
               </span>
              @enderror
             </div>                                              
      </div>                 

 <div class="form-group row">                  
   <label for="prix" class="col-md-4 col-form-label text-md-right">{{ __('PrixHt') }}</label>
        <div class="col-md-6">  
            <input type="number" min="0" class="form-control  @error('prix') is-invalid @enderror" id="ves" name="prixHt" value="{{ old('prix') }}" required autocomplete="prix" autofocus >
            @error('prix')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <input type="hidden" class="form-control @error('paysAt') is-invalid @enderror" id="paysAt"  name="paysAt" value="{{Auth::user()->paysAt}}" autofocus >
</div>
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

     <form id="myFormModif" method="POST" action="{{route('produitModifier')}}">
        {{method_field('patch')}} 
        {{csrf_field()}} 
    <div class="form-group row">          
    <label for="id_four" class="col-md-4 col-form-label text-md-right">{{ __('Société') }}</label>
    <div class="col-md-6"> 

      <select id="id_four"type="text" class="form-control" name="fournisseur_id"  required autocomplete="id_four" autofocus>                     
        <option> </option>  
        @foreach($fourn as $fourns)
        <option value="{{$fourns->id}}">{{$fourns->societe}}</option>
        @endforeach                                          

      </select>                      
      @error('id_four')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div> 
       
   <div class="form-group row">
          <label for="ref" class="col-md-4 col-form-label text-md-right">{{ __('Reference') }}</label>
          <div class="col-md-6">                      
           <input type="number"  min="0" class="form-control @error('ref') is-invalid @enderror" id="ref"  name="reference" value="{{ old('ref') }}" required autocomplete="ref" autofocus>
           @error('fin')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div> 
      </div> 

    <div class="form-group row">                  
        <label for="lib" class="col-md-4 col-form-label text-md-right">{{ __('Libéllé') }}</label>
        <div class="col-md-6"> 
         <input type="text" class="form-control @error('lib') is-invalid @enderror" id="lib"  name="libelleProd" value="{{ old('lib') }}" required autocomplete="lib" autofocus>
         @error('lib')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>     
    <div class="form-group row">          
      <label for="des" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
      <div class="col-md-6"> 
       <textarea class="form-control @error('des') is-invalid @enderror" id="des"  name="description" value="{{ old('des') }}" required autocomplete="des" autofocus></textarea>

       @error('des')
       <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    </div>
    <div class="form-group row">          
      <label for="seuil" class="col-md-4 col-form-label text-md-right">{{ __('Seuil Approvision') }}</label>
      <div class="col-md-6"> 
       <input type="number" min="0" class="form-control @error('seuil') is-invalid @enderror" id="seuil"  name="seuilApprovis" value="{{ old('seuil') }}" required autocomplete="seuil" autofocus>
       @error('seuil')
       <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>  
  <div class="form-group row">          
    <label for="alt" class="col-md-4 col-form-label text-md-right">{{ __('Stock alert') }}</label>
    <div class="col-md-6"> 
     <input type="number" min="0" class="form-control @error('alt') is-invalid @enderror" id="alt"  name="stockAlert"       
     value="{{ old('alt') }}" required autocomplete="alt" autofocus>
     @error('alt')
     <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>  
  <div class="form-group row">
        <label for="ves" class="col-md-4 col-form-label text-md-right">{{ __('Ves') }}</label>
            <div class="col-md-6">
              <select id="ves" type="text" class="form-control is-invalid @error('ves')  @enderror" name="ves" value="{{ old('ves') }}" required autocomplete="ves">
             <option>   </option>
             <option>Oui</option>
             <option>Non</option>                              
              </select>                 
                           

              @error('ves')
               <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
               </span>
              @enderror
             </div>                                              
      </div>                 

 <div class="form-group row">                  
   <label for="prix" class="col-md-4 col-form-label text-md-right">{{ __('PrixHt') }}</label>
        <div class="col-md-6">  
            <input type="number" min="0" class="form-control  @error('prix') is-invalid @enderror" id="prix" name="prixHt" value="{{ old('prix') }}" required autocomplete="prix" autofocus >
            @error('prix')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
</div>
<input id="cat_id" type="hidden" name="produits_id" value=" " > 
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
       <form method="POST" action="{{ route('produitSupp') }}">  
        {{method_field('delete')}}
        {{csrf_field()}}                             
      <div class="modal-body"> 

          <h2 class="text-center" style="color: red">Voulez vous vraiment supprimer</br> ce Produit?&hellip;</h2>

      </div>                             
        <input id="cat_id" type="hidden" name="produits_id" value=" " >       
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



          var table = $('#id_produit').DataTable( {


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

           "scrollY": "300px",
           "scrollX": "100%",
      // "scrollXInner": "110%"
      "scrollXInner": "100%",    
      "paging": true

    } );


          function hideAllColumns(){

            for(var i=0;i<10;i++){

             columns= table.column(i).visible(0);

           }
         }

         function showAllColumns(){

          for(var i=0;i<10;i++){

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

/*
///script ajout
  var x = document.getElementById("myForm");
  x.addEventListener("focusin", myFocusFunction); 


 function myFocusFunction() {


  var databack = $("#debut").val();
  var databack1 = $("#fin").val();
  var databack2 = $("#prix").val();


  if (+databack <= +databack1) {     

    var total = databack2 *((databack1- databack)+1);
    $('#prixTotal').val(total).css('color', 'black'); 

  }

  else{

   $('#prixTotal').val("Debut Serie doit être inferieur à Fin Serie").css('color', 'red'); 

 }

}  */
  /*document.getElementById("debut").style.backgroundColor = "yellow";
  document.getElementById("fin").style.backgroundColor = "yellow";
  document.getElementById("prixTotal").style.backgroundColor = "yellow";*/
  //var ma_variable = $(this).val() ;
   // $("#debut").change(function() { $("#prixTotal").val( $(this).val() ) } );


   //script Modifier

 /*  var y = document.getElementById("myFormModif");    

    $("#myFormModif").on("change", function() {

      var databack = $("#myFormModif #debut").val();
      var databack1 = $("#myFormModif #fin").val();
      var databack2 = $("#myFormModif #prix").val();

      if (+databack <= +databack1) {

        var total = databack2 *((databack1- databack)+1);
        $('#myFormModif #prixTotal').val(total).css('color', 'black');  

      }

      else{

       $('#myFormModif #prixTotal').val("Debut Serie doit être inferieur à Fin Serie").css('color', 'red'); 

     }
   })   
*/


  });




$('#supp').on('show.bs.modal',function(event){

        // console.log('test test test');

        var button=$(event.relatedTarget)

        var cat_id=button.data('catid')

           /* var title=button.data('mytitle')
           var description= button.data('mydescription')*/
           var modal=$(this)

           /* modal.find('.modal-body #title').val(title);
           modal.find('.modal-body #des').val(description);*/

           modal.find('.modal-body #cat_id').val(cat_id);

         })

$('#modifier').on('show.bs.modal',function(event){
          // console.log('test ooooooo');

          var button=$(event.relatedTarget)
          var ref=button.data('myref')
          var libelle=button.data('mylibelle')
          var des=button.data('mydes')
          var seuil=button.data('myseuil')
          var stockAl=button.data('mystockal')
          var ves=button.data('myves')
          var cat_id=button.data('catid')
          var id_four=button.data('myidfour')  
          var prixht=button.data('myprix')       
    

          

          /* var ves= button.data('ves')*/
          /*var cat_id=button.data('catid')*/

          var modal=$(this)
          modal.find('.modal-body #ref').val(ref);
          modal.find('.modal-body #lib').val(libelle);
          modal.find('.modal-body #des').val(des);
          modal.find('.modal-body #seuil').val(seuil); 
          modal.find('.modal-body #alt').val(stockAl); 
          modal.find('.modal-body #ves').val(ves);
          modal.find('.modal-body #prix').val(prixht);    
          modal.find('.modal-body #id_four').val(id_four);     
          modal.find('.modal-body #cat_id').val(cat_id);
          /* modal.find('.modal-body #ves').val(profile);*/
          /*modal.find('.modal-body #cat_id').vaajoutt_id):*/                  

        })


</script>


<!-- Denco@-->

@endsection
