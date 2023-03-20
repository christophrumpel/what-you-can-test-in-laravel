<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('gives back a successful response for home page', function () {
    $this->get('/')->assertOk();
});
