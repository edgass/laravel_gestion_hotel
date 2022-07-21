<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResrestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resrestaurants', function (Blueprint $table) {
            $table->integer('idresrestaurant')->autoIncrement();
            $table->timestamps();
            $table->string('numerotable');
            $table->string('numPieceID','20');
            $table->integer('nbre_personne');
            $table->date('date');
            $table->integer('etat')->default(0);

            $table->foreign('numPieceID')->references('numPieceID')->on('clients');
            $table->foreign('numerotable')->references('numerotable')->on('table_restaurants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resrestaurants');
    }
}
