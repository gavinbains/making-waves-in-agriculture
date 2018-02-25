<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FarmData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm_data', function (Blueprint $table) {
        $table->increments('id')->unique();
        $table->string('location');
        $table->double('volume_of_irrigation_water', 8, 2);
        $table->double('electrical_energy', 8, 2);
        $table->double('dissolved_salts', 8, 2);
        $table->double('soil_reaction_ph', 8, 2);
        $table->double('weight', 8, 2);
        $table->rememberToken();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        chema::dropIfExists('farm_data');
    }
}
