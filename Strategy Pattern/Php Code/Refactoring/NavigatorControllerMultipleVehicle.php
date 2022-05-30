<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigatorControllerMultipleVehicle extends Controller
{
    public function buildRoute($from, $to, $vehicle)
    {
        if ($vehicle == 'car') {
            $this->getTraffic();
            $this->getLimitations();
            $this->getRoute();
        }

        if ($vehicle == 'walk') {
            $this->getTrafficWalk();
            $this->getLimitationsWalk();
            $this->getRouteWalk();
        }
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

    private function getTrafficWalk()
    {

    }

    private function getLimitationsWalk()
    {

    }

    private function getRouteWalk()
    {

    }
}
