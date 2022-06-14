<?php


namespace App\Http\Controllers\SolveTwo;


class DisplayThree implements Display,Observer
{
    public function __construct(WeatherDataClass $weatherDataClass)
    {
        $weatherDataClass->registerObserver($this);
    }

    public function display(string $temp, string $pressure, string $humidity)
    {
        echo self::class. ' temp : '.$temp;
        echo "<br>";
    }

    public function update(string $temp, string $pressure, string $humidity)
    {
        $this->display($temp, $pressure, $humidity);
    }
}
