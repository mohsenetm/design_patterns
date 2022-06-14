<?php


namespace App\Http\Controllers\SolveTwo;


interface Subject
{
    public function registerObserver(Observer $observer);

    public function removeObserver(Observer $observer);

    public function notifyObserver(string $temp,string $pressure,string $humidity);

}
