<?php

use App\Data\UserData;

it('creates UserData object from paddle webhook call', function () {
    // Arrange
    $payload = [
      'client_email' => 'test@test.at',
      'client_name' => 'Christoph Rumpel',
      'client_country' => 'AT',
    ];

    // Act
    $userData = UserData::fromWebhookPayload($payload);

    // Assert
    expect($userData)
        ->email->toBe('test@test.at')
        ->name->toBe('Christoph Rumpel')
        ->country->toBe('AT');
});
