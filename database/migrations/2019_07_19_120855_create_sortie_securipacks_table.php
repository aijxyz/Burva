<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSortieSecuripacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sortie_securipacks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('debutSerie');
            $table->unsignedBigInteger('finSerie');  
            $table->date('dateSortie');
            $table->string('centre');
            $table->unsignedBigInteger('prixUnitaire'); 
            $table->unsignedBigInteger('prixTotal'); 
            $table->unsignedBigInteger('reference');                        
            $table->unsignedBigInteger('entreSecuripack_id');
            $table->foreign('entreSecuripack_id')->references('id')->on('entre_securipacks')
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
        Schema::dropIfExists('sortie_securipacks');
    }
}
