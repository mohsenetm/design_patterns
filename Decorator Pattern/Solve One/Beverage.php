<?php


namespace App\Http\Controllers;


abstract class Beverage
{
    protected string $description = 'Unknown';

    public function getDescription()
    {
        return $this->description;
    }

    abstract public function cost():int;

}
