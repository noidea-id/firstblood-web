<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\External\MainApi\Api;

class OtpController extends Controller
{
    protected $uri = 'smsotp/1.0.1';
    protected $api;

    public function __construct()
    {
        $this->api = new Api();
    }

    /**
     * Generate OTP Key
     */
    public function generate($phone)
    {
        $request = $this->api->client->put($this->uri . '/otp/' . $this->api->access_token, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $this->api->access_token
            ],
            'body' => '{"phoneNum": "' . $phone . '", "digit": 4}'
        ])->getBody();

        return $request;
    }

    /**
     * Validate OTP Key
     */
    public function verificate($code)
    {
        $request = $this->api->client->post($this->uri . '/otp/' . $this->api->access_token . '/verifications', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $this->api->access_token
            ],
            'body' => '{"otpstr": "' . $code . '", "digit": 4}'
        ])->getBody();

        return $request;
    }
}
