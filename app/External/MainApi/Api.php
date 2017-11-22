<?php

namespace App\External\MainApi;

use GuzzleHttp\Client;

class Api
{
    public $client;
    public $access_token;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://api.mainapi.net/']);
        $this->getAccessToken();
    }

    /**
     * Gets the access token.
     */
    public function getAccessToken()
    {
        $request = $this->client->post('/token', [
            'headers' => [
                'Authorization' => 'Basic '. env('MAINAPI_KEY')
            ],
            'body' => 'grant_type=client_credentials'
        ])->getBody();

        $this->access_token = json_decode($request)->access_token;
    }
}
