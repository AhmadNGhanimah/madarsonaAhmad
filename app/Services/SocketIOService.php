<?php

namespace App\Services;

use ElephantIO\Client;


class SocketIOService
{
    protected $client;

    public function __construct()
    {
        $url = config('services.socket_io.url');
        $options = ['client' => Client::CLIENT_4X];
        $this->client = Client::create($url, $options);
        $this->client->connect();

    }

    public function sendMessage($event, $data = [])
    {
        $this->client->emit($event, $data);
    }

    public function __destruct()
    {
        $this->client->disconnect();
    }
}
