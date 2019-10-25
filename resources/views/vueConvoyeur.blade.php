@extends('layouts.master')
@section('content')
<div class="container">

 <select style="width: 200px;" name="toggle_column"  id="toggle_column">
   <option value="0">Id </option>
   <option value="1">Matricule</option>
   <option value="2">Nom</option>
   <option value="3">Prénom</option>
   <option value="4">Date naissance</option>
   <option value="5">Fonction</option> 
   <option value="6">Date embauche</option> 
   <option value="7">Modif/Supp</option>  
 </select>

 
 <div class="col-md-12" style="margin-left:20px; margin-right:50px">                   
   <!-- /.row -->
   <div class="row mt-5">

    <div class="card">
      <div class="card-header">
        <h6 class="card-title">Convoyeurs
          <div class="card-tools" style="text-align: right;">
            <button class="btn btn-success" data-toggle="modal" data-target="#ajout">Ajouter<i class="fa fa-user-plus"></i></button>
          </div>

        </h6>

      </div>            

      <!-- /.card-header -->
      <div class="table-responsive p-0">
        <table id="id_convoyeur" class="table table-bordered table-striped  display ">
          <thead>
            <tr> 
              <th class="text-center">Id</th>              
              <th class="text-center">Matricule</th>
              <th class="text-center">Nom</th>
              <th class="text-center">Prénom</th>
              <th class="text-center">Date naissance</th>                   
              <th class="text-center">Fonction</th> 
              <th class="text-center">Date embauche</th>              
              <th class="text-center">Modif|Supp</th>                 
            </tr>
          </thead>
          <tbody>
           @foreach($convoyeurs as $convoyeur)
           <tr>   

             <td class="text-center">{{$convoyeur->id}}</td>                        
             <td class="text-center">{{$convoyeur->matricule}}</td>                        
             <td class="text-center">{{$convoyeur->nom}}</td>     
             <td class="text-center">{{$convoyeur->prenom}}</td>  
             <td class="text-center">{{$convoyeur->date_naissance}}</td> 
             <td class="text-center">{{$convoyeur->fonction}}</td> 
             <td class="text-center">{{$convoyeur->date_embauche}}</td>                  
             <td class="text-center"> 
              <button class="btn btn-info" data-toggle="modal"
              data-id="{{$convoyeur->id}}"
              data-matricule="{{$convoyeur->matricule}}"
              data-nom="{{$convoyeur->nom}}"
              data-prenom="{{$convoyeur->prenom}}"
              data-date_naissance="{{$convoyeur->date_naissance}}"
              data-fonction="{{$convoyeur->fonction}}" 
              data-date_embauche="{{$convoyeur->date_embauche}}"
              data-target="#modifier">
              <i class="fa fa-edit"></i>
            </button>
            |                   
            <button class="btn btn-danger" data-toggle="modal" data-target="#supp" data-catid="{{$convoyeur->id}}">
             <i class="fa fa-trash"></i>
           </button>                                              
         </td>                                   
       </tr>
       @endforeach  
     </tbody>              
     <tfoot>

     </tfoot>               
   </table>                
 </div>     
 <!-- /.card -->       

</div><!-- /.row -->
</div>          

</div>

</div>

<!-- Create Modal -->
<div class="modal fade" id="ajout" tabindex="-1" role="dialog" aria-labelledby="ajoutlLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ajoutLabel">Enregistrement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form id="myForm" method="POST" action="{{route('convoyeurAjout')}}">
        <div class="modal-body">
          @csrf
          <div class="form-group row">          
            <label for="id_four" class="col-md-4 col-form-label text-md-right">{{ __('Matricule') }}</label>
            <div class="col-md-6"> 
              <input type="text"  min="0" class="form-control @error('matri') is-invalid @enderror" id="matri"  name="matricule" value="{{ old('matri') }}" required autocomplete="matri" autofocus>                     
              @error('matri')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
          </div> 

          <div class="form-group row">
            <label for="mar" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
            <div class="col-md-6">                      
              <input type="text"  min="0" class="form-control @error('nom') is-invalid @enderror" id="nom"  name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>
              @error('nom')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div> 
          </div>       

          <div class="form-group row">
            <label for="mar" class="col-md-4 col-form-label text-md-right">{{ __('Prenom') }}</label>
            <div class="col-md-6">                      
              <input type="text"  min="0" class="form-control @error('prenom') is-invalid @enderror" id="prenom"  name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>
              @error('prenom')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div> 
          </div> 

          <div class="form-group row">          
            <label for="co" class="col-md-4 col-form-label text-md-right">{{ __('Date de naissance') }}</label>
            <div class="col-md-6"> 
              <input type="date" class="form-control @error('datenais') is-invalid @enderror" id="datenais"  name="date_naissance" value="{{ old('datenais') }}" required autocomplete="datenais" autofocus>
              @error('datenais')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
          </div>

          <div class="form-group row">          
            <label for="num" class="col-md-4 col-form-label text-md-right">{{ __('Fonction') }}</label>
            <div class="col-md-6"> 
              <input type="text" min="0" class="form-control @error('fonction') is-invalid @enderror" id="fonction"  name="fonction" value="{{ old('fonction') }}" required autocomplete="fonction" autofocus>
              @error('fonction')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
          </div>  

          <div class="form-group row">          
            <label for="dp" class="col-md-4 col-form-label text-md-right">{{ __('Date d\'embauche') }}</label>
            <div class="col-md-6"> 
              <input type="date" min="0" class="form-control @error('dateemb') is-invalid @enderror" id="dateemb"  name="date_embauche"       
              value="{{ old('dateemb') }}" required autocomplete="dateemb" autofocus>
              @error('dateemb')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
          </div>   
          <input type="hidden" id="paysAt"  name="paysAt" value="{{Auth::user()->paysAt}}">               
        </div> 
        <div class="modal-footer">                 
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button id="ad" type="submit" class="btn btn-primary"> {{ __('Valider') }}</button>
        </div> 
      </form>      
    </div>
  </div>
