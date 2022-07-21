<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespiscinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respiscines', function (Blueprint $table) {
            $table->integer('idrespiscine')->autoIncrement();
            $table->timestamps();
            $table->string('numPieceID','20');
            $table->integer('nbre_personne');
            $table->date('date');
            $table->integer('idpiscine');
            $table->integer('etat')->default(0);

            $table->foreign('numPieceID')->references('numPieceID')->on('clients');
            $table->foreign('idpiscine')->references('idpiscine')->on('piscines');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respiscines');
    }
}
