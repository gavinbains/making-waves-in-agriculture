<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeekDataModel extends Model
{
    protected $table = 'week_data';
    //Override default column names to match migration file
    /*const UPDATED_AT = 'update_time';
    const CREATED_AT = 'create_time';*/

    protected $fillable = [
        'volume_of_irrigation_water', 
        'electrical_energy', 
        'dissolved_salts', 
        'soil_reaction_ph',
        'weight',
        'week_number',
        'farm_id',
    ];
}
