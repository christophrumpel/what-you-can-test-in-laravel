<?php

use App\Mail\PaymentSuccessfulMail;
use App\Support\PaymentProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('sends payment successful mail', function () {
    // Arrange
    Mail::fake();

    // Expect
    $this->mock(PaymentProvider::class)
        ->shouldReceive('handle')
        ->once();

    // Act
    $this->post('payment');

    // Assert
    Mail::assertSent(PaymentSuccessfulMail::class);
});
