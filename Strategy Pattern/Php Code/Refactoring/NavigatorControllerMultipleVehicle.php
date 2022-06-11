<?php

namespace App\Http\Controllers\Refactoring;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        return 'Build Route';
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
