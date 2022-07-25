<?php


namespace App\Http\Controllers;


class Ice extends CondimentDecorator
{
    public string $description = 'Ice';

    public function cost(): int
    {
        return $this->beverage->cost() + 1000;
    }

}
