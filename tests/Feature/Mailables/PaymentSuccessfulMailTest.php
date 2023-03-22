<?php

use App\Mail\PaymentSuccessfulMail;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('contains the product title', function () {
    // Arrange
    $product = Product::factory()->make();

   // Act
    $mail = new PaymentSuccessfulMail($product);

    // Assert
    expect($mail)
        ->assertHasSubject('Your payment was successful')
        ->assertSeeInHtml($product->title);
});
