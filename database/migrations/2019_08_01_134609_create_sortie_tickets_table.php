<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSortieTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sortie_tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('debutSerie');
            $table->unsignedBigInteger('finSerie');  
            $table->date('dateSortie');
            $table->string('centre');
            $table->unsignedBigInteger('prix'); 
            $table->unsignedBigInteger('prixTotal');
            $table->string('paysAt');                        
            $table->unsignedBigInteger('entreTicket_id');
            $table->foreign('entreTicket_id')->references('id')->on('entre_tickets')
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
        Schema::dropIfExists('sortie_tickets');
    }
}
