<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS CDN -->
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">-->
    <!-- Our Custom CSS -->
    <!--<link href="{{ asset('css/style21.css') }}" rel="stylesheet">-->
    <!-- Scrollbar Custom CSS -->
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">-->
   <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">-->
    <!--<link href="https://unpkg.com/multiple-select@1.3.1/dist/multiple-select.css" rel="stylesheet">-->

    <!-- css local  -->
    <link href="{{ asset('css/style21.css') }}" rel="stylesheet">
     <link href="{{ asset('DataTables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquerymCustomScrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('multiple-select/dist/multiple-select.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap-select\dist\css\bootstrap-select.css') }}" rel="stylesheet">
    <!--<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">-->

  <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    

    <!-- Font Awesome JS -->
   <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>-->
    <!--<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>-->

    <!-- script local-->

   <script src="{{ asset('js/fontawesomeSolid.js') }}" defer></script>
   <script src="{{ asset('js/fontawesome.js') }}" defer></script>  

    <h6 style="color:#f3f5f7">{{session_start()}}</h6>
     @if (session('status'))
     <script type="text/javascript">window.location ="/login";</script>
     <div class="alert alert-success" role="alert">
     {{ session('status') }}
     </div>
    @endif 




</head>

<body style="background-color: #f3f5f7;">

    <nav id="sidebar">
            <div class="sidebar-header">
               <img src="icons/logoblanc.png" alt="Italian Trulli" style="max-width: 100%;">
           </div>

           <ul class="list-unstyled components">
