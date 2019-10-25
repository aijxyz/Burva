<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomClient');     
            $table->string('situationGeo');   
            $table->string('telephone');      
            $table->string('regimeImpot');  
            $table->string('boitePost');      
            $table->string('ville'); 
            $table->string('rc');
            $table->string('ncc');
            $table->string('fonct');
            $table->string('nomContact');
            $table->string('telPortable');
            $table->string('email');
            $table->string('secteurAct');
            $table->string('numContrat');
            $table->date('dateEffet');
            $table->unsignedBigInteger('duree');                   
            $table->unsignedBigInteger('forfaitMens'); 
            $table->string('tdfvb'); 
            $table->string('tdfI');
            $table->string('madcaisse');
            $table->string('collecte');
            $table->string('gardFond');
            $table->string('comptageTri');
            $table->string('gestionAtm');
            $table->string('BanqueCentr');
            $table->string('agencePrincip'); 
            $table->string('agenceSecond');
            $table->string('cashPoint');
            $table->string('permanent');
            $table->string('appel');
            $table->string('intraMuros');
            $table->string('extraMuros');
            $table->unsignedBigInteger('puSecuri');
            $table->string('puScelle');
            $table->string('paysAt'); 
            $table->string('porteF');
            $table->string('niveauAuto');
            $table->string('paysAt'); 
           
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
        Schema::dropIfExists('clients');
    }
}
