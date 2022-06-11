<?php


namespace App\Http\Controllers\Refactoring;
use App\Http\Controllers\Controller;


class NavigatorControllerWithStrategy
{
    public $route;

    public function __construct(RouteStrategyInterface $route)
    {
        $this->route = $route;
    }

    public function buildRoute($from, $to)
    {
        $this->route->getRoute();
        return 'Build Route';
    }

}
