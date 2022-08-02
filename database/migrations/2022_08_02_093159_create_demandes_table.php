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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('civ');
            $table->date('ddn');

            //Info examens
            $table->string('date_prelev');
            $table->string('type_dossier');
            $table->string('type_tube');
            $table->integer('nb_tube');
            $table->json('examens');

            //Examen Trisomie 21
            $table->string('origine')->nullable();
            $table->float('taille', 3, 2)->nullable();
            $table->float('poids', 3, 2)->nullable();
            $table->boolean('tabagisme')->nullable()->default(0);
            $table->boolean('diabete')->nullable()->default(0);
            $table->boolean('fiv')->nullable()->default(0);
            $table->integer('nb_foetus')->nullable();
            $table->integer('age_sem')->nullable();
            $table->integer('age_jours')->nullable();
            $table->integer('trimestre')->nullable();

            $table->unsignedBigInteger('user_id');

            $table->timestamps();
        });

        Schema::table('demandes', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->nullable();
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