<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('numPieceID','20');
            $table->string('numerotable','10');
            $table->string('typeReservation');
            $table->datetime('dateReservation');
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
        Schema::dropIfExists('reservations');
    }
}
