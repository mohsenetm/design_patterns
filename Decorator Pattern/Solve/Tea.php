<?php


namespace App\Http\Controllers;


use JetBrains\PhpStorm\Pure;

class Tea extends Beverage
{
    public string $description = 'Tea';

    #[Pure] public function cost(): int
    {
        return 1000;
    }

}
