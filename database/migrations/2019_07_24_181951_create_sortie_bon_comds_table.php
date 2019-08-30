<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSortieBonComdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sortie_bon_comds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('debutSerie');
            $table->unsignedBigInteger('finSerie');  
            $table->date('dateSortie');
            $table->string('centre');
            $table->unsignedBigInteger('prix'); 
            $table->unsignedBigInteger('prixTotal'); 
            $table->string('paysAt');                       
            $table->unsignedBigInteger('entreBonComd_id');
            $table->foreign('entreBonComd_id')->references('id')->on('entre_bon_comds')
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
        Schema::dropIfExists('sortie_bon_comds');
    }
}
