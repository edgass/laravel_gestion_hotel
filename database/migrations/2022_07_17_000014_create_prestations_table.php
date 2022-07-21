<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestation', function (Blueprint $table) {
            $table->integer('idPrestation')->autoIncrement();
            $table->string('typePrestation','50');
            $table->string('detailPrestation');
            $table->date('datePrestation');
            $table->integer('idFacture');
            $table->string('numPieceID','20');
            $table->timestamps();
            $table->integer('etat')->default('0');
            $table->integer('prixPresta');

            $table->foreign('numPieceID')->references('numPieceID')->on('clients');
            $table->foreign('idFacture')->references('idFacture')->on('facture');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestations');
    }
}
