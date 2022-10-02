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
            $table->string('ddn');
            $table->string('num_carte');
            $table->string('num_dossier');

            //Info examens
            $table->string('date_prelev');
            $table->string('type_dossier');
            $table->string('etat_dossier')->default('en cours');
            $table->integer('nb_tubes');
            $table->string('t_ambiante')->nullable();
            $table->string('t_ref')->nullable();
            $table->string('t_cong')->nullable();
            $table->json('analyses');

            //Examen Trisomie 21
            $table->string('taille')->nullable();
            $table->string('poids')->nullable();
            $table->string('ddr')->nullable();
            $table->string('ddg')->nullable();
            $table->string('nb_foetus')->nullable();

            $table->string('commentaires')->nullable();

            $table->json('resultats')->nullable();

            $table->unsignedBigInteger('correspondant');
            $table->string('code_labo');

            $table->timestamps();
        });

            Schema::table('demandes', function (Blueprint $table) {
                $table->foreign('correspondant')->references('id')->on('users')->onDelete('cascade')->nullable();
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