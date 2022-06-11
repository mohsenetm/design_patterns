<?php


namespace App\Http\Controllers\SolveTwo;


class MarralDuck implements VoiceInterface, FlyInterface
{

    public function voice()
    {
        return 'Quack';
    }

    public function fly()
    {
        return 'fly';
    }
}
