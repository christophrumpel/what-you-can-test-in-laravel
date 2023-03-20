<?php

use App\Console\Commands\MergeAccountsCommand;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('stops if at least one account not found', function () {
    // Act
    $this->artisan(MergeAccountsCommand::class, [
        'userId' => 1,
        'userToBeMergedId' => 2,
    ]);
})->throws(ModelNotFoundException::class);
