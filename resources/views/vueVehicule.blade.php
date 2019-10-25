@extends('layouts.master')
@section('content')
<div class="container">

 <select style="width: 200px;" name="toggle_column"  id="toggle_column">
   <option value="0">Id </option>
   <option value="1">Immatriculation</option>
   <option value="2">Marque</option>
   <option value="3">Type</option>
   <option value="4">Code</option>
   <option value="5">DPMC</option> 
   <option value="6">Numero chassis</option> 
   <option value="7">Date d'aquisition</option> 
   <option value="8">Modif/Supp</option>  
 </select>

 
 <div class="col-md-12" style="margin-left:20px; margin-right:50px">                   
   <!-- /.row -->
   <div class="row mt-5">

    <div class="card">
      <div class="card-header">
        <h6 class="card-title">Véhicules
          <div class="card-tools" style="text-align: right;">
            <button class="btn btn-success" data-toggle="modal" data-target="#ajout">Ajouter<i class="fa fa-user-plus"></i></button>
          </div>

        </h6>

      </div>            

      <!-- /.card-header -->
      <div class="table-responsive p-0">
        <table id="id_vehicule" class="table table-bordered table-striped  display ">
          <thead>
            <tr> 
              <th class="text-center">Id</th>              
              <th class="text-center">Immatriculation</th>
              <th class="text-center">Marque</th>
              <th class="text-center">Type</th>
              <th class="text-center">Code</th>                   
              <th class="text-center">DPMC</th> 
              <th class="text-center">Numero chassis</th> 
              <th class="text-center">Date d'aquisition</th>                        
              <th class="text-center">Modif|Supp</th>                 
            </tr>
          </thead>
          <tbody>
           @foreach($vehicules as $vehicule)
           <tr>   

             <td class="text-center">{{$vehicule->id}}</td>                        
             <td class="text-center">{{$vehicule->immatriculation}}</td>                        
             <td class="text-center">{{$vehicule->marque}}</td>     
             <td class="text-center">{{$vehicule->type}}</td>  
             <td class="text-center">{{$vehicule->code}}</td> 
             <td class="text-center">{{$vehicule->DPMC}}</td> 
             <td class="text-center">{{$vehicule->numChasis}}</td>
             <td class="text-center">{{$vehicule->dateAquisition}}</td>      
             <!-- <td class="text-center">{{$vehicule->photoVehicule}}</td> -->               
             <td class="text-center"> 
              <button class="btn btn-info" data-toggle="modal"
              data-myimm="{{$vehicule->immatriculation}}"
              data-mymark="{{$vehicule->marque}}"
              data-mytype="{{$vehicule->type}}"
              data-mycode="{{$vehicule->code}}"
              data-mydpmc="{{$vehicule->DPMC}}"
              data-mynum="{{$vehicule->numChasis}}" 
              data-mydate="{{$vehicule->dateAquisition}}"                                     
              data-myphoto="{{$vehicule->photoVehicule}}"
              data-vehid="{{$vehicule->id}}"
              data-target="#modifier">
              <i class="fa fa-edit"></i>
            </button>
            |                   
            <button class="btn btn-danger" data-toggle="modal" data-target="#supp" data-catid="{{$vehicule->id}}">
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

       <form id="myForm" method="POST" action="{{route('vehiculeAjout')}}">

        @csrf
        <div class="form-group row">          
          <label for="id_four" class="col-md-4 col-form-label text-md-right">{{ __('Immatriculation') }}</label>
          <div class="col-md-6"> 
           <input type="text"  min="0" class="form-control @error('imm') is-invalid @enderror" id="imm"  name="immatriculation" value="{{ old('imm') }}" required autocomplete="imm" autofocus>                     
           @error('imm')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div> 

      <div class="form-group row">
        <label for="mar" class="col-md-4 col-form-label text-md-right">{{ __('Marque') }}</label>
        <div class="col-md-6">                      
         <input type="text"  min="0" class="form-control @error('mar') is-invalid @enderror" id="mar"  name="marque" value="{{ old('mar') }}" required autocomplete="mar" autofocus>
         @error('mar')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div> 
    </div> 

    <div class="form-group row">                  
      <label for="ty" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
      <div class="col-md-6"> 
       <select type="text" class="form-control" name="type" id="ty" value="{{ old('ty') }}" required autocomplete="ty" autofocus>
         <option value="VL">VL</option>
         <option value="VB">VB</option>
         <option value="Admin">Admin</option>
       </select>
       @error('ty')
       <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>     
  <div class="form-group row">          
    <label for="co" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>
    <div class="col-md-6"> 
     <input type="text" class="form-control @error('co') is-invalid @enderror" id="co"  name="code" value="{{ old('co') }}" required autocomplete="co" autofocus>
     @error('co')
     <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>
<div class="form-group row">          
  <label for="num" class="col-md-4 col-form-label text-md-right">{{ __('Numéro chassis') }}</label>
  <div class="col-md-6"> 
   <input type="number" min="0" class="form-control @error('num') is-invalid @enderror" id="num"  name="numChasis" value="{{ old('num') }}" required autocomplete="num" autofocus>
   @error('num')
   <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
