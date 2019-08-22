<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntreStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entre_stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('dateAppro');         
            $table->unsignedBigInteger('QEntrant');             
            $table->unsignedBigInteger('prixAchat');   
            $table->string('observ');    
            $table->string('numFacture');                  
            $table->unsignedBigInteger('produit_id');           
            $table->foreign('produit_id')->references('id')->on('produits')
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
        Schema::dropIfExists('entre_stocks');
    }
}
