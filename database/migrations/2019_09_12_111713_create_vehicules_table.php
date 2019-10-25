<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('immatriculation');
            $table->string('marque');
            $table->string('type'); 
            $table->string('code');   
            $table->unsignedBigInteger('DPMC');
            $table->unsignedBigInteger('numChasis');
            $table->date('dateAquisition');
            $table->string('photoVehicule');
            $table->string('paysAt');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicules');
    }
}
