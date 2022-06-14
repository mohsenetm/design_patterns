<?php


namespace App\Http\Controllers\SolveTwo;


class DisplayOne implements Display, Observer
{
    public string $temp;
    public string $pressure;
    public string $humidity;

    public function __construct(WeatherDataClass $weatherDataClass)
    {
        $weatherDataClass->registerObserver($this);
    }

    public function display(string $temp, string $pressure, string $humidity)
    {
        echo self::class . ' temp : ' . $temp . ' pressure : ' . $pressure . ' humidity : ' . $humidity;
        echo "<br>";
    }

    public function update(string $temp, string $pressure, string $humidity)
    {
        $this->display($temp, $pressure, $humidity);
    }
}
