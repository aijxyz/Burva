@extends('layouts.master')
@if(Auth::user()->profil =='Administration')
@section('content')
 
<div class="container-fluid">

<select style="width: 200px;" name="toggle_column"  id="toggle_column">
  <option value="0">ID</option>
  <option value="1">Login</option>
  <option value="2">Profile</option>
  <option value="3">Pays</option>
  <option value="4">Supprimer</option>
  
</select>
   
        <div class="col-md-12" >         

                    @if (session('status')) 
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif              
             <!-- /.row -->
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
            <h6 class="card-title">Utilisateur 
                <div class="card-tools" style="text-align: right;">
                    <button class="btn btn-success" data-toggle="modal" data-target="#ajout">Ajouter<i class="fa fa-user-plus"></i></button>
                </div>

            </h6>
                
              </div>
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <table id="id_users" class="table table-bordered table-striped display">
                <thead>
                  <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Login</th>
                    <th class="text-center">Profile</th>
                    <th class="text-center">Pays</th>
                    <th class="text-center">Modif/Supp</th>                 
                  </tr>
                </thead>
                <tbody>
                   @foreach($users as $userscat)
                  <tr>
                    <td class="text-center">{{$userscat->id}}</td>
                    <td class="text-center">{{$userscat->name}}</td>                         
                    <td class="text-center">{{$userscat->profil}}</td>      
                    <td class="text-center">{{$userscat->paysAt}}</td>               
                    <td class="text-center"> 
                       <button class="btn btn-info" data-toggle="modal" data-target="#modifierprofil" 
                             data-myname="{{ $userscat->name }}"
                             data-mypassword="{{$userscat->password}}"
                             data-myprofil="{{$userscat->profil}}" 
                             data-mypaysat="{{$userscat->paysAt}}"                                                    
                             data-catid="{{$userscat->id}}">
                         <i class="fa fa-edit"></i>
                        </button>
                         |                     
                     <button class="btn btn-danger" data-toggle="modal" data-target="#supp" data-catid="{{$userscat->id}}">
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div><!-- /.row -->


    </div>

    <!-- Denco@-->


    <!-- Modal ajout -->

