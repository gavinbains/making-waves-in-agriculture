<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\FarmDataModel;
use App\WeekDataModel;
use Carbon\Carbon;
use Vinelab\Http\Client as HttpClient;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getData()
    {
        $client = new HttpClient;

        $response = $client->get('http://localhost:3000/db');

        $newResponse = $response->json();
        
        $farm = new FarmDataModel;
        $farm->city = $newResponse->farm->city;
        $farm->country = $newResponse->farm->country;
        //$farm->create_time = Carbon::now();
        $farm->save();
        
        $weeks = $newResponse->weeks;
        foreach($weeks as $week){
            $weekObj = new WeekDataModel;
            $weekObj->volume_of_irrigation_water = $week->volume_of_irrigation_water;
            $weekObj->electrical_energy = $week->electrical_energy;
            $weekObj->dissolved_salts = $week->dissolved_salts;
            $weekObj->soil_reaction_ph = $week->soil_reaction_ph;
            //$weekObj->weight = $week->weight;
            $weekObj->week_number = $week->week_number;
            $weekObj->farm_id = $farm->id;
            $weekObj->save();
        }

        return json_encode($newResponse);
    }
}
