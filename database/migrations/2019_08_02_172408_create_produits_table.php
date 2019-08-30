<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelleProd'); 
            $table->string('description');
            $table->unsignedBigInteger('seuilApprovis');   
            $table->unsignedBigInteger('stockAlert');
            $table->string('ves');
            $table->unsignedBigInteger('reference');
            $table->unsignedBigInteger('prixHt'); 
            $table->string('paysAt');  
            $table->unsignedBigInteger('fournisseur_id');
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');        
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
        Schema::dropIfExists('produits');
    }
}
