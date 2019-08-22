<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFournisseursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom'); 
            $table->string('prenom');
            $table->string('societe');   
            $table->string('civilite');
            $table->string('adresse');
            $table->string('pays');  
            $table->string('telephone');
            $table->string('mobile'); 
            $table->string('fax');        
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('observation');
            $table->string('domaineComp'); 
            $table->string('delaiLivr');
            $table->string('condiPaye'); 
            $table->string('pays');  
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
        Schema::dropIfExists('fournisseurs');
    }
}