</div>
<!-- Create Modal /-->

<!-- Edit Modal -->
<div class="modal fade" id="modifier" tabindex="-1" role="dialog" aria-labelledby="modifierLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifierLabel">Modifier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form id="myFormModif" method="POST" action="{{route('convoyeurModifier')}}">
        <div class="modal-body">
          {{method_field('patch')}} 
          {{csrf_field()}} 
          <div class="form-group row">          
            <label for="id_four" class="col-md-4 col-form-label text-md-right">{{ __('Matricule') }}</label>
            <div class="col-md-6"> 
              <input type="text"  min="0" class="form-control @error('matri') is-invalid @enderror" id="matri"  name="matricule" value="{{ old('matri') }}" required autocomplete="matri" autofocus>                     
              @error('matri')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
          </div> 

          <div class="form-group row">
            <label for="mar" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
            <div class="col-md-6">                      
              <input type="text"  min="0" class="form-control @error('nom') is-invalid @enderror" id="nom"  name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>
              @error('nom')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div> 
          </div>       

          <div class="form-group row">
            <label for="mar" class="col-md-4 col-form-label text-md-right">{{ __('Prenom') }}</label>
            <div class="col-md-6">                      
              <input type="text"  min="0" class="form-control @error('prenom') is-invalid @enderror" id="prenom"  name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>
              @error('prenom')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div> 
          </div> 

          <div class="form-group row">          
            <label for="co" class="col-md-4 col-form-label text-md-right">{{ __('Date de naissance') }}</label>
            <div class="col-md-6"> 
              <input type="date" class="form-control @error('datenais') is-invalid @enderror" id="datenais"  name="date_naissance" value="{{ old('datenais') }}" required autocomplete="datenais" autofocus>
              @error('datenais')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
          </div>

          <div class="form-group row">          
            <label for="num" class="col-md-4 col-form-label text-md-right">{{ __('Fonction') }}</label>
            <div class="col-md-6"> 
              <input type="text" min="0" class="form-control @error('fonction') is-invalid @enderror" id="fonction"  name="fonction" value="{{ old('fonction') }}" required autocomplete="fonction" autofocus>
              @error('fonction')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
          </div>  

          <div class="form-group row">          
            <label for="dp" class="col-md-4 col-form-label text-md-right">{{ __('Date d\'embauche') }}</label>
            <div class="col-md-6"> 
              <input type="date" min="0" class="form-control @error('dateemb') is-invalid @enderror" id="dateemb"  name="date_embauche"       
              value="{{ old('dateemb') }}" required autocomplete="dateemb" autofocus>
              @error('dateemb')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
          </div>   
          <input type="hidden" id="paysAt"  name="paysAt" value="{{Auth::user()->paysAt}}"> 
          <input id="convoyeur_id" type="hidden" name="convoyeur_id" value="">              
        </div> 
        <div class="modal-footer">                 
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button id="ad" type="submit" class="btn btn-primary"> {{ __('Valider') }}</button>      
        </div>  
      </form>
    </div>
  </div>
</div>
<!-- Edit modal /-->


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
       <form method="POST" action="{{ route('convoyeurSupp') }}">  
        {{method_field('delete')}}
        {{csrf_field()}}                             
        <div class="modal-body"> 

          <h2 class="text-center" style="color: red">Voulez vous vraiment supprimer</br> ce Produit?&hellip;</h2>

        </div>                             
        <input id="cat_id" type="hidden" name="convoyeur_id" value="" >       
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



      var table = $('#id_convoyeur').DataTable( {


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

        for(var i=0;i<8;i++){

         columns= table.column(i).visible(0);

       }
     }

     function showAllColumns(){

      for(var i=0;i<8;i++){

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

 });




    $('#supp').on('show.bs.modal', function (event) {

      var button=$(event.relatedTarget);

      var cat_id=button.data('catid');

      var modal=$(this);

      modal.find('.modal-body #cat_id').val(cat_id);

    });

    $('#modifier').on('show.bs.modal', function (event) {

      var button=$(event.relatedTarget);
      var id=button.data('id');
      var matricule=button.data('matricule');
      var nom=button.data('nom');
      var prenom=button.data('prenom');
      var fonction=button.data('fonction');
      var date_naissance=button.data('date_naissance');
      var date_embauche=button.data('date_embauche');      

      var modal=$(this)
      modal.find('.modal-body #convoyeur_id').val(id);
      modal.find('.modal-body #matri').val(matricule);
      modal.find('.modal-body #nom').val(nom);
      modal.find('.modal-body #prenom').val(prenom); 
      modal.find('.modal-body #fonction').val(fonction); 
      modal.find('.modal-body #datenais').val(date_naissance); 
      modal.find('.modal-body #dateemb').val(date_embauche);    
    });
  </script>
  @endsection
