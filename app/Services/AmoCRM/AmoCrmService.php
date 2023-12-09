<?php

namespace App\Services\AmoCRM;

use AmoCRM\AmoAPI;
use AmoCRM\AmoAPIException;
use AmoCRM\AmoContact;
use AmoCRM\AmoIncomingLeadForm;
use AmoCRM\AmoLead;
use AmoCRM\TokenStorage\FileStorage;

class AmoCrmService
{
    private string|int $responsible_user = '10369202';
    private string|int $pipeline = '7371298';
    private string $lead_name = 'Новая заявка с сайта';
    private string $source = 'goldengateproperties.ae';

    private string $title = "Form from website";

    public function __construct()
    {
        $this->init();
    }

    public function send(string $fio, string $phone, string $source): void
    {
        try {
            // Создаем новую заявку в неразобранном при добавлении из веб-формы
            $incomingLead = new AmoIncomingLeadForm();

            $incomingLead->setIncomingLeadInfo([
                'form_id' => 1,
                'form_page' => config('app.url'),
                'form_name' => $this->title
            ]);

            // Добавляем параметры сделки
            $lead = new AmoLead([
                'name' => $this->lead_name,
            ]);

            $incomingLead->addIncomingLead($lead);

            // Добавляем параметры контакта
            $contact = new AmoContact([
                'name' => $fio
            ]);

            $contact->setCustomFields([
                '468203' => [[
                    'value' => $phone,
                    'enum' => '256477'
                ]],
                "1572599" => $source

            ]);
            $incomingLead->addIncomingContact($contact);
            // Сохраняем заявку
            AmoAPI::saveIncomingObjects($incomingLead);
        } catch (AmoAPIException $e) {
            report($e);
        }
    }

    private function init(): void
    {
        $clientId = config('amoCRM.clientId');
        $clientSecret = config('amoCRM.clientSecret');
        $redirectUri = config('amoCRM.redirectUri');
        $subdomain = config('amoCRM.baseDomain');
        $authCode = config('amoCRM.authCode');

        AmoAPI::$tokenStorage = new FileStorage();

        $domain = AmoAPI::getAmoDomain($subdomain);
        $isFirstAuth = !AmoAPI::$tokenStorage->hasTokens($domain);

        if ($isFirstAuth) {
            AmoAPI::oAuth2($subdomain, $clientId, $clientSecret, $redirectUri, $authCode);
        } else {
            AmoAPI::oAuth2($subdomain);
        }
    }
}
