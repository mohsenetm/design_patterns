<?php


namespace App\Http\Controllers\Solve;


interface Subject
{
    public function registerObserver(Observer $observer);

    public function removeObserver(Observer $observer);

    public function notifyObserver();

}
