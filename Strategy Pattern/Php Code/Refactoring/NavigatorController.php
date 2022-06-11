<?php

namespace App\Http\Controllers\Refactoring;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NavigatorController extends Controller
{
    public function buildRoute($from, $to)
    {
        $this->getTraffic();
        $this->getLimitations();
        $this->getRoute();

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
}
