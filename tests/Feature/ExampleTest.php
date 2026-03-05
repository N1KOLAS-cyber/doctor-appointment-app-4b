<?php

it('redirects home to admin', function () {
    $response = $this->get('/');

    $response->assertStatus(301);
    $response->assertRedirect('/admin');
});
