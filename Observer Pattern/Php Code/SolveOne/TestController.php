<?php


namespace App\Http\Controllers\SolveOne;


use App\Http\Controllers\Controller;

class TestController extends Controller
{

    public function index()
    {
        $weatherData = new WeatherDataClass();
        $weatherData->showDataInMultiDisplay();
    }

}
