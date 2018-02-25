<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Vinelab\Http\Client as HttpClient;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getData()
    {
        $client = new HttpClient;

        $response = $client->get('http://localhost:3000/db');

        $response = "here";
        // $responseArray = $response->json();

        // dd($response);
        // echo $response;

        return $response;
    }
}
