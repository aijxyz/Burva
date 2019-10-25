 @extends('layouts.master')
 @section('content')

 @if(Auth::user()->profil == 'Commercial')
 @php
 $confirmation = 0;
 @endphp

 @elseif(Auth::user()->profil == 'Directeur commercial')
 @php
 $confirmation = 1;
 @endphp

 @elseif(Auth::user()->profil == 'Directeur général')
 @php
 $confirmation = 3;

 @endphp
 @endif

 <div class="container">



   <select style="width: 200px;" name="toggle_column"  id="toggle_column">
    <option value="0">Id </option>
    <option value="1">Nom client</option>
    <option value="2">situation Geo</option>
    <option value="3">Telephone</option> 
   <option value="4">Regime Impot </option>
   <option value="5">Boite Postale</option>    
   <option value="6">Ville</option>   
   <option value="7">Rc</option>  
    <option value="8">Ncc</option>
    <option value="9">Fonction</option>
    <option value="10">Nom contact</option>
    <option value="11">telephone portable</option> 
   <option value="12">email</option>
   <option value="13">Sect activité</option>    
   <option value="14">N contrat</option> 
   <option value="15">Duree</option> 
    <option value="16">Forfait Mensuel </option>
    <option value="17">TDF VB</option>
    <option value="18">TDF I</option>
    <option value="19">Mad Caisse</option> 
   <option value="20">Collecte </option>
   <option value="21">Grand Fond</option>    
   <option value="22">Compatage Tri</option>   
   <option value="23">Gestion Atm</option>  
    <option value="24">Banque centrale</option>
    <option value="25">Agence Principale</option>
    <option value="26">Agence secondaire</option>
    <option value="27">Permanent</option> 
    <option value="28">Appel</option>  
    <option value="29">Cash point</option>    
   <option value="30">Intra Muros</option>   
    <option value="31">Extra Muros</option>   
   <option value="32">Pu Securite</option>   
   <option value="33">Pu Scelle</option>
   <option value="34">Modif/Supp</option>
   </select>


   <div class="col-md-12" style="margin-left:15px; margin-right:50px">                   
     <!-- /.row -->
     <div class="row mt-5">

      <div class="card">
        <div class="card-header">
          <h6 class="card-title">client
            <div class="card-tools" style="text-align: right;">
              <button class="btn btn-success" data-toggle="modal" data-target="#ajout">Ajouter<i class="fa fa-user-plus"></i></button>
            </div>

          </h6>

        </div>            

        <!-- /.card-header -->
        <div class="table-responsive p-0">
          <table id="id_clients" class="table table-bordered table-striped  display ">
            <thead>
              <tr> 
               <th class="text-center">Id</th>             
              <th class="text-center">Nom client</th>               
              <th class="text-center">situation Geo</th>
              <th class="text-center">Telephone</th> 
              <th class="text-center">Regime Impot</th>
              <th class="text-center">Boite Postale</th>
              <th class="text-center">Ville</th> 
              <th class="text-center">Rc</th>   
              <th class="text-center">Ncc</th>               
              <th class="text-center">fonction</th>
              <th class="text-center">Nom contact</th> 
              <th class="text-center">telephone portable</th>
              <th class="text-center">email</th>
              <th class="text-center">Sect activité</th> 
              <th class="text-center">N contrat</th> 
              <th class="text-center">Duree</th>               
              <th class="text-center">Forfait Mensuel</th>
              <th class="text-center">TDF VB</th> 
              <th class="text-center">TDF I</th>
              <th class="text-center">Mad Caisse</th>
              <th class="text-center">Collecte</th> 
              <th class="text-center">Grand Fond</th>
              <th class="text-center">Compatage Tri</th>               
              <th class="text-center">Gestion Atm</th>
              <th class="text-center">Banque centrale</th> 
              <th class="text-center">Agence Principale</th>
              <th class="text-center">Agence secondaire</th>
              <th class="text-center">Cash point</th> 
              <th class="text-center">Permanent</th>
              <th class="text-center">Appel</th>              
              <th class="text-center">Intra Muros</th>
              <th class="text-center">Extra Muros</th>
              <th class="text-center">Pu Securite</th> 
              <th class="text-center">Pu Scelle</th>
              <th class="text-center">Modif|Supp</th>                 
              </tr>
            </thead>
            <tbody>


             @foreach($clients as $clientscat)
             <tr>   
             <td class="text-center">{{$clientscat->id}}</td> 
             <td class="text-center">{{$clientscat->nomClient}}</td>                                    
             <td class="text-center">{{$clientscat->situationGeo}}</td> 
             <td class="text-center">{{$clientscat->telephone}}</td>                          
             <td class="text-center">{{$clientscat->regimeImpot}}</td>     
             <td class="text-center">{{$clientscat->boitePost}}</td>              
             <td class="text-center">{{$clientscat->ville}}</td>  
             <td class="text-center">{{$clientscat->rc}}</td>    
             <td class="text-center">{{$clientscat->ncc}}</td>                                               
             <td class="text-center">{{$clientscat->fonct}}</td>
             <td class="text-center">{{$clientscat->nomContact}}</td>                       
             <td class="text-center">{{$clientscat->telPortable}}</td>     
             <td class="text-center">{{$clientscat->email}}</td>              
             <td class="text-center">{{$clientscat->secteurAct}}</td>  
             <td class="text-center">{{$clientscat->numContrat}}</td> 
             <td class="text-center">{{$clientscat->duree}}</td> 
             <td class="text-center">{{$clientscat->forfaitMens}}</td>                                    
             <td class="text-center">{{$clientscat->tdfvb}}</td> 
             <td class="text-center">{{$clientscat->tdfI}}</td>                          
             <td class="text-center">{{$clientscat->madcaisse}}</td>     
             <td class="text-center">{{$clientscat->collecte}}</td>              
             <td class="text-center">{{$clientscat->gardFond}}</td>  
             <td class="text-center">{{$clientscat->comptageTri}}</td>   
             <td class="text-center">{{$clientscat->gestionAtm}}</td> 
             <td class="text-center">{{$clientscat->BanqueCentr}}</td>                                    
             <td class="text-center">{{$clientscat->agencePrincip}}</td> 
             <td class="text-center">{{$clientscat->agenceSecond}}</td>                          
             <td class="text-center">{{$clientscat->cashPoint}}</td>     
             <td class="text-center">{{$clientscat->permanent}}</td>              
             <td class="text-center">{{$clientscat->appel}}</td>  
             <td class="text-center">{{$clientscat->intraMuros}}</td>  
             <td class="text-center">{{$clientscat->extraMuros}}</td>              
             <td class="text-center">{{$clientscat->puSecuri}}</td>  
             <td class="text-center">{{$clientscat->puScelle}}</td>                   
               <td class="text-center"> 

                @if ($clientscat->niveauAuto > $confirmation)
                <button class="btn btn-info" data-toggle="modal" data-mynomclient="{{$clientscat->nomClient}}" data-catid="{{$clientscat->id}}"data-target="#message">         
                  <i class="fa fa-envelope-square"></i>
                </button>
       

              @elseif($confirmation == 3)
              <button class="btn btn-info">                           
              <i class="fa fa-edit"></i>
              </button>
               |
              <button class="btn btn-danger">
              <i class="fa fa-trash"></i>
              </button>  
              @else
              <button class="btn btn-info" data-toggle="modal"
              data-mynomclient="{{$clientscat->nomClient}}"
              data-mysituat="{{$clientscat->situationGeo}}"
              data-mytel="{{$clientscat->telephone}}"
              data-myregime="{{$clientscat->regimeImpot}}"
              data-myboite="{{$clientscat->boitePost}}"
              data-mypays="{{$clientscat->pays}}"
              data-myville="{{$clientscat->ville}}"
              data-myrc="{{$clientscat->rc}}"
              data-mync="{{$clientscat->ncc}}"
              data-myfonct="{{$clientscat->fonct}}"
              data-mytelportable="{{$clientscat->telPortable}}"
              data-myemail="{{$clientscat->email}}"
              data-mysecteuract="{{$clientscat->secteurAct}}"
              data-mynumcontrat="{{$clientscat->numContrat}}"
              data-mynomcontact="{{$clientscat->nomContact}}"
              data-myduree="{{$clientscat->duree}}"
              data-myforfaitmens="{{$clientscat->forfaitMens}}"
              data-mytdfvb="{{$clientscat->tdfvb}}"
              data-mytdfi="{{$clientscat->tdfI}}"
              data-mymadcaisse="{{$clientscat->madcaisse}}"
              data-mycollecte="{{$clientscat->collecte}}"
              data-mygardfond="{{$clientscat->gardFond}}"
              data-mycomptagetri="{{$clientscat->comptageTri}}"
              data-mygestionatm="{{$clientscat->gestionAtm}}"
              data-mybanquecentr="{{$clientscat->BanqueCentr}}"
              data-myagenceprincip="{{$clientscat->agencePrincip}}"
              data-myagencesecond="{{$clientscat->agenceSecond}}"
              data-mycashpoint="{{$clientscat->cashPoint}}"
              data-mypermanent="{{$clientscat->permanent}}"
              data-myappel="{{$clientscat->appel}}"
              data-myintramuros="{{$clientscat->intraMuros}}"
              data-myextramuros="{{$clientscat->extraMuros}}"
              data-mypusecuri="{{$clientscat->puSecuri}}"
              data-mypuscelle="{{$clientscat->puScelle}}" 
              data-mydateeffet="{{$clientscat->dateEffet}}"   
              data-myportef="{{$clientscat->porteF}}"          
              data-catid="{{$clientscat->id}}"
              data-target="#modifier">             
              <i class="fa fa-edit"></i>
            </button>
              |                             
            <button class="btn btn-danger" data-toggle="modal" data-target="#supp" data-catid="{{$clientscat->id}}">
             <i class="fa fa-trash"></i>
            </button>    
            @endif        
                                                    
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

