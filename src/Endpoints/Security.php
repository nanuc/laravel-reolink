<?php

namespace Nanuc\LaravelReolink\Endpoints;

class Security extends Endpoint
{
    public function login($username, $password)
    {
        return $this->execute('Login', [
            "User" => [
                "Version" => 0,
                "userName" => $username,
                "password" => $password,
            ]
        ], withToken: false);
    }
}
