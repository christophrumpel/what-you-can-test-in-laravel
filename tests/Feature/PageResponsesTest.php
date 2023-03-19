<?php


it('gives back a successful response for home page', function () {
    $this->get('/')->assertOk();
});
