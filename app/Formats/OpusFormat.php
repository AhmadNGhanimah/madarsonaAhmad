<?php

namespace App\Formats;



use FFMpeg\Format\AudioInterface;

class OpusFormat implements AudioInterface
{
    private $codec = 'libopus';
    private $audioChannels = 2;
    private $audioSampleRate = 48000;
    private $audioBitrate = 96000;

    public function getAudioCodec()
    {
        return $this->codec;
    }

    public function getAudioChannels()
    {
        return $this->audioChannels;
    }

    public function getAudioKiloBitrate()
    {
        return $this->audioBitrate / 1000;
    }

    public function getAudioSampleRate()
    {
        return $this->audioSampleRate;
    }

    // Implement other methods from AudioInterface if needed

    public function getAdditionalParameters()
    {
        return [
            '-c:a' => $this->codec,
            '-b:a' => $this->getAudioKiloBitrate() . 'k',
            '-ar'   => $this->getAudioSampleRate(),
            '-ac'   => $this->getAudioChannels(),
        ];
    }

    public function getAvailableAudioCodecs()
    {
        // TODO: Implement getAvailableAudioCodecs() method.
    }

    public function getPasses()
    {
        // TODO: Implement getPasses() method.
    }

    public function getExtraParams()
    {
        // TODO: Implement getExtraParams() method.
    }
}