</div>

<!-- Modal ajout -->

<div class="modal fade" id="ajout" tabindex="-1" role="dialog" aria-labelledby="ajoutlLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ajoutLabel">Enregistrement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">

       <form id="myForm" method="POST" action="{{route('clientAjout')}}">

        {{csrf_field()}} 
        <fieldset class="border p-2">
          <legend  class="w-auto">Informations generales</legend> 
          <div class="form-row col-lg-12">


            <div class="col-lg-6">


              <div class="form-group">                                    
                <input type="text" class="form-control  @error('nomClient') is-invalid @enderror" id="nomClient" name="nomClient" placeholder="Nom client" value="{{ old('nomClient') }}"  required autocomplete="nomClient" autofocus>
                @error('nomClient')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" class="form-control @error('situationGeo') is-invalid @enderror" name="situationGeo"  id="situationGeo" value="{{ old('situationGeo') }}" 
                placeholder="Situation Géo"
                required autocomplete="situationGeo" autofocus>
                @error('situationGeo')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" class="form-control  @error('telephone') is-invalid @enderror" id="telephone" name="telephone"  placeholder="Telephone" value="{{ old('telephone') }}" required autocomplete="telephone"autofocus >
                @error('telephone')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" class="form-control @error('regimeImpot') is-invalid @enderror" id="regimeImpot"  name="regimeImpot" placeholder="Regime Impot" value="{{ old('regimeImpot') }}" required autocomplete="regimeImpot" autofocus>
                @error('regimeImpot')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div> 

            </div> 

            <div class="col-lg-6">
              <div class="form-group">
                <input type="text" class="form-control  @error('boitePost') is-invalid @enderror" id="boitePost" name="boitePost"  placeholder="Boite Postale" value="{{ old('boitePost') }}" required autocomplete="boitePost"autofocus >
                @error('boitePost')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" class="form-control @error('ville') is-invalid @enderror" id="ville"  name="ville" placeholder="Ville" value="{{ old('ville') }}" required autocomplete="ville" autofocus>
                @error('regimeImpot')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div> 

              <div class="form-group">
                <input type="text" class="form-control  @error('rc') is-invalid @enderror" id="rc" name="rc"  placeholder="RC" value="{{ old('rc') }}" required autocomplete="rc"autofocus >
                @error('rc')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" class="form-control @error('ncc') is-invalid @enderror" id="ncc"  name="ncc" placeholder="NCC" value="{{ old('ncc') }}" required autocomplete="ncc" autofocus>
                @error('ncc')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

            </div>

          </div>

        </fieldset> 


        <fieldset class="border p-2">
          <legend  class="w-auto">Contact</legend> 
          <div class="form-row col-lg-12">


            <div class="col-lg-6">


              <div class="form-group">                                    
                <input type="text" class="form-control  @error('nomContact') is-invalid @enderror" id="nomContact" name="nomContact" placeholder="Nom Contact" value="{{ old('nomContact') }}"  required autocomplete="nomContact" autofocus>
                @error('nomContact')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" id="email" value="{{ old('email') }}"  required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" class="form-control  @error('porteF') is-invalid @enderror" id="porteF" name="porteF"  placeholder="Porte feuille client" value="{{ old('porteF') }}" required autocomplete="porteF"autofocus >
                @error('porteF')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div> 

            <div class="col-lg-6">
             <div class="form-group">
              <input type="text" class="form-control  @error('fonct') is-invalid @enderror" id="fonct" name="fonct"  placeholder="Fonction" value="{{ old('fonct') }}" required autocomplete="fonct"autofocus >
              @error('fonct')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <input type="text" class="form-control @error('telPortable') is-invalid @enderror" id="telPortable"  name="telPortable" placeholder="Tel Portable" value="{{ old('telPortable') }}" required autocomplete="telPortable" autofocus>
              @error('telPortable')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div> 

            <div class="form-group">
              <input type="text" class="form-control @error('secteurAct') is-invalid @enderror" id="secteurAct"  name="secteurAct" placeholder="Secteur activité" value="{{ old('secteurAct') }}" required autocomplete="secteurAct" autofocus>
              @error('secteurAct')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

          </div>

        </div>

      </fieldset> 

      <fieldset class="border p-2">
        <legend  class="w-auto">Contrat</legend> 
        <div class="form-row col-lg-12">


          <div class="col-lg-2">


            <div class="form-group">                                    
              <input type="text" class="form-control  @error('numContrat') is-invalid @enderror" id="numContrat" name="numContrat" placeholder="N Contrat" value="{{ old('numContrat') }}"  required autocomplete="numContrat" autofocus>
              @error('numContrat')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>


            <div class="form-group">               
              <input type="date" class="form-control  @error('dateEffet') is-invalid @enderror" id="dateEffet" name="dateEffet" placeholder="Date effet" value="{{ old('dateEffet') }}"  required autocomplete="dateEffet" autofocus>
              @error('dateEffet')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">                                    
              <input type="number" class="form-control  @error('duree') is-invalid @enderror" id="duree" name="duree" placeholder="Durée" value="{{ old('duree') }}"  required autocomplete="duree" autofocus>
              @error('duree')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>


            <div class="form-group">               
              <input type="number" class="form-control  @error('forfaitMens') is-invalid @enderror" id="forfaitMens" name="forfaitMens" placeholder="Forfait Mens" value="{{ old('forfaitMens') }}"  required autocomplete="forfaitMens" autofocus>
              @error('forfaitMens')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

          </div>


          <div class="col-lg-2">


            <div class="col-auto my-1 form-group">
              <div class="form-check">
                <input class="form-check-input @error('tdfvb') is-invalid @enderror" type="checkbox" id="tdfvb" name="tdfvb" value="1" autocomplete="tdfvb" autofocus>
                <label class="form-check-label" for="tdfvb">
                  TDF VB
                </label>
              </div>
              @error('tdfvb')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>



            <div class="col-auto my-1 form-group">
              <div class="form-check">
                <input class="form-check-input @error('tdfI') is-invalid @enderror" type="checkbox" id="tdfI" name="tdfI" value="1" autocomplete="tdfI" autofocus>
                <label class="form-check-label" for="tdfI">
                  TDF VI
                </label>
              </div>
              @error('tdfI')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>


            <div class="col-auto my-1 form-group">
              <div class="form-check">
                <input class="form-check-input @error('madcaisse') is-invalid @enderror" type="checkbox" id="madcaisse" name="madcaisse" value="1" autocomplete="madcaisse" autofocus>
                <label class="form-check-label" for="madcaisse">
                  MAD C
                </label>
              </div>
              @error('madcaisse')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>



            <div class="col-auto my-1 form-group">
              <div class="form-check">
                <input class="form-check-input @error('collecte') is-invalid @enderror" type="checkbox" id="collecte" name="collecte"value="1" autocomplete="collecte" autofocus>
                <label class="form-check-label" for="collecte">
                  collete
                </label>
              </div>
              @error('collecte')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>



          </div>
          <div class="col-lg-2">


            <div class="col-auto my-1 form-group">
              <div class="form-check">
                <input class="form-check-input @error('gardFond') is-invalid @enderror" type="checkbox" id="gardFond" name="gardFond" value="1" autocomplete="gardFond" autofocus >
                <label class="form-check-label" for="gardFond">
                  G Fonds
                </label>
              </div>
              @error('gardFond')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>



            <div class="col-auto my-1 form-group">
              <div class="form-check">
                <input class="form-check-input @error('comptageTri') is-invalid @enderror" type="checkbox" id="comptageTri" name="comptageTri" value="1" autocomplete="comptageTri" autofocus>
                <label class="form-check-label" for="comptageTri">
                  Comp+Tri
                </label>
              </div>
              @error('comptageTri')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>


            <div class="col-auto my-1 form-group">
              <div class="form-check">
                <input class="form-check-input @error('gestionAtm') is-invalid @enderror" type="checkbox" id="gestionAtm" name="gestionAtm"value="1" autocomplete="gestionAtm" autofocus>
                <label class="form-check-label" for="gestionAtm">
                  Gestion+Atm 
                </label>
              </div>
              @error('gestionAtm')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>



          </div>
          <div class="col-lg-2">                  



            <div class="col-auto my-1 form-group">
              <div class="form-check">
                <input class="form-check-input @error('BanqueCentr') is-invalid @enderror" type="checkbox" id="BanqueCentr" name="BanqueCentr"value="1" autocomplete="BanqueCentr" autofocus>
                <label class="form-check-label" for="BanqueCentr">
                 B Cent
               </label>
             </div>
             @error('BanqueCentr')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>


          <div class="col-auto my-1 form-group">
            <div class="form-check">
              <input class="form-check-input @error('agencePrincip') is-invalid @enderror" type="checkbox" id="agencePrincip" name="agencePrincip"value="1" autocomplete="agencePrincip" autofocus>
              <label>
                Ag princ 
              </label>
            </div>
            @error('agencePrincip')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>


          <div class="col-auto my-1 form-group">
            <div class="form-check">
              <input class="form-check-input @error('agenceSecond') is-invalid @enderror" type="checkbox" id="agenceSecond" name="agenceSecond"value="1" autocomplete="agenceSecond" autofocus>
              <label class="form-check-label" for="agenceSecond">
                Ag sec
              </label>
            </div>
            @error('agenceSecond')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div> 


          <div class="col-auto my-1 form-group">
            <div class="form-check">
              <input class="form-check-input @error('cashPoint') is-invalid @enderror" type="checkbox" id="cashPoint" name="cashPoint"value="1" autocomplete="cashPoint" autofocus>
              <label class="form-check-label" for="cashPoint">
                Cash P
              </label>
            </div>
            @error('cashPoint')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div> 

        </div>
        <div class="col-lg-2">
         <div class="col-auto my-1 form-group">
          <div class="form-check">
            <input class="form-check-input @error('permanent') is-invalid @enderror" type="checkbox" id="permanent" name="permanent"value="1" autocomplete="permanent" autofocus>
            <label class="form-check-label" for="permanent">
              Permanent
            </label>
          </div>
          @error('permanent')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div> 


        <div class="col-auto my-1 form-group">
          <div class="form-check">
            <input class="form-check-input @error('appel') is-invalid @enderror" type="checkbox" id="appel" name="appel" value="1" autocomplete="appel" autofocus>
            <label class="form-check-label" for="appel">
              Appel
            </label>
          </div>
          @error('appel')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div> 

        <div class="col-auto my-1 form-group">
          <div class="form-check">
            <input class="form-check-input @error('intraMuros') is-invalid @enderror" type="checkbox" id="intraMuros" name="intraMuros"value="{{ old('1') }}" autocomplete="intraMuros" autofocus>
            <label class="form-check-label" for="intraMuros">
              IntraMuros
            </label>
          </div>
          @error('intraMuros')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div> 


        <div class="col-auto my-1 form-group">
          <div class="form-check">
            <input class="form-check-input @error('extraMuros') is-invalid @enderror" type="checkbox" id="aextraMuros" name="extraMuros"value="1" autocomplete="extraMuros" autofocus>
            <label class="form-check-label" for="extraMuros">
              ExtraMuros
            </label>
          </div>
          @error('extraMuros')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div> 

      </div>
      <div class="col-lg-2">
       <div class="form-group">
        <input type="number" class="form-control  @error('puSecuri') is-invalid @enderror" id="puSecuri" name="puSecuri"  placeholder="PU Securi" value="{{ old('puSecuri') }}" required autocomplete="puSecuri"autofocus >
        @error('puSecuri')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <input type="text" class="form-control @error('puScelle') is-invalid @enderror" id="puScelle"  name="puScelle" placeholder="Pu Secellé" value="{{ old('puScelle') }}" required autocomplete="puScelle" autofocus>
        @error('puScelle')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div> 

    </div>


  </div>

