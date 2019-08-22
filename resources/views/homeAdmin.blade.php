@extends('layouts.master')

@section('content')
<link href="style.css" rel="stylesheet">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
          <div class="card text-white small-box bg-info" style="max-width: 18rem;">
          
                 <h3>150</h3>
             	 <h1 style="text-align:center;"><a href="#"><i class="ion ion-bag"></i></a></h1>
                 <h5 style="text-align:center;"><p class="text-white">Nombre Clients</p></h5>                          
          
           <div class="card-footer">
           	 <a href="#">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
           </div>
        </div>         
        </div>
          <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
          <div class="card text-white small-box bg-success" style="max-width: 18rem;">            
              <h3>53<sup style="font-size: 20px">%</sup></h3> 
              <h1 style="text-align:center;"><a href="#"><i class="ion ion-stats-bars"></i></a></h1>
              <h5 style="text-align:center;"><p class="text-white"> Etat Vehicules</p></h5>                  
           <div class="card-footer">
           	 <a href="#">Plus d'infos<i class="fa fa-arrow-circle-right"></i></a>
           </div>
        </div>
       </div>
          <!-- ./col -->
        <div class="col-lg-3 col-6">
          	           <!-- small box -->
        <div class="card text-white small-box bg-warning" style="max-width: 18rem;">
                 <h3>44</h3>
                 <h1 style="text-align:center;"><a href="#"> <i class="ion ion-person-add"></i></a></h1>
                 <h5 style="text-align:center;"><p class="text-white">Fournisseurs</p></h5>                
            <div class="card-footer">
            <a href="#">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
       </div>
          <!-- ./col -->
        <div class="col-lg-3 col-6">
         <div class="card text-white small-box bg-danger" style="max-width: 18rem;">
                 <h3>65</h3>
                 <h1 style="text-align:center;"><a href="#"><i class="ion ion-pie-graph"></i></a></h1>
                 <h5 style="text-align:center;"><p class="text-white">Infos tournées</p></h5>                
            <div class="card-footer">
            <a href="#">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>           
      </div>
</div>
</br>
</br>
<div class="form-group row">   
   <div id="container" class="col-md-12  border boder-success"> </div>
</div>
</br>
</br>
<div class="form-group row"> 
    <div id="container1" class="col-md-6 border"> </div>    
   <div id="container2" class="col-md-6 border"></div>  
</div>


<!--<div class="form-group row">   
   <div id="container3" class="col-md-12  border boder-danger"> </div>
</div>-->

<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/multiple-select/dist/multiple-select.js') }}"></script>
<script src="{{ asset('Highcharts\code\highcharts.js') }}"></script>
<script src="{{ asset('Highcharts\code\highcharts-3d.js') }}"></script>
<script src="{{ asset('Highcharts\code\modules\cylinder.js') }}"></script>
<script src="{{ asset('Highcharts\code\modules\series-label.js') }}"></script>
<script src="{{ asset('Highcharts\code\modules\exporting.js') }}"></script>
<script src="{{ asset('Highcharts\code\modules\export-data.js') }}"></script>
<script src="{{ asset('scrypt.js') }}"></script>
<script src="https://code.highcharts.com/modules/cylinder.js"></script>

@endsection
