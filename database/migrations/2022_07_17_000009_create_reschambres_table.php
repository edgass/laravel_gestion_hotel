<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReschambresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reschambres', function (Blueprint $table) {
           $table->integer('idreschambre')->autoIncrement();
            $table->timestamps();
            $table->string('numPieceID','20');
            $table->integer('nbre_personne');
            $table->string('numeroChambre','10');
            $table->date('date');
            $table->integer('etat')->default(0);
            $table->integer('deletable')->default(0);

            $table->foreign('numPieceID')->references('numPieceID')->on('clients');
            $table->foreign('numeroChambre')->references('numeroChambre')->on('chambres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reschambres');
    }
}
