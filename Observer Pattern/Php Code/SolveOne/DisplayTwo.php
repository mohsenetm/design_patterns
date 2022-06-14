<?php


namespace App\Http\Controllers\SolveOne;


class DisplayTwo implements Display
{

    public function display(string $temp, string $pressure, string $humidity)
    {
        echo self::class. ' temp : '.$temp.' pressure : '.$pressure;
        echo "<br>";
    }
}
