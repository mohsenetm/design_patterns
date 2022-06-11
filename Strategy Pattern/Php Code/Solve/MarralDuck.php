<?php


namespace App\Http\Controllers\Solve;


class MarralDuck extends Duck
{

    public function __construct()
    {
        $this->flyBehaviour = new FlyBehaviour();
        $this->voiceBehaviour = new VoiceBehavioure();
    }

}
