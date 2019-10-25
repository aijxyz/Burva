@extends('layouts.master')
@section('content')
<div class="container">

 <select style="width: 200px;" name="toggle_column"  id="toggle_column">
   <option value="0">Id </option>
   <option value="1">Site</option>
   <option value="2">Situation</option>
   <option value="3">Nom contact</option>
   <option value="4">Tel</option>
   <option value="5">Client</option>
   <option value="6">km bitume</option> 
   <option value="7">Numéro carte</option> 
   <option value="8">Tarif ht</option> 
   <option value="9">Tarif km bitume</option> 
   <option value="10">Tarif km piste</option> 
   <option value="11">Centre</option> 
   <option value="12">Objet</option> 
   <option value="13">Forfait mensuel</option> 
   <option value="14">Modif/Supp</option>  
 </select>

 
 <div class="col-md-12" style="margin-left:20px; margin-right:50px">                   
   <!-- /.row -->
   <div class="row mt-5">

    <div class="card">
      <div class="card-header">
        <h6 class="card-title">Sites
          <div class="card-tools" style="text-align: right;">
            <button class="btn btn-success" data-toggle="modal" data-target="#ajout">Ajouter<i class="fa fa-user-plus"></i></button>
          </div>

        </h6>

      </div>            

      <!-- /.card-header -->
      <div class="table-responsive p-0">
        <table id="id_site" class="table table-bordered table-striped  display ">
          <thead>
            <tr> 
              <th class="text-center">Id</th>              
              <th class="text-center">Site</th>
              <th class="text-center">Situation</th>
              <th class="text-center">Nom contact</th>                   
              <th class="text-center">Tel</th> 
              <th class="text-center">Client</th> 
              <th class="text-center">km bitume</th>  
              <th class="text-center">Numéro carte</th>  
              <th class="text-center">Tarif ht</th>  
              <th class="text-center">Tarif km bitume</th>  
              <th class="text-center">Tarif km piste</th>  
              <th class="text-center">Centre</th>  
              <th class="text-center">Objet</th>  
              <th class="text-center">Forfait mensuel</th>                   
              <th class="text-center">Modif|Supp</th>                 
            </tr>
          </thead>
          <tbody>
           @foreach($sites as $site)
           <tr>   

             <td class="text-center">{{$site->id}}</td>                        
             <td class="text-center">{{$site->site}}</td>                        
             <td class="text-center">{{$site->situation}}</td>     
             <td class="text-center">{{$site->nom_contact}}</td>  
             <td class="text-center">{{$site->tel}}</td> 
             <td class="text-center">{{$site->client_id}}</td> 
             <td class="text-center">{{$site->km_bitume}}</td>     
             <td class="text-center">{{$site->num_carte}}</td>     
             <td class="text-center">{{$site->tarif_ht}}</td>     
             <td class="text-center">{{$site->tarif_km_bitume}}</td>     
             <td class="text-center">{{$site->tarif_km_piste}}</td>     
             <td class="text-center">{{$site->centre}}</td>     
             <td class="text-center">{{$site->objet}}</td>     
             <td class="text-center">{{$site->forfait_mensuel}}</td>                        
             <td class="text-center"> 
              <button class="btn btn-info" data-toggle="modal"
              data-id="{{$site->id}}"
              data-site="{{$site->site}}"
              data-situation="{{$site->situation}}"
              data-nom_contact="{{$site->nom_contact}}"
              data-tel="{{$site->tel}}"
              data-client_id="{{$site->client_id}}" 
              data-km_bitume="{{$site->km_bitume}}"
              data-num_carte="{{$site->num_carte}}"
              data-tarif_ht="{{$site->tarif_ht}}"
              data-tarif_km_bitume="{{$site->tarif_km_bitume}}"
              data-tarif_km_piste="{{$site->tarif_km_piste}}"
              data-centre="{{$site->centre}}"
              data-objet="{{$site->objet}}"
              data-forfait_mensuel="{{$site->forfait_mensuel}}"
              data-target="#modifier">
              <i class="fa fa-edit"></i>
            </button>
            |                   
            <button class="btn btn-danger" data-toggle="modal" data-target="#supp" data-catid="{{$site->id}}">
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
      
      <form id="myForm" method="POST" action="{{route('siteAjout')}}">
        <div class="modal-body">
          @csrf
          <div class="form-row col-md-12">
            <div class="col-md-6">
              <div class="form-group"> 
                <input type="text" placeholder="Site" min="0" class="form-control @error('site') is-invalid @enderror" id="site"  name="site" value="{{ old('site') }}" required autocomplete="site" autofocus>                     
                @error('site')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              <div class="form-group">                      
                <input type="text" placeholder="Situation" min="0" class="form-control @error('situation') is-invalid @enderror" id="situation"  name="situation" value="{{ old('situation') }}" required autocomplete="situation" autofocus>
                @error('situation')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div> 
              <div class="form-group"> 
                <input type="text" placeholder="Nom Contact" class="form-control @error('nom_contact') is-invalid @enderror" id="nom_contact"  name="nom_contact" value="{{ old('nom_contact') }}" required autocomplete="nom_contact" autofocus>
                @error('nom_contact')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group"> 
                <input type="number" placeholder="Tel" min="0" class="form-control @error('tel') is-invalid @enderror" id="tel"  name="tel" value="{{ old('tel') }}" required autocomplete="tel" autofocus>
                @error('tel')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              <div class="form-group"> 
                <input type="number" placeholder="Km Bitume" min="0" class="form-control @error('km_bitume') is-invalid @enderror" id="km_bitume"  name="km_bitume" value="{{ old('km_bitume') }}" required autocomplete="km_bitume" autofocus>
                @error('km_bitume')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              <div class="form-group"> 
                <input type="number" placeholder="Numéro carte" min="0" class="form-control @error('num_carte') is-invalid @enderror" id="num_carte"  name="num_carte" value="{{ old('num_carte') }}" required autocomplete="num_carte" autofocus>
                @error('num_carte')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>  
            </div>
          </div>

          <div class="form-row col-md-12">
            <div class="col-md-6">
              <div class="form-group"> 
                <input type="number" placeholder="Tarif (HT)" min="0" class="form-control @error('tarif_ht') is-invalid @enderror" id="tarif_ht"  name="tarif_ht" value="{{ old('tarif_ht') }}" required autocomplete="tarif_ht" autofocus>
                @error('tarif_ht')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              <div class="form-group"> 
                <input type="number" placeholder="Tarif km bitume" min="0" class="form-control @error('tarif_km_bitume') is-invalid @enderror" id="tarif_km_bitume"  name="tarif_km_bitume" value="{{ old('tarif_km_bitume') }}" required autocomplete="tarif_km_bitume" autofocus>
                @error('tarif_km_bitume')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              <div class="form-group"> 
                <input type="number" placeholder="Tarif km piste" min="0" class="form-control @error('tarif_km_piste') is-invalid @enderror" id="tarif_km_piste"  name="tarif_km_piste" value="{{ old('tarif_km_piste') }}" required autocomplete="tarif_km_piste" autofocus>
                @error('tarif_km_piste')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              <div class="form-group"> 
                <select type="number" class="form-control" name="client_id" id="client_id" value="{{ old('client_id') }}" required autocomplete="client_id" autofocus>
                  <option value="" disabled selected>Client</option>
                  <option value="2">Nom2</option>
                  <option value="3">Nom3</option>
                </select>
                @error('tarif_km_bitume')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>   
              <input type="hidden" id="paysAt"  name="paysAt" value="{{Auth::user()->paysAt}}">               
            </div>

            <div class="col-md-6">
              <div class="form-group"> 
                <input type="text" placeholder="Centre" min="0" class="form-control @error('centre') is-invalid @enderror" id="centre"  name="centre" value="{{ old('centre') }}" required autocomplete="centre" autofocus>
                @error('centre')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div> 
              <div class="form-group">
                <select type="text" class="form-control" name="objet" id="objet" value="{{ old('objet') }}" required autocomplete="objet" autofocus>
                  <option value="" disabled selected>Objet</option>
                  <option value="ACCOMPAGNEMENT">ACCOMPAGNEMENT</option>
                  <option value="APPROVISIONNEMENT">APPROVISIONNEMENT</option>
                  <option value="COLLECTE">COLLECTE</option>
                  <option value="COMPTAGE+TRI">COMPTAGE+TRI</option>
                  <option value="GARDE DE FONDS">GARDE DE FONDS</option>
                  <option value="GESTION ATM">GESTION ATM</option>
                  <option value="MAD CAISSIERE/OPERATION">MAD CAISSIERE/OPERATION</option>
                  <option value="MAD CAISSIERE/PAIE SUR">MAD CAISSIERE/PAIE SUR</option>
                  <option value="TDF 1">TDF 1</option>
                  <option value="TDF VB">TDF VB</option>
                </select>
                @error('objet')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              <div class="form-group"> 
                <input type="number" placeholder="Forfait Mensuel" min="0" class="form-control @error('forfait_mensuel') is-invalid @enderror" id="forfait_mensuel"  name="forfait_mensuel" value="{{ old('forfait_mensuel') }}" required autocomplete="forfait_mensuel" autofocus>
                @error('forfait_mensuel')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
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
      
      <form id="myFormModif" method="POST" action="{{route('siteModifier')}}">
        <div class="modal-body">
          {{method_field('patch')}} 
          {{csrf_field()}} 
          <div class="form-row col-md-12">
            <div class="col-md-6">
              <div class="form-group"> 
                <input type="text" placeholder="Site" min="0" class="form-control @error('site') is-invalid @enderror" id="site"  name="site" value="" required autocomplete="site" autofocus>                     
                @error('site')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              <div class="form-group">                      
                <input type="text" placeholder="Situation" min="0" class="form-control @error('situation') is-invalid @enderror" id="situation"  name="situation" value="" required autocomplete="situation" autofocus>
                @error('situation')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div> 
              <div class="form-group"> 
                <input type="text" placeholder="Nom Contact" class="form-control @error('nom_contact') is-invalid @enderror" id="nom_contact"  name="nom_contact" value="" required autocomplete="nom_contact" autofocus>
                @error('nom_contact')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group"> 
                <input type="number" placeholder="Tel" min="0" class="form-control @error('tel') is-invalid @enderror" id="tel"  name="tel" value="" required autocomplete="tel" autofocus>
                @error('tel')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              <div class="form-group"> 
                <input type="number" placeholder="Km Bitume" min="0" class="form-control @error('km_bitume') is-invalid @enderror" id="km_bitume"  name="km_bitume" value="" required autocomplete="km_bitume" autofocus>
                @error('km_bitume')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              <div class="form-group"> 
                <input type="number" placeholder="Numéro carte" min="0" class="form-control @error('num_carte') is-invalid @enderror" id="num_carte"  name="num_carte" value="" required autocomplete="num_carte" autofocus>
                @error('num_carte')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>  
            </div>
          </div>

          <div class="form-row col-md-12">
            <div class="col-md-6">
              <div class="form-group"> 
                <input type="number" placeholder="Tarif (HT)" min="0" class="form-control @error('tarif_ht') is-invalid @enderror" id="tarif_ht"  name="tarif_ht" value="" required autocomplete="tarif_ht" autofocus>
                @error('tarif_ht')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              <div class="form-group"> 
                <input type="number" placeholder="Tarif km bitume" min="0" class="form-control @error('tarif_km_bitume') is-invalid @enderror" id="tarif_km_bitume"  name="tarif_km_bitume" value="" required autocomplete="tarif_km_bitume" autofocus>
                @error('tarif_km_bitume')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              <div class="form-group"> 
                <input type="number" placeholder="Tarif km piste" min="0" class="form-control @error('tarif_km_piste') is-invalid @enderror" id="tarif_km_piste"  name="tarif_km_piste" value="" required autocomplete="tarif_km_piste" autofocus>
                @error('tarif_km_piste')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              <div class="form-group"> 
                <select type="number" class="form-control" name="client_id" id="client_id" value="" required autocomplete="client_id" autofocus>
                  <option value="" disabled selected>Client</option>
                  <option value="2">Nom2</option>
                  <option value="3">Nom3</option>
                </select>
                @error('tarif_km_bitume')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>                
            </div>

            <div class="col-md-6">
              <div class="form-group"> 
                <input type="text" placeholder="Centre" min="0" class="form-control @error('centre') is-invalid @enderror" id="centre"  name="centre" value="" required autocomplete="centre" autofocus>
                @error('centre')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div> 
              <div class="form-group">
                <select type="text" class="form-control" name="objet" id="objet" value="" required autocomplete="objet" autofocus>
                  <option value="" disabled selected>Objet</option>
                  <option value="ACCOMPAGNEMENT">ACCOMPAGNEMENT</option>
                  <option value="APPROVISIONNEMENT">APPROVISIONNEMENT</option>
                  <option value="COLLECTE">COLLECTE</option>
                  <option value="COMPTAGE+TRI">COMPTAGE+TRI</option>
                  <option value="GARDE DE FONDS">GARDE DE FONDS</option>
                  <option value="GESTION ATM">GESTION ATM</option>
                  <option value="MAD CAISSIERE/OPERATION">MAD CAISSIERE/OPERATION</option>
                  <option value="MAD CAISSIERE/PAIE SUR">MAD CAISSIERE/PAIE SUR</option>
                  <option value="TDF 1">TDF 1</option>
                  <option value="TDF VB">TDF VB</option>
                </select>
                @error('objet')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              <div class="form-group"> 
                <input type="number" placeholder="Forfait Mensuel" min="0" class="form-control @error('forfait_mensuel') is-invalid @enderror" id="forfait_mensuel"  name="forfait_mensuel" value="" required autocomplete="forfait_mensuel" autofocus>
                @error('forfait_mensuel')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
          </div>
          <input type="hidden" id="paysAt"  name="paysAt" value="{{Auth::user()->paysAt}}"> 
          <input id="site_id" type="hidden" name="site_id" value="">              
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
       <form method="POST" action="{{ route('siteSupp') }}">  
        {{method_field('delete')}}
        {{csrf_field()}}                             
        <div class="modal-body"> 

          <h2 class="text-center" style="color: red">Voulez vous vraiment supprimer</br> ce Produit?&hellip;</h2>

        </div>                             
        <input id="cat_id" type="hidden" name="sites_id" value="" >       
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



      var table = $('#id_site').DataTable( {


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

        for(var i=0;i<15;i++){

         columns= table.column(i).visible(0);

       }
     }

     function showAllColumns(){

      for(var i=0;i<15;i++){

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
      var site=button.data('site');
      var situation=button.data('situation');
      var nom_contact=button.data('nom_contact');
      var tel=button.data('tel');
      var client_id=button.data('client_id');
      var km_bitume=button.data('km_bitume');      
      var num_carte=button.data('num_carte');      
      var tarif_ht=button.data('tarif_ht');      
      var tarif_km_bitume=button.data('tarif_km_bitume');      
      var tarif_km_piste=button.data('tarif_km_piste');      
      var centre=button.data('centre');      
      var objet=button.data('objet');      
      var forfait_mensuel=button.data('forfait_mensuel');       

      var modal=$(this)
      modal.find('.modal-body #site_id').val(id);
      modal.find('.modal-body #site').val(site);
      modal.find('.modal-body #situation').val(situation);
      modal.find('.modal-body #nom_contact').val(nom_contact); 
      modal.find('.modal-body #tel').val(tel); 
      modal.find('.modal-body #client_id').val(client_id); 
      modal.find('.modal-body #km_bitume').val(km_bitume);    
      modal.find('.modal-body #num_carte').val(num_carte);    
      modal.find('.modal-body #tarif_ht').val(tarif_ht);    
      modal.find('.modal-body #tarif_km_bitume').val(tarif_km_bitume);    
      modal.find('.modal-body #tarif_km_piste').val(tarif_km_piste);    
      modal.find('.modal-body #centre').val(centre);    
      modal.find('.modal-body #objet').val(objet);    
      modal.find('.modal-body #forfait_mensuel').val(forfait_mensuel);    
    });
  </script>
  @endsection
