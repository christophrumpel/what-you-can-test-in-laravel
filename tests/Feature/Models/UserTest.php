<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('capitalizes the first character of the first name', function () {
    // Arrange
    $user = User::factory()->create(['first_name' => 'christoph']);

    // Act && Assert
    expect($user->first_name)
        ->toBe('Christoph');
});
