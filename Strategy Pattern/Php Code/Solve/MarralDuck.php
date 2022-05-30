<?php


namespace App\Http\Controllers;


class MarralDuck extends Duck
{
    public $flyBehaviours;
    public $voiceBehaviours;

    public function __construct(FlyInterface $flyBehaviour, VoiceInterface $voiceBehaviour)
    {
        $this->flyBehaviour = $flyBehaviour;
        $this->voiceBehaviour = $voiceBehaviour;

    }

    public function performFly(){
        $this->flyBehaviour->fly();
    }

    public function performVoce(){
        $this->voiceBehaviour->voice();
    }



}
