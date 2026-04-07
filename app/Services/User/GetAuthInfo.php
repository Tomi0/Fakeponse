<?php

namespace App\Services\User;

class GetAuthInfo
{
    public function handle(): array
    {
        $authConfig = config('auth');

        return [
            'auth_url' => $authConfig['auth_url'],
            'auth_client_name' => $authConfig['auth_client_name'],
        ];
    }
}
