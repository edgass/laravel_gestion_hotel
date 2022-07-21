<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->integer('idclient')->autoIncrement();
            $table->timestamps();
            $table->string('nomClient','50');
            $table->string('prenomClient','50');
            $table->string('telClient','15');
            $table->string('adresseClient','50');
            $table->string('emailClient','50')->unique();
            $table->string('image');
            $table->string('numPieceID','20')->unique();
            $table->integer('etat')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
