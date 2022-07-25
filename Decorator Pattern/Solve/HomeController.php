<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JetBrains\PhpStorm\Pure;

class HomeController extends Controller
{
    /**
     * @throws \Exception
     */
    #[Pure] public function index(): int
    {
        $tea = new Tea();

        //wrapper one
        $tea = new Ice($tea);

        //wrapper two
        $tea = new Ice($tea);

        //wrapper three
        $tea = new Saffron($tea);

        return $tea->cost();
    }
}
