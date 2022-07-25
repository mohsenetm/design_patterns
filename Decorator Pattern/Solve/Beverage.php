<?php


namespace App\Http\Controllers;

use JetBrains\PhpStorm\Pure;

abstract class Beverage
{
    protected string $description = 'Unknown';

    public function getDescription()
    {
        return $this->description;
    }


    abstract public function cost(): int;

}
