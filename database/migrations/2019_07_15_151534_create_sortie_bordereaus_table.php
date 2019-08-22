<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSortieBordereausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sortie_bordereaus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('debutSerie');
            $table->unsignedBigInteger('finSerie');  
            $table->date('dateSortie');
            $table->string('centre');
            $table->unsignedBigInteger('prix'); 
            $table->unsignedBigInteger('prixTotal');                        
            $table->unsignedBigInteger('entreBordereau_id');
            $table->foreign('entreBordereau_id')->references('id')->on('entre_bordereaus')
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
        Schema::dropIfExists('sortie_bordereaus');
    }
}
