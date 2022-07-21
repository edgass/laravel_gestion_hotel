<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResparkingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resparkings', function (Blueprint $table) {
            $table->integer('idresparking')->autoIncrement();
            $table->timestamps();
            $table->string('numPieceID');
            $table->string('numeroplace');
            $table->date('date');
            $table->integer('etat')->default(0);

            $table->foreign('numPieceID')->references('numPieceID')->on('clients');
            $table->foreign('numeroplace')->references('numeroplace')->on('parkings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resparkings');
    }
}
