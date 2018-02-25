<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WeekData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('week_data', function (Blueprint $table) {
            $table->increments('id',true)->unique();
            $table->double('volume_of_irrigation_water', 8, 2);
            $table->double('electrical_energy', 8, 2);
            $table->double('dissolved_salts', 8, 2);
            $table->double('soil_reaction_ph', 8, 2);
            $table->double('weight', 8, 2);
            $table->integer('week_number');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('farm_id')->unsigned();
            
            $table->foreign('farm_id')
                ->references('id')->on('farm_data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('week_data');
    }
}
