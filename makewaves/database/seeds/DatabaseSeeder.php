<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('farm_data')->insert(array(
            array(                                              //99:For Testing
                'id'=>1,
                'city'=>'Hangzhou',
                'country'=>'China'
            ),
            array(                                              //01:Scheduled
                'id'=>2,
                'city'=>'Honolulu',
                'country'=>'United States'
            ),
            array(                                              //02:In Progress
                'id'=>3,
                'city'=>'San Paulo',
                'country'=>'Brazil'
            )
        ));

        DB::table('week_data')->insert(array(
            array(                                              //99:For Testing
                'id'=>1,
                'volume_of_irrigation_water'=>4.5,
                'electrical_energy'=>3.6,
                'dissolved_salts'=>4.5,
                'soil_reaction_ph'=>7.8,
                'weight'=>30.5,
                'week_number'=>1,
                'farm_id'=>1
            ),
            array(                                              //01:Scheduled
                'id'=>2,
                'volume_of_irrigation_water'=>4.2,
                'electrical_energy'=>3.8,
                'dissolved_salts'=>4.8,
                'soil_reaction_ph'=>6.8,
                'weight'=>33.5,
                'week_number'=>2,
                'farm_id'=>1
            ),
            array(                                              //02:In Progress
                'id'=>3,
                'volume_of_irrigation_water'=>3.9,
                'electrical_energy'=>3.3,
                'dissolved_salts'=>4.4,
                'soil_reaction_ph'=>7.3,
                'weight'=>35.5,
                'week_number'=>3,
                'farm_id'=>1
            )
        ));
    }
}
