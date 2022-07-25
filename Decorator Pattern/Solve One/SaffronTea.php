<?php


namespace App\Http\Controllers;


class SaffronTea extends Beverage
{
    public string $description = 'Saffron Tea';

    public function cost(): int
    {
        return 3000;
    }

}