</fieldset> 

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













<!--- Modifier-->

<div class="modal fade" id="modifier" tabindex="-1" role="dialog" aria-labelledby="modifierLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifierLabel">Modifier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">

       <form id="myFormModif" method="POST" action="{{route('clientModifier')}}">

        {{method_field('patch')}} 
        {{csrf_field()}}

        <fieldset class="border p-2">
          <legend  class="w-auto">Informations generales</legend> 
          <div class="form-row col-lg-12">


            <div class="col-lg-6">


              <div class="form-group">                                    
                <input type="text" class="form-control  @error('nomClient') is-invalid @enderror" id="nomClient" name="nomClient" placeholder="Nom client" value="{{ old('nomClient') }}"  required autocomplete="nomClient" autofocus>
                @error('nomClient')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" class="form-control @error('situationGeo') is-invalid @enderror" name="situationGeo"  id="situationGeo" value="{{ old('situationGeo') }}" 
                placeholder="Situation Géo"
                required autocomplete="situationGeo" autofocus>
                @error('situationGeo')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" class="form-control  @error('telephone') is-invalid @enderror" id="telephone" name="telephone"  placeholder="Telephone" value="{{ old('telephone') }}" required autocomplete="telephone"autofocus >
                @error('telephone')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" class="form-control @error('regimeImpot') is-invalid @enderror" id="regimeImpot"  name="regimeImpot" placeholder="Regime Impot" value="{{ old('regimeImpot') }}" required autocomplete="regimeImpot" autofocus>
                @error('regimeImpot')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div> 

            </div> 

            <div class="col-lg-6">
              <div class="form-group">
                <input type="text" class="form-control  @error('boitePost') is-invalid @enderror" id="boitePost" name="boitePost"  placeholder="Boite Postale" value="{{ old('boitePost') }}" required autocomplete="boitePost"autofocus >
                @error('boitePost')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" class="form-control @error('ville') is-invalid @enderror" id="ville"  name="ville" placeholder="Ville" value="{{ old('ville') }}" required autocomplete="ville" autofocus>
                @error('regimeImpot')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div> 

              <div class="form-group">
                <input type="text" class="form-control  @error('rc') is-invalid @enderror" id="rc" name="rc"  placeholder="RC" value="{{ old('rc') }}" required autocomplete="rc"autofocus >
                @error('rc')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" class="form-control @error('ncc') is-invalid @enderror" id="ncc"  name="ncc" placeholder="NCC" value="{{ old('ncc') }}" required autocomplete="ncc" autofocus>
                @error('ncc')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

            </div>

          </div>

        </fieldset> 


        <fieldset class="border p-2">
          <legend  class="w-auto">Contact</legend> 
          <div class="form-row col-lg-12">


            <div class="col-lg-6">


              <div class="form-group">                                    
                <input type="text" class="form-control  @error('nomContact') is-invalid @enderror" id="nomContact" name="nomContact" placeholder="Nom Contact" value="{{ old('nomContact') }}"  required autocomplete="nomContact" autofocus>
                @error('nomContact')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" id="email" value="{{ old('email') }}"  required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" class="form-control  @error('porteF') is-invalid @enderror" id="porteF" name="porteF"  placeholder="Porte feuille client" value="{{ old('porteF') }}" required autocomplete="porteF"autofocus >
                @error('porteF')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div> 

            <div class="col-lg-6">
             <div class="form-group">
              <input type="text" class="form-control  @error('fonct') is-invalid @enderror" id="fonct" name="fonct"  placeholder="Fonction" value="{{ old('fonct') }}" required autocomplete="fonct"autofocus >
              @error('fonct')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <input type="text" class="form-control @error('telPortable') is-invalid @enderror" id="telPortable"  name="telPortable" placeholder="Tel Portable" value="{{ old('telPortable') }}" required autocomplete="telPortable" autofocus>
              @error('telPortable')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div> 

            <div class="form-group">
              <input type="text" class="form-control @error('secteurAct') is-invalid @enderror" id="secteurAct"  name="secteurAct" placeholder="Secteur activité" value="{{ old('secteurAct') }}" required autocomplete="secteurAct" autofocus>
              @error('secteurAct')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

          </div>

        </div>

      </fieldset> 

      <fieldset class="border p-2">
        <legend  class="w-auto">Contrat</legend> 
        <div class="form-row col-lg-12">


          <div class="col-lg-2">


            <div class="form-group">                                    
              <input type="text" class="form-control  @error('numContrat') is-invalid @enderror" id="numContrat" name="numContrat" placeholder="N Contrat" value="{{ old('numContrat') }}"  required autocomplete="numContrat" autofocus>
              @error('numContrat')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>


            <div class="form-group">               
              <input type="date" class="form-control  @error('dateEffet') is-invalid @enderror" id="dateEffet" name="dateEffet" placeholder="Date effet" value="{{ old('dateEffet') }}"  required autocomplete="dateEffet" autofocus>
              @error('dateEffet')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">                                    
              <input type="number" class="form-control  @error('duree') is-invalid @enderror" id="duree" name="duree" placeholder="Durée" value="{{ old('duree') }}"  required autocomplete="duree" autofocus>
              @error('duree')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>


            <div class="form-group">               
              <input type="number" class="form-control  @error('forfaitMens') is-invalid @enderror" id="forfaitMens" name="forfaitMens" placeholder="Forfait Mens" value="{{ old('forfaitMens') }}"  required autocomplete="forfaitMens" autofocus>
              @error('forfaitMens')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

          </div>


          <div class="col-lg-2">


            <div class="col-auto my-1 form-group">
              <div class="form-check">
                <input class="form-check-input @error('tdfvb') is-invalid @enderror" type="checkbox" id="tdfvbTest" name="tdfvb" value="1" autocomplete="tdfvb" autofocus>
                <label class="form-check-label" for="tdfvb">
                  TDF VB
                </label>
              </div>
              @error('tdfvb')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>



            <div class="col-auto my-1 form-group">
              <div class="form-check">
                <input class="form-check-input @error('tdfI') is-invalid @enderror" type="checkbox" id="tdfITest" name="tdfI" value="1" autocomplete="tdfI" autofocus>
                <label class="form-check-label" for="tdfI">
                  TDF VI
                </label>
              </div>
              @error('tdfI')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>


            <div class="col-auto my-1 form-group">
              <div class="form-check">
                <input class="form-check-input @error('madcaisse') is-invalid @enderror" type="checkbox" id="madcaisseTest" name="madcaisse" value="1" autocomplete="madcaisse" autofocus>
                <label class="form-check-label" for="madcaisse">
                  MAD C
                </label>
              </div>
              @error('madcaisse')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>



            <div class="col-auto my-1 form-group">
              <div class="form-check">
                <input class="form-check-input @error('collecte') is-invalid @enderror" type="checkbox" id="collecteTest" name="collecte"value="1" autocomplete="collecte" autofocus>
                <label class="form-check-label" for="collecte">
                  collete
                </label>
              </div>
              @error('collecte')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>



          </div>
          <div class="col-lg-2">


            <div class="col-auto my-1 form-group">
              <div class="form-check">
                <input class="form-check-input @error('gardFond') is-invalid @enderror" type="checkbox" id="gardFondTest" name="gardFond" value="1" autocomplete="gardFond" autofocus >
                <label class="form-check-label" for="gardFond">
                  G Fonds
                </label>
              </div>
              @error('gardFond')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>



            <div class="col-auto my-1 form-group">
              <div class="form-check">
                <input class="form-check-input @error('comptageTri') is-invalid @enderror" type="checkbox" id="comptageTriTest" name="comptageTri" value="1" autocomplete="comptageTri" autofocus>
                <label class="form-check-label" for="comptageTri">
                  Comp+Tri
                </label>
              </div>
              @error('comptageTri')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>


            <div class="col-auto my-1 form-group">
              <div class="form-check">
                <input class="form-check-input @error('gestionAtm') is-invalid @enderror" type="checkbox" id="gestionAtmTest" name="gestionAtm"value="1" autocomplete="gestionAtm" autofocus>
                <label class="form-check-label" for="gestionAtm">
                  Gestion+Atm 
                </label>
              </div>
              @error('gestionAtm')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>



          </div>
          <div class="col-lg-2">                  



            <div class="col-auto my-1 form-group">
              <div class="form-check">
                <input class="form-check-input @error('BanqueCentr') is-invalid @enderror" type="checkbox" id="BanqueCentrTest" name="BanqueCentr"value="1" autocomplete="BanqueCentr" autofocus>
                <label class="form-check-label" for="BanqueCentr">
                 B Cent
               </label>
             </div>
             @error('BanqueCentr')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>


          <div class="col-auto my-1 form-group">
            <div class="form-check">
              <input class="form-check-input @error('agencePrincip') is-invalid @enderror" type="checkbox" id="agencePrincipTest" name="agencePrincip"value="1" autocomplete="agencePrincip" autofocus>
              <label>
                Ag princ 
              </label>
            </div>
            @error('agencePrincip')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>


          <div class="col-auto my-1 form-group">
            <div class="form-check">
              <input class="form-check-input @error('agenceSecond') is-invalid @enderror" type="checkbox" id="agenceSecondTest" name="agenceSecond"value="1" autocomplete="agenceSecond" autofocus>
              <label class="form-check-label" for="agenceSecond">
                Ag sec
              </label>
            </div>
            @error('agenceSecond')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div> 


          <div class="col-auto my-1 form-group">
            <div class="form-check">
              <input class="form-check-input @error('cashPoint') is-invalid @enderror" type="checkbox" id="cashPointTest" name="cashPoint"value="1" autocomplete="cashPoint" autofocus>
              <label class="form-check-label" for="cashPoint">
                Cash P
              </label>
            </div>
            @error('cashPoint')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div> 

        </div>
        <div class="col-lg-2">
         <div class="col-auto my-1 form-group">
          <div class="form-check">
            <input class="form-check-input @error('permanent') is-invalid @enderror" type="checkbox" id="permanentTest" name="permanent"value="1" autocomplete="permanent" autofocus>
            <label class="form-check-label" for="permanent">
              Permanent
            </label>
          </div>
          @error('permanent')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div> 


        <div class="col-auto my-1 form-group">
          <div class="form-check">
            <input class="form-check-input @error('appel') is-invalid @enderror" type="checkbox" id="appelTest" name="appel" value="1" autocomplete="appel" autofocus>
            <label class="form-check-label" for="appel">
              Appel
            </label>
          </div>
          @error('appel')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div> 

        <div class="col-auto my-1 form-group">
          <div class="form-check">
            <input class="form-check-input @error('intraMuros') is-invalid @enderror" type="checkbox" id="intraMurosTest" name="intraMuros" value="1" autocomplete="intraMuros" autofocus>
            <label class="form-check-label" for="intraMuros">
              IntraMuros
            </label>
          </div>
          @error('intraMuros')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div> 


        <div class="col-auto my-1 form-group">
          <div class="form-check">
            <input class="form-check-input @error('extraMuros') is-invalid @enderror" type="checkbox" id="extraMurosTest" name="extraMuros" value="1" autocomplete="extraMuros" autofocus>
            <label class="form-check-label" for="extraMuros">
              ExtraMuros
            </label>
          </div>
          @error('extraMuros')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div> 

      </div>
      <div class="col-lg-2">
       <div class="form-group">
        <input type="number" class="form-control  @error('puSecuri') is-invalid @enderror" id="puSecuri" name="puSecuri"  placeholder="PU Securi" value="{{ old('puSecuri') }}" required autocomplete="puSecuri"autofocus >
        @error('puSecuri')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <input type="text" class="form-control @error('puScelle') is-invalid @enderror" id="puScelle"  name="puScelle" placeholder="Pu Secellé" value="{{ old('puScelle') }}" required autocomplete="puScelle" autofocus>
        @error('puScelle')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div> 

      @if  (Auth::user()->profil == 'Commercial') 
      <input type="hidden"name="niveauAuto" value="1">

      @elseif (Auth::user()->profil == 'Directeur commercial')
      <input type="hidden"name="niveauAuto" value="2">

      @endif

    </div>


  </div>

