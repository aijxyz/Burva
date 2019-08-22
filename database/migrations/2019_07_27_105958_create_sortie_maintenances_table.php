<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSortieMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sortie_maintenances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('debutSerie');
            $table->unsignedBigInteger('finSerie');  
            $table->date('dateSortie');
            $table->string('centre');
            $table->unsignedBigInteger('prix'); 
            $table->unsignedBigInteger('prixTotal');                        
            $table->unsignedBigInteger('entreMaintenance_id');
            $table->foreign('entreMaintenance_id')->references('id')->on('entre_maintenances')
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
        Schema::dropIfExists('sortie_maintenances');
    }
}