<!--                 <p>Dummy Heading</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li> -->
              @auth               
                <li><a href='home'><img src="{{ asset('icons/accueil.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;"><span>Accueil</span></a>
                </li>          

              @if (Auth::user()->profil==='Administration')
               

                <li>
                    <a href="/userList"><img src="{{ asset('icons/operatrice.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;">Utilisateur</a>
                </li>

                <li>
                   <a href='convoyeur.php'><img src="{{ asset('icons/convoyeur.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;"><span>Convoyeur</span>
                  </a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="{{ asset('icons/client.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;">Client</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Client</a>
                        </li>
                        <li>
                    <a href="#">Confirmation réception client</a>
                        </li>
                    </ul>
                </li>
              
                   <li>
                    <a href="#pageSubmen" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="{{ asset('icons/caisse.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;">Caisse</a>
                    <ul class="collapse list-unstyled" id="pageSubmen">
                        <li>
                            <a href="#">Caisse / Entrée de fond</a>
                        </li>
                        <li>
                            <a href="#">Caisse / Sortie de fond</a>
                        </li>
                        <li>
                            <a href="#">Entrée de caisse</a>
                        </li>
                        <li>
                            <a href="#">Sortie de caisse</a>
                        </li>
                        <li>
                            <a href="#">Entrée carnet de caisse</a>
                        </li>
                        <li>
                            <a href="#">Sortie carnet de caisse</a>
                        </li>
                        <li>
                            <a href="#">Dépenses</a>
                        </li>
                        <li>
                            <a href="#">Autres dépenses</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenuu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="{{ asset('icons/depot.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;">Dépot</a>
                    <ul class="collapse list-unstyled" id="pageSubmenuu">
                        <li>
                            <a href="#">Dépot de scelle</a>
                        </li>
                        <li>
                            <a href="#">Dépot de securipack</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenuuu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="{{ asset('icons/personnel.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;">Personnel</a>
                    <ul class="collapse list-unstyled" id="pageSubmenuuu">
                        <li>
                            <a href="#">Personnel</a>
                        </li>
                        <li>
                            <a href="#">Heure supplémentaire</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><img src="{{ asset('icons/operatrice.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;">Opératice</a>
                </li>
                <li>
                    <a href="#"><img src="{{ asset('icons/comptage.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;">Comptage</a>
                </li>
                <li>
                    <a href="#"><img src="{{ asset('icons/vigilometrie.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;">Vigilometrie</a>
                </li>
                <li>
                    <a href="#pageSubmenuuui" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="{{ asset('icons/carburant.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;">Carburant</a>
                    <ul class="collapse list-unstyled" id="pageSubmenuuui">
                        <li>
                            <a href="#">Carte carburant</a>
                        </li>
                        <li>
                            <a href="#">Chargement carburant</a>
                        </li>
                    </ul>
                </li> 
                <li>
                    <a href="#"><img src="{{ asset('icons/degradation.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;">Dégradation</a>
                </li>
                <li>
                    <a href="#pageSubmenuuuii" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="{{ asset('icons/dab.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;">DAB</a>
                    <ul class="collapse list-unstyled" id="pageSubmenuuuii">
                        <li>
                            <a href="/entreMaintenanceList">Entrée fiche de maintenace DAB</a>
                        </li>
                        <li>
                            <a href="/sortieMaintenanceList">Sortie fiche de maintenace DAB</a>
                        </li>
                         <li>
                            <a href="/entreApprovisList">Entrée approvisionnement DAB</a>
                        </li>
                        <li>
                            <a href="/sortieApprovisList">Sortie approvisionnement DAB</a>
                        </li>
                    </ul>
                </li> 
                <li>
                    <a href="#pageSubmenuuuiii" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="{{ asset('icons/msg.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;">Régulateur</a>
                    <ul class="collapse list-unstyled" id="pageSubmenuuuiii">
                        <li>
                            <a href="#">Entrée de fond</a>
                        </li>
                        <li>
                            <a href="#">Sortie de fond</a>
                        </li>
                    </ul>
                </li> 
                <li>
                    <a href="#ageSubmenuuuii" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="{{ asset('icons/dab.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;">Tournée</a>
                    <ul class="collapse list-unstyled" id="ageSubmenuuuii">
                        <li>
                            <a href="#">Conteneur</a>
                        </li>
                        <li>
                            <a href="#">Départ tournée</a>
                        </li>
                        <li>
                            <a href="#">Arrivée tournée</a>
                        </li>
                        <li>
                            <a href="#geSubmenuuui" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Etat Tournée</a>
                            <ul class="collapse list-unstyled" id="geSubmenuuui">
                                <li>
                                    <a href="#">Carburant tournée</a>
                                </li>
                                <li>
                                    <a href="#">Ticket carburant</a>
                                </li>
                                <li>
                                    <a href="#">Carburant comptant</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#Submenuuuiii" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="{{ asset('icons/msg.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;">Fournitures</a>
                    <ul class="collapse list-unstyled" id="Submenuuuiii">
                        <li>
                            <a href="/entreBordereauList">Entrée bordereau</a>
                        </li>
                        <li>
                            <a href="/sortieBordereauList">Sortie bordereau</a>
                        </li>
                        <li>
                            <a href="/entreSecuripackList">Entrée sécuripack</a>
                        </li>
                        <li>
                            <a href="/sortieSecuripackList">Sortie sécuripack</a>
                        </li>
                     
                      <!--  <li>
                            <a href="#">Bon de commande</a>
                        </li>-->
                        <li>
                            <a href="/entreBonComdList">Entrée bon de commande</a>
                        </li>
                        <li>
                            <a href="/sortieBonComdList">Sortie bon de commande</a>
                        </li>
                        <li>
                            <a href="/entreTicketList">Entrée ticket visiteur</a>
                        </li>
                        <li>
                            <a href="/sortieTicketList">Sortie ticket visiteur</a>
                        </li>
                    </ul>
                </li> 
                <li>
                    <a href="#enuuui" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="{{ asset('icons/msg.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;">Intervention véhicule</a>
                    <ul class="collapse list-unstyled" id="enuuui">
                        <li>
                            <a href="#">Véhicule / panne de défaillance constatée</a>
                        </li>
                        <li>
                            <a href="#">Véhicule / panne de défaillance effectuée</a>
                        </li>
                        <li>
                            <a href="#">Dépense</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#iii" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="{{ asset('icons/msg.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;">Factures</a>
                    <ul class="collapse list-unstyled" id="iii">
                        <li>
                            <a href="#">Factures</a>
                        </li>
                        <li>
                            <a href="#">Règlement facture</a>
                        </li>
                    </ul>
                </li> 
                <li>
                    <a href="#"><img src="{{ asset('icons/operatrice.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;">Bordereau</a>
                </li>
                <li>
                    <a href="#i" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="{{ asset('icons/msg.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;">Produit/stock</a>
                    <ul class="collapse list-unstyled" id="i">
                        <li>
                            <a href="/entreStockList">Entrée en stock</a>
                        </li>
                        <li>
                            <a href="/sortieStockList">Sortie en stock</a>
                        </li>
                        <li>
                            <a href="/produitList">Produits</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/fournisseurList"><img src="{{ asset('icons/operatrice.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;">Fournisseur</a>
                </li>
                <li>
                    <a href="#iop" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="{{ asset('icons/msg.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;">Véhicules</a>
                    <ul class="collapse list-unstyled" id="iop">
                        <li>
                            <a href="#">Véhicule</a>
                        </li>
                        <li>
                            <a href="#">Entretient véhicule</a>
                        </li> 
                    </ul>
                </li>

                @elseif(Auth::user()->profil==='Commercial')         
                   
                <li><a href='convoyeur.php'><img src="{{ asset('icons/convoyeur.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;"><span>Convoyeur</span></a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="{{ asset('icons/client.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;">Client</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Client</a>
                        </li>
                        <li>
                            <a href="#">Confirmation réception client</a>
                        </li>
                    </ul>
                </li>
                <li>
                     <a href="/fournisseurList"><img src="{{ asset('icons/operatrice.png') }}" alt="Italian Trulli" style="height: 17px;margin: -1px 7px;">Fournisseur</a>
                </li>

                @else


               {{"BOUJOUR!"}}


          @endif

           





          @endauth


            </ul>
<!--                 <ul class="list-unstyled CTAs">
                    <li>
                        <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                    </li>
                    <li>
                        <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                    </li>
                </ul> -->
            </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light" >
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-dark">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                  
                    <!-- Left Side Of Navbar -->
                   

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto ">
                        <!-- Authentication Links -->                        
                       
                            <li class="nav-item ">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}  <i class="fa fa-user-shield"></i><span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                            @if (Route::has('register'))
                                 

                            @endif          
                            <button class="btn" data-toggle="modal"
                             data-myname="{{ Auth::user()->name }}"
                             data-mypassword="{{Auth::user()->password}}"
                             data-myprofil="{{Auth::user()->profil}}"                                                     
                             data-catid="{{Auth::user()->id}}"
                             data-target="#modifieruser">
                             <i class="fa fa-edit"></i> {{ __('Modifier Compte') }}
                           </button>                                       
                                
                             
                              <a class="dropdown-item text-center" href="{{ route('logout') }}" 
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <strong> <i class="fa fa-sign-out-alt"></i> {{ __('Deconnexion') }}</strong>
                              </a>
                            
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                              </form>                     
                    <!-- Denco@ -->
                         </div>
                      </li>
                        
                    </ul>
                </div>

              </nav>

            <div class="container" >
                @yield('content')
            </div>
        </div>
    </div>



<div class="modal fade" id="modifieruser" tabindex="-1" role="dialog" aria-labelledby="modifieruser" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifieruserLabel">Modifier Mon Compte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <form method="POST" action="{{ route('userModifier') }}">
        
                       {{method_field('patch')}} 
                       {{csrf_field()}} 

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

                         <div class="form-group row">                           
                            <div class="col-md-6">
                             <input id="profil" onfocus='this.size=3;' onblur='this.size=1;' onchange='this.size=1; this.blur();' type="hidden" class="form-control is-invalid @error('profil')  @enderror" name="profil" value="{{ old('profil') }}" required autocomplete="profil">                       
                                @error('profil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>  
                           <input id="cat_id" type="hidden" name="users_id" value=" " > 
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

    <!-- jQuery CDN - Slim version (=without AJAX) -->
   <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <!-- Popper.JS -->
        <!-- jQuery Custom Scroller CDN -->
  <!-- jQuery CDN - Slim version (=without AJAX) -->
  <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->

  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>-->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
   <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>-->

   <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>-->

   <!-- script local -->

    <script src="{{ asset('js/jquerymCustomScrollbarconcat.js') }}" defer></script>
    <!--<script src="{{ asset('js/ajaxpopper.js') }}"></script>-->
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}" defer></script>
    <script src="{{ asset('DataTables/js/jquery.dataTables.min.js') }}" defer></script> 
    <script src="{{ asset('bootstrap-select/dist/js/bootstrap-select.js') }}" defer></script>


 

    

    
    <script type="text/javascript">
        $(document).ready(function () {    


            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');


            });
        });

 $('#modifieruser').on('show.bs.modal',function(event){
          // console.log('test ooooooo');

           var button=$(event.relatedTarget)
           var name=button.data('myname')
           var password=button.data('mypassword')
           var profil=button.data('myprofil')             
           var cat_id=button.data('catid')
                    
          

           /* var profil= button.data('profil')*/
            /*var cat_id=button.data('catid')*/

           var modal=$(this)
           modal.find('.modal-body #name').val(name);
           modal.find('.modal-body #password').val(password);
           modal.find('.modal-body #profil').val(profil);            
           modal.find('.modal-body #cat_id').val(cat_id);
           /* modal.find('.modal-body #profil').val(profile);*/
            /*modal.find('.modal-body #cat_id').vaajoutt_id):*/                       
                        
                    
                         

        })

</script>


@include('sweetalert::alert')


  
</body>

</html>