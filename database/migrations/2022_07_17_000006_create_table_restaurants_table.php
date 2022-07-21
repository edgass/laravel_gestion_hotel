<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_restaurants', function (Blueprint $table) {
            $table->integer('idtable_restaurant')->autoIncrement();
            $table->timestamps();
            $table->string('numerotable','10')->unique();
            $table->integer('nbrpersonne');
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
        Schema::dropIfExists('table_restaurants');
    }
}
