<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site');
            $table->string('situation');
            $table->string('nom_contact'); 
            $table->unsignedInteger('tel');   
            $table->unsignedBigInteger('client_id');   
            $table->unsignedInteger('km_bitume');   
            $table->unsignedInteger('num_carte');   
            $table->unsignedInteger('tarif_ht');   
            $table->unsignedInteger('tarif_km_bitume');   
            $table->unsignedInteger('tarif_km_piste');   
            $table->string('centre');   
            $table->string('objet');   
            $table->unsignedInteger('forfait_mensuel');   
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
        Schema::dropIfExists('sites');
    }
}
