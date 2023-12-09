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
        $authCode = 'def502000f8a93565d682d6e895045f2777d53c041ee797b044d67bdbf4f1134dcfaf197034b9b9bd6c07acfd95c228270e5c90d2a5a0fe74d9857ddaf0e814e45cb7bb484ca885f4e2374544f3805ad24e4fe3c0405f14805b8e40c86915b5803c2170cd526c4648b068e462b81f418d58ceb31ebbf2ca15f1611d524ea827043208ae50856cc08f7ab3abd192acb9e7fb819bae55ca1ac7d8ea5dad2bc489a8735af392f675c1b8f2eb6ae438a9fe871fe4e2a787f86f1e9aa651acbfa8485cb13b62a6a6ac4772d2f946c118a1f345d26ddf59e110f990efd0bf34f25619da997b1c6bb2a0686f7fd7d020f0877e95083da30466e4212c5d345c0d35def9b86cf6c476c482f68216cc415cd0aa61c62c91d593e871eeec07766cd406957af46c17d5a76e3dcbe7220d69e94db308d15cc9866d426942c53ce5ee466e985e11748fe1e3c0dd01c9545ef65f253df70143331369ea4434b843f3ecce3fc74034630373507ae7b3b9646224273b43cb4dd09ee189fcc7305b02a33d83c911328e885c8804cf61efb863127516db5489aabb91ba64edb3320248a87c3f40cd764d201b5a8a444bfd977c8ed62099a3fb4c9bb387039a2bd30305254ce124f7dc226c03beaa96495773f769346442f32543fc2a5832f6d3a7dfcb19d18b8bf74879d9671e6aaf4d407a8116fb9e14a46a717afd3d039d2997ea81874b8a405ad0fdcca5fe63e2453';

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
