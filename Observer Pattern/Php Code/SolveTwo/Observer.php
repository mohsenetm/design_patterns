<?php


namespace App\Http\Controllers\SolveTwo;


interface Observer
{
    public function update(string $temp, string $pressure, string $humidity);
}
