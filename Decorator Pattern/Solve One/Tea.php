<?php


namespace App\Http\Controllers;


class Tea extends Beverage
{
    public string $description = 'Tea';

    public function cost(): int
    {
        return 1000;
    }

}
