<?php


namespace App\Http\Controllers;

use JetBrains\PhpStorm\Pure;

class Beverage
{
    protected string $description = 'Unknown';

    protected int $saffronCost = 2000;

    protected int $iceCost = 1000;

    public bool $saffron = false;

    #[Pure] public function cost(): int
    {
        $sumCost = 0;

        if ($this->hasIce()) {
            $sumCost += $this->iceCost;
        }

        if ($this->hasSaffron()) {
            $sumCost += $this->saffronCost;
        }

        return $sumCost;
    }

    /**
     * @return bool
     */
    public function hasSaffron(): bool
    {
        return $this->saffron;
    }

    /**
     * @param bool $saffron
     */
    public function setSaffron(bool $saffron): void
    {
        $this->saffron = $saffron;
    }

    /**
     * @return bool
     */
    public function hasIce(): bool
    {
        return $this->ice;
    }

    /**
     * @param bool $ice
     */
    public function setIce(bool $ice): void
    {
        $this->ice = $ice;
    }

    public bool $ice = false;


    public function getDescription()
    {
        return $this->description;
    }

}
