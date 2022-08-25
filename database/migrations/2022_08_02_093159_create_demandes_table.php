<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('demandes', function (Blueprint $table) {

            //Info patient
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->date('ddn');
            $table->string('num_carte');
            $table->string('num_dossier');

            //Info examens
            $table->datetime('date_prelev');
            $table->string('type_dossier');
            $table->string('etat_dossier')->default('en cours');
            $table->integer('nb_tubes');
            $table->string('t_ambiante')->default('0');
            $table->string('t_ref')->default('0');
            $table->string('t_cong')->default('0');
            $table->json('analyses');

            //Examen Trisomie 21
            $table->string('taille')->default('0');
            $table->string('poids')->default('0');
            $table->date('ddr')->nullable();
            $table->date('ddg')->nullable();
            $table->string('nb_foetus')->default('0');

            $table->string('commentaires')->nullable();

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
        Schema::dropIfExists('demandes');
    }
};