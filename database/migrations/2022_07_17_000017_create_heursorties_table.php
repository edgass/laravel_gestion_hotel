<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeursortiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heursorties', function (Blueprint $table) {
            $table->integer('idheursortie')->autoIncrement();
            $table->timestamps();
            $table->string('nomEmp');
            $table->string('matEmp','20');
            $table->string('heursortie');
            $table->integer('etat')->default(0);
            $table->integer('deletable')->default(0);

            $table->foreign('matEmp')->references('matEmp')->on('employes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('heursorties');
    }
}
