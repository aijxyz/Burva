<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntreBonComdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entre_bon_comds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('debutSerie');
            $table->unsignedBigInteger('finSerie');  
            $table->date('dateEntre');
            $table->unsignedBigInteger('prixUnitaire');                      
            $table->unsignedBigInteger('fournisseur_id');
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs')
                   ->onDelete('restrict')
                  ->onUpdate('restrict');
           $table->unsignedBigInteger('prixTotal'); 
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
        Schema::dropIfExists('entre_bon_comds');
    }
}
