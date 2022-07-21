<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitements', function (Blueprint $table) {
            $table->integer('idrecruitement')->autoIncrement();
            $table->timestamps();
            $table->string('nomCand','50');
            $table->string('prenomCand','50');
            $table->string('telCand','15');
            $table->string('adresseCand','50');
            $table->string('emailCand')->unique();
            $table->string('image');
            $table->string('paysResidance','30');
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
        Schema::dropIfExists('recruitements');
    }
}
