<?php

namespace App\Http\Controllers\SolveTwo;

class WeatherDataClass implements Subject
{
    private array $observerList;

    public function __construct($observerList = [])
    {
        $this->observerList = $observerList;
    }

    public function registerObserver(Observer $observer)
    {
        $this->observerList[$observer::class] = $observer;
    }

    public function removeObserver(Observer $observer)
    {
        unset($this->observerList[$observer::class]);
    }

    public function notifyObserver(string $temp, string $pressure, string $humidity)
    {
        foreach ($this->observerList as $observe) {
            /** @var Observer $observe */
            $observe->update($temp, $pressure, $humidity);
        }
    }

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

        $this->notifyObserver($temp, $pressure, $humidity);
    }

}
