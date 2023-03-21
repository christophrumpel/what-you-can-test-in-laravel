<?php

namespace App\Data;

class UserData
{
    public function __construct(
        public string $email,
        public string $name,
        public string $country,
    )
    {}

    public static function fromWebhookPayload(array $webhookCallData): UserData
    {
        return new self(
            $webhookCallData['client_email'],
            $webhookCallData['client_name'],
            $webhookCallData['client_country'],
        );
    }
}
