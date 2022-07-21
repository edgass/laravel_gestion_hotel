<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiscinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piscines', function (Blueprint $table) {
            $table->integer('idpiscine')->autoIncrement();
            $table->timestamps();
            $table->integer('prixPiscine')->default('5000');
            $table->string('image');
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
        Schema::dropIfExists('piscines');
    }
}