</fieldset> 

<input id="cat_id" type="hidden" name="client_id" value=" " > 

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






<!-- Modal Message-->

<div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="messageLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="messageLabel">Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="{{ route('messageAjout') }}">        
        {{csrf_field()}}                             
        <div class="modal-body"> 

          <h2 class="text-center" style="color: red">Voulez vous vraiment envoyer </br> ce message?&hellip;</h2>

        </div>                             
        <input id="nomClient" type="hidden" name="nomClient" value=" " >  
        <input id="cat_id" type="hidden" name="client_id" value=" " >  

        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-danger"> {{ __('Confirmer') }}</button>
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
       <form method="POST" action="{{ route('clientSupp') }}">  
        {{method_field('delete')}}
        {{csrf_field()}}                             
        <div class="modal-body"> 

          <h2 class="text-center" style="color: red">Voulez vous vraiment supprimer</br> ce client?&hellip;</h2>

        </div>                             
        <input id="cat_id" type="hidden" name="client_id" value=" " >  

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


      var table = $('#id_clients').DataTable( {


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

        for(var i=0;i<35;i++){

         columns= table.column(i).visible(0);

       }
     }

     function showAllColumns(){

      for(var i=0;i<35;i++){

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



/*$('#myForm #idproduit').click(function(){

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

            var dat = data[0].telephone;
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

  

      });*/


/*$('#myForm # prixAchat').click(function(){

    var databack = $("#myForm  #enstock").val();
    var datab= parseInt(databack);

    var databack1 = $("#myForm  #QEntrant").val(); 
     var datab1= parseInt(databack1); 

    //var total = datab1 + datab;

    $('#myForm  #enstock').val(datab1 + datab); 


  });*/






/* $('#myFormModif #idproduit').click(function(){

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

            var dat = data[0].telephone;
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




*
        }

  

});

*/


$('#message').on('show.bs.modal',function(event){

        // console.log('test test test');

        var button=$(event.relatedTarget)

        var cat_id=button.data('catid')
        var nomClient=button.data('mynomclient')


           /* var title=button.data('mytitle')
           var description= button.data('mydescription')*/
           var modal=$(this)

           /* modal.find('.modal-body #title').val(title);
           modal.find('.modal-body #observ').val(description);*/
           modal.find('.modal-body #cat_id').val(cat_id);
           modal.find('.modal-body #nomClient').val(nomClient);


         })




$('#supp').on('show.bs.modal',function(event){

        // console.log('test test test');

        var button=$(event.relatedTarget)

        var cat_id=button.data('catid')


           /* var title=button.data('mytitle')
           var description= button.data('mydescription')*/
           var modal=$(this)

           /* modal.find('.modal-body #title').val(title);
           modal.find('.modal-body #observ').val(description);*/

           modal.find('.modal-body #cat_id').val(cat_id);


         })





$('#modifier').on('show.bs.modal',function(event){
          // console.log('test ooooooo');

          var button=$(event.relatedTarget)
          var nomClient=button.data('mynomclient')
          var situat=button.data('mysituat')
          var tel=button.data('mytel')
          var regime=button.data('myregime')
          var boite=button.data('myboite')
          var pays=button.data('mypays')
          var ville=button.data('myville')
          var rc=button.data('myrc')        
          var nc=button.data('mync')
          var fonct=button.data('myfonct')  
          var telPortable=button.data('mytelportable')
          var dateEffet=button.data('mydateeffet')
          var email=button.data('myemail')
          var secteurAct=button.data('mysecteuract')
          var nomContact=button.data('mynomcontact')
          var numContrat=button.data('mynumcontrat')
          var duree=button.data('myduree')
          var forfaitMens=button.data('myforfaitmens')
          var tdfvb=button.data('mytdfvb')         
          var tdfI=button.data('mytdfI')
          var madcaisse=button.data('mymadcaisse')    
          var collecte=button.data('mycollecte')        
          var gardFond=button.data('mygardfond')
          var comptageTri=button.data('mycomptagetri') 
          var gestionAtm=button.data('gestionatm')        
          var BanqueCentr=button.data('mybanquecentr')
          var agencePrincip=button.data('myagenceprincip') 
          var agenceSecond=button.data('myagencesecond')        
          var cashPoint=button.data('mycashpoint')
          var permanent=button.data('mypermanent')      
          var appel=button.data('myappel')        
          var intraMuros=button.data('myintramuros')
          var extraMuros=button.data('myextramuros')  
          var puSecuri=button.data('mypusecuri')        
          var puScelle=button.data('mypuscelle') 
          var porteF=button.data('myportef')   
          var cat_id=button.data('catid')        

          
          var modal=$(this)
          modal.find('.modal-body #nomClient').val(nomClient);
          modal.find('.modal-body #situationGeo').val(situat);
          modal.find('.modal-body #telephone').val(tel);
          modal.find('.modal-body #regimeImpot').val(regime);
          modal.find('.modal-body #boitePost').val(boite);
          modal.find('.modal-body #ville').val(ville);  
          modal.find('.modal-body #rc').val(rc);
          modal.find('.modal-body #ncc').val(nc);
          modal.find('.modal-body #fonct').val(fonct);
          modal.find('.modal-body #nomContact').val(nomContact);
          modal.find('.modal-body #numContrat').val(numContrat);
          modal.find('.modal-body #dateEffet').val(dateEffet);
          modal.find('.modal-body #duree').val(duree);  
          modal.find('.modal-body #forfaitMens').val(forfaitMens);
          /*          modal.find('.modal-body #tdfvb').val(tdfvb); */
          if (tdfvb == 1) {
            document.getElementById("tdfvbTest").checked = true
            //alert(tdfvb);
          }
          /*modal.find('.modal-body #tdfI').val(tdfI);  */ 

          if (tdfI == 1) {
            document.getElementById("tdfITest").checked = true
            //alert(tdfI);
          }     
          /*          modal.find('.modal-body #madcaisse').val(madcaisse);*/
          if (madcaisse == 1) {
            document.getElementById("madcaisseTest").checked = true
            //alert(madcaisse);
          }
          //modal.find('.modal-body #collecte').val(collecte); 
          if (collecte == 1) {
            document.getElementById("collecteTest").checked = true
            //alert(madcaisse);
          }         
          //modal.find('.modal-body #gardFond').val(gardFond);
          if (gardFond == 1) {
            document.getElementById("gardFondTest").checked = true
            //alert(madcaisse);
          }   
          modal.find('.modal-body #comptageTri').val(comptageTri);
          if (comptageTri == 1) {
            document.getElementById("comptageTriTest").checked = true
            //alert(madcaisse);
          }   
          //modal.find('.modal-body #gestionAtm').val(gestionAtm);
          if (gestionAtm == 1) {
            document.getElementById("gestionAtmTest").checked = true
            //alert(madcaisse);
          }   
          modal.find('.modal-body #BanqueCentr').val(BanqueCentr); 
          if (BanqueCentr == 1) {
            document.getElementById("BanqueCentrTest").checked = true
            //alert(madcaisse);
          }    
          modal.find('.modal-body #agencePrincip').val(agencePrincip);
          if (agencePrincip == 1) {
            document.getElementById("agencePrincipTest").checked = true
            //alert(madcaisse);
          }    
          modal.find('.modal-body #agenceSecond').val(agenceSecond); 
          if (agenceSecond == 1) {
            document.getElementById("agenceSecondTest").checked = true
            //alert(madcaisse);
          }   
          modal.find('.modal-body #cashPoint').val(cashPoint);  
          if (cashPoint == 1) {
            document.getElementById("cashPointTest").checked = true
            //alert(madcaisse);
          }          
          //modal.find('.modal-body #permanent').val(permanent);
          if (permanent == 1) {
            document.getElementById("permanentTest").checked = true
            //alert(madcaisse);
          } 
          modal.find('.modal-body #appel').val(appel);
          if (appel == 1) {
            document.getElementById("appelTest").checked = true
            //alert(madcaisse);
          }           
          modal.find('.modal-body #intraMuros').val(intraMuros);
          if (intraMuros == 1) {
            document.getElementById("intraMurosTest").checked = true
            //alert(madcaisse);
          }      
          modal.find('.modal-body #extraMuros').val(extraMuros);
          if (extraMuros == 1) {
            document.getElementById("extraMurosTest").checked = true
            //alert(madcaisse);
          }  
          modal.find('.modal-body #puSecuri').val(puSecuri);
          modal.find('.modal-body #puScelle').val(puScelle);  
          modal.find('.modal-body #porteF').val(porteF);   
          modal.find('.modal-body #email').val(email);  
          modal.find('.modal-body #telPortable').val(telPortable);  
          modal.find('.modal-body #secteurAct').val(secteurAct);                 
          modal.find('.modal-body #cat_id').val(cat_id);    


          var databack = $("#myFormModif #tdfvb").val();            

          if(databack == 1) {

            console.log('hghghgh');
          }                        

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
