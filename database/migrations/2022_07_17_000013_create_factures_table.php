<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facture', function (Blueprint $table) {
            $table->integer('idFacture')->autoIncrement();
            $table->timestamps();
            $table->date('dateDue');
            $table->date('dateEmission');
            $table->string('typeFacture','25');
            $table->integer('idclient');
            $table->integer('etat')->default('0');

            $table->foreign('idclient')->references('idclient')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factures');
    }
}