<div class="modal fade" id="ajout" tabindex="-1" role="dialog" aria-labelledby="ajoutlLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ajoutLabel">Enregistrement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <form method="POST" action="{{ route('register') }}">
        
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Compte') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                       

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                    @auth
                    @if(Auth::user()->paysAt == 'Internationnal' )
                        <div class="form-group row">
                            <label for="paysAt" class="col-md-4 col-form-label text-md-right">{{ __('Pays') }}</label>

                            <div class="col-md-6">
                             <select id="paysAt" type="text" class="form-control" name="paysAt" value="{{ old('paysAt') }}" required autocomplete="paysAt">  
                             <option> </option>                            
                            @foreach($paysget as $paysgets)

                             <option> {!!$paysgets->flag['flag-icon'] !!} {!! $paysgets->name->common !!} </option> 

                           @endforeach
                             </select>                         
                                @error('paysAt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                    @endif
                  @endauth
                         

                        <div class="form-group row">
                            <label for="profil" class="col-md-4 col-form-label text-md-right">{{ __('Profile') }}</label>
                            <div class="col-md-6">
                             <select id="profil" type="text" class="form-control" name="profil" value="{{ old('profil') }}" required autocomplete="profil">
                              <option>   </option>
                              <option>Administration</option>
                              <option>Commercial </option>
                              <option>Transport</option>
                              <option>Securité </option>
                              <option>Regulation</option>
                              <option>Logistique</option>
                              <option>Ressources humaines</option>     
                              <option>Comptabilité</option>
                              <option>Caisse</option>
                              <option>Directeur commercial</option>
                              <option>Directeur général</option>

                             </select>
                           

                                @error('profil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                     @auth
                      @if(Auth::user()->paysAt != 'Internationnal' )
                             <input type="hidden" class="form-control @error('paysAt') is-invalid @enderror" id="paysAt"  name="paysAt" value="{{Auth::user()->paysAt}}" autofocus >  
                      @endif
                    @endauth
                                                
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
<!-- Modifier -->
<div class="modal fade" id="modifierprofil" tabindex="-1" role="dialog" aria-labelledby="modifierprofil" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifierprofilLabel">Modifier Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <form method="POST" action="{{ route('profilModifier') }}">
        
                       {{method_field('patch')}} 
                       {{csrf_field()}} 

                        <div class="form-group row">
                          <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Compte') }}</label>
                            <div class="col-md-7">                              
                                <input id="name" type="hidden"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <input id="name" disabled class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                    @auth

                    @if(Auth::user()->paysAt == 'Internationnal' )
                        <div class="form-group row">
                            <label for="paysAt" class="col-md-3 col-form-label text-md-right">{{ __('Pays') }}</label>

                            <div class="col-md-7">
                             <select id="paysAt" type="text" class="form-control" name="paysAt" value="{{ old('paysAt') }}" required autocomplete="paysAt">                              
                            @foreach($paysget as $paysgets)

                             <option> {!!$paysgets->flag['flag-icon'] !!} {!! $paysgets->name->common !!} </option> 

                           @endforeach
                             </select>                         
                                @error('paysAt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                    @endif
                  @endauth
                         <div class="form-group row"> 
                          <label for="profil" class="col-md-3 col-form-label text-md-right">{{ __('Profile') }}</label>                          
                            <div class="col-md-7">
                             <select id="profil" type="text" class="form-control" name="profil" value="{{ old('profil') }}" required autocomplete="profil">
                              
                              <option>Administration</option>
                              <option>Comptabilité</option>
                              <option>Securité</option>
                              <option>Moyens genereaux</option>
                              <option>Commercial</option>
                              <option>Caisse</option>
                              <option>Regulation</option>
                              <option>Ressources humaines</option>
                              <option>Transport</option>
                             </select>
                           

                                @error('profil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>     
                           <input id="cat_id" type="hidden" name="users_id" value=" " > 
                         </div>                      

                        <div class="form-group row" >
                              <div class="col-md-6">
                                <input id="password" type="hidden"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="password-confirm" type="hidden"  class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                   
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
     <form method="POST" action="{{ route('userSupp') }}">  
        {{method_field('delete')}}
        {{csrf_field()}}                             
             <div class="modal-body"> 

                <h2 class="text-center" style="color: red">Voulez vous vraiment supprimer</br> cet utilisateur?&hellip;</h2>

              </div>                             
       <input id="cat_id" type="hidden" name="users_id" value=" " >       
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
    
   $(document).ready(function(){ 
    

    var table = $('#id_users').DataTable( {


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
         "scrollXInner": "100%",        
          "paging": true
    
       } );

   function hideAllColumns(){
    
      for(var i=0;i<5;i++){

         columns= table.column(i).visible(0);

         }
     }

  function showAllColumns(){
    
      for(var i=0;i<5;i++){

         columns= table.column(i).visible(1);

      }
    }

      $('#toggle_column').multipleSelect({
        
            onClick: function(view){

               var selectedItems=$('#toggle_column').multipleSelect("getSelects");
               hideAllColumns();
               for(var i=0;i<selectedItems.length;i++){
               var s  = selectedItems[i];
               table.column(s).visible(1);
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


 $('#modifierprofil').on('show.bs.modal',function(event){
          // console.log('test ooooooo');

           var button=$(event.relatedTarget)
           var name=button.data('myname')
           var password=button.data('mypassword')
           var profil=button.data('myprofil')
           var paysAt=button.data('mypaysat')         
           var cat_id=button.data('catid')
                    
          

           /* var profil= button.data('profil')*/
            /*var cat_id=button.data('catid')*/

           var modal=$(this)
           modal.find('.modal-body #name').val(name);
           modal.find('.modal-body #password').val(password);
           modal.find('.modal-body #profil').val(profil);  
           modal.find('.modal-body #paysAt').val(paysAt);           
           modal.find('.modal-body #cat_id').val(cat_id);
           /* modal.find('.modal-body #profil').val(profile);*/
            /*modal.find('.modal-body #cat_id').vaajoutt_id):*/                       
                        
                    
                         

        })
        


</script>

<!-- Denco@-->

@endsection
@else
<script type="text/javascript">window.location ="/home";</script>
@endif

