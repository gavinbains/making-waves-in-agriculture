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
            $table->increments('id',true)->unique();
            $table->string('city');
            $table->string('country');
            $table->rememberToken();
            $table->timestamps();
        });

        Users::where("id", '=', 1)
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farm_data');
    }
}
