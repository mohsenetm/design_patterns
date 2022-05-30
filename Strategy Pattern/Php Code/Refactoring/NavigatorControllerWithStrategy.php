<?php


namespace App\Http\Controllers;


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
    }

}
