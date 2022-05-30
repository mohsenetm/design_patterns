<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigatorController extends Controller
{
    public function buildRoute($from, $to)
    {
        $this->getTraffic();
        $this->getLimitations();
        $this->getRoute();
    }

    private function getTraffic()
    {

    }

    private function getLimitations()
    {

    }

    private function getRoute()
    {

    }
}
