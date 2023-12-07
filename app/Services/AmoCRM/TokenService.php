<?php

namespace App\Services\AmoCRM;

use AmoCRM\Exceptions\AmoCRMApiException;
use AmoCRM\Exceptions\AmoCRMMissedTokenException;
use AmoCRM\Exceptions\AmoCRMoAuthApiException;
use AmoCRM\Exceptions\BadTypeException;

class TokenService
{
    private \AmoCRM\Client\AmoCRMApiClient $apiClient;

    public function __construct()
    {
        $this->init();
    }

    public function getTokenByCode()
    {
        $accessToken = $this->apiClient->getOAuthClient()->getAccessTokenByCode(
            'def50200f22303c1e6b2dee57f566ed442ff20b2196d13bda7c3e345fac3555a4014f2c92d2d2a361b689f756a13f7d7330338b435b667acddefc427d4d77c0a1b20a8199668a6c75311be3909463ef8d34cecafe71fddc017fce73ee182b77ee9c2b9b383b82c84218a7940314b7d365ed0b556849225b7653456903d57b1f83a1d177bc3fc42e2206d41f22cb09aa4248b83e13468dd42194f7adbc407da38c3d6fea73f33d4cae4806363b285834ea3659285caaa15788d5497eff09c38a6debff974ef71d38529a6e06b444860b10123e8a04ea853729c531ddb5cb347584f372ea2c361106ab8426201509709f09fb818c69908665323548c57d97bd3bc3ff12119b37213aefc1974f5ab922f7cafaf10d52859dee502f038cf8a6dff17f1bbfa89c163b51add762d4083c9fda2351a5029fa274158e5a41a3920f3289c26692c10d632cc9f2677396042212b54c17a0176019daefeb98758f9f5877905c8764e556fdb2f267cad000f8579ff6b2829847b7f7435f2bac2c1a58a3f4023118fd550053ef37e13b9f184080644822ab5be6eeb0cd1c9c324bf37ece444380f5cc6619fcec77619bc30385ebb5ec1886eb31349b2c2e74f9bee73b03d0bf9c7d83dc1d0a8d39417178b267bfa4691705dd017e6d52b89c08c1838307f81ee4d7c5eb0d68da35cde0fa50feb4053adc0b584edc6f23ff08bb09ec5c8f444d7a3a28a873f26ae'
        );

        dd($accessToken);
    }

    private function init() : void
    {
        $this->apiClient = new \AmoCRM\Client\AmoCRMApiClient(
            config('amoCRM.clientId'),
            config('amoCRM.clientSecret'),
            config('amoCRM.redirectUri')
        );
    }
}
