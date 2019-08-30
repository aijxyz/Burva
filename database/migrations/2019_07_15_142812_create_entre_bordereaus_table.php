<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntreBordereausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entre_bordereaus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('debutSerie');
            $table->unsignedBigInteger('finSerie');  
            $table->date('dateEntre');
            $table->unsignedBigInteger('prixUnitaire');
            $table->string('paysAt');                      
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
        Schema::dropIfExists('entre_bordereaus');
    }
}
