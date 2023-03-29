<?php

use App\Console\Commands\MergeAccountsCommand;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('merges two accounts', function () {
    // Arrange
    $user = User::factory()->create();
    $userToBeMerged = User::factory()->create();

    // Act
    $this->artisan(MergeAccountsCommand::class, [
        'userId' => $user->id,
        'userToBeMergedId' => $userToBeMerged->id,
    ]);

    // Assert
    $this->assertDatabaseCount(User::class, 1);
    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
    ]);
});

it('merges account products', function () {
    // Arrange
    $user = User::factory()
        ->has(Product::factory())
        ->create();

    $userToBeMerged = User::factory()
        ->has(Product::factory())
        ->create();

    // Act
    $this->artisan(MergeAccountsCommand::class, [
        'userId' => $user->id,
        'userToBeMergedId' => $userToBeMerged->id,
    ]);

    // Assert
    $this->assertDatabaseCount(Product::class, 2);
    Product::all()->each(function (Product $product) use ($user) {
        $this->assertEquals($user->id, $product->user_id);
    });
});

it('asks for user ids', function() {
    // Arrange
    $user = User::factory()->create();
    $userToBeMerged = User::factory()->create();

    // Act & Assert
    $this->artisan(MergeAccountsCommand::class)
        ->expectsQuestion('Please provide the user ID of the user you want to keep', $user->id)
        ->expectsQuestion('Please provide the user ID of the user you want to merge', $userToBeMerged->id)
        ->assertSuccessful();
});

it('stops if at least one account not found', function () {
    // Act
    $this->artisan(MergeAccountsCommand::class, [
        'userId' => 1,
        'userToBeMergedId' => 2,
    ]);
})->throws(ModelNotFoundException::class);
