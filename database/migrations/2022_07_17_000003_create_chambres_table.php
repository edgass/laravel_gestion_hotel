<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChambresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chambres', function (Blueprint $table) {
            $table->integer('idchambre')->autoIncrement();
            $table->timestamps();
            $table->string('numeroChambre')->unique();
            $table->integer('prixChambre');
            $table->string('tailleChambre','10');
            $table->string('image');
            $table->integer('nombre_personne');
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
        Schema::dropIfExists('chambres');
    }
}
