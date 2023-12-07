<?php

namespace App\Services;

class AmoCRMService
{
    private \AmoCRM\Client\AmoCRMApiClient $apiClient;

    public function __construct()
    {
        $this->init();
    }

    public function createDeal()
    {

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
