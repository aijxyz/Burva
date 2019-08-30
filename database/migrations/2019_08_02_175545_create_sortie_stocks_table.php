<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSortieStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sortie_stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('dateSortie');         
            $table->unsignedBigInteger('QSortant');     
            $table->unsignedBigInteger('QEnStock'); 
            $table->unsignedBigInteger('refProduit'); 
            $table->string('motif');  
            $table->date('dateSaisie');               
            $table->string('centre'); 
            $table->string('observ');
            $table->string('paysAt');
            $table->unsignedBigInteger('entreStock_id');        
            $table->foreign('entreStock_id')->references('id')->on('entre_stocks')
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
        Schema::dropIfExists('sortie_stocks');
    }
}
