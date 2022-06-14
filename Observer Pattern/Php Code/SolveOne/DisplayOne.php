<?php


namespace App\Http\Controllers\SolveOne;


class DisplayOne implements Display
{

    public function display(string $temp, string $pressure, string $humidity)
    {
        echo self::class. ' temp : '.$temp.' pressure : '.$pressure.' humidity : '.$humidity;
        echo "<br>";
    }
}