</div>  
<div class="form-group row">          
  <label for="dp" class="col-md-4 col-form-label text-md-right">{{ __('DPMC') }}</label>
  <div class="col-md-6"> 
   <input type="number" min="0" class="form-control @error('dp') is-invalid @enderror" id="dp"  name="DPMC"       
   value="{{ old('dp') }}" required autocomplete="dp" autofocus>
   @error('dp')
   <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
</div>  
<div class="form-group row">
  <label for="da" class="col-md-4 col-form-label text-md-right">{{ __('Date d\'aquisition') }}</label>
  <div class="col-md-6">
    <input id="da" type="date" class="form-control is-invalid @error('da')  @enderror" name="dateAquisition" value="{{ old('dateAquisition') }}" required autocomplete="da">
    @error('da')
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

<!-- Edit modal -->
<div class="modal fade" id="modifier" tabindex="-1" role="dialog" aria-labelledby="modifierLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifierLabel">Modifier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form id="myFormModif" method="POST" action="{{route('vehiculeModifier')}}">
        <div class="modal-body">
          {{method_field('patch')}} 
          {{csrf_field()}} 
          <div class="form-group row">          
            <label for="id_four" class="col-md-4 col-form-label text-md-right">{{ __('Immatriculation') }}</label>
            <div class="col-md-6"> 
              <input type="text"  min="0" class="form-control @error('imm') is-invalid @enderror" id="imm"  name="immatriculation" value="{{ old('imm') }}" required autocomplete="imm" autofocus>                     
              @error('imm')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
          </div> 

          <div class="form-group row">
            <label for="mar" class="col-md-4 col-form-label text-md-right">{{ __('Marque') }}</label>
            <div class="col-md-6">                      
              <input type="text"  min="0" class="form-control @error('mar') is-invalid @enderror" id="mar"  name="marque" value="{{ old('mar') }}" required autocomplete="mar" autofocus>
              @error('mar')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div> 
          </div> 

          <div class="form-group row">                  
            <label for="ty" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
            <div class="col-md-6"> 
              <select type="text" class="form-control" name="type" id="ty" value="{{ old('ty') }}" required autocomplete="ty" autofocus>
                <option value="VL">VL</option>
                <option value="VB">VB</option>
                <option value="Admin">Admin</option>
              </select>
              @error('ty')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
          </div>  

          <div class="form-group row">          
            <label for="co" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>
            <div class="col-md-6"> 
              <input type="text" class="form-control @error('co') is-invalid @enderror" id="co"  name="code" value="{{ old('co') }}" required autocomplete="co" autofocus>
              @error('co')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
          </div>

          <div class="form-group row">          
            <label for="num" class="col-md-4 col-form-label text-md-right">{{ __('Numéro chassis') }}</label>
            <div class="col-md-6"> 
              <input type="number" min="0" class="form-control @error('num') is-invalid @enderror" id="num"  name="numChasis" value="{{ old('num') }}" required autocomplete="num" autofocus>
              @error('num')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
          </div>  

          <div class="form-group row">          
            <label for="dp" class="col-md-4 col-form-label text-md-right">{{ __('DPMC') }}</label>
            <div class="col-md-6"> 
              <input type="number" min="0" class="form-control @error('dp') is-invalid @enderror" id="dp" name="DPMC" value="{{ old('dp') }}" required autocomplete="dp" autofocus>
              @error('dp')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
          </div>  

          <div class="form-group row">
            <label for="da" class="col-md-4 col-form-label text-md-right">{{ __('Date d\'aquisition') }}</label>
            <div class="col-md-6">
              <input id="da" type="date" class="form-control is-invalid @error('da')  @enderror" name="dateAquisition" value="{{ old('dateAquisition') }}" required autocomplete="da">
              @error('da')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>                                             
          </div>  
          <input type="hidden" id="paysAt"  name="paysAt" value="{{Auth::user()->paysAt}}">      
          <input id="vehicules_id" type="hidden" name="vehicules_id" value="">           
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
       <form method="POST" action="{{ route('vehiculeSupp') }}">  
        {{method_field('delete')}}
        {{csrf_field()}}                             
        <div class="modal-body"> 

          <h2 class="text-center" style="color: red">Voulez vous vraiment supprimer</br> ce Produit?&hellip;</h2>

        </div>                             
        <input id="cat_id" type="hidden" name="vehicules_id" value=" " >       
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



      var table = $('#id_vehicule').DataTable( {


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

 });



/*
    $('#supp').on('show.bs.modal', function (event) {

      var button=$(event.relatedTarget);

      var cat_id=button.data('catid');

      var modal=$(this);

      modal.find('.modal-body #cat_id').val(cat_id);

    });

    $('#modifier').on('show.bs.modal', function (event) {

      var button=$(event.relatedTarget);
      var imm=button.data('myimm');
      var mar=button.data('mymark');
      var ty=button.data('mytype');
      var code=button.data('mycode');
      var dm=button.data('mydpmc');
      var num=button.data('mynum');
      var da=button.data('mydate');
      var id=button.data('vehid');       

      var modal=$(this)
      modal.find('.modal-body #imm').val(imm);
      modal.find('.modal-body #mar').val(mar);
      modal.find('.modal-body #ty').val(ty);
      modal.find('.modal-body #co').val(code); 
      modal.find('.modal-body #dp').val(dm); 
      modal.find('.modal-body #num').val(num);
      modal.find('.modal-body #da').val(da);    
      modal.find('.modal-body #vehicules_id').val(id);     
    });*/
  </script>
  @endsection
