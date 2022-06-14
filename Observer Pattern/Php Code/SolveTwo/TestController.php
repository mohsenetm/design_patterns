<?php


namespace App\Http\Controllers\SolveTwo;


use App\Http\Controllers\Controller;

class TestController extends Controller
{

    public function index()
    {
        $weatherData = new WeatherDataClass();
        (new DisplayOne($weatherData));
        (new DisplayTwo($weatherData));
        (new DisplayThree($weatherData));
        $weatherData->showDataInMultiDisplay();
    }

}
