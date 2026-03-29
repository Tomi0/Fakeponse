<?php

namespace App\Services\User;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GetUserToken
{
    /**
     * @throws GuzzleException
     */
    public function handle(string $code): array
    {
        $authUrl = config('auth.auth_url') . '/api/oauth/token';
        $authSecret = config('auth.auth_client_secret');
        $authClientName = config('auth.auth_client_name');

        $params = [
            'code' => $code,
            'clientSecret' => $authSecret,
            'clientName' => $authClientName,
        ];

        $client = new Client();

        $response = $client->request('POST', $authUrl, [
            'json' => $params,
        ])->getBody()->getContents();

        $response = json_decode($response, true);

        return [
            'type' => $response['type'],
            'token' => $response['token'],
            'userId' => $response['userId'],
        ];
    }
}
