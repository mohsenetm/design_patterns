<?php

namespace App\Http\Controllers\SolveOne;

class WeatherDataClass
{
    public function getTemp(): string
    {
        return rand(10, 40) . " C";
    }

    public function getPressure(): string
    {
        return rand(1, 10) . ' g';
    }

    public function getHumidity(): string
    {
        return rand(0, 100) . ' %';
    }

    public function showDataInMultiDisplay()
    {
        $temp = $this->getTemp();
        $pressure = $this->getPressure();
        $humidity = $this->getHumidity();

        (new DisplayOne())->display($temp, $pressure, $humidity);
        (new DisplayTwo())->display($temp, $pressure, $humidity);
        (new DisplayThree())->display($temp, $pressure, $humidity);
    }
}
