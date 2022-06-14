<?php


namespace App\Http\Controllers\SolveOne;


class DisplayThree implements Display
{

    public function display(string $temp, string $pressure, string $humidity)
    {
        echo self::class. ' temp : '.$temp;
        echo "<br>";
    }
}
