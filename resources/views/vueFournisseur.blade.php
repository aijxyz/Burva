@extends('layouts.master')
@section('content')
<div class="container-fluid">

 


<select style="width: 200px;" name="toggle_column"  id="toggle_column">
  <option value="0">ID </option>
  <option value="1">Nom</option>
  <option value="2">Prenom</option>
  <option value="3">Sociéte</option>
  <option value="4">Civilité</option>
  <option value="5">Adresse</option>
  <option value="6">Pays</option>
  <option value="7">Telephone</option>
  <option value="8">Mobile</option>
  <option value="9">Fax</option>
  <option value="10">Email</option>
  <option value="11">Domaine Compétence</option>
  <option value="12">Délai Livraison</option>
  <option value="13">Condition Payement</option>
  <option value="14">Observation</option>  
  <option value="15">Modif/Supp</option>  
</select>


  <div class="col-md-12" style="margin-left:20px; margin-right:50px" >         
             
             <!-- /.row -->
        <div class="row mt-5">
              <div class="card">
              <div class="card-header">
            <h6 class="card-title">Fournisseur 
                <div class="card-tools" style="text-align: right;">
                  <button class="btn btn-success" data-toggle="modal" data-target="#ajout">Ajouter<i class="fa fa-user-plus"></i></button>
                </div>

            </h6>
                
              </div>   


            
              
              <!-- /.card-header -->
              <div class="table-responsive p-0">
                <table id="id_four" class="table table-bordered table-striped  display ">
                  <thead>
                    <tr> 
                    <th class="text-center">ID</th>                
                    <th class="text-center">Nom</th>
                    <th class="text-center">Prenom</th>
                    <th class="text-center">Sociéte</th>
                    <th class="text-center">Civilité</th>
                    <th class="text-center">Adresse</th>
                    <th class="text-center">Pays</th>
                    <th class="text-center">Telephone</th>
                    <th class="text-center">Mobile</th>
                    <th class="text-center">Fax</th>
                    <th class="text-center">Email</th>             
                    <th class="text-center">Domaine Compétence</th>
                    <th class="text-center">Delai livré</th>
                    <th class="text-center">Condition paye</th>
                    <th class="text-center">Observation</th>
                    <th class="text-center">Modif|Supp</th>                 
                  </tr>
                </thead>
                  <tbody>
                   @foreach($fournisseurs as $fournisseurscat)
                  <tr>   
                    <td class="text-center">{{$fournisseurscat->id}}</td>                 
                    <td class="text-center">{{$fournisseurscat->nom}}</td>                        
                    <td class="text-center">{{$fournisseurscat->prenom}}</td>     
                    <td class="text-center">{{$fournisseurscat->societe}}</td>  
                    <td class="text-center">{{$fournisseurscat->civilite}}</td> 
                    <td class="text-center">{{$fournisseurscat->adresse}}</td> 
                    <td class="text-center">{{$fournisseurscat->pays}}</td> 
                    <td class="text-center">{{$fournisseurscat->telephone}}</td> 
                    <td class="text-center">{{$fournisseurscat->mobile}}</td>  
                    <td class="text-center">{{$fournisseurscat->fax}}</td>
                    <td class="text-center">{{$fournisseurscat->email}}</td>                 
                    <td class="text-center">{{$fournisseurscat->domaineComp}}</td>
                    <td class="text-center">{{$fournisseurscat->delaiLivr}}</td>
                    <td class="text-center">{{$fournisseurscat->condiPaye}}</td>   
                    <td class="text-center">{{$fournisseurscat->observation}}</td> 
                    <td class="text-center"> 
                        <button class="btn btn-info" data-toggle="modal"
                         data-mynom="{{$fournisseurscat->nom}}"
                         data-myprenom="{{$fournisseurscat->prenom}}"
                         data-mysociete="{{$fournisseurscat->societe}}"
                         data-mycivilite="{{$fournisseurscat->civilite}}"
                         data-myadresse="{{$fournisseurscat->adresse}}"
                         data-mypays="{{$fournisseurscat->pays}}"
                         data-mytelephone="{{$fournisseurscat->telephone}}"
                         data-mymobile="{{$fournisseurscat->mobile}}"
                         data-myfax="{{$fournisseurscat->fax}}"
                         data-myemail="{{$fournisseurscat->email}}"
                         data-mydomaineComp="{{$fournisseurscat->domaineComp}}"
                         data-mydelailivr="{{$fournisseurscat->delaiLivr}}"
                         data-mycondipaye="{{$fournisseurscat->condiPaye}}"
                         data-myobservation="{{$fournisseurscat->observation}}"
                         data-catid="{{$fournisseurscat->id}}"
                         data-target="#modifier">
                         <i class="fa fa-edit"></i>
                        </button>
                         |                   
                        <button class="btn btn-danger" data-toggle="modal" data-target="#supp" data-catid="{{$fournisseurscat->id}}">
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

         <form id="myForm" method="POST" action="{{route('fournisseurAjout')}}">

              {{csrf_field()}} 

               <div class="form-row col-lg-12">


                  <div class="col-lg-6">
                  <div class="form-group">                   
                    <input type="text" class="form-control  @error('societe') is-invalid @enderror" id="societe" name="societe" placeholder="Société" value="{{ old('societe') }}"  required autocomplete="societe" autofocus>
                      @error('societe')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                  </div>
                 <div class="form-group">
                    <select type="text" class="form-control @error('civilite') is-invalid @enderror" name="civilite"  id="civilite" value="{{ old('civilite') }}"  required autocomplete="civilite" autofocus>
                      <option>Civilité</option>
                      <option>M</option>
                      <option>Mme</option>
                      <option>Mlle</option>
                    </select>
                      @error('civilite')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control  @error('nom') is-invalid @enderror" id="nom" name="nom"  placeholder="Nom" value="{{ old('nom') }}" required autocomplete="nom"autofocus >
                     @error('nom')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom"  name="prenom" placeholder="Prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>
                     @error('prenom')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                  </div>   
                  <div class="form-group">
                     <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse"  name="adresse" placeholder="Adresse" value="{{ old('adresse') }}" required autocomplete="adresse" autofocus>
                    @error('adresse')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>     
                    <div class="form-group">
                   <input type="text" class="form-control @error('pays') is-invalid @enderror" id="pays"  name="pays" placeholder="Pays" value="{{ old('pays') }}" required autocomplete="pays" autofocus>
                     @error('pays')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                  </div>

                  <div class="form-group">
                   <input type="text" class="form-control @error('delaiLivr') is-invalid @enderror" id="delaiLivr"  name="delaiLivr" placeholder="Délai_livraison" value="{{ old('delaiLivr') }}" required autocomplete="delaiLivr" autofocus >
                   @error('delaiLivr')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                   @enderror
                  </div>   

                  </div>

                <div class="col-lg-6">              
                                            
                
                  <div class="form-group">                  
                    <input type="text" class="form-control @error('domaineComp') is-invalid @enderror" id="domaineComp"  name="domaineComp" placeholder="Domaine_compétence" value="{{ old('domaineComp') }}" required autocomplete="domaineComp" autofocus>  
                    @error('domaineComp')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror                
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control  @error('condiPaye') is-invalid @enderror" id="condiPaye"  name="condiPaye" placeholder="Condition_payement" value="{{ old('condiPaye') }}" required autocomplete="condiPaye" autofocus>
                     @error('condiPaye')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror 
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control  @error('telephone') is-invalid @enderror" id="telephone"  name="telephone" placeholder="Téléphone" value="{{ old('telephone') }}" required autocomplete="telephone" autofocus>
                     @error('telephone')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                  </div>
                 <div class="form-group">
                  <input type="text" class="form-control  @error('mobile') is-invalid @enderror" id="mobile"  name="mobile" placeholder="Mobile" value="{{ old('mobile') }}"  required autocomplete="mobile" autofocus>
                    @error('mobile')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                </div>

                <div class="form-group">
                    <input type="text" class="form-control  @error('fax') is-invalid @enderror" id="fax"  name="fax" placeholder="Fax" value="{{ old('fax') }}" required autocomplete="fax" autofocus>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email"  name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                     @error('email')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                  </div>
                  
                </div>

                  <div class="col-lg-12">
                  <div class="form-group">
                    
                    <div class="form-group">
                    <textarea class="form-control @error('observation') is-invalid @enderror" id="observation"  name="observation" placeholder="Observation" value="{{ old('observation') }}"  required autocomplete="observation" autofocus></textarea>
                     @error('observation')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                  </div>
                </div>
                </div>
                 <input type="hidden" class="form-control @error('paysAt') is-invalid @enderror" id="paysAt"  name="paysAt" value="{{Auth::user()->paysAt}}" autofocus >
            <div class="modal-footer">                 
               <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"> {{ __('Valider') }}</button>
            </div>      
    </form> 
    </div>
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

         <form method="POST" action="{{route('fournisseurModifier')}}">
              {{method_field('patch')}} 
              {{csrf_field()}} 
               <div class="form-row col-lg-12">


                  <div class="col-lg-6">
                  <div class="form-group">                   
                    <input type="text" class="form-control  @error('societe') is-invalid @enderror" id="societe" name="societe" placeholder="Société" value="{{ old('societe') }}"  required autocomplete="societe" autofocus>
                      @error('societe')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                  </div>
                 <div class="form-group">
                    <select type="text" class="form-control @error('civilite') is-invalid @enderror" name="civilite"  id="civilite" value="{{ old('civilite') }}"  required autocomplete="civilite" autofocus>
                      <option>Civilité</option>
                      <option>M</option>
                      <option>Mme</option>
                      <option>Mlle</option>
                    </select>
                      @error('civilite')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control  @error('nom') is-invalid @enderror" id="nom" name="nom"  placeholder="Nom" value="{{ old('nom') }}" required autocomplete="nom"autofocus >
                     @error('nom')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom"  name="prenom" placeholder="Prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>
                     @error('prenom')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                  </div>   
                  <div class="form-group">
                     <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse"  name="adresse" placeholder="Adresse" value="{{ old('adresse') }}" required autocomplete="adresse" autofocus>
                    @error('adresse')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>     
                    <div class="form-group">
                   <input type="text" class="form-control @error('pays') is-invalid @enderror" id="pays"  name="pays" placeholder="Pays" value="{{ old('pays') }}" required autocomplete="pays" autofocus>
                     @error('pays')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                  </div>

                  <div class="form-group">
                   <input type="text" class="form-control @error('delaiLivr') is-invalid @enderror" id="delailivr"  name="delaiLivr" placeholder="Délai_livraison" value="{{ old('delaiLivr') }}" required autocomplete="delaiLivr" autofocus >
                   @error('delaiLivr')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                   @enderror
                  </div>        
                

                

                  </div>






                <div class="col-lg-6">              
                                            
                <div class="form-group">                  
                    <input type="text" class="form-control @error('domaineComp') is-invalid @enderror" id="domainecomp"  name="domaineComp" placeholder="Domaine_compétence" value="{{ old('domaineComp') }}" required autocomplete="domaineComp" autofocus>  
                    @error('domaineComp')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror                
                  </div>
                 <div class="form-group">
                    <input type="text" class="form-control  @error('condiPaye') is-invalid @enderror" id="condipaye"  name="condiPaye" placeholder="Condition_payement" value="{{ old('condiPaye') }}" required autocomplete="condiPaye" autofocus>
                     @error('condiPaye')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror 
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control  @error('telephone') is-invalid @enderror" id="telephone"  name="telephone" placeholder="Téléphone" value="{{ old('telephone') }}" required autocomplete="telephone" autofocus>
                     @error('telephone')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                  </div>
                 <div class="form-group">
                  <input type="text" class="form-control  @error('mobile') is-invalid @enderror" id="mobile"  name="mobile" placeholder="Mobile" value="{{ old('mobile') }}"  required autocomplete="mobile" autofocus>
                    @error('mobile')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                </div>

                <div class="form-group">
                    <input type="text" class="form-control  @error('fax') is-invalid @enderror" id="fax"  name="fax" placeholder="Fax" value="{{ old('fax') }}" required autocomplete="fax" autofocus>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email"  name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                     @error('email')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                  </div>
                  
                </div>





                  <div class="col-lg-12">
                  <div class="form-group">
                    
                    <div class="form-group">
                    <textarea class="form-control @error('observation') is-invalid @enderror" id="observation"  name="observation" placeholder="Observation" value="{{ old('observation') }}"  required autocomplete="observation" autofocus></textarea>
                     @error('observation')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                  </div>
                </div>
                </div>
        <input id="cat_id" type="hidden" name="fournisseurs_id" value=" " > 
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
     <form method="POST" action="{{ route('fournisseurSupp') }}">  
        {{method_field('delete')}}
        {{csrf_field()}}                             
             <div class="modal-body"> 

                <h2 class="text-center" style="color: red">Voulez vous vraiment supprimer</br> ce fournisseur?&hellip;</h2>

              </div>                             
       <input id="cat_id" type="hidden" name="fournisseurs_id" value=" " >       
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



    var table = $('#id_four').DataTable( {


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
    
      for(var i=0;i<16;i++){

         columns= table.column(i).visible(0);

         }
     }

  function showAllColumns(){
    
      for(var i=0;i<16;i++){

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







      /* var table = $('#id_four').DataTable( {

         "scrollY": "200px",
         "scrollX": "200px",
         "paging": true
    
    } );*/
 
   /* $('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();
 
        // Get the column API object
          var column = table.column( $(this).attr('data-column') );
 
        // Toggle the visibility
        column.visible( ! column.visible() );
    } );*/




          /*  });*/
        

    
 /* $('select').multipleSelect({
      selectAll: false

    });*/

/*function hideAllColumns(){
    
      for(var i=0;i<15;i++){

         columns= id_four.column(i).visible(0);

      }
}

function hideAllColumns(){
    
      for(var i=0;i<15;i++){

         columns= id_four.column(i).visible(1);

      }
}

jQuery(document).ready(function(){
  id_four = jQuery('#id_four').DataTable();
  jQuery('#toggle_column').multipleSelect({
    width: 200,
    onClick: function(view){
      var selectedItems=jQuery('#toggle_column').multipleSelect("getSelects");
        hideAllColumns();
        for(var i=0; i<selectedItems.length;i++){
          var s  = selectedItems[i];
          id_four.column(s).visible(1);
        }
        jQuery('#id_four').css('width,100%');
    },
  });
});*/




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
           var nom=button.data('mynom')
           var prenom=button.data('myprenom')
           var societe=button.data('mysociete')
           var civilite=button.data('mycivilite')
           var adresse=button.data('myadresse')
           var pays=button.data('mypays')
           var telephone=button.data('mytelephone')
           var mobile=button.data('mymobile')
           var fax=button.data('myfax')
           var email=button.data('myemail')          
           var domainecomp=button.data('mydomainecomp')
           var delailivr=button.data('mydelailivr')
           var condipaye=button.data('mycondipaye')
           var observation=button.data('myobservation')
           var cat_id=button.data('catid')
           /* var profil= button.data('profil')*/
            /*var cat_id=button.data('catid')*/

           var modal=$(this)
           modal.find('.modal-body #nom').val(nom);
           modal.find('.modal-body #prenom').val(prenom);
           modal.find('.modal-body #societe').val(societe);
           modal.find('.modal-body #civilite').val(civilite);
           modal.find('.modal-body #adresse').val(adresse);
           modal.find('.modal-body #pays').val(pays);
           modal.find('.modal-body #telephone').val(telephone);
           modal.find('.modal-body #mobile').val(mobile);
           modal.find('.modal-body #fax').val(fax);
           modal.find('.modal-body #email').val(email);
           modal.find('.modal-body #domainecomp').val(domainecomp);
           modal.find('.modal-body #delailivr').val(delailivr);
           modal.find('.modal-body #condipaye').val(condipaye);
           modal.find('.modal-body #observation').val(observation);
           modal.find('.modal-body #cat_id').val(cat_id);
           /* modal.find('.modal-body #profil').val(profile);*/
            /*modal.find('.modal-body #cat_id').vaajoutt_id):*/


                        
                        
                    
                         

        })


</script>

   
<!-- Denco@-->

@endsection
