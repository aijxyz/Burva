@extends('layouts.master')
@section('content')
<div class="container">


<select style="width: 200px;" name="toggle_column"  id="toggle_column">
  <option value="0">ID </option>
  <option value="1">Debut serie</option>
  <option value="2">Fin serie</option>
  <option value="3">Date sortie</option>   
  <option value="4">Centre</option> 
  <option value="5">Prix</option>
  <option value="6">Date d'entrée</option> 
  <option value="7">Prix Total</option>
  <option value="8">Modif/Supp</option>  
</select>


  <div class="col-md-12" style="margin-left:50px; margin-right:50px" >                   
             <!-- /.row -->
        <div class="row mt-5">         
            <div class="card">
              <div class="card-header">
            <h6 class="card-title">Sortie Bordereau
                <div class="card-tools" style="text-align: right;">
                  <button class="btn btn-success" data-toggle="modal" data-target="#ajout">Ajouter<i class="fa fa-user-plus"></i></button>
                </div>

            </h6>
                
              </div>            
              
              <!-- /.card-header -->
              <div class="table-responsive p-0">
                <table id="id_sortiebord" class="table table-bordered table-striped  display ">
                  <thead>
                    <tr> 
                    <th class="text-center">ID</th>            
                    <th class="text-center">Debut serie</th>
                    <th class="text-center">Fin serie</th>
                    <th class="text-center">Date sortie</th>
                    <th class="text-center">Centre</th>
                    <th class="text-center">Prix</th>                   
                    <th class="text-center">Date d'entrée</th>
                    <th class="text-center">Prix Total</th>                   
                    <th class="text-center">Modif|Supp</th>                 
                  </tr>
                </thead>
                  <tbody>
                   @foreach($sortieBordereaus as $sortieBordereauscat)
                  <tr>   
                    <td class="text-center">{{$sortieBordereauscat->id}}</td>               
                    <td class="text-center">{{$sortieBordereauscat->debutSerie}}</td>                        
                    <td class="text-center">{{$sortieBordereauscat->finSerie}}</td> 
                    <td class="text-center">{{$sortieBordereauscat->dateSortie}}</td>  
                    <td class="text-center">{{$sortieBordereauscat->centre}}</td> 
                    <td class="text-center">{{$sortieBordereauscat->prix}}</td>                   
                    <td class="text-center">{{$sortieBordereauscat->entreBordereau->dateEntre}}</td>
                    <td class="text-center">{{$sortieBordereauscat->prixTotal}}</td>
                    <td class="text-center"> 
                        <button class="btn btn-info" data-toggle="modal"
                         data-mydebut="{{$sortieBordereauscat->debutSerie}}"
                         data-myfin="{{$sortieBordereauscat->finSerie}}"
                         data-mydate="{{$sortieBordereauscat->dateSortie}}"
                         data-mycentre="{{$sortieBordereauscat->centre}}"
                         data-myprix="{{$sortieBordereauscat->prix}}"
                         data-myprixtotal="{{$sortieBordereauscat->prixTotal}}"
                         data-myidentrebord="{{$sortieBordereauscat->entreBordereau->id}}"                         
                         data-catid="{{$sortieBordereauscat->id}}"
                         data-target="#modifier">
                         <i class="fa fa-edit"></i>
                        </button>
                         |                   
                        <button class="btn btn-danger" data-toggle="modal" data-target="#supp" data-catid="{{$sortieBordereauscat->id}}">
                         <i class="fa fa-trash"></i>
                        </button>                                              
                    </td>                                   
                  </tr>
                  @endforeach  
                </tbody>              
             <tfoot>
             
            </tfoot>               
                </table>
                <div class="form-group row">
                  <div class="col-md-3"></div>
                  <div class="col-md-3"></div>
                  <div class="col-md-3"></div>              
                  <div class="col-md-3 border border-dark"><strong>Total entré: {{$som}}  </strong>FCFA</div>
                </div>
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ajoutLabel">Enregistrement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">

         <form id="myForm" method="POST" action="{{route('sortieBordereauAjout')}}">

              @csrf

                 <div class="form-group row">                  
                
                  <label for="debut" class="col-md-4 col-form-label text-md-right">{{ __('Debut serie') }}</label>
                    <div class="col-md-6">  
                    <input type="number"  min="0" class="form-control  @error('debut') is-invalid @enderror" id="debut" name="debutSerie"       value="{{ old('debut') }}" required autocomplete="debut" autofocus >
                     @error('debut')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="fin" class="col-md-4 col-form-label text-md-right">{{ __('Fin Serie') }}</label>
                    <div class="col-md-6">                      
                     <input type="number"  min="0" class="form-control @error('fin') is-invalid @enderror" id="fin"  name="finSerie" value="{{ old('fin') }}" required autocomplete="fin" autofocus>
                     @error('fin')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                  </div> 
                </div> 

                <div class="form-group row">                  
                  <label for="dateSortie" class="col-md-4 col-form-label text-md-right">{{ __('Date Sortie') }}</label>
                    <div class="col-md-6"> 
                     <input type="Date" class="form-control @error('dateSortie') is-invalid @enderror" id="dateSortie"  name="dateSortie" value="{{ old('dateSortie') }}" required autocomplete="dateSortie" autofocus>
                    @error('dateSortie')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    </div>
                </div>     
                <div class="form-group row">          
                  <label for="centre" class="col-md-4 col-form-label text-md-right">{{ __('Centre') }}</label>
                    <div class="col-md-6"> 
                   <input type="text" class="form-control @error('centre') is-invalid @enderror" id="centre"  name="centre"       value="{{ old('centre') }}" required autocomplete="centre" autofocus>
                     @error('centre')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                    </div>
                </div>  
                <div class="form-group row">          
                  <label for="prix" class="col-md-4 col-form-label text-md-right">{{ __('Prix Unitaire') }}</label>
                    <div class="col-md-6"> 
                   <input type="number"  min="0" class="form-control @error('prix') is-invalid @enderror" id="prix"  name="prix"       value="{{ old('prix') }}" required autocomplete="prix" autofocus>
                     @error('prix')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                    </div>
                </div>   
                <div class="form-group row">          
                  <label for="id_entrebord" class="col-md-4 col-form-label text-md-right">{{ __('Date entrée') }}</label>
                    <div class="col-md-6 "> 

                  <select id="id_entrebord" type="text" class="form-control" name="entreBordereau_id"  required autocomplete="id_entrebord" autofocus>                     
                    <option> </option>  
                     @foreach($entreBord as $entreBords)

                     <option value="{{$entreBords->id}}">{{$entreBords->dateEntre}}</option>

                     @endforeach                                          
                             
                  </select>                      
                     @error('id_entrebord')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                </div>
                </div> 

              <div class="form-group row">          
                <label for="prixTotal" class="col-md-3 col-form-label text-md-right">{{ __('Prix Total') }}</label>
                <div class="col-md-9"> 
                 <input type="text" class="form-control @error('prixTotal') is-invalid @enderror" id="prixTotal"  name="prixTotal"       
                 value="{{ old('prixTotal') }}" required autocomplete="prixTotal" autofocus>
                 @error('prixTotal')
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
        <button type="submit" class="btn btn-primary"> {{ __('Valider') }}</button>
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

         <form id="myFormModif" method="POST" action="{{route('sortieBordereauModifier')}}">
              {{method_field('patch')}} 
              {{csrf_field()}} 
              <div class="form-group row">                  
                
                  <label for="debut" class="col-md-4 col-form-label text-md-right">{{ __('Debut serie') }}</label>
                    <div class="col-md-6">  
                    <input type="number"  min="0" class="form-control  @error('debut') is-invalid @enderror" id="debut" name="debutSerie" value="{{ old('debut') }}" required autocomplete="nom"autofocus >
                     @error('debut')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="fin" class="col-md-4 col-form-label text-md-right">{{ __('Fin Serie') }}</label>
                    <div class="col-md-6">                     
                     <input type="number"  min="0" class="form-control @error('fin') is-invalid @enderror" id="fin"  name="finSerie" value="{{ old('fin') }}" required autocomplete="fin" autofocus>
                     @error('fin')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                  </div> 
                </div> 

                <div class="form-group row">                  
                  <label for="dateSortie" class="col-md-4 col-form-label text-md-right">{{ __('Date Sortie') }}</label>
                    <div class="col-md-6"> 
                     <input type="Date" class="form-control @error('dateSortie') is-invalid @enderror" id="dateSortie"  name="dateSortie" value="{{ old('dateSortie') }}" required autocomplete="dateSortie" autofocus>
                    @error('dateSortie')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    </div>
                </div>    
                 <div class="form-group row">          
                  <label for="centre" class="col-md-4 col-form-label text-md-right">{{ __('Centre') }}</label>
                    <div class="col-md-6"> 
                   <input type="text" class="form-control @error('centre') is-invalid @enderror" id="centre"  name="centre"       value="{{ old('centre') }}" required autocomplete="centre" autofocus>
                     @error('centre')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                    </div>
                </div> 
                <div class="form-group row">          
                  <label for="prix" class="col-md-4 col-form-label text-md-right">{{ __('Prix unitaire') }}</label>
                    <div class="col-md-6"> 
                   <input type="number"  min="0" class="form-control @error('prix') is-invalid @enderror" id="prix" name="prix"       value="{{ old('prix') }}" required autocomplete="prix" autofocus>
                     @error('prix')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                </div>
                </div>    
                <div class="form-group row">          
                  <label for="id_entrebord" class="col-md-4 col-form-label text-md-right">{{ __('Date Entrée') }}</label>
                    <div class="col-md-6"> 
                   
                    <select id="id_entrebord" onfocus='this.size=3;' onblur='this.size=1;' onchange='this.size=1; this.blur();'  type="text" class="form-control" name="entreBordereau_id"  required autocomplete="id_entrebord" autofocus>                     
                     
                     @foreach($entreBord as $entreBords)

                     <option value="{{$entreBords->id}}">{{$entreBords->dateEntre}}</option>

                     @endforeach                                          
                             
                    </select>   
                 
                     @error('id_entrebord')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                </div>
                </div>   
                 <div class="form-group row">          
                  <label for="prixTotal" class="col-md-3 col-form-label text-md-right">{{ __('Prix Total') }}</label>
                  <div class="col-md-9"> 
                   <input type="text" class="form-control @error('prixTotal') is-invalid @enderror" id="prixTotal"  name="prixTotal"       
                   value="{{ old('prixTotal') }}" required autocomplete="prixTotal" autofocus>
                   @error('prixTotal')
                   <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>               
            <input id="cat_id" type="hidden" name="sortieBordereau_id" value=" " >  
              </div> 
        
        <div class="modal-footer">                 
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"> {{ __('Modifier') }}</button>
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
     <form method="POST" action="{{ route('sortieBordereauSupp') }}">  
        {{method_field('delete')}}
        {{csrf_field()}}                             
             <div class="modal-body"> 

                <h2 class="text-center" style="color: red">Voulez vous vraiment supprimer</br> ce Bordereau?&hellip;</h2>

              </div>                             
       <input id="cat_id" type="hidden" name="sortieBordereau_id" value=" " >       
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



    var table = $('#id_sortiebord').DataTable({


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

}
  /*document.getElementById("debut").style.backgroundColor = "yellow";
  document.getElementById("fin").style.backgroundColor = "yellow";
  document.getElementById("prixTotal").style.backgroundColor = "yellow";*/
  //var ma_variable = $(this).val() ;
   // $("#debut").change(function() { $("#prixTotal").val( $(this).val() ) } );


   //script Modifier

   var y = document.getElementById("myFormModif");    

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
           var debut=button.data('mydebut')
           var fin=button.data('myfin')
           var dateSortie=button.data('mydate')  
           var centre=button.data('mycentre')
           var prix=button.data('myprix')
           var prixtotal=button.data('myprixtotal')
           var cat_id=button.data('catid')
           var id_entrebord=button.data('myidentrebord')                 
          

           /* var profil= button.data('profil')*/
            /*var cat_id=button.data('catid')*/

           var modal=$(this)
           modal.find('.modal-body #debut').val(debut);
           modal.find('.modal-body #fin').val(fin);
           modal.find('.modal-body #dateSortie').val(dateSortie);
           modal.find('.modal-body #centre').val(centre);   
           modal.find('.modal-body #prix').val(prix);    
           modal.find('.modal-body #prixTotal').val(prixtotal);    
           modal.find('.modal-body #id_entrebord').val(id_entrebord);     
           modal.find('.modal-body #cat_id').val(cat_id);
           /* modal.find('.modal-body #profil').val(profile);*/
            /*modal.find('.modal-body #cat_id').vaajoutt_id):*/                       
                        
                    
                         

        })

     


</script>

   
<!-- Denco@-->

@endsection
