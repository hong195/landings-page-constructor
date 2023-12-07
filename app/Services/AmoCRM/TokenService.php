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
            'def502004c8704a6f1405d61b7afc88b8b37fc3b44ccf42b8ecc89aa7ecea77247a4696ab6f87a833f8f64d40ea24987ba5b254057fb427d4bae1781eb7aa1d0ba8c14bda231b9425117ed8162993b7bdb2d5c42b172ed7ec5b04eed76434235142fca6c0a9259b6a8e9a994a2a62471063b0282b87e048eba2657d3753dd332250ca638cd0bf0acc318bc078d9f986dfebd004336b6603309abae0c17e0d4a5e4f74c62226ee87d4b8285c39ae67fab721e62c7955e443961c5c2825e7ca0904e54303b3889cff60d6ef0d1091971d72f701ea24c6b060d1aae2c211cd5e6ad987a1120e48c6b9d2a1fe55cf486a49e6cb9baa408a642331cb387a72b5420f5604ff1b360ac14f569111523eb7ba55aad68bd5d380eb33f39fc7c83be7489a8a64a3967a2659a5368159cb3a95a29214127c7c7433c4604039fbf0664d264fd3fa86efced8dbd723c219dd7a66eadeb495df2555f288d01ac91d5b369e9f857d6e6fd0c937429e6a7d2821684bffa153ec7f941c7a08fe7fa5a0bcedbd3e35f3fcf27d66f2a9d6ed63b0ddb04812b55cd3802e4058f0b7768fd8609dc48b76ea0c2e0c57401109f5ec40c757a57c507314dbe972a5c588d5b47f4465176abb13cd50f114947e308af878e52873cd1fa139933d2d11288be919f40a6471ff9098a29bb1e28aa7c673decda677ed00c0843df0d4a1737f80b3821d14a91eefb0799ec209fe3d0c2'
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
