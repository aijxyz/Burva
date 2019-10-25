@extends('layouts.master')
@section('content')
<div class="container">

 <select style="width: 200px;" name="toggle_column"  id="toggle_column">
   <option value="0">Id </option>
   <option value="1">Message</option>  
   <option value="2">Autorisation'</option>
   <option value="3">Date Envoie</option>
   <option value="4">Profil</option> 
   <option value="5">Nom utilisateur</option> 
   <option value="6">Accept|Supp</option> 
   
 
 </select>   

 
 <div class="col-md-12" style="margin-left:20px; margin-right:50px">                   
   <!-- /.row -->
   <div class="row mt-5">

    <div class="card">
      <div class="card-header">
        <h6 class="card-title">Messages
         <!-- <div class="card-tools" style="text-align: right;">
            <button class="btn btn-success" data-toggle="modal" data-target="#ajout">Ajouter<i class="fa fa-user-plus"></i></button>
          </div>-->

        </h6>

    </div>            

      <!-- /.card-header -->
      <div class="table-responsive p-0">
        <table id="id_produit" class="table table-bordered table-striped  display ">
          <thead>
            <tr> 
              <th class="text-center">Id</th>              
              <th class="text-center">Message</th>
              <th class="text-center">Autorisation</th>
              <th class="text-center">Date Envoie</th>
              <th class="text-center">Profil</th>                   
              <th class="text-center">Nom utilisatuer</th>                                 
              <th class="text-center">Accept|Supp</th>                 
            </tr>
          </thead>
          <tbody>
           @foreach($messages as $messagescat)
           <tr>   
             <td class="text-center">{{$messagescat->id}}</td>              
             <td class="text-center">{{$messagescat->message}}</td>                        
             <td class="text-center">{{$messagescat->autorisation}}</td>     
             <td class="text-center">{{$messagescat->date_envoie}}</td>  
             <td class="text-center">{{$messagescat->profil}}</td> 
             <td class="text-center">{{$messagescat->user_id}}</td>                              
             <td class="text-center"> 
             <!--<button class="btn btn-danger" data-toggle="modal" data-target="#refuse" data-catid="{{$messagescat->id}}">
             <i class="fa fa-times"></i>
             </button>
             |-->
            <button class="btn btn-info" data-toggle="modal"                                                                
              data-catid="{{$messagescat->client_id}}"
              data-target="#accept">           
              <i class="fa fa-check-circle"></i>              
            </button>
               |                   
            <button class="btn btn-danger" data-toggle="modal" data-target="#supp" data-catid="{{$messagescat->id}}">
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





<div class="modal fade" id="accept" tabindex="-1" role="dialog" aria-labelledby="acceptLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="acceptLabel">Accepter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="{{ route('messageAccepter') }}">  
       
        {{csrf_field()}}                             
      <div class="modal-body"> 

          <h2 class="text-center" style="color: red">Voulez vous vraiment accepter</br> la modification de ce client?&hellip;</h2>

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
       <form method="POST" action="{{ route('messageSupp') }}">  
        {{method_field('delete')}}
        {{csrf_field()}}                             
      <div class="modal-body"> 

          <h2 class="text-center" style="color: red">Voulez vous vraiment supprimer</br> ce message?&hellip;</h2>

      </div>                             
        <input id="cat_id" type="hidden" name="message_id" value=" " >       
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

           "scrollY": "200px",
           "scrollX": "100%",
      // "scrollXInner": "110%"
      "scrollXInner": "100%",    
      "paging": true

    } );


          function hideAllColumns(){

            for(var i=0;i<7;i++){

             columns= table.column(i).visible(0);

           }
         }

         function showAllColumns(){

          for(var i=0;i<7;i++){

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
       var modal=$(this)
       modal.find('.modal-body #cat_id').val(cat_id);

           /* var title=button.data('mytitle')
           var profil= button.data('mydescription')*/
       

            //modal.find('.modal-body #title').val(title);
           //modal.find('.modal-body #des').val(profil);

          

         })

$('#accept').on('show.bs.modal',function(event){
          // console.log('test ooooooo');
       var button=$(event.relatedTarget)

       var cat_id=button.data('catid')
       var modal=$(this)
       modal.find('.modal-body #cat_id').val(cat_id);
          /* modal.find('.modal-body #ves').val(profile);*/
          /*modal.find('.modal-body #cat_id').vaajoutt_id):*/    


       })


</script>


<!-- Denco@-->

@endsection
