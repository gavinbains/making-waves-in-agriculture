<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FarmDataModel extends Model
{
    protected $table = 'farm_data';
    //Override default column names to match migration file
    /*const UPDATED_AT = 'update_time';
    const CREATED_AT = 'create_time';*/

    protected $fillable = [
        'city', 'country',
    ];
}
