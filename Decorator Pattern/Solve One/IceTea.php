<?php


namespace App\Http\Controllers;


class IceTea extends Beverage
{
    public string $description = 'Ice Tea';

    public function cost(): int
    {
        return 2000;
    }
}
