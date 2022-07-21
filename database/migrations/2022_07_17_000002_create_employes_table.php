<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->integer('idemploye')->autoIncrement();
            $table->timestamps();
            $table->string('nomEmp');
            $table->string('prenomEmp');
            $table->string('matEmp','20')->unique();
            $table->string('telEmp');
            $table->string('adresseEmp');
            $table->string('emailEmp');
            $table->string('fonctionEmp');
            $table->integer('salaireEmp');
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
        Schema::dropIfExists('employes');
    }
}
