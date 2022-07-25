<?php


namespace App\Http\Controllers;

use JetBrains\PhpStorm\Pure;

class CondimentDecorator extends Beverage
{
    public Beverage $beverage;

    public function __construct(Beverage $beverage)
    {
        $this->beverage = $beverage;
    }

    public function getDescription()
    {
        return $this->beverage->getDescription() . '  ' . $this->description; // TODO: Change the autogenerated stub
    }

    /**
     * @throws \Exception
     */
    public function cost():int
    {
        throw new \Exception('method not found');
    }


}