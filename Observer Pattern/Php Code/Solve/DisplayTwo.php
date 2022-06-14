<?php


namespace App\Http\Controllers\Solve;


class DisplayTwo implements Display, Observer
{
    public string $temp;
    public string $pressure;
    public string $humidity;
    public object $weatherDataClass;

    public function __construct(WeatherDataClass $weatherDataClass)
    {
        $this->weatherDataClass = $weatherDataClass;
        $this->weatherDataClass->registerObserver($this);
    }

    public function display()
    {
        echo self::class . ' temp : ' . $this->temp . ' pressure : ' . $this->pressure;
        echo "<br>";
    }

    public function update()
    {
        $this->temp = $this->weatherDataClass->getTemp();
        $this->pressure = $this->weatherDataClass->getPressure();
        $this->display();
    }
}
