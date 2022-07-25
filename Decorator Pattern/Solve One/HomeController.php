<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JetBrains\PhpStorm\Pure;

class HomeController extends Controller
{
    #[Pure] public function index(): int
    {
        return (new SaffronTea())->cost();
    }
}
