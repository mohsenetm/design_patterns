<?php


namespace App\Http\Controllers;


class Saffron extends CondimentDecorator
{
    public string $description = 'Saffron';

    public function cost(): int
    {
        return $this->beverage->cost() + 2000;
    }

}
