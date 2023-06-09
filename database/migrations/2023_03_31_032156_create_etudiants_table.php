<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id()->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nom');
            $table->string('adresse');
            $table->string('phone');
            $table->string('email');
            $table->string('date_de_naissance');
            $table->foreignId('ville_id')->constrained('villes');
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
        Schema::dropIfExists('etudiants');
    }
}
