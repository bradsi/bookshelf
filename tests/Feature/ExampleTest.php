<?php

it('renders the login page', function (): void {
    $response = $this->get('/login');
    $response->assertStatus(200);
});
