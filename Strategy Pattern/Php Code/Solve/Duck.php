<?php


namespace App\Http\Controllers;


class Duck
{
    public FlyInterface $flyBehaviour;
    public VoiceInterface $voiceBehaviour;

    public function performFly()
    {
        $this->flyBehaviour->fly();
    }

    public function performVoce()
    {
        $this->voiceBehaviour->voice();
    }

    public function setFly(FlyInterface $flyBehaviour)
    {
        $this->flyBehaviour = $flyBehaviour;
    }

    public function setVoice(VoiceInterface $voiceBehaviour)
    {
        $this->voiceBehaviour = $voiceBehaviour;
    }

}
